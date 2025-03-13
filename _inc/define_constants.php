<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// Define theme directory URI for assets
define('jve_THEME_URI', get_template_directory_uri());
define('jve_ASSETS_URI', jve_THEME_URI . '/assets');
define('jve_CSS_URI', jve_ASSETS_URI . '/css');
define('jve_JS_URI', jve_ASSETS_URI . '/js');
define('jve_IMAGES_URI', jve_ASSETS_URI . '/images');
define('jve_FONTS_URI', jve_ASSETS_URI . '/fonts');
define('jve_PLUGINS_URI', jve_ASSETS_URI . '/plugins');

// Define theme directory path for file inclusion
define('jve_THEME_PATH', get_template_directory());
define('jve_INC_PATH', jve_THEME_PATH . '/_inc');
define('jve_PARTIALS_PATH', jve_THEME_PATH . '/partials');
define('jve_CLASS_PATH', jve_THEME_PATH . '/class');
define('jve_HELPER_CLASS_PATH', jve_THEME_PATH . '/helper-class');
define('jve_LOOP_PATH', jve_THEME_PATH . '/loop');

?>