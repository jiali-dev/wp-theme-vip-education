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

    // Register post thumbnail
    add_theme_support( 'post-thumbnails' );

    // Add custom upload size
    add_image_size( 'custom-size', 200, 200, array('center', 'center') );
}
add_action( 'after_setup_theme', 'vip_education_theme_setup');