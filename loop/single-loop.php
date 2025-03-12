<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

?>
<?php 
    // Check Referer
    $referer = isset($_SERVER['HTTP_REFERER']) ? esc_url($_SERVER['HTTP_REFERER']) : '';

    // Count Post View
    GoogleReferer::vip_education_update_google_referer( get_the_ID(  ), $referer);
?>
<?php if( have_posts(  ) ): ?>
    <?php while( have_posts(  ) ): the_post(  ); ?>

        <!-- Count Post View -->
        <?php PostView::vip_education_update_post_view( get_the_ID(  )) ?>

        <!-- Article -->
        <div class="article_detail_wrapss single_article_wrap format-standard">
            <div class="article_body_wrap">
            
                <div class="article_featured_image">
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
                </div>
                
                <!-- Post Meta -->
                <?php get_template_part( 'partials/meta-data/single/post-meta', 'post-meta' ) ?>
                
                <!-- Post Content -->
                <div class="main-content">
                    <?php the_content( ); ?>
                </div>

                <div class="article_bottom_info">
                    <!-- Post Tags -->
                    <?php get_template_part( 'partials/meta-data/single/post-tags', 'post-tags' ) ?>

                    <!-- Post Share -->
                    <?php get_template_part( 'partials/meta-data/single/post-share', 'post-share' ) ?>

                </div>
                <div class="single_article_pagination">
                    <?php $previous_post = get_previous_post(); ?>
                    <?php if( !empty($previous_post) ): ?>
                        <div class="prev-post">
                            <a href="<?php echo get_permalink( $previous_post->ID); ?>" class="theme-bg">
                                <div class="title-with-link">
                                    <span class="intro">پست قبلی</span>
                                </div>
                            </a>
                        </div>
                    <?php endif; ?>
                    <?php $blog_page_url = get_permalink( get_option( 'page_for_posts' ) ); ?>
                    <?php if( !empty($blog_page_url) ): ?>
                        <div class="article_pagination_center_grid">
                            <a href="<?php echo $blog_page_url ?>"><i class="ti-layout-grid3"></i></a>
                        </div>
                    <?php endif; ?>
                    <?php $next_post = get_next_post(); ?>
                    <?php if( !empty($next_post) ): ?>
                        <div class="next-post">
                            <a href="<?php echo get_permalink( $next_post->ID); ?>" class="theme-bg">
                                <div class="title-with-link">
                                    <span class="intro">پست بعدی</span>
                                </div>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
                
            </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>