<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

function vip_education_add_external_plugins( $array ) {
    $array['vip_education_video'] = VIP_EDUCATION_PLUGINS_URI . '/tinymce/video.js';
    $array['vip_education_quote'] = VIP_EDUCATION_PLUGINS_URI . '/tinymce/quote.js';
    return $array;
}
add_filter( 'mce_external_plugins', 'vip_education_add_external_plugins' );

function vip_education_display_external_plugins_buttons( $buttons ) {
    array_push( $buttons, 'vip_education_video', 'vip_education_quote');
    return $buttons;
}
add_filter( 'mce_buttons', 'vip_education_display_external_plugins_buttons' );
