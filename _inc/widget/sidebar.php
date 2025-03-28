<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

function jve_sidebar_init() {
    // Single post sidebar
register_sidebar([
    'name'          => __('Single Post Sidebar', 'jve'),
    'id'            => 'single-post-sidebar',
    'description'   => __('A dedicated sidebar for single post pages', 'jve'),
    'before_widget' => '<div class="widget %2$s">', // It wraps each widget
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
]);

// Single technology sidebar
register_sidebar([
    'name'          => __('Single Technology Sidebar', 'jve'),
    'id'            => 'single-technology-sidebar',
    'description'   => __('A dedicated sidebar for technology pages', 'jve'),
    'before_widget' => '<div class="widget %2$s">', // It wraps each widget
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
]);

}
add_action('widgets_init', 'jve_sidebar_init');
