<?php
define( 'WP_CACHE', true );
define( 'DB_NAME', 'u446039828_E9uYN' );
define( 'DB_USER', 'u446039828_b7v87' );
define( 'DB_PASSWORD', 'WV5VoMRnQy' );
define( 'DB_HOST', '127.0.0.1' );
define( 'DB_CHARSET', 'utf8' );
define( 'DB_COLLATE', '' );
define( 'AUTH_KEY',          'R#Q_cC<0xR5X`$:+rn :!VO0qr]D`r%Z(?Ms_x*#7>4S=^a;S(x1$<y;j1r1S0.E' );
define( 'SECURE_AUTH_KEY',   '*fl>.i0eCRlT8ch[:%0]C(jBDNuIb=DaZB(PM[TBlx:[.5:1vrqVCG5Lop3f]4I|' );
define( 'LOGGED_IN_KEY',     '1mc1`FQgYL(>G8u+qE#P(N2s]i:o&0eo^_@>ry2}D[Y0qj;<VBv9Z{2E7XYpv,!k' );
define( 'NONCE_KEY',         '88au59VG~lcRz.>cS0O($Tn<?*!l)}c<YA m{DvH#kr%HUv]/Q>X<%w`!P&N?Prv' );
define( 'AUTH_SALT',         '^-uZ>zCZw2K~zrt,5zxK:& K-%:3Hxa?7J7h!dB|X5zWt6Gv JU3,>o[TysT{{&*' );
define( 'SECURE_AUTH_SALT',  '9S@Ww} 6(w^Hw1po`tydXd^&AtfF(ghy+RlbzZ^4(@8VR^<v|zGDG6rW)l2IcYy{' );
define( 'LOGGED_IN_SALT',    'sES|UzZubRGVuh5H;>8xGrU}wx$Ntnc{i<c};iSpKR4V885|ifM[/..6%>yA2$.L' );
define( 'NONCE_SALT',        '|i-~TrG^gv5-<RqQqu 6}gd|0RAkA2 q2[*MRI$<+=mZokGb%6%2|)@i7#r ;5>c' );
define( 'WP_CACHE_KEY_SALT', 'S;7%kgFOger0_ 6&}uP?xW/@>(:.-@@+4+2!d! ,mUCa;o*c<:bo9o,::]* h(=_' );
$table_prefix = 'na_';
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}
define( 'FS_METHOD', 'direct' );
define( 'COOKIEHASH', 'fa8c5cfc37b4112b4533d457202c6c0e' );
define( 'WP_AUTO_UPDATE_CORE', 'minor' );
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}
define( 'WPINC', 'includes' );

global $wp_version, $wp_db_version, $tinymce_version, $required_php_version, $required_mysql_version, $wp_local_package;
global $blog_id;
global $wpdb;
$GLOBALS['wp_plugin_paths'] = array();



