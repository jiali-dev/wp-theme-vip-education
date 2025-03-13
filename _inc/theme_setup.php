<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

function jve_theme_setup() {
    // Hide admin bar
    add_filter( 'show_admin_bar', '__return_false' );
    
    // Register menu
    register_nav_menu( 'Primary', 'منو برای بالای سایت' );

    // Register Bootstap Navwalker
    require_once( jve_CLASS_PATH . '/WP_Bootstrap_Navwalker.php');

    // Register post thumbnail
    add_theme_support( 'post-thumbnails' );

    // Add custom upload size
    add_image_size( 'custom-size', 200, 200, array('center', 'center') );
}
add_action( 'after_setup_theme', 'jve_theme_setup');

// Pretty Output Vardump
function jve_pretty_var_dump($data) {
    echo '<pre style="
        background: #282c34; 
        color: #61dafb; 
        padding: 10px; 
        border-radius: 5px; 
        font-size: 14px; 
        line-height: 1.5; 
        white-space: pre-wrap; 
        word-wrap: break-word;
        direction: ltr;
    ">';
    var_dump($data);
    echo '</pre>';
}
