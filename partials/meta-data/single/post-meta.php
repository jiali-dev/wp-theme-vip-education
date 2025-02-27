<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

?>

<div class="article_top_info">
    <ul class="article_middle_info">
        <li><a href="#"><span class="icons"><i class="ti-user"></i></span><?php echo get_the_author( ) ?></a></li>
        <li><a href="#"><span class="icons"><i class="ti-comment-alt"></i></span><?php echo comments_number( ) ?> نظر ثبت شده</a></li>
        <li><a href="#"><span class="icons"><i class="ti-eye"></i></span><?php echo PostView::vip_education_get_post_view_count( get_the_ID(  )) ?>  بازدید</a></li>
    </ul>
</div>