require ABSPATH . WPINC . '/version.php';
//require ABSPATH . WPINC . '/compat.php';
require ABSPATH . WPINC . '/load.php';
//require ABSPATH . WPINC . '/class-wp-paused-extensions-storage.php';
//require ABSPATH . WPINC . '/class-wp-exception.php';
//require ABSPATH . WPINC . '/class-wp-fatal-error-handler.php';
//require ABSPATH . WPINC . '/class-wp-recovery-mode-cookie-service.php';
//require ABSPATH . WPINC . '/class-wp-recovery-mode-key-service.php';
//require ABSPATH . WPINC . '/class-wp-recovery-mode-link-service.php';
//require ABSPATH . WPINC . '/class-wp-recovery-mode-email-service.php';
//require ABSPATH . WPINC . '/class-wp-recovery-mode.php';
//require ABSPATH . WPINC . '/default-constants.php';
//require_once ABSPATH . WPINC . '/plugin.php'; //
require ABSPATH . WPINC . '/class-wp-list-util.php'; // WP_List_Util
//require ABSPATH . WPINC . '/class-wp-token-map.php';
//require ABSPATH . WPINC . '/formatting.php';
//require ABSPATH . WPINC . '/meta.php';
require ABSPATH . WPINC . '/class-wp-hook.php'; // WP_Hook need Iterator (PHP 5, PHP 7, PHP 8), ArrayAccess (PHP 5, PHP 7, PHP 8)
require ABSPATH . WPINC . '/functions.php'; // need WP_Hook
require ABSPATH . WPINC . '/class-wp-meta-query.php';//WP_Meta_Query need count, isset, unset, empty
//require ABSPATH . WPINC . '/class-wp-matchesmapregex.php';
require ABSPATH . WPINC . '/class-wp.php'; // WP  need do_action_ref_array empty apply_filters 
require ABSPATH . WPINC . '/class-wp-error.php';//WP_Error need empty, isset, 
require ABSPATH . WPINC . '/pomo/mo.php'; // MO need translations.php/Translations, streams.php/POMO_Reader streams.php/POMO_FileReader streams.php/POMO_StringReader  streams.php/POMO_CachedIntFileReader
require ABSPATH . WPINC . '/l10n/class-wp-translation-file.php'; // WP_Translation_File need WP_Translation_File_MO, WP_Translation_File_PHP, rtrim
require ABSPATH . WPINC . '/l10n/class-wp-translation-controller.php'; // WP_Translation_Controller need WP_Translation_File
require ABSPATH . WPINC . '/l10n/class-wp-translations.php'; // WP_Translations need WP_Translation_Controller, Translation_Entry

