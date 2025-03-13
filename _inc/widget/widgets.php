<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// Widgets and Sidebars
require_once(jve_INC_PATH . '/widget/sidebar.php');

// Search Widget
require_once(jve_INC_PATH . '/widget/widgets/SearchWidget.php');

// Categories Widget
require_once(jve_INC_PATH . '/widget/widgets/CategoriesWidget.php');

// Trend posts Widget
require_once(jve_INC_PATH . '/widget/widgets/TrendPostsWidget.php');

// Cloudy tags Widget
require_once(jve_INC_PATH . '/widget/widgets/CloudyTags.php');