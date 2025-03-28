<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

?>

<?php if( have_posts(  ) ): ?>
    <?php while( have_posts() ): the_post(  ); ?>
        <!-- Single Article -->
        <div class="col-lg-4 col-md-6">
            <div class="education_block_grid">

                <div class="education_block_thumb">
                    <a href="<?php echo get_the_permalink( ) ?>">
                        <?php if( has_post_thumbnail(  )): ?>
                            <?php 
                                the_post_thumbnail( '', array(
                                    'class' => 'img-responsive',
                                    'alt' => get_the_title(  )
                                ) )
                            ?>
                        <?php else: ?>
                            <?php jve_default_post_thumbnail() ?>
                        <?php endif; ?>
                    </a>

                    <?php 
                        $cat = get_post_meta( get_the_ID( ), '_jve_post_cat', true);
                        if( $cat && $cat > 0 ) {
                            $term = get_term($cat);
                            if (!is_wp_error($term) && $term) { ?>
                                <div class="topic_cat bg-warning text-white">
                                    <?php echo $term->name ?>
                                </div>
                            <?php
                            }
                        }
                    ?>
                </div>
                <div class="education_block_body">
                    <h4 class="bl-title">
                        <a href="<?php echo get_the_permalink( ) ?>">
                            <?php echo get_the_title(  ) ?>
                        </a>
                    </h4>
                    <p><?php echo jve_make_content_shorter( get_the_excerpt(  ) ) ?></p>
                </div>

                <div class="education_block_footer">
                    <div class="education_block_author">
                        <div class="path-img">
                            <?php echo get_avatar( get_the_author_meta( 'email' ), 35,'', get_the_author_meta( 'display_name' )) ?>
                        </div>
                        <h5><a href="instructor-detail.html"><?php echo get_the_author(  ) ?></a></h5>
                    </div>
                    <?php 
                        // Retrieve the current value of the meta field
                        $level = get_post_meta( get_the_ID( ), '_jve_post_level', true);
                        $badge_color = 'info';
                        if( $level ):
                            switch ($level) {
                                case '1': 
                                    $level = __( 'Basic', 'jve' );
                                    $badge_color = 'info';
                                    break;
                                case '2': 
                                    $level = __( 'Intermediate', 'jve' );
                                    $badge_color = 'success';
                                    break;
                                case '3': 
                                    $level = __( 'Advanced', 'jve' );
                                    $badge_color = 'danger';
                                    break;
                            }
                    ?>
                        <span class="education_block_time bg-<?php echo $badge_color ?> text-white" >سطح : <?php echo esc_html($level); ?></span>
                    <?php endif; ?>

                </div>

            </div>
        </div>
    <?php endwhile; ?>
<?php else: ?>
    <div class="alert alert-info"><?php _e( 'There is nothing to display!', 'jve' ) ?></div>
<?php endif; ?>
<?php
    // Reset the global post object
    wp_reset_postdata();
?>