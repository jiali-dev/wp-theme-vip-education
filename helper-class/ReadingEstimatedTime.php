<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

class ReadingEstimatedTime {

    public static function vip_education_estimate_time( $content, $word_per_min = 300 ) {
        
        // Clean Content from tags and shortcodes
        $clean_content = strip_tags(strip_shortcodes( $content ));

        // Count Words
        $word_count = str_word_count( $clean_content );

        return ceil( $word_count / $word_per_min );

    }

}