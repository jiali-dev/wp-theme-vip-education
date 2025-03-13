<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// Get hot posts
function jve_get_hot_posts_ajax( ) {
    
    try {

        // Check nonce
        if ( empty($_POST['nonce']) || !isset($_POST['nonce']))
            throw new Exception( 'خطای امنیتی!' , 1 );

        // Check parent entity
        if ( empty($_POST['post_type']) )
            throw new Exception( 'نوع پست مشخص نیست!' , 1 );

        $post_type = sanitize_text_field( $_POST['post_type'] );
        
        $args = array(
            'post_type' => $post_type,
            'posts_per_page' => 3,
            'orderby' => 'comment_count',
            'order' => 'DESC'
        );
        
        // Output
        $output = '';

        $the_query = new WP_Query($args);

        if( $the_query->have_posts(  ) ): ?>
            <?php while( $the_query->have_posts() ): $the_query->the_post(  ); ?>
                <?php ob_start(); ?>
                    <?php if( $post_type === 'technology' ): ?>
                        <!-- Single Slide -->
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
                                            <?php jve_default_post_thumbnail() ?>
                                        <?php endif; ?>
                                    </a>
                                </div>
                                
                                <div class="articles_grid_caption">
                                    <h4>
                                        <a href="<?php echo get_the_permalink( ) ?>">
                                            <?php echo get_the_title() ?>
                                        </a>
                                    </h4>
                                    <div class="articles_grid_author">
                                        <div class="articles_grid_author_img">
                                            <?php echo get_avatar( get_the_author_meta( 'email' ), 35,'', get_the_author_meta( 'display_name' )) ?>
                                        </div>
                                        <h4><?php echo get_the_author(  ) ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <!-- Single Article -->
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
                                                    $level = 'مقدماتی';
                                                    $badge_color = 'info';
                                                    break;
                                                case '2': 
                                                    $level = 'متوسط';
                                                    $badge_color = 'success';
                                                    break;
                                                case '3': 
                                                    $level = 'پیشرفته';
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
                    <?php endif; ?>
                <?php $output .= ob_get_clean(); ?>
            <?php endwhile; ?>
        <?php else: ?>
            <?php  throw new Exception( 'مطلبی جهت نمایش وجود ندارد!' , 1 ); ?>
        <?php endif; ?>
        <?php
            // Reset the global post object
            wp_reset_postdata();
            $data['success'] = true;
            $data['data'] = $output; 
    } catch( Exception $ex ) {
        $data['data'] = '<div class="alert alert-warning">'.$ex->getMessage().'</div>';
    }   
        
    wp_send_json($data);

}
add_action('wp_ajax_jve_get_hot_posts_ajax', 'jve_get_hot_posts_ajax');
add_action('wp_ajax_nopriv_jve_get_hot_posts_ajax', 'jve_get_hot_posts_ajax');

