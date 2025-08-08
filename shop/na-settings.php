<?php

define( 'WPINC', 'includes' );
define( 'WPSRC', 'src' );

global $wp_version, $wp_db_version, $tinymce_version, $required_php_version, $required_mysql_version, $wp_local_package;
require ABSPATH . WPINC . '/version.php'; //$wp_version $wp_db_version $required_mysql_version
require ABSPATH . WPINC . '/compat.php'; // _ mb_strlen is_countable 
require ABSPATH . WPINC . '/class-na-paused-extensions-storage.php'; // WP_Paused_Extensions_Storage
require ABSPATH . WPINC . '/class-na-exception.php'; // WP_Exception
require ABSPATH . WPINC . '/class-na-fatal-error-handler.php';//WP_Fatal_Error_Handler
require ABSPATH . WPINC . '/class-na-recovery-mode-cookie-service.php';//WP_Recovery_Mode_Cookie_Service
require ABSPATH . WPINC . '/class-na-recovery-mode-key-service.php'; // WP_Recovery_Mode_Key_Service
require ABSPATH . WPINC . '/class-na-recovery-mode-link-service.php';//WP_Recovery_Mode_Link_Service
require ABSPATH . WPINC . '/class-na-recovery-mode-email-service.php';//WP_Recovery_Mode_Email_Service
require ABSPATH . WPINC . '/class-na-recovery-mode.php'; //WP_Recovery_Mode
require ABSPATH . WPINC . '/error-protection.php'; //ít dùng
require ABSPATH . WPINC . '/default-constants.php';//WP_START_TIMESTAMP WP_CONTENT_DIR 
require ABSPATH . WPINC . '/class-na-hook.php'; // WP_Hook
require_once ABSPATH . WPINC . '/functions.php';// need WP_Hook, option.php
require ABSPATH . WPINC . '/load.php'; // 
global $wpdb;
global $blog_id;
global $wp_filter;
global $wp_actions;
global $wp_filters;
global $wp_current_filter;
global $debug_funct;

wp_check_php_mysql_versions(); // need load.php
wp_initial_constants(); // need default-constants.php
wp_register_fatal_error_handler(); // need error-protection.php


date_default_timezone_set( 'UTC' ); //PHP

wp_fix_server_vars(); 	// need load.php
wp_maintenance();	  	// need load.php
timer_start();			// need load.php
wp_debug_mode();		// need load.php
wp_set_lang_dir();		// need load.php

// Load early WordPress files.
require ABSPATH . WPINC . '/class-na-list-util.php';
require ABSPATH . WPINC . '/class-na-token-map.php';
require ABSPATH . WPINC . '/formatting.php';
require ABSPATH . WPINC . '/meta.php';
//require ABSPATH . WPINC . '/functions.php';
require ABSPATH . WPINC . '/class-na-meta-query.php'; //WP_Meta_Query
require ABSPATH . WPINC . '/class-na-matchesmapregex.php';  //WP_MatchesMapRegex
require ABSPATH . WPINC . '/class-na.php';//WP
require ABSPATH . WPINC . '/class-na-error.php';
require ABSPATH . WPINC . '/pomo/mo.php';
require ABSPATH . WPINC . '/l10n/class-na-translation-controller.php';//WP_Translation_Controller
require ABSPATH . WPINC . '/l10n/class-na-translations.php';//WP_Translations
require ABSPATH . WPINC . '/l10n/class-na-translation-file.php';//WP_Translation_File
require ABSPATH . WPINC . '/l10n/class-na-translation-file-mo.php';//WP_Translation_File_MO
require ABSPATH . WPINC . '/l10n/class-na-translation-file-php.php';//WP_Translation_File_PHP
require_wp_db();		// need load.php
$GLOBALS['table_prefix'] = $table_prefix;
wp_set_wpdb_vars();		//need load.php
wp_start_object_cache();//need load.php
require ABSPATH . WPINC . '/default-filters.php';
define( 'MULTISITE', false );

register_shutdown_function( 'shutdown_action_hook' ); //PHP
if ( SHORTINIT ) {
	return false;
}


require_once ABSPATH . WPINC . '/l10n.php';
require_once ABSPATH . WPINC . '/class-na-textdomain-registry.php';
require_once ABSPATH . WPINC . '/class-na-locale.php';
require_once ABSPATH . WPINC . '/class-na-locale-switcher.php';

