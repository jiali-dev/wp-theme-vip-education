<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// Define theme directory URI for assets
define('VIP_EDUCATION_THEME_URI', get_template_directory_uri());
define('VIP_EDUCATION_ASSETS_URI', VIP_EDUCATION_THEME_URI . '/assets');
define('VIP_EDUCATION_CSS_URI', VIP_EDUCATION_ASSETS_URI . '/css');
define('VIP_EDUCATION_JS_URI', VIP_EDUCATION_ASSETS_URI . '/js');
define('VIP_EDUCATION_IMAGES_URI', VIP_EDUCATION_ASSETS_URI . '/images');
define('VIP_EDUCATION_FONTS_URI', VIP_EDUCATION_ASSETS_URI . '/fonts');
define('VIP_EDUCATION_PLUGINS_URI', VIP_EDUCATION_ASSETS_URI . '/plugins');

// Define theme directory path for file inclusion
define('VIP_EDUCATION_THEME_PATH', get_template_directory());
define('VIP_EDUCATION_INC_PATH', VIP_EDUCATION_THEME_PATH . '/_inc');
define('VIP_EDUCATION_PARTIALS_PATH', VIP_EDUCATION_THEME_PATH . '/partials');
define('VIP_EDUCATION_CLASS_PATH', VIP_EDUCATION_THEME_PATH . '/class');
define('VIP_EDUCATION_HELPER_CLASS_PATH', VIP_EDUCATION_THEME_PATH . '/helper-class');
define('VIP_EDUCATION_LOOP_PATH', VIP_EDUCATION_THEME_PATH . '/loop');

?>