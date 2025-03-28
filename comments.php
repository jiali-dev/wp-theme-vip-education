<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

$comments_count = get_comments_number();

?>

<!-- Blog Comment -->
<div class="article_detail_wrapss single_article_wrap format-standard">
    <div class="comment-area">
        <div class="all-comments">
            <?php if( $comments_count > 0 ): ?>
                <h3 class="comments-title"><?php echo $comments_count ?> 
                    <?php 
                        echo sprintf(
                            _n(
                                'comment',      // Singular
                                'comments',     // Plural
                                $comments_count,
                                'jve' // Text domain for translation
                            ),
                            $comments_count
                        ); 
                    ?> 
                 </h3>
            <?php else: ?>
                <h3 class="comments-title"><?php _e( 'Be the first to comment.', 'jve' ) ?></h3>
            <?php endif; ?>
            <div class="comment-list">
                <ul>
                    <?php 
                        $comments_query = get_comments([
                            'post_id' => get_the_ID(),
                            'status'  => 'all', // Fetches approved & unapproved comments
                            'order'   => 'ASC'  // Optional: Order by newest or oldest
                        ]);

                        wp_list_comments( 
                            [
                                'callback' => 'jve_list_comments',
                                'style' => 'ul',
                                'avatar_size' => 100
                            ], 
                            $comments_query
                        );
                    ?>
                </ul>
                <div class="my-4 custom-pagination text-center">
                    <?php 
                        paginate_comments_links( array(
                            'prev_text'  => '&laquo;',
                            'next_text' => '&raquo;'
                        ) );
                    ?>
                </div>
            </div>
        </div>
        <?php if( comments_open(  ) ): ?>
            <?php if( get_option( 'comment_registration' ) && !is_user_logged_in(  ) ): ?>
               <div class="alert alert-info"><?php _e( 'Please log in to post a comment!', 'jve' ) ?></div>
            <?php else: ?>
                 <!-- Modal form for Reply-->
                 <div class="modal fade" id="commentreplyModal" tabindex="-1" role="dialog" aria-labelledby="commentreplyModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="commentreplyModalLabel"><?php _e( 'Reply to:', 'jve' ) ?> <span id="comment-author"></span></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="comment-form">
                                    <form action="<?php echo site_url( ) .  "/wp-comments-post.php" ?>" method="post">
                                        <div class="row">
                                            <?php if( !is_user_logged_in(  ) ): ?>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <input type="text" name="author" class="form-control" placeholder="<?php _e( 'Full name *', 'jve' ) ?>" required="required">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <input type="text" name="email" class="form-control" placeholder="<?php _e( 'Valid Email *', 'jve' ) ?>" required="required">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <input type="text" name="url" class="form-control" placeholder="<?php _e( 'Website address *', 'jve' ) ?>">
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <textarea name="comment" class="form-control" cols="30" rows="6" placeholder="<?php _e( 'Write your comment... *', 'jve' ) ?>" required="required"></textarea>
                                                </div>
                                            </div>
                                            <?php if( get_option('show_comments_cookies_opt_in') ): ?>
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <p class="comment-form-cookies-consent">
                                                        <input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"> 
                                                        <label for="wp-comment-cookies-consent">
                                                            <?php _e( 'Save my name, email, and website in this browser for the next time I comment.', 'jve' ) ?>
                                                        </label>
                                                    </p>
                                                </div>
                                            <?php endif; ?>
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <input type="submit" name="submit" class="btn search-btn" value="ثبت">
                                                    <input type="hidden" name="comment_post_ID" value="<?php echo get_the_ID(  ) ?>" id="comment_post_ID">
                                                    <input type="hidden" name="comment_parent" id="comment_parent" value="0">
                                                </div>
                                            </div>
                                            <?php if( is_user_logged_in(  )): ?>
                                                <input type="hidden" id="_wp_unfiltered_html_comment_disabled" name="_wp_unfiltered_html_comment" value="<?php echo wp_create_nonce(  ) ?>">
                                            <?php endif; ?>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Modal -->
                <!-- Submit form -->
                <div class="comment-box submit-form"  id="commentform">
                    <h3 class="reply-title"><?php _e( 'Submit a comment', 'jve' ) ?></h3>
                    <div class="comment-form">
                        <form action="<?php echo site_url( ) .  "/wp-comments-post.php" ?>" method="post">
                            <div class="row">
                                <?php if( !is_user_logged_in(  ) ): ?>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="author" class="form-control" placeholder="<?php _e( 'Full name *', 'jve' ) ?>" required="required">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="email" class="form-control" placeholder="<?php _e( 'Valid Email *', 'jve' ) ?>" required="required">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="url" class="form-control" placeholder="<?php _e( 'Website address *', 'jve' ) ?>">
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <textarea name="comment" class="form-control" cols="30" rows="6" placeholder="<?php _e( 'Write your comment... *', 'jve' ) ?>" ></textarea>
                                    </div>
                                </div>
                                <?php if( get_option('show_comments_cookies_opt_in') ): ?>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <p class="comment-form-cookies-consent">
                                            <input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"> 
                                            <label for="wp-comment-cookies-consent">
                                                <?php _e( 'Save my name, email, and website in this browser for the next time I comment.', 'jve' ) ?>
                                            </label>
                                        </p>
                                    </div>
                                <?php endif; ?>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <input type="submit" name="submit" class="btn search-btn" value="ثبت">
                                        <input type="hidden" name="comment_post_ID" value="<?php echo get_the_ID(  ) ?>" id="comment_post_ID">
                                        <input type="hidden" name="comment_parent" id="comment_parent" value="0">
                                    </div>
                                </div>
                                <?php if( is_user_logged_in(  )): ?>
                                    <input type="hidden" id="_wp_unfiltered_html_comment_disabled" name="_wp_unfiltered_html_comment" value="<?php echo wp_create_nonce(  ) ?>">
                                <?php endif; ?>
                            </div>
                        </form>
                    </div>
                </div>
            <?php endif; ?>
        <?php else: ?>
            <div class="alert alert-info"><?php _e( 'Comments are closed for this post!', 'jve' ) ?></div>
        <?php endif; ?>
    </div>
    
</div>