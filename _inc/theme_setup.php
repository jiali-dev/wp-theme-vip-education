<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

function vip_education_theme_setup() {
    // Hide admin bar
    add_filter( 'show_admin_bar', '__return_false' );
}
add_action( 'after_setup_theme', 'vip_education_theme_setup');