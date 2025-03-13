<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

class PostView {
    
    public static function jve_update_post_view( $post_id ) {
        
        // Get Post View Count
        $post_view_count = intval(get_post_meta( $post_id, '_post_view_count', true ));

        // Update Post View Count
        update_post_meta( $post_id, '_post_view_count', ++$post_view_count );

    }

    public static function jve_get_post_view_count( $post_id ) {
       
        return intval(get_post_meta( $post_id, '_post_view_count', true ));

    }
}