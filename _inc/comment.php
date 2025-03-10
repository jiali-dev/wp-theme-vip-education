<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

function vip_education_list_comments( $comments, $args ) {
    $comment = $GLOBALS['comment'];
    ?>
    <?php
        $is_approved = ($comment->comment_approved == '1');
        $is_admin = current_user_can('administrator');
        $is_author_or_admin = is_user_logged_in() && ($is_admin || get_current_user_id() == $comment->user_id);

    if ($is_approved || $is_author_or_admin):
    ?>
        <li id="comment-<?php echo $comment->comment_ID ?>" <?php comment_class('article_comments_wrap') ?>>
            <article>
                <div class="article_comments_thumb">
                    <?php echo get_avatar($comment->comment_author_email, $args['avatar_size'], '', $comment->comment_author) ?>
                </div>
                <div class="comment-details">
                    <div class="comment-meta">
                        <div class="comment-left-meta">
                            <h4 class="author-name">
                                <?php echo wp_strip_all_tags($comment->comment_author) ?>
                                <?php if ($comment->user_id == get_post_field('post_author', $comment->comment_post_ID)): ?>
                                    <span class="selected"><i class="fa fa-bookmark"></i></span>
                                <?php endif; ?>
                            </h4>
                            <div class="comment-date"><?php echo comment_date() ?></div>
                            <div class="comment-reply">
                                <a href="#commentform" class="reply" data-commentid="<?php echo $comment->comment_ID ?>" data-author="<?php echo $comment->comment_author ?>" data-toggle="modal" data-target="#commentreplyModal">
                                    <span class="icona"><i class="ti-back-right"></i></span> پاسخ
                                </a>
                                <?php if ($is_admin): ?>
                                    <?php edit_comment_link('<i class="ti-pencil-alt"></i> ویرایش '); ?>
                                <?php endif; ?>
                            </div>
                            <div class="comment-text">
                                <?php if (!$is_approved): ?>
                                    <div class="alert alert-danger">نیازمند تایید مدیر</div>
                                <?php endif; ?>
                                <p><?php echo wp_strip_all_tags($comment->comment_content); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </li>
    <?php endif; ?>
    <?php
}