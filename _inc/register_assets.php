<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// Add theme assets --> Register for globaly and enqueue for specific page
function jve_register_assets() {
    // Enqueue styles
    wp_register_style('jve-animation', JVE_PLUGINS_URI . '/animation/animation.css' , array(), '1.0.0', 'all');
    wp_enqueue_style('jve-animation');
    wp_register_style('jve-bootstrap', JVE_PLUGINS_URI . '/bootstrap/bootstrap.min.css' , array(), '1.0.0', 'all');
    wp_enqueue_style('jve-bootstrap');
    wp_register_style('jve-daterangepicker', JVE_PLUGINS_URI . '/daterangepicker/daterangepicker.css' , array(), '1.0.0', 'all');
    wp_enqueue_style('jve-daterangepicker');
    wp_register_style('jve-dropzone', JVE_PLUGINS_URI . '/dropzone/dropzone.css' , array(), '1.0.0', 'all');
    wp_enqueue_style('jve-dropzone');
    wp_register_style('jve-light-box', JVE_PLUGINS_URI . '/light-box/light-box.css' , array(), '1.0.0', 'all');
    wp_enqueue_style('jve-light-box');
    wp_register_style('jve-ion-range-slider', JVE_PLUGINS_URI . '/ion-range-slider/ion.rangeSlider.min.css' , array(), '1.0.0', 'all');
    wp_enqueue_style('jve-ion-range-slider');
    wp_register_style('jve-magnifypopup', JVE_PLUGINS_URI . '/magnifypopup/magnifypopup.css' , array(), '1.0.0', 'all');
    wp_enqueue_style('jve-magnifypopup');
    wp_register_style('jve-select2', JVE_PLUGINS_URI . '/select2/select2.css' , array(), '1.0.0', 'all');
    wp_enqueue_style('jve-select2');
    wp_register_style('jve-slick', JVE_PLUGINS_URI . '/slick/slick.css' , array(), '1.0.0', 'all');
    wp_enqueue_style('jve-slick');
    wp_register_style('jve-slick-theme', JVE_PLUGINS_URI . '/slick/slick-theme.css' , array(), '1.0.0', 'all');
    wp_enqueue_style('jve-slick-theme');
    wp_register_style('jve-themify', JVE_PLUGINS_URI . '/themify/themify.css' , array(), '1.0.0', 'all');
    wp_enqueue_style('jve-themify');
    wp_register_style('jve-morris', JVE_PLUGINS_URI . '/morris/morris.css' , array(), '1.0.0', 'all');
    wp_enqueue_style('jve-morris');
    wp_register_style('jve-line-icons', JVE_PLUGINS_URI . '/line-icons/line-icons.css' , array(), '1.0.0', 'all');
    wp_enqueue_style('jve-line-icons');
    wp_register_style('jve-iconfont', JVE_PLUGINS_URI . '/icon-font/iconfont.css' , array(), '1.0.0', 'all');
    wp_enqueue_style('jve-iconfont');
    wp_register_style('jve-font-awesome', JVE_PLUGINS_URI . '/font-awesome/font-awesome.css' , array(), '1.0.0', 'all');
    wp_enqueue_style('jve-font-awesome');
    wp_register_style('jve-flaticon', JVE_PLUGINS_URI . '/flaticon/flaticon.css' , array(), '1.0.0', 'all');
    wp_enqueue_style('jve-flaticon');
    wp_register_style('jve-styles', JVE_CSS_URI . '/styles.css' , array(), '1.0.0', 'all');
    wp_enqueue_style('jve-styles');
    wp_register_style('jve-colors', JVE_CSS_URI . '/colors.css' , array(), '1.0.0', 'all');
    wp_enqueue_style('jve-colors');
    
    // Enqueue scripts
    wp_register_script('jve-main', JVE_JS_URI . '/main.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('jve-main');
    wp_register_script('jve-archive', JVE_JS_URI . '/archive.js', array('jquery'), '1.0.0', true);

    if( is_page('archive')) {
        wp_enqueue_script('jve-archive');
    }
    wp_register_script('jve-ajax', JVE_JS_URI . '/ajax.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('jve-ajax');
    wp_localize_script( 'jve-ajax', 'jve_ajax', 
        array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('jve-nonce')
        )
    );
    wp_register_script('jve-popper', JVE_PLUGINS_URI . '/popper/popper.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('jve-popper');
    wp_register_script('jve-bootstrap', JVE_PLUGINS_URI . '/bootstrap/bootstrap.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('jve-bootstrap');
    wp_register_script('jve-select2', JVE_PLUGINS_URI . '/select2/select2.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('jve-select2');
    wp_register_script('jve-slick', JVE_PLUGINS_URI . '/slick/slick.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('jve-slick');
    wp_register_script('jve-counterup', JVE_PLUGINS_URI . '/counterup/jquery.counterup.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('jve-counterup');
    wp_register_script('jve-jquery-counterup', JVE_PLUGINS_URI . '/counterup/counterup.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('jve-jquery-counterup');
    
}
add_action('wp_enqueue_scripts', 'jve_register_assets');

?>

