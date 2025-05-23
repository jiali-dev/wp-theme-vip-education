<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// Get hot posts
function jve_get_hot_posts_ajax( ) {
    
    try {

        // Check nonce
        if ( empty($_POST['nonce']) || !isset($_POST['nonce']) || !wp_verify_nonce( $_POST['nonce'], 'jve-nonce' ) )
            throw new Exception( __( 'Security error!', 'jve' ) , 403 );

        // Check parent entity
        if ( empty($_POST['post_type']) )
            throw new Exception( 'نوع پست مشخص نیست!' , 403 );

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
                    <?php endif; ?>
                <?php $output .= ob_get_clean(); ?>
            <?php endwhile; ?>
        <?php else: ?>
            <?php  throw new Exception( __( 'There is nothing to display!', 'jve' ) , 403 ); ?>
        <?php endif; ?>
        <?php
        // Reset the global post object
        wp_reset_postdata();
        $data['data'] = $output; 
        wp_send_json($data);
    } catch( Exception $ex ) {
        wp_send_json([
            'message' => $ex->getMessage()
        ], $ex->getCode() ? $ex->getCode() : 403);
    }   
}
add_action('wp_ajax_jve_get_hot_posts_ajax', 'jve_get_hot_posts_ajax');
add_action('wp_ajax_nopriv_jve_get_hot_posts_ajax', 'jve_get_hot_posts_ajax');

//  Get new post
function jve_get_new_posts_ajax( ) {
    
    try {

        // Check nonce
        if ( empty($_POST['nonce']) || !isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'jve-nonce') )
            throw new Exception( __( 'Security error!', 'jve' ) , 403 );

        // Check parent entity
        if ( empty($_POST['post_type']) )
            throw new Exception( 'نوع پست مشخص نیست!' , 403 );

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
                    <?php endif; ?>
                <?php $output .= ob_get_clean(); ?>
            <?php endwhile; ?>
        <?php else: ?>
            <?php  throw new Exception( __( 'There is nothing to display!', 'jve' ) , 403 ); ?>
        <?php endif; ?>
        <?php
        // Reset the global post object
        wp_reset_postdata();
        $data['data'] = $output; 
        wp_send_json($data);

    } catch( Exception $ex ) {
        wp_send_json([
            'message' => $ex->getMessage()
        ], $ex->getCode() ? $ex->getCode() : 403);
    }   

}
add_action('wp_ajax_jve_get_new_posts_ajax', 'jve_get_new_posts_ajax');
add_action('wp_ajax_nopriv_jve_get_new_posts_ajax', 'jve_get_new_posts_ajax');

// Get popular post
function jve_get_popular_posts_ajax( ) {
    
    try {

        // Check nonce
        if ( empty($_POST['nonce']) || !isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'jve-nonce') )
            throw new Exception( __( 'Security error!', 'jve' ) , 403 );

        // Check parent entity
        if ( empty($_POST['post_type']) )
            throw new Exception( 'نوع پست مشخص نیست!' , 403 );

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
                    <?php endif; ?>
                <?php $output .= ob_get_clean(); ?>
            <?php endwhile; ?>
        <?php else: ?>
            <?php  throw new Exception( __( 'There is nothing to display!', 'jve' ) , 403 ); ?>
        <?php endif; ?>
        <?php
        // Reset the global post object
        wp_reset_postdata();
        $data['data'] = $output; 
        wp_send_json($data);

    } catch( Exception $ex ) {
        wp_send_json([
            'message' => $ex->getMessage()
        ], $ex->getCode() ? $ex->getCode() : 403);
    }   

}
add_action('wp_ajax_jve_get_popular_posts_ajax', 'jve_get_popular_posts_ajax');
add_action('wp_ajax_nopriv_jve_get_popular_posts_ajax', 'jve_get_popular_posts_ajax');

