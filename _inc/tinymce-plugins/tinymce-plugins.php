<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

function jve_add_external_plugins( $array ) {
    $array['jve_custom_buttons'] = jve_PLUGINS_URI . '/tinymce/custom-buttons.js';
    return $array;
}
add_filter( 'mce_external_plugins', 'jve_add_external_plugins' );

function jve_display_external_plugins_buttons( $buttons ) {
    array_push( $buttons, 'jve_custom_buttons');
    return $buttons;
}
add_filter( 'mce_buttons', 'jve_display_external_plugins_buttons' );
