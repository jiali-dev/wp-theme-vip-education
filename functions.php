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

// Author Functions
require_once(VIP_EDUCATION_INC_PATH . '/author.php');

// Meta boxes Functions
require_once(VIP_EDUCATION_INC_PATH . '/meta-box/meta-box.php');

// Post View Class
require_once(VIP_EDUCATION_HELPER_CLASS_PATH . '/PostView.php');

// Reading Estimated Class
require_once(VIP_EDUCATION_HELPER_CLASS_PATH . '/ReadingEstimatedTime.php');

// Google Referer Class
require_once(VIP_EDUCATION_HELPER_CLASS_PATH . '/GoogleReferer.php');