// Get video post
function jve_get_video_posts_ajax( ) {
    
    try {

        // Check nonce
        if ( empty($_POST['nonce']) || !isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'],'jve-nonce') )
            throw new Exception( __( 'Security error!', 'jve' ) , 403 );

        // Check parent entity
        if ( empty($_POST['post_type']) )
            throw new Exception( 'نوع پست مشخص نیست!' , 403 );

        $post_type = sanitize_text_field( $_POST['post_type'] );
        
        $args = array(
            'post_type' => $post_type,
            'posts_per_page' => 3,
            'meta_query' => array(
                array(
                    'key'   => '_jve_post_entity', // Replace with your custom field name
                    'value' => 'video', // Replace with the value you want to filter by
                    'compare' => '=' // Default comparison (exact match)
                )
            ),
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
                    <?php endif; ?>
                <?php $output .= ob_get_clean(); ?>
            <?php endwhile; ?>
        <?php else: ?>
            <?php throw new Exception( __( 'There is nothing to display!', 'jve' ) , 403 ); ?>
        <?php endif; ?>
        <?php
        // Reset the global post object
        wp_reset_postdata();
        $data['data'] = $output; 
        wp_send_json($data);
    } catch( Exception $ex ) {
        wp_send_json([
            'message' => $ex->getMessage()
        ], $ex->getCode() ? $ex->getCode() : 403);
    }   
}
add_action('wp_ajax_jve_get_video_posts_ajax', 'jve_get_video_posts_ajax');
add_action('wp_ajax_nopriv_jve_get_video_posts_ajax', 'jve_get_video_posts_ajax');

// Get video post
function jve_get_archive_filtered_posts_ajax( ) {
    
    try {

        // Check nonce
        if ( empty($_POST['nonce']) || !isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'],'jve-nonce') )
            throw new Exception( __( 'Security error!', 'jve' ), 403);

        // Check cats_array
        $cats_array = [];
        if ( !empty($_POST['cats_array']) )
            $cats_array = array_map('sanitize_text_field', $_POST['cats_array']);

        // Check tech_cats_array
        $tech_cats_array = [];
        if ( !empty($_POST['tech_cats_array']) )
            $tech_cats_array = array_map('sanitize_text_field', $_POST['tech_cats_array']);
        
        // Check authors_array
        $authors_array = [];
        if ( !empty($_POST['authors_array']) )
            $authors_array = array_map('sanitize_text_field', $_POST['authors_array']);
        
        // Check entity
        $entity = '';
        if ( !empty($_POST['entity']) )
            $entity = sanitize_text_field($_POST['entity']);

        // Check entity
        $paged = '';
        if ( !empty($_POST['paged']) )
            $paged = sanitize_text_field($_POST['paged']);
        
        $args = array(
            'post_type' => ['post', 'technology'],
            'posts_per_page' => 3,
        );

        if( !empty( $paged ) ) {
            $args['paged'] = $paged;
        }
        
        if( !empty( $authors_array ) ) {
            $args['author'] = implode(',', $authors_array);
        }

        if( !empty( $cats_array ) || !empty( $tech_cats_array ) ) {
            $args['tax_query']['relation'] = 'OR';
        }

        if( !empty( $cats_array ) ) {
            $args['tax_query'][] = [
                'taxonomy' => 'category',
                'field' => 'term_id',
                'terms' => $cats_array
            ];
        }

        if( !empty( $tech_cats_array ) ) {
            $args['tax_query'][] = [
                'taxonomy' => 'technology_category',
                'field' => 'term_id',
                'terms' => $tech_cats_array
            ];
        }

        if( !empty( $entity ) ) {
            $args['meta_query'][] = [
                'key' => '_jve_post_entity',
                'value' => $entity,
            ];
        }

        // Output
        $output = '';
        
        $the_query = new WP_Query($args);
        if( $the_query->have_posts( ) ): ?>
            <?php while( $the_query->have_posts() ): $the_query->the_post( ); ?>
                <?php ob_start(); ?>
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
                <?php $output .= ob_get_clean(); ?>
            <?php endwhile; ?>
        <?php else: ?>
            <?php throw new Exception( __( 'There is nothing to display!', 'jve' ) , 403 ); ?>
        <?php endif; ?>
        <?php
        // Reset the global post object
        wp_reset_postdata();
        $data['success'] = true;
        $data['data'] = $output; 
        $data['found_posts'] = $the_query->found_posts; 
        $data['max_num_pages'] = $the_query->max_num_pages; 
        wp_send_json($data);

    } catch( Exception $ex ) {
        wp_send_json([
            'message' => $ex->getMessage()
        ], $ex->getCode() ? $ex->getCode() : 403);
    }     
}
add_action('wp_ajax_jve_get_archive_filtered_posts_ajax', 'jve_get_archive_filtered_posts_ajax');
add_action('wp_ajax_nopriv_jve_get_archive_filtered_posts_ajax', 'jve_get_archive_filtered_posts_ajax');

// Get Contact
function jve_contact_ajax( ) {
    
    try {
        // Validate form fields (assuming they are in $_POST['form_data'])
        parse_str($_POST['form_data'], $form_data); // Convert serialized string into an array

        // Check nonce
        if ( empty($_POST['nonce']) || !isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'],'jve-nonce') )
            throw new Exception( __( 'Security error!', 'jve' ), 403);

        foreach( $form_data as $item ) {
            if( empty( $item ) ) {
                throw new Exception(__( 'All fields are required!', 'jve' ), 403);
            }
        }

        // Get Items
        $fullname = sanitize_text_field( $form_data['fullname'] );
        $email = sanitize_text_field( $form_data['email'] );
        $title = sanitize_text_field( $form_data['title'] );
        $message = sanitize_textarea_field( $form_data['message'] );
        $options = get_option('smtp_settings');
        $assigned_email = $options['smtp_email'] ?? get_option('admin_email');
        
        $mailer = new SendMail();

        $sent_message = SendMail::jve_send_mail( $assigned_email, $title, MailLayout::jve_contact_layout($fullname,$title,$email,$message) );
        
        if( $sent_message ) {

            // If everything is fine, return success response
            wp_send_json([
                'message' => __( 'Message sent successfully!', 'jve' ),
            ], 200);

        } else {

            // If everything is fine, return success response
            throw new Exception(__( 'Message not sent, please try again!', 'jve' ), 403);

        }
    } catch( Exception $ex ) {
        wp_send_json([
            'message' => $ex->getMessage()
        ], $ex->getCode() ? $ex->getCode() : 403);
    }   

}
add_action('wp_ajax_jve_contact_ajax', 'jve_contact_ajax');
add_action('wp_ajax_nopriv_jve_contact_ajax', 'jve_contact_ajax');

// Sign in
function jve_sign_in_ajax( ) {
    
    try {
        
        // Check nonce
        if ( empty($_POST['nonce']) || !isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'],'jve-nonce') )
            throw new Exception( __( 'Security error!', 'jve' ), 403);

        // Validate input
        $identifier = isset($_POST['username']) ? sanitize_text_field($_POST['username']) : '';
        $password = isset( $_POST['password']) ? $_POST['password'] : '';
        $remember = !empty($_POST['remember']);

        if (empty($identifier) || empty($password)) {
            throw new Exception(__( 'All fields are required!', 'jve' ), 403);
        }
        
        // Try to get user by email or username
        if (is_email($identifier)) {
            $user = get_user_by('email', $identifier);
        } else {
            $user = get_user_by('login', $identifier);
        }

        if (!$user) {
            throw new Exception(__( 'Invalid username or email.', 'jve' ), 403);
        }

        $creds = [
            'user_login'    => $user->user_login,
            'user_password' => $password,
            'remember'      => $remember, // true if "remember me" is checked
        ];
        
        $user_login = wp_signon($creds, is_ssl());

        if (is_wp_error($user_login)) {
            throw new Exception(__( 'Username/Email and password are not match!', 'jve' ), 403);
        } else {
            wp_send_json([
                'message' => __('You have successfully logged in!', 'jve' ),
                'reloading_message' => __('Page is reloding ...', 'jve' ),
            ], 200);
        }

    } catch( Exception $ex ) {
        wp_send_json([
            'message' => $ex->getMessage()
        ], $ex->getCode() ? $ex->getCode() : 403);
    }   

}
add_action('wp_ajax_nopriv_jve_sign_in_ajax', 'jve_sign_in_ajax');

// Sign up
function jve_sign_up_ajax( ) {
    
    try {
        
        // Check nonce
        if ( empty($_POST['nonce']) || !isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'],'jve-nonce') )
            throw new Exception( __( 'Security error!', 'jve' ), 403);

        // Validate input
        $fullname = sanitize_text_field($_POST['fullname'] ?? '');
        $email = sanitize_email($_POST['email'] ?? '');
        $username = sanitize_user($_POST['username'] ?? '');
        $password = $_POST['password'] ?? '';

        if ( !$fullname || !$email || !$username || !$password ) {
            throw new Exception(__( 'All fields are required!', 'jve' ), 403);
        }
        
        if (!is_email($email)) {
            throw new Exception(__('Invalid email address.', 'jve'), 403);
        }

        if (username_exists($username)) {
            throw new Exception(__('Username already exists.', 'jve'), 403);
        }
    
        if (email_exists($email)) {
            throw new Exception(__('Email already exists.', 'jve'), 403);
        }

        // Create user
        $user_id = wp_create_user($username, $password, $email);

        if (is_wp_error($user_id)) {
            throw new Exception(__('Error creating user.', 'jve'), 403);
        }

        // Update full name
        wp_update_user([
            'ID'           => $user_id,
            'display_name' => $fullname,
            'first_name'   => $fullname,
        ]);

        // Auto login
        wp_set_current_user($user_id);
        wp_set_auth_cookie($user_id, true);
        do_action('wp_login', $username, get_user_by('ID', $user_id));

        wp_send_json([
            'message' => __('You have successfully signed up!', 'jve' ),
            'reloading_message' => __('Page is reloding ...', 'jve' ),
        ], 200);

    } catch( Exception $ex ) {
        wp_send_json([
            'message' => $ex->getMessage()
        ], $ex->getCode() ? $ex->getCode() : 403);
    }   

}
add_action('wp_ajax_nopriv_jve_sign_up_ajax', 'jve_sign_up_ajax');

// Send password recovery link
function jve_send_password_recovery_link_ajax( ) {
    
    try {
        
        // Check nonce
        if ( empty($_POST['nonce']) || !isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'],'jve-nonce') )
            throw new Exception( __( 'Security error!', 'jve' ), 403);

        // Validate input
        $email = sanitize_email($_POST['email'] ?? '');

        if ( !$email ) {
            throw new Exception(__( 'Email is required!', 'jve' ), 403);
        }
        
        if (!is_email($email)) {
            throw new Exception(__('Invalid email address.', 'jve'), 403);
        }

        if ( !email_exists($email) ) {
            throw new Exception(__('Email not found.', 'jve'), 403);
        }

        // Get user ID
        $user = get_user_by( 'email', $email );

        // Create password recovery token
        $token = bin2hex(random_bytes(16));
        update_user_meta($user->ID, '_password_recovery_token', $token);

        // Send email with password recovery link
        $recovery_link = add_query_arg(['passwordRecoveryToken' => $token], site_url());
        
        $mailer = new SendMail();

        $sent_message = SendMail::jve_send_mail( $email, __('Password Recovery', 'jve'), MailLayout::jve_contact_layout('Hello', __('Password Recovery', 'jve'),$email,'<a href="'.$recovery_link.'" target="_blank">Password recovery link</a>') );
        
        if( $sent_message ) {

            // If everything is fine, return success response
            wp_send_json([
                'message' => __( 'Password recovery link sent successfully!', 'jve' ),
            ], 200);

        } else {

            // If everything is fine, return success response
            throw new Exception(__( 'Message not sent, please try again!', 'jve' ), 403);

        }
    } catch( Exception $ex ) {
        wp_send_json([
            'message' => $ex->getMessage()
        ], $ex->getCode() ? $ex->getCode() : 403);
    }   

}

add_action('wp_ajax_nopriv_jve_send_password_recovery_link_ajax', 'jve_send_password_recovery_link_ajax');

// Send password recovery link
function jve_set_new_password_ajax( ) {
    
    try {
        
        // Check nonce
        if ( empty($_POST['nonce']) || !isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'],'jve-nonce') )
            throw new Exception( __( 'Security error!', 'jve' ), 403);

        // Get and sanitize inputs
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        $repeat_password = isset($_POST['repeat_password']) ? $_POST['repeat_password'] : '';
        $token = isset($_POST['password_recovery_token']) ? sanitize_text_field($_POST['password_recovery_token']) : '';

        if( empty($token) ) {
            throw new Exception(__( 'Token is not valid!', 'jve' ), 403);
        }

        if (
            !(
                strlen($password) >= 8 &&
                preg_match('/[A-Z]/', $password) &&
                preg_match('/[0-9]/', $password) &&
                preg_match('/[\W]/', $password)
            )
        )
        {
            throw new Exception(__( 'Password must be at least 8 characters long and contain at least one uppercase letter, one number, and one special character.', 'jve' ), 403);
        }        

        if ( $password !== $repeat_password ) {
            throw new Exception(__( 'Password and repeat is not match!', 'jve' ), 403);
        }
        
        // Find user by token (strict comparison)
        $user_query = new WP_User_Query([
            'number'     => 1,
            'meta_query' => [
                [
                    'key'     => '_password_recovery_token',
                    'value'   => $token,
                    'compare' => '=',
                ],
            ],
        ]);
        $users = $user_query->get_results();

        if (empty($users)) {
            throw new Exception(__('No user found with that token.', 'jve'), 403);
        }

        $user = $users[0]; // WP_User object
        
        // Update password (also logs out the user everywhere)
        wp_set_password($password, $user->ID);

        // Optionally, delete the token after use
        delete_user_meta($user->ID, '_password_recovery_token');

        wp_send_json([
            'message' => __('Your password has been successfully updated.', 'jve'),
        ], 200);

    } catch( Exception $ex ) {
        wp_send_json([
            'message' => $ex->getMessage()
        ], $ex->getCode() ? $ex->getCode() : 403);
    }   

}

add_action('wp_ajax_nopriv_jve_set_new_password_ajax', 'jve_set_new_password_ajax');

