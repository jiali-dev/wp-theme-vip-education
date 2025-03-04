<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

class TimeModify {

    public static function vip_education_time_ago( $time ) {

        // Convert time to timestamp
        $timestamp = strtotime( $time ); 

        $diff = time() - $timestamp;

        if( $diff < 60 )
        {
            return 'لحظاتی پیش';
        }

        $time_rules = [
            60 * 60 * 24 * 30 * 12 => 'سال پیش',
            60 * 60 * 24 * 30 => 'ماه پیش',
            60 * 60 * 24 => 'روز پیش',
            60 * 60 => 'ساعت پیش',
            60 => 'دقیقه پیش',
        ];

        foreach( $time_rules as $key => $value ) {

            $division = round($diff / $key);

            if( $division >= 1 )
                return $division . ' ' . $value;
        }

    }
}