//require_once ABSPATH . 'includes/admin.php';
require_once ABSPATH . WPINC .'/schema.php';

function __get_option( $setting ) { // phpcs:ignore WordPress.NamingConventions.ValidFunctionName.FunctionDoubleUnderscore,PHPCompatibility.FunctionNameRestrictions.ReservedFunctionNames.FunctionDoubleUnderscore
	global $wpdb;

	if ( 'home' === $setting && defined( 'WP_HOME' ) ) {
		return untrailingslashit( WP_HOME );
	}

	if ( 'siteurl' === $setting && defined( 'WP_SITEURL' ) ) {
		return untrailingslashit( WP_SITEURL );
	}

	$option = $wpdb->get_var( $wpdb->prepare( "SELECT option_value FROM $wpdb->options WHERE option_name = %s", $setting ) );

	if ( 'home' === $setting && ! $option ) {
		return __get_option( 'siteurl' );
	}

	if ( in_array( $setting, array( 'siteurl', 'home', 'category_base', 'tag_base' ), true ) ) {
		$option = untrailingslashit( $option );
	}

	return maybe_unserialize( $option );
}

 function upgrade_all() {
    global $wp_current_db_version, $wp_db_version;
    $wp_current_db_version = (int) __get_option( 'db_version' );
    
    if ( $wp_db_version === $wp_current_db_version ) {
        
		return;
	}

	if ( ! is_blog_installed() ) {
	    populate_options(); // need schema.php: Create WordPress options and set the default values.
		return;
	}
	
    
    update_option( 'db_version', $wp_db_version );
	update_option( 'db_upgraded', true );
}

echo "<p>na_upgrade LINE:".__LINE__."</p>";
function wp_check_mysql_version() {
	global $wpdb;
	$result = $wpdb->check_database_version();
	if ( is_wp_error( $result ) ) {
		wp_die( $result );
	}
}
function pre_schema_upgrade() {
	global $wp_current_db_version, $wpdb;

	// Upgrade versions prior to 2.9.
	if ( $wp_current_db_version < 11557 ) {
		// Delete duplicate options. Keep the option with the highest option_id.
		$wpdb->query( "DELETE o1 FROM $wpdb->options AS o1 JOIN $wpdb->options AS o2 USING (`option_name`) WHERE o2.option_id > o1.option_id" );

		// Drop the old primary key and add the new.
		$wpdb->query( "ALTER TABLE $wpdb->options DROP PRIMARY KEY, ADD PRIMARY KEY(option_id)" );

		// Drop the old option_name index. dbDelta() doesn't do the drop.
		$wpdb->query( "ALTER TABLE $wpdb->options DROP INDEX option_name" );
	}

	// Multisite schema upgrades.
	if ( $wp_current_db_version < 25448 && is_multisite() && wp_should_upgrade_global_tables() ) {

		// Upgrade versions prior to 3.7.
		if ( $wp_current_db_version < 25179 ) {
			// New primary key for signups.
			$wpdb->query( "ALTER TABLE $wpdb->signups ADD signup_id BIGINT(20) NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST" );
			$wpdb->query( "ALTER TABLE $wpdb->signups DROP INDEX domain" );
		}

		if ( $wp_current_db_version < 25448 ) {
			// Convert archived from enum to tinyint.
			$wpdb->query( "ALTER TABLE $wpdb->blogs CHANGE COLUMN archived archived varchar(1) NOT NULL default '0'" );
			$wpdb->query( "ALTER TABLE $wpdb->blogs CHANGE COLUMN archived archived tinyint(2) NOT NULL default 0" );
		}
	}

	// Upgrade versions prior to 4.2.
	if ( $wp_current_db_version < 31351 ) {
		if ( ! is_multisite() && wp_should_upgrade_global_tables() ) {
			$wpdb->query( "ALTER TABLE $wpdb->usermeta DROP INDEX meta_key, ADD INDEX meta_key(meta_key(191))" );
		}
		$wpdb->query( "ALTER TABLE $wpdb->terms DROP INDEX slug, ADD INDEX slug(slug(191))" );
		$wpdb->query( "ALTER TABLE $wpdb->terms DROP INDEX name, ADD INDEX name(name(191))" );
		$wpdb->query( "ALTER TABLE $wpdb->commentmeta DROP INDEX meta_key, ADD INDEX meta_key(meta_key(191))" );
		$wpdb->query( "ALTER TABLE $wpdb->postmeta DROP INDEX meta_key, ADD INDEX meta_key(meta_key(191))" );
		$wpdb->query( "ALTER TABLE $wpdb->posts DROP INDEX post_name, ADD INDEX post_name(post_name(191))" );
	}

	// Upgrade versions prior to 4.4.
	if ( $wp_current_db_version < 34978 ) {
		// If compatible termmeta table is found, use it, but enforce a proper index and update collation.
		if ( $wpdb->get_var( "SHOW TABLES LIKE '{$wpdb->termmeta}'" ) && $wpdb->get_results( "SHOW INDEX FROM {$wpdb->termmeta} WHERE Column_name = 'meta_key'" ) ) {
			$wpdb->query( "ALTER TABLE $wpdb->termmeta DROP INDEX meta_key, ADD INDEX meta_key(meta_key(191))" );
			maybe_convert_table_to_utf8mb4( $wpdb->termmeta );
		}
	}
}

