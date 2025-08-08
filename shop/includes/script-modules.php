<?php

function wp_script_modules(): WP_Script_Modules {
	global $wp_script_modules;

	if ( ! ( $wp_script_modules instanceof WP_Script_Modules ) ) {
		$wp_script_modules = new WP_Script_Modules();
	}

	return $wp_script_modules;
}


function wp_register_script_module( string $id, string $src, array $deps = array(), $version = false ) {
	wp_script_modules()->register( $id, $src, $deps, $version );
}


function wp_enqueue_script_module( string $id, string $src = '', array $deps = array(), $version = false ) {
	wp_script_modules()->enqueue( $id, $src, $deps, $version );
}


function wp_dequeue_script_module( string $id ) {
	wp_script_modules()->dequeue( $id );
}


function wp_deregister_script_module( string $id ) {
	wp_script_modules()->deregister( $id );
}


function wp_default_script_modules() {
	$suffix = defined( 'WP_RUN_CORE_TESTS' ) ? '.min' : wp_scripts_get_suffix();

	/*
	 * Expects multidimensional array like:
	 *
	 *     'interactivity/index.min.js' => array('dependencies' => array(…), 'version' => '…'),
	 *     'interactivity/debug.min.js' => array('dependencies' => array(…), 'version' => '…'),
	 *     'interactivity-router/index.min.js' => …
	 */
	$assets = include ABSPATH . WPINC . "/assets/script-modules-packages{$suffix}.php";

	foreach ( $assets as $file_name => $script_module_data ) {
		/*
		 * Build the WordPress Script Module ID from the file name.
		 * Prepend `@wordpress/` and remove extensions and `/index` if present:
		 *   - interactivity/index.min.js  => @wordpress/interactivity
		 *   - interactivity/debug.min.js  => @wordpress/interactivity/debug
		 *   - block-library/query/view.js => @wordpress/block-library/query/view
		 */
		$script_module_id = '@wordpress/' . preg_replace( '~(?:/index)?(?:\.min)?\.js$~D', '', $file_name, 1 );

		switch ( $script_module_id ) {
			/*
			 * Interactivity exposes two entrypoints, "/index" and "/debug".
			 * "/debug" should replace "/index" in development.
			 */
			case '@wordpress/interactivity/debug':
				if ( ! SCRIPT_DEBUG ) {
					continue 2;
				}
				$script_module_id = '@wordpress/interactivity';
				break;
			case '@wordpress/interactivity':
				if ( SCRIPT_DEBUG ) {
					continue 2;
				}
				break;
		}

		$path = includes_url( "js/dist/script-modules/{$file_name}" );
		wp_register_script_module( $script_module_id, $path, $script_module_data['dependencies'], $script_module_data['version'] );
	}
}
