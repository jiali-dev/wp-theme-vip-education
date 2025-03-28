<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

$global_query = $GLOBALS['wp_query'];
?>

<!-- Row -->
<div class="row">

    <div class="col-lg-12 col-md-12 col-sm-12">

        <!-- Row -->
        <div class="row align-items-center mb-3">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <strong><span class="found-posts"><?php echo $global_query->found_posts; ?></span></strong> <?php _e( 'learning course found.', 'jve') ?>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 ordering">
                <div class="filter_wraps">
                    <div class="dl">
                        <div id="main2">
                            <a href="javascript:void(0)" class="btn btn-theme arrow-btn filter_open" id="open2"><span><i class="fas fa-arrow-alt-circle-right"></i></span><?php _e( 'Filter box', 'jve') ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Row -->

        <div class="row archive-posts">
            <?php get_template_part( 'loop/archive-loop', 'archive-loop' ) ?>
        </div>

        <!-- Row -->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <!-- Pagination -->
                <div class="row pagination">
                    <div class="col-lg-12 col-md-12 col-sm-12 text-center custom-pagination">
                        <?php the_posts_pagination(array(
                                'mid_size'  => 2,
                                'prev_text' => '&laquo;',
                                'next_text' => '&raquo;',
                            ));
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Row -->
        <!-- Row -->
        <div class="row ajax-load-more">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <!-- Pagination -->
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                        <button type="button" class="btn btn-loader"><i class="ti-reload ml-3"></i><?php _e( 'Complete list of courses', 'jve') ?></button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Row -->

    </div>

</div>