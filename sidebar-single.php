<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// Define sidebar
if (is_active_sidebar('single-sidebar')) {
    dynamic_sidebar('single-sidebar');
}