function make_db_current_silent( $tables = 'all' ) {
	dbDelta( $tables ); // schema.php
}

function na_upgrade() {
    global $wp_current_db_version, $wp_db_version, $table_prefix, $wpdb;
    $options = array();
	wp_check_mysql_version();
	wp_cache_flush(); //cache.php
	pre_schema_upgrade();
	make_db_current_silent();
    //upgrade_all();
	wp_cache_flush();//cache.php
	delete_transient( 'wp_core_block_css_files' );// option.php

    $defaults = array(
		'siteurl'                         => $guessurl,
		'home'                            => $guessurl,
		'blogname'                        => __( 'Hi Nana Shop' ),
		'blogdescription'                 => 'This is a website developed by Nana',
		'users_can_register'              => 0,
		'admin_email'                     => 'hinanashop@gmail.com',
		'start_of_week'                   => _x( '1', 'start of week' ),
		'use_balanceTags'                 => 0,
		'use_smilies'                     => 1,
		'require_name_email'              => 1,
		'comments_notify'                 => 1,
		'posts_per_rss'                   => 10,
		'rss_use_excerpt'                 => 0,
		'mailserver_url'                  => 'hinanashop.com',
		'mailserver_login'                => 'admin@hinanashop.com',
		'mailserver_pass'                 => '',
		'mailserver_port'                 => 110,
		'default_category'                => 1,
		'default_comment_status'          => 'open',
		'default_ping_status'             => 'open',
		'default_pingback_flag'           => 1,
		'posts_per_page'                  => 10,
		'date_format'                     => __( 'F j, Y' ),
		/* translators: Default time format, see https://www.php.net/manual/datetime.format.php */
		'time_format'                     => __( 'g:i a' ),
		/* translators: Links last updated date format, see https://www.php.net/manual/datetime.format.php */
		'links_updated_date_format'       => __( 'F j, Y g:i a' ),
		'comment_moderation'              => 0,
		'moderation_notify'               => 1,
		'permalink_structure'             => '',
		'rewrite_rules'                   => '',
		'hack_file'                       => 0,
		'blog_charset'                    => 'UTF-8',
		'moderation_keys'                 => '',
		'active_plugins'                  => array(),
		'category_base'                   => '',
		'ping_sites'                      => 'http://rpc.pingomatic.com/',
		'comment_max_links'               => 2,
		'gmt_offset'                      => $gmt_offset,

		// 1.5.0
		'default_email_category'          => 1,
		'recently_edited'                 => '',
		'template'                        => $template,
		'stylesheet'                      => $stylesheet,
		'comment_registration'            => 0,
		'html_type'                       => 'text/html',

		// 1.5.1
		'use_trackback'                   => 0,

		// 2.0.0
		'default_role'                    => 'subscriber',
		'db_version'                      => $wp_db_version,

		// 2.0.1
		'uploads_use_yearmonth_folders'   => 1,
		'upload_path'                     => '',

		// 2.1.0
		'blog_public'                     => '1',
		'default_link_category'           => 2,
		'show_on_front'                   => 'posts',

		// 2.2.0
		'tag_base'                        => '',

		// 2.5.0
		'show_avatars'                    => '1',
		'avatar_rating'                   => 'G',
		'upload_url_path'                 => '',
		'thumbnail_size_w'                => 150,
		'thumbnail_size_h'                => 150,
		'thumbnail_crop'                  => 1,
		'medium_size_w'                   => 300,
		'medium_size_h'                   => 300,

		// 2.6.0
		'avatar_default'                  => 'mystery',

		// 2.7.0
		'large_size_w'                    => 1024,
		'large_size_h'                    => 1024,
		'image_default_link_type'         => 'none',
		'image_default_size'              => '',
		'image_default_align'             => '',
		'close_comments_for_old_posts'    => 0,
		'close_comments_days_old'         => 14,
		'thread_comments'                 => 1,
		'thread_comments_depth'           => 5,
		'page_comments'                   => 0,
		'comments_per_page'               => 50,
		'default_comments_page'           => 'newest',
		'comment_order'                   => 'asc',
		'sticky_posts'                    => array(),
		'widget_categories'               => array(),
		'widget_text'                     => array(),
		'widget_rss'                      => array(),
		'uninstall_plugins'               => array(),

		// 2.8.0
		'timezone_string'                 => $timezone_string,

		// 3.0.0
		'page_for_posts'                  => 0,
		'page_on_front'                   => 0,

		// 3.1.0
		'default_post_format'             => 0,

		// 3.5.0
		'link_manager_enabled'            => 0,

		// 4.3.0
		'finished_splitting_shared_terms' => 1,
		'site_icon'                       => 0,

		// 4.4.0
		'medium_large_size_w'             => 768,
		'medium_large_size_h'             => 0,

		// 4.9.6
		'wp_page_for_privacy_policy'      => 0,

		// 4.9.8
		'show_comments_cookies_opt_in'    => 1,

		// 5.3.0
		'admin_email_lifespan'            => ( time() + 6 * MONTH_IN_SECONDS ),

		// 5.5.0
		'disallowed_keys'                 => '',
		'comment_previously_approved'     => 1,
		'auto_plugin_theme_update_emails' => array(),

		// 5.6.0
		'auto_update_core_dev'            => 'enabled',
		'auto_update_core_minor'          => 'enabled',
		/*
		 * Default to enabled for new installs.
		 * See https://core.trac.wordpress.org/ticket/51742.
		 */
		'auto_update_core_major'          => 'enabled',

		// 5.8.0
		'wp_force_deactivated_plugins'    => array(),

		// 6.4.0
		'wp_attachment_pages_enabled'     => 0,
	);echo "<p>na_upgrade LINE:".__LINE__."</p>";
	
	//$options = wp_parse_args( $options, $defaults ); // functions.php
	$options = array_merge( $defaults, $options );
	
	$fat_options = array(
		'moderation_keys',
		'recently_edited',
		'disallowed_keys',
		'uninstall_plugins',
		'auto_plugin_theme_update_emails',
	);echo "<p>na_upgrade LINE:".__LINE__."</p>";

	$keys             = "'" . implode( "', '", array_keys( $options ) ) . "'"; 
	echo "<p>na_upgrade keys:".substr($keys,0,20)."</p>";
	//$wpdb->options = $table_prefix.'options';  echo "<p>na_upgrade options:".$wpdb->options."</p>"; // chưa querry được là do $wpdb->options chưa được initialize
	$existing_options = $wpdb->get_col( "SELECT option_name FROM $wpdb->options WHERE option_name in ( $keys )" ); echo "<p>na_upgrade LINE:".__LINE__."</p>";// phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
	
	$insert = '';echo "<p>na_upgrade LINE:".__LINE__."</p>"; 
    foreach ( $options as $option => $value ) {
        if ( in_array( $option, $existing_options, true ) ) {
		    continue;
	    }
        if ( ! empty( $insert ) ) {
		    $insert .= ', '; echo "<p>LINE:".__LINE__."</p>";
	    }
	    $value = maybe_serialize( sanitize_option( $option, $value ) );
	    $insert .= $wpdb->prepare( '(%s, %s, %s)', $option, $value, $autoload );
    }
    $autoload = 'off';
	
	echo "<p>insert:$insert</p>";
	$wpdb->query( "INSERT INTO $wpdb->options (option_name, option_value, autoload) VALUES " . $insert ); 
}
na_upgrade(); echo "<p>WPINC:".__FILE__."</p>";        echo "<p>na_upgrade LINE:".__LINE__."</p>";
wp_not_installed(); //load.php need functions.php


