<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

class GoogleReferer {
    
    public static function jve_update_google_referer( $post_id, $url ) {

        if( stripos($url, 'google.com' )) {

            // Get Post View Count
            $google_referer_count = intval(get_post_meta( $post_id, '_google_referer_count', true ));
    
            // Update Post View Count
            update_post_meta( $post_id, '_google_referer_count', ++$google_referer_count );
        }

    }

    public static function jve_get_google_referer_count( $post_id ) {
       
        return intval(get_post_meta( $post_id, '_google_referer_count', true ));

    }
}