//  Get new post
function jve_get_new_posts_ajax( ) {
    
    try {

        // Check nonce
        if ( empty($_POST['nonce']) || !isset($_POST['nonce']))
            throw new Exception( 'خطای امنیتی!' , 1 );

        // Check parent entity
        if ( empty($_POST['post_type']) )
            throw new Exception( 'نوع پست مشخص نیست!' , 1 );

        $post_type = sanitize_text_field( $_POST['post_type'] );
        
        $args = array(
            'post_type' => $post_type,
            'posts_per_page' => 3,
            'order'          => 'DESC'
        );
        
        // Output
        $output = '';

        $the_query = new WP_Query($args);

        if( $the_query->have_posts(  ) ): ?>
            <?php while( $the_query->have_posts() ): $the_query->the_post(  ); ?>
                <?php ob_start(); ?>
                    <?php if( $post_type === 'technology' ): ?>
                        <!-- Single Slide -->
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
                                            <?php jve_default_post_thumbnail() ?>
                                        <?php endif; ?>
                                    </a>
                                </div>
                                
                                <div class="articles_grid_caption">
                                    <h4>
                                        <a href="<?php echo get_the_permalink( ) ?>">
                                            <?php echo get_the_title() ?>
                                        </a>
                                    </h4>
                                    <div class="articles_grid_author">
                                        <div class="articles_grid_author_img">
                                            <?php echo get_avatar( get_the_author_meta( 'email' ), 35,'', get_the_author_meta( 'display_name' )) ?>
                                        </div>
                                        <h4><?php echo get_the_author(  ) ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <!-- Single Article -->
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
                                                    $level = 'مقدماتی';
                                                    $badge_color = 'info';
                                                    break;
                                                case '2': 
                                                    $level = 'متوسط';
                                                    $badge_color = 'success';
                                                    break;
                                                case '3': 
                                                    $level = 'پیشرفته';
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
                    <?php endif; ?>
                <?php $output .= ob_get_clean(); ?>
            <?php endwhile; ?>
        <?php else: ?>
            <?php  throw new Exception( 'مطلبی جهت نمایش وجود ندارد!' , 1 ); ?>
        <?php endif; ?>
        <?php
            // Reset the global post object
            wp_reset_postdata();
            $data['success'] = true;
            $data['data'] = $output; 
    } catch( Exception $ex ) {
        $data['data'] = '<div class="alert alert-warning">'.$ex->getMessage().'</div>';
    }   
        
    wp_send_json($data);

}
add_action('wp_ajax_jve_get_new_posts_ajax', 'jve_get_new_posts_ajax');
add_action('wp_ajax_nopriv_jve_get_new_posts_ajax', 'jve_get_new_posts_ajax');

// Get popular post
function jve_get_popular_posts_ajax( ) {
    
    try {

        // Check nonce
        if ( empty($_POST['nonce']) || !isset($_POST['nonce']))
            throw new Exception( 'خطای امنیتی!' , 1 );

        // Check parent entity
        if ( empty($_POST['post_type']) )
            throw new Exception( 'نوع پست مشخص نیست!' , 1 );

        $post_type = sanitize_text_field( $_POST['post_type'] );
        
        $args = array(
            'post_type' => $post_type,
            'posts_per_page' => 3,
            'meta_key' => '_post_view_count',
            'orderby'  => 'meta_value_num',
            'order' => 'DESC'
        );
        
        // Output
        $output = '';

        $the_query = new WP_Query($args);

        if( $the_query->have_posts(  ) ): ?>
            <?php while( $the_query->have_posts() ): $the_query->the_post(  ); ?>
                <?php ob_start(); ?>
                    <?php if( $post_type === 'technology' ): ?>
                        <!-- Single Slide -->
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
                                            <?php jve_default_post_thumbnail() ?>
                                        <?php endif; ?>
                                    </a>
                                </div>
                                
                                <div class="articles_grid_caption">
                                    <h4>
                                        <a href="<?php echo get_the_permalink( ) ?>">
                                            <?php echo get_the_title() ?>
                                        </a>
                                    </h4>
                                    <div class="articles_grid_author">
                                        <div class="articles_grid_author_img">
                                            <?php echo get_avatar( get_the_author_meta( 'email' ), 35,'', get_the_author_meta( 'display_name' )) ?>
                                        </div>
                                        <h4><?php echo get_the_author(  ) ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <!-- Single Article -->
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
                                                    $level = 'مقدماتی';
                                                    $badge_color = 'info';
                                                    break;
                                                case '2': 
                                                    $level = 'متوسط';
                                                    $badge_color = 'success';
                                                    break;
                                                case '3': 
                                                    $level = 'پیشرفته';
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
                    <?php endif; ?>
                <?php $output .= ob_get_clean(); ?>
            <?php endwhile; ?>
        <?php else: ?>
            <?php  throw new Exception( 'مطلبی جهت نمایش وجود ندارد!' , 1 ); ?>
        <?php endif; ?>
        <?php
            // Reset the global post object
            wp_reset_postdata();
            $data['success'] = true;
            $data['data'] = $output; 
    } catch( Exception $ex ) {
        $data['data'] = '<div class="alert alert-warning">'.$ex->getMessage().'</div>';
    }   
        
    wp_send_json($data);

}
add_action('wp_ajax_jve_get_popular_posts_ajax', 'jve_get_popular_posts_ajax');
add_action('wp_ajax_nopriv_jve_get_popular_posts_ajax', 'jve_get_popular_posts_ajax');