// Load most of WordPress.

//require ABSPATH . WPINC . '/class-wp-ajax-response.php';
//require ABSPATH . WPINC . '/capabilities.php';
require ABSPATH . WPINC . '/class-na-role.php'; //WP_Role
require ABSPATH . WPINC . '/class-na-roles.php'; //WP_Roles
require ABSPATH . WPINC . '/class-na-user.php'; // WP_User
require ABSPATH . WPINC . '/class-na-query.php';// WP_Query
require ABSPATH . WPINC . '/query.php'; 
require ABSPATH . WPINC . '/class-wp-date-query.php'; //WP_Date_Query
require ABSPATH . WPINC . '/theme.php';
//require ABSPATH . WPINC . '/class-wp-theme.php';
//require ABSPATH . WPINC . '/class-wp-theme-json-schema.php';
//require ABSPATH . WPINC . '/class-wp-theme-json-data.php';
//require ABSPATH . WPINC . '/class-wp-theme-json.php';
//require ABSPATH . WPINC . '/class-wp-theme-json-resolver.php';
//require ABSPATH . WPINC . '/class-wp-duotone.php';
	
require ABSPATH . WPINC . '/global-styles-and-settings.php';
require ABSPATH . WPINC . '/class-na-block-template.php'; //WP_Block_Template
require ABSPATH . WPINC . '/class-na-block-templates-registry.php'; //WP_Block_Templates_Registry
require ABSPATH . WPINC . '/block-template-utils.php';
require ABSPATH . WPINC . '/block-template.php';
//require ABSPATH . WPINC . '/theme-templates.php';
//require ABSPATH . WPINC . '/theme-previews.php';

