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
define('VIP_EDUCATION_PLUGINS_URI', VIP_EDUCATION_ASSETS_URI . '/plugins');

// Define theme directory path for file inclusion
define('VIP_EDUCATION_THEME_PATH', get_template_directory());
define('VIP_EDUCATION_PARTIALS_PATH', VIP_EDUCATION_THEME_PATH . '/partials');
define('VIP_EDUCATION_CLASS_PATH', VIP_EDUCATION_THEME_PATH . '/class');
define('VIP_EDUCATION_HELPER_CLASS_PATH', VIP_EDUCATION_THEME_PATH . '/helper-class');

// Add theme assets --> Register for globaly and enqueue for specific page
function vip_education_add_assets() {
    // Enqueue styles
    wp_enqueue_style('vip-education-styles', VIP_EDUCATION_CSS_URI . '/styles.css' , array(), '1.0.0', 'all');
    wp_enqueue_style('vip-education-colors', VIP_EDUCATION_CSS_URI . '/colors.css' , array(), '1.0.0', 'all');
    wp_enqueue_style('vip-education-animation', VIP_EDUCATION_PLUGINS_URI . '/animation/animation.css' , array(), '1.0.0', 'all');
    wp_enqueue_style('vip-education-bootstrap', VIP_EDUCATION_PLUGINS_URI . '/bootstrap/bootstrap.min.css' , array(), '1.0.0', 'all');
    wp_enqueue_style('vip-education-daterangepicker', VIP_EDUCATION_PLUGINS_URI . '/daterangepicker/daterangepicker.css' , array(), '1.0.0', 'all');
    wp_enqueue_style('vip-education-dropzone', VIP_EDUCATION_PLUGINS_URI . '/dropzone/dropzone.css' , array(), '1.0.0', 'all');
    wp_enqueue_style('vip-education-light-box', VIP_EDUCATION_PLUGINS_URI . '/light-box/light-box.css' , array(), '1.0.0', 'all');
    wp_enqueue_style('vip-education-ion-range-slider', VIP_EDUCATION_PLUGINS_URI . '/ion-range-slider/ion.rangeSlider.min.css' , array(), '1.0.0', 'all');
    wp_enqueue_style('vip-education-magnifypopup', VIP_EDUCATION_PLUGINS_URI . '/magnifypopup/magnifypopup.css' , array(), '1.0.0', 'all');
    wp_enqueue_style('vip-education-select2', VIP_EDUCATION_PLUGINS_URI . '/select2/select2.css' , array(), '1.0.0', 'all');
    wp_enqueue_style('vip-education-slick', VIP_EDUCATION_PLUGINS_URI . '/slick/slick.css' , array(), '1.0.0', 'all');
    wp_enqueue_style('vip-education-slick-theme', VIP_EDUCATION_PLUGINS_URI . '/slick/slick-theme.css' , array(), '1.0.0', 'all');
    wp_enqueue_style('vip-education-themify', VIP_EDUCATION_PLUGINS_URI . '/themify/themify.css' , array(), '1.0.0', 'all');
    wp_enqueue_style('vip-education-morris', VIP_EDUCATION_PLUGINS_URI . '/morris/morris.css' , array(), '1.0.0', 'all');
    wp_enqueue_style('vip-education-line-icons', VIP_EDUCATION_PLUGINS_URI . '/line-icons/line-icons.css' , array(), '1.0.0', 'all');
    wp_enqueue_style('vip-education-iconfont', VIP_EDUCATION_PLUGINS_URI . '/icon-font/iconfont.css' , array(), '1.0.0', 'all');
    wp_enqueue_style('vip-education-font-awesome', VIP_EDUCATION_PLUGINS_URI . '/font-awesome/font-awesome.css' , array(), '1.0.0', 'all');
    wp_enqueue_style('vip-education-flaticon', VIP_EDUCATION_PLUGINS_URI . '/flaticon/flaticon.css' , array(), '1.0.0', 'all');

    // Enqueue scripts
    wp_enqueue_script('vip-education-main', VIP_EDUCATION_JS_URI . '/main.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('vip-education-popper', VIP_EDUCATION_PLUGINS_URI . '/popper/popper.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('vip-education-bootstrap', VIP_EDUCATION_PLUGINS_URI . '/bootstrap/bootstrap.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('vip-education-select2', VIP_EDUCATION_PLUGINS_URI . '/select2/select2.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('vip-education-slick', VIP_EDUCATION_PLUGINS_URI . '/slick/slick.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('vip-education-counterup', VIP_EDUCATION_PLUGINS_URI . '/counterup/jquery.counterup.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('vip-education-jquery-counterup', VIP_EDUCATION_PLUGINS_URI . '/counterup/counterup.min.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'vip_education_add_assets');








