<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// Define Constant
require_once( get_template_directory() . '/_inc/define_constants.php');

// Register theme assets
require_once(JVE_INC_PATH . '/register_assets.php');

// Theme Setup
require_once(JVE_INC_PATH . '/theme_setup.php');

// Post Functions
require_once(JVE_INC_PATH . '/post/post.php');

// User Functions
require_once(JVE_INC_PATH . '/user.php');

// Meta boxes Functions
require_once(JVE_INC_PATH . '/meta-box/meta-box.php');

// Post View Class
require_once(JVE_HELPER_CLASS_PATH . '/PostView.php');

// Reading Estimated Class
require_once(JVE_HELPER_CLASS_PATH . '/ReadingEstimatedTime.php');

// Google Referer Class
require_once(JVE_HELPER_CLASS_PATH . '/GoogleReferer.php');

// TimeModify
require_once(JVE_HELPER_CLASS_PATH . '/TimeModify.php');

// Breadcrumb
require_once(JVE_HELPER_CLASS_PATH . '/Breadcrumb.php');

// FilterPosts
require_once(JVE_HELPER_CLASS_PATH . '/FilterPosts.php');

// MailLayout
require_once(JVE_HELPER_CLASS_PATH . '/MailLayout.php');

// SendMail
require_once(JVE_HELPER_CLASS_PATH . '/SendMail.php');

// Widgets and Sidebars
require_once(JVE_INC_PATH . '/widget/widgets.php');

// Shortcodes
require_once(JVE_INC_PATH . '/shortcode.php');

// Tinymce
require_once(JVE_INC_PATH . '/tinymce-plugins/tinymce-plugins.php');

// Comments
require_once(JVE_INC_PATH . '/comment.php');

// Technology Custom Post
require_once(JVE_INC_PATH . '/custom-post-types/technology.php');

// Ajax Functions
require_once(JVE_INC_PATH . '/ajax-functions.php');

// Ajax Functions
require_once(JVE_INC_PATH . '/smtp-config.php');