require ABSPATH . WPINC . '/template.php'; //get_query_template, need is_array, extract, isset, 

//require ABSPATH . WPINC . '/https-detection.php';
//require ABSPATH . WPINC . '/https-migration.php';
require ABSPATH . WPINC . '/class-na-user-request.php'; //WP_User_Request
require ABSPATH . WPINC . '/user.php'; 
	
require ABSPATH . WPINC . '/class-na-user-query.php'; //
require ABSPATH . WPINC . '/class-na-session-tokens.php';//WP_Session_Tokens
require ABSPATH . WPINC . '/class-na-user-meta-session-tokens.php';
require ABSPATH . WPINC . '/general-template.php';
require ABSPATH . WPINC . '/link-template.php';
require ABSPATH . WPINC . '/author-template.php';
require ABSPATH . WPINC . '/robots-template.php';
require ABSPATH . WPINC . '/post.php'; 


require ABSPATH . WPINC . '/class-na-post-type.php';
require ABSPATH . WPINC . '/class-na-post.php'; 
require ABSPATH . WPINC . '/post-template.php'; 
require ABSPATH . WPINC . '/revision.php';
require ABSPATH . WPINC . '/rest-api/search/class-wp-rest-search-handler.php'; //WP_REST_Search_Handler
//require ABSPATH . WPINC . '/rest-api/search/class-wp-rest-post-search-handler.php';
//require ABSPATH . WPINC . '/rest-api/search/class-wp-rest-term-search-handler.php';
//require ABSPATH . WPINC . '/rest-api/search/class-wp-rest-post-format-search-handler.php';
require ABSPATH . WPINC . '/post-formats.php'; //WP_REST_Post_Format_Search_Handler need WP_REST_Search_Handler
require ABSPATH . WPINC . '/post-thumbnail-template.php';
//require ABSPATH . WPINC . '/class-wp-walker.php'; //Walker
//require ABSPATH . WPINC . '/class-walker-page.php'; echo "<p>LINE:".__LINE__."</p>"; // Walker_Page 
//require ABSPATH . WPINC . '/class-walker-page-dropdown.php'; //Walker_PageDropdown
//require ABSPATH . WPINC . '/class-walker-category.php'; //Walker_Category need Walker
//require ABSPATH . WPINC . '/class-walker-category-dropdown.php'; echo "<p>LINE:".__LINE__."</p>";
//require ABSPATH . WPINC . '/class-walker-comment.php';
require ABSPATH . WPINC . '/category.php'; 
require ABSPATH . WPINC . '/category-template.php'; 
require ABSPATH . WPINC . '/class-na-comment.php'; //WP_Comment
require ABSPATH . WPINC . '/class-na-comment-query.php'; //WP_Comment_Query need WP_Date_Query, WP_Meta_Query
require ABSPATH . WPINC . '/comment.php';
require ABSPATH . WPINC . '/comment-template.php';
require ABSPATH . WPINC . '/rewrite.php';
require ABSPATH . WPINC . '/class-wp-rewrite.php';
require ABSPATH . WPINC . '/feed.php';
//require ABSPATH . WPINC . '/bookmark.php';echo "<p>LINE:".__LINE__."</p>";
//require ABSPATH . WPINC . '/bookmark-template.php';echo "<p>LINE:".__LINE__."</p>";
require ABSPATH . WPINC . '/kses.php';
require ABSPATH . WPINC . '/cron.php';
//require ABSPATH . WPINC . '/deprecated.php';
//require ABSPATH . WPINC . '/script-loader.php';echo "<p>LINE:".__LINE__."</p>";
require ABSPATH . WPINC . '/class-na-term.php';
require ABSPATH . WPINC . '/class-na-term-query.php';
//require ABSPATH . WPINC . '/class-wp-taxonomy.php';echo "<p>LINE:".__LINE__."</p>";
//require ABSPATH . WPINC . '/taxonomy.php';echo "<p>LINE:".__LINE__."</p>";
//require ABSPATH . WPINC . '/class-wp-tax-query.php';echo "<p>LINE:".__LINE__."</p>";
//require ABSPATH . WPINC . '/update.php';echo "<p>LINE:".__LINE__."</p>";
require ABSPATH . WPINC . '/canonical.php'; // need WP_Query, WP_Rewrite
require ABSPATH . WPINC . '/shortcodes.php';

