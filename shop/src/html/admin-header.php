<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$menu[2] = array( 'Dashboard' , 'read', 'index.php', '', 'menu-top menu-top-first menu-icon-dashboard', 'menu-dashboard', 'dashicons-dashboard' );
$menu[4] = array( '', 'read', 'separator1', '', 'wp-menu-separator' );
$menu[10]  = array( 'Media', 'upload_files', 'upload.php', '', 'menu-top menu-icon-media', 'menu-media', 'dashicons-admin-media' );
$menu[15]  = array(  'Links', 'manage_links', 'link-manager.php', '', 'menu-top menu-icon-links', 'menu-links', 'dashicons-admin-links' );
//$menu[25] = array(	sprintf( 'Comments %s' , '<span class="awaiting-mod count-' . absint( $awaiting_mod ) . '"><span class="pending-count" aria-hidden="true">' . $awaiting_mod_i18n . '</span><span class="comments-in-moderation-text screen-reader-text">' . $awaiting_mod_text . '</span></span>' ), 		'edit_posts', 		'edit-comments.php', 		'', 		'menu-top menu-icon-comments', 		'menu-comments', 		'dashicons-admin-comments', 	);
$menu[59] = array( '', 'read', 'separator2', '', 'wp-menu-separator' );
$menu[60] = array('Appearance', $appearance_cap, 'themes.php', '', 'menu-top menu-icon-appearance', 'menu-appearance', 'dashicons-admin-appearance' );
$menu[65] = array( sprintf('Plugins %s' , $count ), 'activate_plugins', 'plugins.php', '', 'menu-top menu-icon-plugins', 'menu-plugins', 'dashicons-admin-plugins' );
$menu[70] = array( 'Users' , 'list_users', 'users.php', '', 'menu-top menu-icon-users', 'menu-users', 'dashicons-admin-users' );
$menu[75]                     = array(  'Tools' , 'edit_posts', 'tools.php', '', 'menu-top menu-icon-tools', 'menu-tools', 'dashicons-admin-tools' );
$menu[99] = array( '', 'read', 'separator-last', '', 'wp-menu-separator' );

$submenu['index.php'][0] = array(  'Home' , 'read', 'index.php' );
$submenu['index.php'][5] = array( 'My Sites' , 'read', 'my-sites.php' );
$submenu['upload.php'][5]  = array('Library' , 'upload_files', 'upload.php' );
$submenu['upload.php'][10] = array( 'Add Media File' , 'upload_files', 'media-new.php' );
$submenu['link-manager.php'][5]  = array('All Links', 'manage_links', 'link-manager.php' );
$submenu['link-manager.php'][10] = array('Add Link' , 'manage_links', 'link-add.php' );
$submenu['link-manager.php'][15] = array('Link Categories' , 'manage_categories', 'edit-tags.php?taxonomy=link_category' );
$submenu['edit-comments.php'][0] = array('All Comments' , 'edit_posts', 'edit-comments.php' );
//$submenu['themes.php'][15] = array( 'Header', $appearance_cap, esc_url( $customize_header_url ), '', 'hide-if-no-customize' );
$submenu['plugins.php'][5] = array( 'Installed Plugins' , 'activate_plugins', 'plugins.php' );
$submenu['tools.php'][50] = array( 'Network Setup' , 'setup_network', 'network.php' );
$submenu['options-general.php'][10] = array( 'General', 'manage_options', 'options-general.php' );
$submenu['options-general.php'][15] = array( 'Writing' , 'manage_options', 'options-writing.php' );
$submenu['options-general.php'][20] = array( 'Reading' , 'manage_options', 'options-reading.php' );
$submenu['options-general.php'][25] = array( 'Discussion' , 'manage_options', 'options-discussion.php' );
$submenu['options-general.php'][30] = array( 'Media' , 'manage_options', 'options-media.php' );
$submenu['options-general.php'][40] = array(  'Permalinks' , 'manage_options', 'options-permalink.php' );
$submenu['options-general.php'][45] = array(  'Privacy' , 'manage_privacy_options', 'options-privacy.php' );

$_wp_real_parent_file['post.php']       = 'edit.php';
$_wp_real_parent_file['post-new.php']   = 'edit.php';
$_wp_real_parent_file['edit-pages.php'] = 'edit.php?post_type=page';
$_wp_real_parent_file['page-new.php']   = 'edit.php?post_type=page';
$_wp_real_parent_file['wpmu-admin.php'] = 'tools.php';
$_wp_real_parent_file['ms-admin.php']   = 'tools.php';

require_once ABSPATH . 'includes/menu.php';

function get_admin_page_title() {
    global $title, $menu, $submenu;
    $parent  = get_admin_page_parent();
    if ( empty( $parent ) ) {
        foreach ( (array) $menu as $menu_array ) {
            $title = $menu_array[3];
			return $menu_array[3];
        }
    } else {
        foreach ( array_keys( $submenu ) as $parent ) {
            $title = $submenu_array[3];
			return $submenu_array[3];
        }
    }

	return $title;
}
//_wp_admin_html_begin
get_admin_page_title();
?>


<!DOCTYPE html>
<html class="<?php echo $admin_html_class; ?>" 
    <head>
        <meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php echo get_option( 'blog_charset' ); ?>" />
        <title><?php echo esc_html( $admin_title ); ?></title>
        <script type="text/javascript">
            addLoadEvent = function(func){if(typeof jQuery!=='undefined')jQuery(function(){func();});else if(typeof wpOnload!=='function'){wpOnload=func;}else{var oldonload=wpOnload;wpOnload=function(){oldonload();func();}}};
            var ajaxurl = '<?php echo esc_js( admin_url( 'admin-ajax.php', 'relative' ) ); ?>',
            	pagenow = '<?php echo esc_js( $current_screen->id ); ?>',
            	typenow = '<?php echo esc_js( $current_screen->post_type ); ?>',
            	adminpage = '<?php echo esc_js( $admin_body_class ); ?>',
            	thousandsSeparator = '<?php echo esc_js( $wp_locale->number_format['thousands_sep'] ); ?>',
            	decimalPoint = '<?php echo esc_js( $wp_locale->number_format['decimal_point'] ); ?>',
            	isRtl = <?php echo (int) is_rtl(); ?>;
        </script>
    </head>
<body class="wp-admin wp-core-ui no-js <?php echo esc_attr( $admin_body_classes ); ?>">
    <script type="text/javascript">
	document.body.className = document.body.className.replace('no-js','js');
    </script>
    
    <div id="wpwrap">
    <?php require ABSPATH . 'includes/menu-header.php'; ?>
    <div id="wpcontent">
    <div id="wpbody" role="main">
    <div id="wpbody-content">
    
<?php  
    require ABSPATH . 'includes/options-head.php';
?>