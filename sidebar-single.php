<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// Define sidebar
if (is_active_sidebar('single-'.get_post_type(  ).'-sidebar')) {
    dynamic_sidebar('single-'.get_post_type(  ).'-sidebar');
}