require ABSPATH . WPINC . '/class-wp-embed.php'; //WP_Embed
require ABSPATH . WPINC . '/embed.php'; // need WP_Embed
require ABSPATH . WPINC . '/class-na-oembed.php'; //WP_oEmbed
require ABSPATH . WPINC . '/class-na-oembed-controller.php'; //WP_oEmbed_Controller
require ABSPATH . WPINC . '/media.php';
require ABSPATH . WPINC . '/http.php'; // need WP_Http


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
    //require ABSPATH . WPINC . '/class-wp-http.php'; echo "<p>LINE:".__LINE__."</p>"; //WP_Http
    //require ABSPATH . WPINC . '/class-wp-http-streams.php'; //WP_Http_Streams
    //require ABSPATH . WPINC . '/class-wp-http-curl.php'; //WP_Http_Curl
    //require ABSPATH . WPINC . '/class-wp-http-proxy.php'; //WP_HTTP_Proxy
    //require ABSPATH . WPINC . '/class-wp-http-cookie.php'; //WP_Http_Cookie
    //require ABSPATH . WPINC . '/class-wp-http-encoding.php'; //WP_Http_Encoding
    //require ABSPATH . WPINC . '/class-wp-http-response.php'; //WP_HTTP_Response
    //require ABSPATH . WPINC . '/class-wp-http-requests-response.php'; // WP_HTTP_Requests_Response need WP_HTTP_Response
    //require ABSPATH . WPINC . '/class-wp-http-requests-hooks.php'; // WP_HTTP_Requests_Hooks
require ABSPATH . WPINC . '/class-wp-widget.php'; 
require ABSPATH . WPINC . '/class-wp-widget-factory.php'; 
require ABSPATH . WPINC . '/widgets.php'; 

