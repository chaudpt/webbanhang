
function get_admin_page_parent( $parent_page = '' ) {
    global $parent_file, $menu, $submenu, $_wp_real_parent_file, $_wp_menu_nopriv, $_wp_submenu_nopriv;
    
    if ( ! empty( $parent_page ) && 'admin.php' !== $parent_page ) {
        $parent_page = $_wp_real_parent_file[ $parent_page ];
    }
    
    if ( empty( $parent_file ) ) {
		$parent_file = '';
	}
    return $parent_page;
}

function user_can_access_admin_page() {
    global $title, $menu, $submenu;
    $parent = get_admin_page_parent();
    if ( empty( $parent ) ) {
    }
    if ( isset( $submenu[ $parent ] ) ) {
    }
}

if ( ! user_can_access_admin_page() ) {
}