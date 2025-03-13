<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

function jve_default_post_thumbnail() {
    return '<img class="img-responsive" src="https://hackr.io/blog/what-is-programming-language/thumbnail/large" alt="image">';
}

function jve_make_content_shorter( $content ) {
    return mb_substr( $content, 0, 100) . ' ...';
}
