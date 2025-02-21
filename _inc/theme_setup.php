<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

function vip_education_theme_setup() {
    // Hide admin bar
    add_filter( 'show_admin_bar', '__return_false' );
    
    // Register menu
    register_nav_menu( 'Primary', 'منو برای بالای سایت' );

    // Register Bootstap Navwalker
    require_once( VIP_EDUCATION_CLASS_PATH . '/WP_Bootstrap_Navwalker.php');
}
add_action( 'after_setup_theme', 'vip_education_theme_setup');