<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

function vip_education_sidebar_init() {
    register_sidebar([
        'name'          => 'سایدبار پست ها',
        'id'            => 'single-sidebar',
        'description'   => 'یک سایدبار اختصاصی برای صفحه پست ها',
        'before_widget' => '<div class="widget %2$s">', // It wraps each widget
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ]);
}
add_action('widgets_init', 'vip_education_sidebar_init');
