<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

$args = array(
    'post_type' => 'technology',
    'posts_per_page' => 3
);

$the_query = new WP_Query($args);

?>

<?php if( $the_query->have_posts(  ) ): ?>
    <?php while( $the_query->have_posts() ): $the_query->the_post(  ); ?>
    <!-- Single Article -->
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="articles_grid_style">
                <div class="articles_grid_thumb">
                    <a href="<?php echo get_the_permalink( ) ?>">
                    <?php if( has_post_thumbnail(  )): ?>
                            <?php 
                                the_post_thumbnail( '', array(
                                    'class' => 'img-responsive',
                                    'alt' => get_the_title(  )
                                ) )
                            ?>
                        <?php else: ?>
                            <?php vip_education_default_post_thumbnail() ?>
                        <?php endif; ?>
                    </a>
                </div>
                
                <div class="articles_grid_caption">
                    <h4><?php echo get_the_title() ?></h4>
                    <div class="articles_grid_author">
                        <div class="articles_grid_author_img">
                            <?php echo get_avatar( get_the_author_meta( 'email' ), 35,'', get_the_author_meta( 'display_name' )) ?>
                        </div>
                        <h4><?php echo get_the_author(  ) ?></h4>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
<?php else: ?>
    <div class="alert alert-info">مطلبی جهت نمایش وجود ندارد!</div>
<?php endif; ?>
<?php
    // Reset the global post object
    wp_reset_postdata();
?>