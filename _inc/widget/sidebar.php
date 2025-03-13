<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

function jve_sidebar_init() {
    // Single post sidebar
    register_sidebar([
        'name'          => 'سایدبار صفحه پست',
        'id'            => 'single-post-sidebar',
        'description'   => 'یک سایدبار اختصاصی برای صفحه پست ها',
        'before_widget' => '<div class="widget %2$s">', // It wraps each widget
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ]);

    // Single technology sidebar
    register_sidebar([
        'name'          => 'سایدبار صفحه تکنولوژی',
        'id'            => 'single-technology-sidebar',
        'description'   => 'یک سایدبار اختصاصی برای صفحه تکنولوژی ها',
        'before_widget' => '<div class="widget %2$s">', // It wraps each widget
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ]);
}
add_action('widgets_init', 'jve_sidebar_init');
