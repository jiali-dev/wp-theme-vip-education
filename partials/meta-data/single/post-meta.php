<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

?>

<div class="article_top_info">
    <ul class="article_middle_info">
        <li><a href="#"><span class="icons"><i class="ti-user"></i></span><?php echo get_the_author( ) ?></a></li>
        <li><a href="#"><span class="icons"><i class="ti-comment-alt"></i></span><?php echo comments_number( ) ?> نظر ثبت شده</a></li>
        <li><a href="#"><span class="icons"><i class="ti-eye"></i></span><?php echo PostView::jve_get_post_view_count( get_the_ID(  )) ?>  بازدید</a></li>
        <li><a href="#"><span class="icons"><i class="ti-time"></i></span><?php echo ReadingEstimatedTime::jve_estimate_time( get_the_content(  )) ?>  دقیقه</a></li>
        <li><a href="#"><span class="icons"><i class="ti-search"></i></span><?php echo GoogleReferer::jve_get_google_referer_count( get_the_ID(  )) ?>  ورودی گوگل</a></li>
    </ul>
</div>