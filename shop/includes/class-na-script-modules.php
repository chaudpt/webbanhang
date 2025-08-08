<?php
class WP_Script_Modules {
	
	private $registered = array();
	private $enqueued_before_registered = array();
	private $a11y_available = false;

	
	public function register( string $id, string $src, array $deps = array(), $version = false ) {
		if ( ! isset( $this->registered[ $id ] ) ) {
			$dependencies = array();
			foreach ( $deps as $dependency ) {
				if ( is_array( $dependency ) ) {
					if ( ! isset( $dependency['id'] ) ) {
						_doing_it_wrong( __METHOD__, __( 'Missing required id key in entry among dependencies array.' ), '6.5.0' );
						continue;
					}
					$dependencies[] = array(
						'id'     => $dependency['id'],
						'import' => isset( $dependency['import'] ) && 'dynamic' === $dependency['import'] ? 'dynamic' : 'static',
					);
				} elseif ( is_string( $dependency ) ) {
					$dependencies[] = array(
						'id'     => $dependency,
						'import' => 'static',
					);
				} else {
					_doing_it_wrong( __METHOD__, __( 'Entries in dependencies array must be either strings or arrays with an id key.' ), '6.5.0' );
				}
			}

			$this->registered[ $id ] = array(
				'src'          => $src,
				'version'      => $version,
				'enqueue'      => isset( $this->enqueued_before_registered[ $id ] ),
				'dependencies' => $dependencies,
			);
		}
	}

	public function enqueue( string $id, string $src = '', array $deps = array(), $version = false ) {
		if ( isset( $this->registered[ $id ] ) ) {
			$this->registered[ $id ]['enqueue'] = true;
		} elseif ( $src ) {
			$this->register( $id, $src, $deps, $version );
			$this->registered[ $id ]['enqueue'] = true;
		} else {
			$this->enqueued_before_registered[ $id ] = true;
		}
	}
	
