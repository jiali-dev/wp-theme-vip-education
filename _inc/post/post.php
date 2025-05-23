<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

function jve_default_post_thumbnail() {
    return '<img class="img-responsive" src="https://hackr.io/blog/what-is-programming-language/thumbnail/large" alt="image">';
}

function jve_make_content_shorter( $content ) {
    return mb_substr( $content, 0, 80) . ' ...';
}

function jve_author_posts_custom_wp_query($query)
{
    if (!is_admin() && $query->is_main_query()) {
        if($query->is_author() || $query->is_search()) {
            $query->set('post_type', ['post', 'technology']);
        }
    }
}
add_action( 'pre_get_posts', 'jve_author_posts_custom_wp_query' );