<?php 

    // Exit if accessed directly
    if (!defined('ABSPATH')) exit;

    global $wp_query;
    $auth = $wp_query->get_queried_object();
    jve_pretty_var_dump($auth);

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
                                    $role = 'ادمین';
                                    break;
                                case 'editor':
                                    $role = 'ادیتور';
                                    break;
                                case 'author':
                                    $role = 'نویسنده';
                                    break;
                            }
                        ?>
                        <div class="viewer_status"><?php echo $role ?></div>
                    </div>
                    <div class="caption">
                        <div class="viewer_package_status">عضویت از <?php echo TimeModify::jve_time_ago( $auth->user_registered ) ?></div>
                        <div class="viewer_header">
                            <h4><?php echo $auth->display_name ?></h4>
                            <span class="viewer_location">
                                <?php echo get_user_meta( $auth->ID, 'career', true )?>
                            </span>
                            <ul class="mt-2">
                                <li><strong><?php echo count_user_posts( $auth->ID ) ?></strong> مطالب </li>
                                <li><strong>87</strong> ویدئو آموزشی</li>
                                <li><strong>120</strong> دوره</li>
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
