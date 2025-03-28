<?php 

    // Exit if accessed directly
    if (!defined('ABSPATH')) exit;

    $auth = get_query_var('auth');
?>

<!-- ============================ Instructor header Start================================== -->
<div class="image-cover ed_detail_head invers" style="background:#f4f5f7;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12 col-md-12">
                <div class="viewer_detail_wraps">
                    <div class="viewer_detail_thumb">
                        <?php echo get_avatar($auth->user_email, 128, '', $auth->display_name) ?>
                        <?php 
                            $role = '';
                            switch ( $auth->roles[0] ) {
                                case 'administrator':
                                    $role = __( 'Admin', 'jve');
                                    break;
                                case 'editor':
                                    $role = __( 'Editor', 'jve');
                                    break;
                                case 'author':
                                    $role = __( 'Author', 'jve');
                                    break;
                            }
                        ?>
                        <div class="viewer_status"><?php echo $role ?></div>
                    </div>
                    <div class="caption">
                        <div class="viewer_package_status"><?php _e( 'Registered from', 'jve') ?> <?php echo TimeModify::jve_time_ago( $auth->user_registered ) ?></div>
                        <div class="viewer_header">
                            <h4><?php echo $auth->display_name ?></h4>
                            <span class="viewer_location">
                                <?php echo get_user_meta( $auth->ID, 'career', true )?>
                            </span>
                            <ul class="mt-2">
                                <li><strong><?php echo count_user_posts( $auth->ID ) ?></strong> <?php _e( 'Articles', 'jve') ?> </li>
                                <li><strong>87</strong> <?php _e( 'Learning videos', 'jve') ?></li>
                                <li><strong>120</strong> <?php _e( 'Courses', 'jve') ?></li>
                            </ul>
                        </div>
                        <div class="viewer_header">
                            <ul class="badge_info">
                                <li class="started"><i class="ti-rocket"></i></li>
                                <li class="medium"><i class="ti-cup"></i></li>
                                <li class="platinum"><i class="ti-thumb-up"></i></li>
                                <li class="elite unlock"><i class="ti-medall"></i></li>
                                <li class="power unlock"><i class="ti-crown"></i></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
<!-- ============================ Instructor header End ================================== -->
