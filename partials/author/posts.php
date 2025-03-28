<?php 

    // Exit if accessed directly
    if (!defined('ABSPATH')) exit;

    $auth = get_query_var('auth');
?>

<!-- ============================ Instructor Detail ================================== -->
<section>
    <div class="container">
        <div class="row">
        
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="custom-tab customize-tab tabs_creative">
                    <ul class="nav nav-tabs pb-2 b-0" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><?php _e( 'Authors\' articles', 'jve') ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><?php _e( 'About author', 'jve') ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false"><?php _e( 'Comments', 'jve') ?></a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        
                        <!-- Classess -->
                        <div class="tab-pane fade show active p-2" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <?php get_template_part( 'loop/author-posts-loop', 'author-posts-loop' ) ?>
                            </div>
                            <!-- Row -->
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">

                                    <!-- Pagination -->
                                    <div class="row">
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
                        </div>
                        
                        <!-- Education -->
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="details_single p-2">
                                <h2><?php _e( 'About author', 'jve') ?></h2>
                                <ul class="skills_info">
                                    <li>
                                        <div class="skills_captions">
                                            <?php echo get_user_meta( $auth->ID, 'description', true ) ?>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        
                        <!-- Reviews -->
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="reviews-comments-wrap">
                                <?php 

                                    $args = [
                                        'status' => 'approve',
                                        'post_author' =>  $auth->ID,
                                        'author__not_in' => $auth->ID
                                    ];
                                
                                    $comments = new WP_Comment_Query( $args );
                                ?>
                                <?php if( $comments ): $comments = $comments->query($args); ?>
                                    <?php foreach( $comments as $comment ): ?>
                                        <!-- reviews-comments-item -->  
                                        <div class="reviews-comments-item">
                                            <div class="review-comments-avatar">
                                                <img src="assets/img/user-1.jpg" class="img-fluid" alt=""> 
                                            </div>
                                            <div class="reviews-comments-item-text">
                                                <h4><?php echo $comment->comment_author ?><span class="reviews-comments-item-date"><i class="ti-calendar theme-cl"></i><?php echo comment_date( 'j F Y', $comment->comment_ID ) ?></span></h4>
                                                <div class="clearfix"></div>
                                                <p><?php echo $comment->comment_content ?></p>
                                            </div>
                                        </div>
                                        <!--reviews-comments-item end-->  
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>
<!-- ============================ Instructor Detail ================================== -->
