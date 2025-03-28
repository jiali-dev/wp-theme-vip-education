<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

$args = array(
    'post_type' => 'post',
    'posts_per_page' => 5
);

$the_query = new WP_Query($args);

?>

<?php if( $the_query->have_posts(  ) ): ?>
    <?php while( $the_query->have_posts() ): $the_query->the_post(  ); ?>
        <!-- Single Slide -->
        <div class="singles_items">
            <div class="edu_cat">
                <div class="pic">
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
                        <div class="topic_level bg-<?php echo $badge_color ?> text-white">سطح : <?php echo esc_html($level); ?></div>
                    <?php endif; ?>

                    <?php 
                        $cat = get_post_meta( get_the_ID( ), '_jve_post_cat', true);
                        if( $cat && $cat > 0 ):
                            $cat_name = get_cat_name($cat);
                    ?>

                            <div class="topic_cat bg-warning text-white"><?php echo $cat_name ?></div>
                    <?php endif; ?>
                    <a class="pic-main" href="<?php echo get_the_permalink( ) ?>" >
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
                </div>
                <div class="edu_data singles_items_border_bottom">
                    <h4 class="title"><a href="<?php echo get_the_permalink( ) ?> "><?php echo get_the_title() ?></a></h4>
                    <ul class="meta d-flex mt-4">
                        <li class="d-flex align-items-center"><i class="ti-user"></i><?php echo get_the_author(  ) ?></li>
                        <li class="video d-flex align-items-center"><i class="ti-video-clapper"></i>ویدئو</li>
                        <li class="video d-flex align-items-center"><i class="ti-eye"></i>321</li>
                        <li class="d-flex align-items-center"><i class="ti-calendar theme-cl"></i><?php echo get_the_date( 'j F Y' ) ?></li>
                    </ul>
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