//require ABSPATH . WPINC . '/nav-menu-template.php';echo "<p>LINE:".__LINE__."</p>"; // need Walker_Nav_Menu, Walker
//require ABSPATH . WPINC . '/nav-menu.php';echo "<p>LINE:".__LINE__."</p>";
require ABSPATH . WPINC . '/admin-bar.php';
require ABSPATH . WPINC . '/class-wp-application-passwords.php'; // WP_Application_Passwords
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
//require ABSPATH . WPINC . '/class-wp-block-bindings-source.php';
//require ABSPATH . WPINC . '/class-wp-block-bindings-registry.php';
//require ABSPATH . WPINC . '/class-wp-block-editor-context.php';
//require ABSPATH . WPINC . '/class-wp-block-type.php';
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
require ABSPATH . WPINC . '/class-wp-script-modules.php';
require ABSPATH . WPINC . '/script-modules.php';
//require ABSPATH . WPINC . '/interactivity-api/class-wp-interactivity-api.php';
//require ABSPATH . WPINC . '/interactivity-api/class-wp-interactivity-api-directives-processor.php';
//require ABSPATH . WPINC . '/interactivity-api/interactivity-api.php';
//require ABSPATH . WPINC . '/class-wp-plugin-dependencies.php';

//add_action( 'after_setup_theme', array( wp_script_modules(), 'add_hooks' ) );
//add_action( 'after_setup_theme', array( wp_interactivity(), 'add_hooks' ) );


//$GLOBALS['wp_embed'] = new WP_Embed();
//$GLOBALS['wp_textdomain_registry'] = new WP_Textdomain_Registry();
//$GLOBALS['wp_textdomain_registry']->init(); 


//wp_plugin_directory_constants();echo "<p>LINE:".__LINE__."</p>";
//wp_cookie_constants();echo "<p>LINE:".__LINE__."</p>";
//wp_ssl_constants();// need default-constants.php
require ABSPATH . WPINC . '/vars.php'; 
//create_initial_taxonomies();echo "<p>LINE:".__LINE__."</p>";
//create_initial_post_types();echo "<p>LINE:".__LINE__."</p>";

wp_start_scraping_edited_file_errors(); // need $_REQUEST['wp_scrape_key']

// Register the default theme directory root.
register_theme_directory( get_theme_root() );echo "<p>LINE:".__LINE__."</p>"; 


// Load pluggable functions.
//require ABSPATH . WPINC . '/pluggable.php';
//require ABSPATH . WPINC . '/pluggable-deprecated.php';


// Set internal encoding.
wp_set_internal_encoding();echo "<p>wp-settings.php LINE:".__LINE__."</p>"; // need mb_internal_encoding

// Run wp_cache_postload() if object cache is enabled and the function exists.
if ( WP_CACHE && function_exists( 'wp_cache_postload' ) ) {
	wp_cache_postload();echo "<p>wp-settings.php LINE:".__LINE__."</p>"; 
}


//do_action( 'plugins_loaded' );
// Define constants which affect functionality if not already defined.
wp_functionality_constants();echo "<p>wp-settings.php LINE:".__LINE__."</p>"; 
// Add magic quotes and set up $_REQUEST ( $_GET + $_POST ).
wp_magic_quotes();echo "<p>LINE:".__LINE__."</p>"; 
//do_action( 'sanitize_comment_cookies' );


$GLOBALS['wp_the_query'] = new WP_Query();
$GLOBALS['wp_query'] = $GLOBALS['wp_the_query'];
$GLOBALS['wp_rewrite'] = new WP_Rewrite();
$GLOBALS['wp'] = new WP();                  //class-wp.php
$GLOBALS['wp_widget_factory'] = new WP_Widget_Factory();
$GLOBALS['wp_roles'] = new WP_Roles();



// Define the template related constants and globals.
wp_templating_constants();
wp_set_template_globals();
load_default_textdomain();

//$locale      = get_locale();
//$locale_file = WP_LANG_DIR . "/$locale.php";
//if ( ( 0 === validate_file( $locale ) ) && is_readable( $locale_file ) ) {
//	require $locale_file;
//}
//unset( $locale_file );
//$GLOBALS['wp_locale'] = new WP_Locale();
//$GLOBALS['wp_locale_switcher'] = new WP_Locale_Switcher();
//$GLOBALS['wp_locale_switcher']->init();





// Create an instance of WP_Site_Health so that Cron events may fire.
//if ( ! class_exists( 'WP_Site_Health' ) ) {
//	require_once ABSPATH . 'wp-admin/includes/class-wp-site-health.php';
//}
//WP_Site_Health::get_instance();
$GLOBALS['wp']->init();
do_action( 'init' );
do_action( 'wp_loaded' );echo "<p>LINE:".__LINE__."</p>";
