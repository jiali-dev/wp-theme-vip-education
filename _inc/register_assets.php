<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// Add theme assets --> Register for globaly and enqueue for specific page
function jve_register_assets() {
    // Enqueue styles
    wp_register_style('vip-education-animation', jve_PLUGINS_URI . '/animation/animation.css' , array(), '1.0.0', 'all');
    wp_enqueue_style('vip-education-animation');
    wp_register_style('vip-education-bootstrap', jve_PLUGINS_URI . '/bootstrap/bootstrap.min.css' , array(), '1.0.0', 'all');
    wp_enqueue_style('vip-education-bootstrap');
    wp_register_style('vip-education-daterangepicker', jve_PLUGINS_URI . '/daterangepicker/daterangepicker.css' , array(), '1.0.0', 'all');
    wp_enqueue_style('vip-education-daterangepicker');
    wp_register_style('vip-education-dropzone', jve_PLUGINS_URI . '/dropzone/dropzone.css' , array(), '1.0.0', 'all');
    wp_enqueue_style('vip-education-dropzone');
    wp_register_style('vip-education-light-box', jve_PLUGINS_URI . '/light-box/light-box.css' , array(), '1.0.0', 'all');
    wp_enqueue_style('vip-education-light-box');
    wp_register_style('vip-education-ion-range-slider', jve_PLUGINS_URI . '/ion-range-slider/ion.rangeSlider.min.css' , array(), '1.0.0', 'all');
    wp_enqueue_style('vip-education-ion-range-slider');
    wp_register_style('vip-education-magnifypopup', jve_PLUGINS_URI . '/magnifypopup/magnifypopup.css' , array(), '1.0.0', 'all');
    wp_enqueue_style('vip-education-magnifypopup');
    wp_register_style('vip-education-select2', jve_PLUGINS_URI . '/select2/select2.css' , array(), '1.0.0', 'all');
    wp_enqueue_style('vip-education-select2');
    wp_register_style('vip-education-slick', jve_PLUGINS_URI . '/slick/slick.css' , array(), '1.0.0', 'all');
    wp_enqueue_style('vip-education-slick');
    wp_register_style('vip-education-slick-theme', jve_PLUGINS_URI . '/slick/slick-theme.css' , array(), '1.0.0', 'all');
    wp_enqueue_style('vip-education-slick-theme');
    wp_register_style('vip-education-themify', jve_PLUGINS_URI . '/themify/themify.css' , array(), '1.0.0', 'all');
    wp_enqueue_style('vip-education-themify');
    wp_register_style('vip-education-morris', jve_PLUGINS_URI . '/morris/morris.css' , array(), '1.0.0', 'all');
    wp_enqueue_style('vip-education-morris');
    wp_register_style('vip-education-line-icons', jve_PLUGINS_URI . '/line-icons/line-icons.css' , array(), '1.0.0', 'all');
    wp_enqueue_style('vip-education-line-icons');
    wp_register_style('vip-education-iconfont', jve_PLUGINS_URI . '/icon-font/iconfont.css' , array(), '1.0.0', 'all');
    wp_enqueue_style('vip-education-iconfont');
    wp_register_style('vip-education-font-awesome', jve_PLUGINS_URI . '/font-awesome/font-awesome.css' , array(), '1.0.0', 'all');
    wp_enqueue_style('vip-education-font-awesome');
    wp_register_style('vip-education-flaticon', jve_PLUGINS_URI . '/flaticon/flaticon.css' , array(), '1.0.0', 'all');
    wp_enqueue_style('vip-education-flaticon');
    wp_register_style('vip-education-styles', jve_CSS_URI . '/styles.css' , array(), '1.0.0', 'all');
    wp_enqueue_style('vip-education-styles');
    wp_register_style('vip-education-colors', jve_CSS_URI . '/colors.css' , array(), '1.0.0', 'all');
    wp_enqueue_style('vip-education-colors');
    
    // Enqueue scripts
    wp_register_script('vip-education-main', jve_JS_URI . '/main.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('vip-education-main');
    wp_register_script('vip-education-archive', jve_JS_URI . '/archive.js', array('jquery'), '1.0.0', true);

    if( is_page('archive')) {
        wp_enqueue_script('vip-education-archive');
    }
    wp_register_script('vip-education-ajax', jve_JS_URI . '/ajax.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('vip-education-ajax');
    wp_localize_script( 'vip-education-ajax', 'jve_ajax', 
        array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('vip-education-nonce')
        )
    );
    wp_register_script('vip-education-popper', jve_PLUGINS_URI . '/popper/popper.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('vip-education-popper');
    wp_register_script('vip-education-bootstrap', jve_PLUGINS_URI . '/bootstrap/bootstrap.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('vip-education-bootstrap');
    wp_register_script('vip-education-select2', jve_PLUGINS_URI . '/select2/select2.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('vip-education-select2');
    wp_register_script('vip-education-slick', jve_PLUGINS_URI . '/slick/slick.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('vip-education-slick');
    wp_register_script('vip-education-counterup', jve_PLUGINS_URI . '/counterup/jquery.counterup.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('vip-education-counterup');
    wp_register_script('vip-education-jquery-counterup', jve_PLUGINS_URI . '/counterup/counterup.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('vip-education-jquery-counterup');
    
}
add_action('wp_enqueue_scripts', 'jve_register_assets');

?>

