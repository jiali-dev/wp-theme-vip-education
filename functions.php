<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// Define Constant
require_once( get_template_directory() . '/_inc/define_constants.php');

// Register theme assets
require_once(VIP_EDUCATION_INC_PATH . '/register_assets.php');

// Theme Setup
require_once(VIP_EDUCATION_INC_PATH . '/theme_setup.php');

// Post Functions
require_once(VIP_EDUCATION_INC_PATH . '/post/post.php');

// Meta boxes Functions
require_once(VIP_EDUCATION_INC_PATH . '/meta-box/meta-box.php');







