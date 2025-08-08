<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
global $menu, $submenu, $parent_file, $submenu_file;

get_admin_page_parent();
?>

<div id="adminmenumain" role="navigation" aria-label="<?php echo( 'Main menu' ); ?>">
<a href="#wpbody-content" class="screen-reader-shortcut"><?php echo( 'Skip to main content' ); ?></a>
<a href="#wp-toolbar" class="screen-reader-shortcut"><?php echo( 'Skip to toolbar' ); ?></a>
<div id="adminmenuback"></div>
<div id="adminmenuwrap">
<ul id="adminmenu">
    
    