	public function dequeue( string $id ) {
		if ( isset( $this->registered[ $id ] ) ) {
			$this->registered[ $id ]['enqueue'] = false;
		}
		unset( $this->enqueued_before_registered[ $id ] );
	}

	
	public function deregister( string $id ) {
		unset( $this->registered[ $id ] );
		unset( $this->enqueued_before_registered[ $id ] );
	}

	
	public function add_hooks() {
		$position = wp_is_block_theme() ? 'wp_head' : 'wp_footer';
		add_action( $position, array( $this, 'print_import_map' ) );
		add_action( $position, array( $this, 'print_enqueued_script_modules' ) );
		add_action( $position, array( $this, 'print_script_module_preloads' ) );

		add_action( 'admin_print_footer_scripts', array( $this, 'print_import_map' ) );
		add_action( 'admin_print_footer_scripts', array( $this, 'print_enqueued_script_modules' ) );
		add_action( 'admin_print_footer_scripts', array( $this, 'print_script_module_preloads' ) );

		add_action( 'wp_footer', array( $this, 'print_script_module_data' ) );
		add_action( 'admin_print_footer_scripts', array( $this, 'print_script_module_data' ) );
		add_action( 'wp_footer', array( $this, 'print_a11y_script_module_html' ), 20 );
		add_action( 'admin_print_footer_scripts', array( $this, 'print_a11y_script_module_html' ), 20 );
	}

	
	public function print_enqueued_script_modules() {
		foreach ( $this->get_marked_for_enqueue() as $id => $script_module ) {
			wp_print_script_tag(
				array(
					'type' => 'module',
					'src'  => $this->get_src( $id ),
					'id'   => $id . '-js-module',
				)
			);
		}
	}

	
	public function print_script_module_preloads() {
		foreach ( $this->get_dependencies( array_keys( $this->get_marked_for_enqueue() ), array( 'static' ) ) as $id => $script_module ) {
			// Don't preload if it's marked for enqueue.
			if ( true !== $script_module['enqueue'] ) {
				echo sprintf(
					'<link rel="modulepreload" href="%s" id="%s">',
					esc_url( $this->get_src( $id ) ),
					esc_attr( $id . '-js-modulepreload' )
				);
			}
		}
	}

	
	public function print_import_map() {
		$import_map = $this->get_import_map();
		if ( ! empty( $import_map['imports'] ) ) {
			wp_print_inline_script_tag(
				wp_json_encode( $import_map, JSON_HEX_TAG | JSON_HEX_AMP ),
				array(
					'type' => 'importmap',
					'id'   => 'wp-importmap',
				)
			);
		}
	}

	
	private function get_import_map(): array {
		$imports = array();
		foreach ( $this->get_dependencies( array_keys( $this->get_marked_for_enqueue() ) ) as $id => $script_module ) {
			$imports[ $id ] = $this->get_src( $id );
		}
		return array( 'imports' => $imports );
	}

	
	private function get_marked_for_enqueue(): array {
		$enqueued = array();
		foreach ( $this->registered as $id => $script_module ) {
			if ( true === $script_module['enqueue'] ) {
				$enqueued[ $id ] = $script_module;
			}
		}
		return $enqueued;
	}

	
	private function get_dependencies( array $ids, array $import_types = array( 'static', 'dynamic' ) ) {
		return array_reduce(
			$ids,
			function ( $dependency_script_modules, $id ) use ( $import_types ) {
				$dependencies = array();
				foreach ( $this->registered[ $id ]['dependencies'] as $dependency ) {
					if (
					in_array( $dependency['import'], $import_types, true ) &&
					isset( $this->registered[ $dependency['id'] ] ) &&
					! isset( $dependency_script_modules[ $dependency['id'] ] )
					) {
						$dependencies[ $dependency['id'] ] = $this->registered[ $dependency['id'] ];
					}
				}
				return array_merge( $dependency_script_modules, $dependencies, $this->get_dependencies( array_keys( $dependencies ), $import_types ) );
			},
			array()
		);
	}

	
	private function get_src( string $id ): string {
		if ( ! isset( $this->registered[ $id ] ) ) {
			return '';
		}

		$script_module = $this->registered[ $id ];
		$src           = $script_module['src'];

		if ( false === $script_module['version'] ) {
			$src = add_query_arg( 'ver', get_bloginfo( 'version' ), $src );
		} elseif ( null !== $script_module['version'] ) {
			$src = add_query_arg( 'ver', $script_module['version'], $src );
		}

		
		$src = apply_filters( 'script_module_loader_src', $src, $id );

		return $src;
	}

	
	public function print_script_module_data(): void {
		$modules = array();
		foreach ( array_keys( $this->get_marked_for_enqueue() ) as $id ) {
			if ( '@wordpress/a11y' === $id ) {
				$this->a11y_available = true;
			}
			$modules[ $id ] = true;
		}
		foreach ( array_keys( $this->get_import_map()['imports'] ) as $id ) {
			if ( '@wordpress/a11y' === $id ) {
				$this->a11y_available = true;
			}
			$modules[ $id ] = true;
		}

		foreach ( array_keys( $modules ) as $module_id ) {
			
			$data = apply_filters( "script_module_data_{$module_id}", array() );

			if ( is_array( $data ) && array() !== $data ) {
				/*
				 * This data will be printed as JSON inside a script tag like this:
				 *   <script type="application/json"></script>
				 *
				 * A script tag must be closed by a sequence beginning with `</`. It's impossible to
				 * close a script tag without using `<`. We ensure that `<` is escaped and `/` can
				 * remain unescaped, so `</script>` will be printed as `\u003C/script\u00E3`.
				 *
				 *   - JSON_HEX_TAG: All < and > are converted to \u003C and \u003E.
				 *   - JSON_UNESCAPED_SLASHES: Don't escape /.
				 *
				 * If the page will use UTF-8 encoding, it's safe to print unescaped unicode:
				 *
				 *   - JSON_UNESCAPED_UNICODE: Encode multibyte Unicode characters literally (instead of as `\uXXXX`).
				 *   - JSON_UNESCAPED_LINE_TERMINATORS: The line terminators are kept unescaped when
				 *     JSON_UNESCAPED_UNICODE is supplied. It uses the same behaviour as it was
				 *     before PHP 7.1 without this constant. Available as of PHP 7.1.0.
				 *
				 * The JSON specification requires encoding in UTF-8, so if the generated HTML page
				 * is not encoded in UTF-8 then it's not safe to include those literals. They must
				 * be escaped to avoid encoding issues.
				 *
				 * @see https://www.rfc-editor.org/rfc/rfc8259.html for details on encoding requirements.
				 * @see https://www.php.net/manual/en/json.constants.php for details on these constants.
				 * @see https://html.spec.whatwg.org/#script-data-state for details on script tag parsing.
				 */
				$json_encode_flags = JSON_HEX_TAG | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_LINE_TERMINATORS;
				if ( ! is_utf8_charset() ) {
					$json_encode_flags = JSON_HEX_TAG | JSON_UNESCAPED_SLASHES;
				}

				wp_print_inline_script_tag(
					wp_json_encode(
						$data,
						$json_encode_flags
					),
					array(
						'type' => 'application/json',
						'id'   => "wp-script-module-data-{$module_id}",
					)
				);
			}
		}
	}

	
	public function print_a11y_script_module_html() {
		if ( ! $this->a11y_available ) {
			return;
		}
		echo '<div style="position:absolute;margin:-1px;padding:0;height:1px;width:1px;overflow:hidden;clip-path:inset(50%);border:0;word-wrap:normal !important;">'
			. '<p id="a11y-speak-intro-text" class="a11y-speak-intro-text" hidden>' . esc_html__( 'Notifications' ) . '</p>'
			. '<div id="a11y-speak-assertive" class="a11y-speak-region" aria-live="assertive" aria-relevant="additions text" aria-atomic="true"></div>'
			. '<div id="a11y-speak-polite" class="a11y-speak-region" aria-live="polite" aria-relevant="additions text" aria-atomic="true"></div>'
			. '</div>';
	}
}
