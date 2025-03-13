<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// Define theme directory URI for assets
define('JVE_THEME_URI', get_template_directory_uri());
define('JVE_ASSETS_URI', JVE_THEME_URI . '/assets');
define('JVE_CSS_URI', JVE_ASSETS_URI . '/css');
define('JVE_JS_URI', JVE_ASSETS_URI . '/js');
define('JVE_IMAGES_URI', JVE_ASSETS_URI . '/images');
define('JVE_FONTS_URI', JVE_ASSETS_URI . '/fonts');
define('JVE_PLUGINS_URI', JVE_ASSETS_URI . '/plugins');

// Define theme directory path for file inclusion
define('JVE_THEME_PATH', get_template_directory());
define('JVE_INC_PATH', JVE_THEME_PATH . '/_inc');
define('JVE_PARTIALS_PATH', JVE_THEME_PATH . '/partials');
define('JVE_CLASS_PATH', JVE_THEME_PATH . '/class');
define('JVE_HELPER_CLASS_PATH', JVE_THEME_PATH . '/helper-class');
define('JVE_LOOP_PATH', JVE_THEME_PATH . '/loop');

?>