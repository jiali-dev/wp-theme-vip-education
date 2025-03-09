<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

function vip_education_list_comments( $comments, $args ) {
    $comment = $GLOBALS['comment'];
    ?>
    <li id="comment-<?php echo $comment->comment_ID ?>" <?php comment_class( 'article_comments_wrap' ) ?> >
        <article>
            <div class="article_comments_thumb">
                <?php echo get_avatar( $comment->comment_author_email, $args['avatar_size'],'', $comment->comment_author ) ?>
            </div>
            <div class="comment-details">
                <div class="comment-meta">
                    <div class="comment-left-meta">
                        <h4 class="author-name"> <?php echo wp_strip_all_tags($comment->comment_author) ?> 
                            <?php if( $comment->user_id == get_post_field('post_author', $comment->comment_post_ID) ): ?>
                                <span class="selected">
                                    <i class="fa fa-bookmark"></i>
                                </span>
                            <?php endif; ?>

                        </h4>
                        <div class="comment-date"><?php echo comment_date( ) ?></div>
                        <div class="comment-text">
                            <p>
                                <?php echo wp_strip_all_tags($comment->comment_content) ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>             
        </article>
    </li>
    <?php
}