//require ABSPATH . WPINC . '/l10n/class-wp-translation-file-mo.php'; //Translations
//require ABSPATH . WPINC . '/l10n/class-wp-translation-file-php.php' // Translations
//require ABSPATH . WPINC . '/class-wp-site-query.php';
//require ABSPATH . WPINC . '/class-wp-network-query.php';
//require ABSPATH . WPINC . '/ms-blogs.php';
//require ABSPATH . WPINC . '/ms-settings.php';
require_once ABSPATH . WPINC . '/l10n.php'; // need NOOP_Translations, WP_Translations, Plural_Forms,  apply_filters
require_once ABSPATH . WPINC . '/class-wp-textdomain-registry.php'; // WP_Textdomain_Registry
//require_once ABSPATH . WPINC . '/class-wp-locale.php';
//require_once ABSPATH . WPINC . '/class-wp-locale-switcher.php';
//require ABSPATH . WPINC . '/class-wp-walker.php';
//require ABSPATH . WPINC . '/class-wp-ajax-response.php';
//require ABSPATH . WPINC . '/capabilities.php';
require ABSPATH . WPINC . '/class-wp-role.php'; // WP_Role
require ABSPATH . WPINC . '/class-wp-roles.php'; // WP_Roles need WP_Role, do_action
require ABSPATH . WPINC . '/class-wp-user.php';//WP_User need functions.php/do_action
require ABSPATH . WPINC . '/class-wp-query.php'; //WP_Query need WP_Meta_Query, WP_Date_Query, WP_Tax_Query
require ABSPATH . WPINC . '/query.php';
require ABSPATH . WPINC . '/class-wp-date-query.php';//WP_Date_Query need preg_replace, empty, functions.php/apply_filters, 
require ABSPATH . WPINC . '/theme.php'; // need wp_parse_args, apply_filters, is_array, count, 
//require ABSPATH . WPINC . '/class-wp-theme.php';
//require ABSPATH . WPINC . '/class-wp-theme-json-schema.php';
//require ABSPATH . WPINC . '/class-wp-theme-json-data.php';
//require ABSPATH . WPINC . '/class-wp-theme-json.php';
//require ABSPATH . WPINC . '/class-wp-theme-json-resolver.php';
//require ABSPATH . WPINC . '/class-wp-duotone.php';
//require ABSPATH . WPINC . '/global-styles-and-settings.php';
//require ABSPATH . WPINC . '/class-wp-block-template.php';
//require ABSPATH . WPINC . '/class-wp-block-templates-registry.php';
//require ABSPATH . WPINC . '/block-template-utils.php';
//require ABSPATH . WPINC . '/block-template.php';
//require ABSPATH . WPINC . '/theme-templates.php';
//require ABSPATH . WPINC . '/theme-previews.php';
//require ABSPATH . WPINC . '/template.php';
//require ABSPATH . WPINC . '/https-detection.php';
//require ABSPATH . WPINC . '/https-migration.php';
//require ABSPATH . WPINC . '/class-wp-user-request.php';
require ABSPATH . WPINC . '/user.php'; // need WP_User, WP_Error
require ABSPATH . WPINC . '/class-wp-user-query.php'; // WP_User_Query need WP_Date_Query, functions.php/do_action_ref_array, functions.php/apply_filters
//require ABSPATH . WPINC . '/class-wp-session-tokens.php';
//require ABSPATH . WPINC . '/class-wp-user-meta-session-tokens.php';
require ABSPATH . WPINC . '/general-template.php'; // need l10n.php/esc_attr, apply_filters
//require ABSPATH . WPINC . '/link-template.php';
require ABSPATH . WPINC . '/author-template.php'; // need apply_filters
//require ABSPATH . WPINC . '/robots-template.php';
require ABSPATH . WPINC . '/class-wp-post-type.php'; // WP_Post_Type need apply_filters
require ABSPATH . WPINC . '/class-wp-post.php'; // WP_Post
require ABSPATH . WPINC . '/post.php'; // need WP_Post_Type, WP_Post, WP_Error
require ABSPATH . WPINC . '/post-template.php'; // need post.php/get_post, post.php/get_post_custom
//require ABSPATH . WPINC . '/class-walker-page.php';
//require ABSPATH . WPINC . '/class-walker-page-dropdown.php';
//require ABSPATH . WPINC . '/revision.php';
//require ABSPATH . WPINC . '/post-formats.php';
//require ABSPATH . WPINC . '/post-thumbnail-template.php';
require ABSPATH . WPINC . '/category.php'; // need apply_filters, taxonomy.php/get_term
//require ABSPATH . WPINC . '/class-walker-category.php';
//require ABSPATH . WPINC . '/class-walker-category-dropdown.php';
require ABSPATH . WPINC . '/category-template.php'; // need apply_filters
require ABSPATH . WPINC . '/class-wp-comment.php'; // WP_Comment
require ABSPATH . WPINC . '/comment.php'; // need do_action, apply_filters
require ABSPATH . WPINC . '/class-wp-comment-query.php'; // WP_Comment_Query need  WP_Meta_Query, do_action_ref_array
//require ABSPATH . WPINC . '/class-walker-comment.php';
//require ABSPATH . WPINC . '/comment-template.php';
require ABSPATH . WPINC . '/rewrite.php';
require ABSPATH . WPINC . '/class-wp-rewrite.php'; //WP_Rewrite
//require ABSPATH . WPINC . '/feed.php';
//require ABSPATH . WPINC . '/bookmark.php';
//require ABSPATH . WPINC . '/bookmark-template.php';
//require ABSPATH . WPINC . '/kses.php';
//require ABSPATH . WPINC . '/cron.php';
//require ABSPATH . WPINC . '/deprecated.php';
//require ABSPATH . WPINC . '/script-loader.php';
require ABSPATH . WPINC . '/taxonomy.php'; // need functions.php/apply_filters
//require ABSPATH . WPINC . '/class-wp-taxonomy.php'; //
require ABSPATH . WPINC . '/class-wp-term.php'; // WP_Term need WP_Error, taxonomy.php/sanitize_term
require ABSPATH . WPINC . '/class-wp-term-query.php'; // WP_Term_Query need WP_Meta_Query, functions.php/apply_filters_ref_array
require ABSPATH . WPINC . '/class-wp-tax-query.php'; // WP_Tax_Query need WP_Error, WP_Term_Query
//require ABSPATH . WPINC . '/update.php';
//require ABSPATH . WPINC . '/canonical.php';
require ABSPATH . WPINC . '/shortcodes.php';
//require ABSPATH . WPINC . '/embed.php';
//require ABSPATH . WPINC . '/class-wp-embed.php';
//require ABSPATH . WPINC . '/class-wp-oembed.php';
//require ABSPATH . WPINC . '/class-wp-oembed-controller.php';
require ABSPATH . WPINC . '/media.php'; //need shortcodes.php/add_shortcode 
//require ABSPATH . WPINC . '/http.php';
//require ABSPATH . WPINC . '/html-api/html5-named-character-references.php';
//require ABSPATH . WPINC . '/html-api/class-wp-html-attribute-token.php';
//require ABSPATH . WPINC . '/html-api/class-wp-html-span.php';
//require ABSPATH . WPINC . '/html-api/class-wp-html-doctype-info.php';
//require ABSPATH . WPINC . '/html-api/class-wp-html-text-replacement.php';
//require ABSPATH . WPINC . '/html-api/class-wp-html-decoder.php';
//require ABSPATH . WPINC . '/html-api/class-wp-html-tag-processor.php';
//require ABSPATH . WPINC . '/html-api/class-wp-html-unsupported-exception.php';
//require ABSPATH . WPINC . '/html-api/class-wp-html-active-formatting-elements.php';
//require ABSPATH . WPINC . '/html-api/class-wp-html-open-elements.php';
//require ABSPATH . WPINC . '/html-api/class-wp-html-token.php';
//require ABSPATH . WPINC . '/html-api/class-wp-html-stack-event.php';
//require ABSPATH . WPINC . '/html-api/class-wp-html-processor-state.php';
//require ABSPATH . WPINC . '/html-api/class-wp-html-processor.php';
//require ABSPATH . WPINC . '/class-wp-http.php';
//require ABSPATH . WPINC . '/class-wp-http-streams.php';
//require ABSPATH . WPINC . '/class-wp-http-curl.php';
//require ABSPATH . WPINC . '/class-wp-http-proxy.php';
//require ABSPATH . WPINC . '/class-wp-http-cookie.php';
//require ABSPATH . WPINC . '/class-wp-http-encoding.php';
//require ABSPATH . WPINC . '/class-wp-http-response.php';
//require ABSPATH . WPINC . '/class-wp-http-requests-response.php';
//require ABSPATH . WPINC . '/class-wp-http-requests-hooks.php';
require ABSPATH . WPINC . '/widgets.php'; // need WP_Widget_Factory/register unregister , WP_Widget,  apply_filters, theme.php/get_theme_support, theme.php/add_theme_support
require ABSPATH . WPINC . '/class-wp-widget.php'; //WP_Widget need wp_parse_args, preg_replace, strpos, str_replace, trim array_keys, function.php/wp_suspend_cache_addition, do_action_ref_array
require ABSPATH . WPINC . '/class-wp-widget-factory.php'; //WP_Widget_Factory need WP_Widget, add_action, _deprecated_constructor, instanceof
require ABSPATH . WPINC . '/nav-menu-template.php';// need Walker_Nav_Menu
require ABSPATH . WPINC . '/nav-menu.php'; //need is_object, apply_filters, empty
//functions.wp-scripts.php// need WP_Scripts functions.php/_doing_it_wrong
//functions.wp-styles.php// need WP_Styles, functions.wp-scripts.php/_wp_scripts_maybe_doing_it_wrong
//class-wp-admin-bar.php // WP_Admin_Bar need add_action, functions.wp-scripts.php/wp_enqueue_script, functions.wp-styles.php/wp_enqueue_style, do_action
require ABSPATH . WPINC . '/admin-bar.php'; // need WP_Admin_Bar
//require ABSPATH . WPINC . '/class-wp-application-passwords.php';
//require ABSPATH . WPINC . '/rest-api.php';
//require ABSPATH . WPINC . '/rest-api/class-wp-rest-server.php';
//require ABSPATH . WPINC . '/rest-api/class-wp-rest-response.php';
//require ABSPATH . WPINC . '/rest-api/class-wp-rest-request.php';
//require ABSPATH . WPINC . '/rest-api/endpoints/class-wp-rest-controller.php';
//require ABSPATH . WPINC . '/rest-api/endpoints/class-wp-rest-posts-controller.php';
//require ABSPATH . WPINC . '/rest-api/endpoints/class-wp-rest-attachments-controller.php';
//require ABSPATH . WPINC . '/rest-api/endpoints/class-wp-rest-global-styles-controller.php';
//require ABSPATH . WPINC . '/rest-api/endpoints/class-wp-rest-post-types-controller.php';
//require ABSPATH . WPINC . '/rest-api/endpoints/class-wp-rest-post-statuses-controller.php';
//require ABSPATH . WPINC . '/rest-api/endpoints/class-wp-rest-revisions-controller.php';
//require ABSPATH . WPINC . '/rest-api/endpoints/class-wp-rest-global-styles-revisions-controller.php';
//require ABSPATH . WPINC . '/rest-api/endpoints/class-wp-rest-template-revisions-controller.php';
//require ABSPATH . WPINC . '/rest-api/endpoints/class-wp-rest-autosaves-controller.php';
//require ABSPATH . WPINC . '/rest-api/endpoints/class-wp-rest-template-autosaves-controller.php';
//require ABSPATH . WPINC . '/rest-api/endpoints/class-wp-rest-taxonomies-controller.php';
//require ABSPATH . WPINC . '/rest-api/endpoints/class-wp-rest-terms-controller.php';
//require ABSPATH . WPINC . '/rest-api/endpoints/class-wp-rest-menu-items-controller.php';
//require ABSPATH . WPINC . '/rest-api/endpoints/class-wp-rest-menus-controller.php';
//require ABSPATH . WPINC . '/rest-api/endpoints/class-wp-rest-menu-locations-controller.php';
//require ABSPATH . WPINC . '/rest-api/endpoints/class-wp-rest-users-controller.php';
//require ABSPATH . WPINC . '/rest-api/endpoints/class-wp-rest-comments-controller.php';
//require ABSPATH . WPINC . '/rest-api/endpoints/class-wp-rest-search-controller.php';
//require ABSPATH . WPINC . '/rest-api/endpoints/class-wp-rest-blocks-controller.php';
//require ABSPATH . WPINC . '/rest-api/endpoints/class-wp-rest-block-types-controller.php';
//require ABSPATH . WPINC . '/rest-api/endpoints/class-wp-rest-block-renderer-controller.php';
//require ABSPATH . WPINC . '/rest-api/endpoints/class-wp-rest-settings-controller.php';
//require ABSPATH . WPINC . '/rest-api/endpoints/class-wp-rest-themes-controller.php';
//require ABSPATH . WPINC . '/rest-api/endpoints/class-wp-rest-plugins-controller.php';
//require ABSPATH . WPINC . '/rest-api/endpoints/class-wp-rest-block-directory-controller.php';
//require ABSPATH . WPINC . '/rest-api/endpoints/class-wp-rest-edit-site-export-controller.php';
//require ABSPATH . WPINC . '/rest-api/endpoints/class-wp-rest-pattern-directory-controller.php';
//require ABSPATH . WPINC . '/rest-api/endpoints/class-wp-rest-block-patterns-controller.php';
//require ABSPATH . WPINC . '/rest-api/endpoints/class-wp-rest-block-pattern-categories-controller.php';
//require ABSPATH . WPINC . '/rest-api/endpoints/class-wp-rest-application-passwords-controller.php';
//require ABSPATH . WPINC . '/rest-api/endpoints/class-wp-rest-site-health-controller.php';
//require ABSPATH . WPINC . '/rest-api/endpoints/class-wp-rest-sidebars-controller.php';
//require ABSPATH . WPINC . '/rest-api/endpoints/class-wp-rest-widget-types-controller.php';
//require ABSPATH . WPINC . '/rest-api/endpoints/class-wp-rest-widgets-controller.php';
//require ABSPATH . WPINC . '/rest-api/endpoints/class-wp-rest-templates-controller.php';
//require ABSPATH . WPINC . '/rest-api/endpoints/class-wp-rest-url-details-controller.php';
//require ABSPATH . WPINC . '/rest-api/endpoints/class-wp-rest-navigation-fallback-controller.php';
//require ABSPATH . WPINC . '/rest-api/endpoints/class-wp-rest-font-families-controller.php';
//require ABSPATH . WPINC . '/rest-api/endpoints/class-wp-rest-font-faces-controller.php';
//require ABSPATH . WPINC . '/rest-api/endpoints/class-wp-rest-font-collections-controller.php';
//require ABSPATH . WPINC . '/rest-api/fields/class-wp-rest-meta-fields.php';
//require ABSPATH . WPINC . '/rest-api/fields/class-wp-rest-comment-meta-fields.php';
//require ABSPATH . WPINC . '/rest-api/fields/class-wp-rest-post-meta-fields.php';
//require ABSPATH . WPINC . '/rest-api/fields/class-wp-rest-term-meta-fields.php';
//require ABSPATH . WPINC . '/rest-api/fields/class-wp-rest-user-meta-fields.php';
//require ABSPATH . WPINC . '/rest-api/search/class-wp-rest-search-handler.php';
//require ABSPATH . WPINC . '/rest-api/search/class-wp-rest-post-search-handler.php';
//require ABSPATH . WPINC . '/rest-api/search/class-wp-rest-term-search-handler.php';
//require ABSPATH . WPINC . '/rest-api/search/class-wp-rest-post-format-search-handler.php';
//require ABSPATH . WPINC . '/sitemaps.php';
//require ABSPATH . WPINC . '/sitemaps/class-wp-sitemaps.php';
//require ABSPATH . WPINC . '/sitemaps/class-wp-sitemaps-index.php';
//require ABSPATH . WPINC . '/sitemaps/class-wp-sitemaps-provider.php';
//require ABSPATH . WPINC . '/sitemaps/class-wp-sitemaps-registry.php';
//require ABSPATH . WPINC . '/sitemaps/class-wp-sitemaps-renderer.php';
//require ABSPATH . WPINC . '/sitemaps/class-wp-sitemaps-stylesheet.php';
//require ABSPATH . WPINC . '/sitemaps/providers/class-wp-sitemaps-posts.php';
//require ABSPATH . WPINC . '/sitemaps/providers/class-wp-sitemaps-taxonomies.php';
//require ABSPATH . WPINC . '/sitemaps/providers/class-wp-sitemaps-users.php';
require ABSPATH . WPINC . '/class-wp-block-bindings-source.php'; //WP_Block_Bindings_Source
require ABSPATH . WPINC . '/class-wp-block-bindings-registry.php'; //WP_Block_Bindings_Registry need WP_Block_Bindings_Source,  instanceof, 
require ABSPATH . WPINC . '/class-wp-block-editor-context.php'; // WP_Block_Editor_Context
require ABSPATH . WPINC . '/class-wp-block-type.php'; // WP_Block_Type need functions.php/apply_filters
//require ABSPATH . WPINC . '/class-wp-block-pattern-categories-registry.php';
//require ABSPATH . WPINC . '/class-wp-block-patterns-registry.php';
//require ABSPATH . WPINC . '/class-wp-block-styles-registry.php';
//require ABSPATH . WPINC . '/class-wp-block-type-registry.php';
//require ABSPATH . WPINC . '/class-wp-block.php';
//require ABSPATH . WPINC . '/class-wp-block-list.php';
//require ABSPATH . WPINC . '/class-wp-block-metadata-registry.php';
//require ABSPATH . WPINC . '/class-wp-block-parser-block.php';
//require ABSPATH . WPINC . '/class-wp-block-parser-frame.php';
//require ABSPATH . WPINC . '/class-wp-block-parser.php';
//require ABSPATH . WPINC . '/class-wp-classic-to-block-menu-converter.php';
//require ABSPATH . WPINC . '/class-wp-navigation-fallback.php';
//require ABSPATH . WPINC . '/block-bindings.php';
//require ABSPATH . WPINC . '/block-bindings/pattern-overrides.php';
//require ABSPATH . WPINC . '/block-bindings/post-meta.php';
//require ABSPATH . WPINC . '/blocks.php';
//require ABSPATH . WPINC . '/blocks/index.php';
//require ABSPATH . WPINC . '/block-editor.php';
//require ABSPATH . WPINC . '/block-patterns.php';
//require ABSPATH . WPINC . '/class-wp-block-supports.php';
//require ABSPATH . WPINC . '/block-supports/utils.php';
//require ABSPATH . WPINC . '/block-supports/align.php';
//require ABSPATH . WPINC . '/block-supports/custom-classname.php';
//require ABSPATH . WPINC . '/block-supports/generated-classname.php';
//require ABSPATH . WPINC . '/block-supports/settings.php';
//require ABSPATH . WPINC . '/block-supports/elements.php';
//require ABSPATH . WPINC . '/block-supports/colors.php';
//require ABSPATH . WPINC . '/block-supports/typography.php';
//require ABSPATH . WPINC . '/block-supports/border.php';
//require ABSPATH . WPINC . '/block-supports/layout.php';
//require ABSPATH . WPINC . '/block-supports/position.php';
//require ABSPATH . WPINC . '/block-supports/spacing.php';
//require ABSPATH . WPINC . '/block-supports/dimensions.php';
//require ABSPATH . WPINC . '/block-supports/duotone.php';
//require ABSPATH . WPINC . '/block-supports/shadow.php';
//require ABSPATH . WPINC . '/block-supports/background.php';
//require ABSPATH . WPINC . '/block-supports/block-style-variations.php';
//require ABSPATH . WPINC . '/style-engine.php';
//require ABSPATH . WPINC . '/style-engine/class-wp-style-engine.php';
//require ABSPATH . WPINC . '/style-engine/class-wp-style-engine-css-declarations.php';
//require ABSPATH . WPINC . '/style-engine/class-wp-style-engine-css-rule.php';
//require ABSPATH . WPINC . '/style-engine/class-wp-style-engine-css-rules-store.php';
//require ABSPATH . WPINC . '/style-engine/class-wp-style-engine-processor.php';
//require ABSPATH . WPINC . '/fonts/class-wp-font-face-resolver.php';
//require ABSPATH . WPINC . '/fonts/class-wp-font-collection.php';
//require ABSPATH . WPINC . '/fonts/class-wp-font-face.php';
//require ABSPATH . WPINC . '/fonts/class-wp-font-library.php';
//require ABSPATH . WPINC . '/fonts/class-wp-font-utils.php';
//require ABSPATH . WPINC . '/fonts.php';
require ABSPATH . WPINC . '/class-wp-script-modules.php'; // WP_Script_Modules
require ABSPATH . WPINC . '/script-modules.php'; // neeed WP_Script_Modules/new , register, enqueue, dequeue, deregister
//require ABSPATH . WPINC . '/interactivity-api/class-wp-interactivity-api.php';
//require ABSPATH . WPINC . '/interactivity-api/class-wp-interactivity-api-directives-processor.php';
//require ABSPATH . WPINC . '/interactivity-api/interactivity-api.php';
require ABSPATH . WPINC . '/class-wp-plugin-dependencies.php'; //WP_Plugin_Dependencies
//require ABSPATH . WPINC . '/pluggable.php';
//require ABSPATH . WPINC . '/pluggable-deprecated.php';

$GLOBALS['wp_textdomain_registry'] = new WP_Textdomain_Registry();
$GLOBALS['wp_textdomain_registry']->init();
$GLOBALS['wp_the_query'] = new WP_Query();
$GLOBALS['wp_query'] = $GLOBALS['wp_the_query'];
$GLOBALS['wp_rewrite'] = new WP_Rewrite();
$GLOBALS['wp_widget_factory'] = new WP_Widget_Factory();
$GLOBALS['wp_roles'] = new WP_Roles();
$GLOBALS['wp_locale'] = new WP_Locale();
$GLOBALS['wp'] = new WP();
$GLOBALS['wp']->init();

