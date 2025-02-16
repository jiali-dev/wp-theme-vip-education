<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// Define theme directory URI for assets
define('VIP_EDUCATION_THEME_URI', get_template_directory_uri());
define('VIP_EDUCATION_ASSETS_URI', VIP_EDUCATION_THEME_URI . '/assets');
define('VIP_EDUCATION_CSS_URI', VIP_EDUCATION_ASSETS_URI . '/css');
define('VIP_EDUCATION_JS_URI', VIP_EDUCATION_ASSETS_URI . '/js');
define('VIP_EDUCATION_IMAGES_URI', VIP_EDUCATION_ASSETS_URI . '/images');
define('VIP_EDUCATION_FONTS_URI', VIP_EDUCATION_ASSETS_URI . '/fonts');

// Define theme directory path for file inclusion
define('VIP_EDUCATION_THEME_PATH', get_template_directory());
define('VIP_EDUCATION_PARTIALS_PATH', VIP_EDUCATION_THEME_PATH . '/partials');
define('VIP_EDUCATION_CLASS_PATH', VIP_EDUCATION_THEME_PATH . '/class');
define('VIP_EDUCATION_HELPER_CLASS_PATH', VIP_EDUCATION_THEME_PATH . '/helper-class');

// Add theme assets --> Register for globaly and enqueue for specific page
function vip_education_add_assets() {
    // Register styles
    wp_register_style('vip-education-styles', VIP_EDUCATION_CSS_URI . '/styles.css' , array(), '1.0.0', 'all');
    wp_register_style('vip-education-colors', VIP_EDUCATION_CSS_URI . '/colors.css' , array(), '1.0.0', 'all');

    // Register scripts
    wp_register_script('vip-education-main', VIP_EDUCATION_JS_URI . '/main.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'vip_education_register_assets');