<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

function vip_theme_list_comments( $comments, $args ) {
    $comments = $GLOBALS['comment'];
    ?>
    <li class="article_comments_wrap">
        <article>
            <div class="article_comments_thumb">
                <img src="<?php echo get_template_directory_uri() . '/assets/image/user-1.jpg'?>"
                alt="">
            </div>
            <!-- <div class="comment-details">
                <div class="comment-meta">
                    <div class="comment-left-meta">
                        <h4 class="author-name"> >, <span class="selected"><i class="fas
                        -bookmark"></i></span></h4>
                            <div class="comment-date">1399 9419</div>
                                </li> -->
        </article>
    </li>
    <?php
}