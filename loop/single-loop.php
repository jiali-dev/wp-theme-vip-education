<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

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
                <?php the_content( ); ?>

                <div class="article_bottom_info">
                    <!-- Post Tags -->
                    <?php get_template_part( 'partials/meta-data/single/post-tags', 'post-tags' ) ?>

                    <!-- Post Share -->
                    <?php get_template_part( 'partials/meta-data/single/post-share', 'post-share' ) ?>

                </div>
                <div class="single_article_pagination">
                    <div class="prev-post">
                        <a href="#" class="theme-bg">
                            <div class="title-with-link">
                                <span class="intro">پست قبلی</span>
                            </div>
                        </a>
                    </div>
                    <div class="article_pagination_center_grid">
                        <a href="#"><i class="ti-layout-grid3"></i></a>
                    </div>
                    <div class="next-post">
                        <a href="#" class="theme-bg">
                            <div class="title-with-link">
                                <span class="intro">پست بعدی</span>
                            </div>
                        </a>
                    </div>
                </div>
                
            </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>