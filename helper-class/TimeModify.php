<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

class TimeModify {

    public static function jve_time_ago( $time ) {

        // Convert time to timestamp
        $timestamp = strtotime( $time ); 

        $diff = time() - $timestamp;

        if( $diff < 60 )
        {
            return __('Moment(s) ago', 'jve');
        }

        $time_rules = [
            60 * 60 * 24 * 30 * 12 => __('Year(s) ago', 'jve'),
            60 * 60 * 24 * 30 => __('Month(s) ago', 'jve'),
            60 * 60 * 24 => __('Day(s) ago', 'jve'),
            60 * 60 => __('Hour(s) ago', 'jve'),
            60 => __('Minute(s) ago', 'jve'),
        ];
        

        foreach( $time_rules as $key => $value ) {

            $division = round($diff / $key);

            if( $division >= 1 )
                return $division . ' ' . $value;
        }

    }
}