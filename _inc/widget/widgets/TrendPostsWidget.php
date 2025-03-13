<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;


class TrendPostsWidget extends WP_Widget {
    
    public function __construct() {
        parent::__construct(
            'trend_posts_widget', // Widget ID
            'پرمخاطب', // Widget Name
            ['description' => 'ویجتی برای نمایش مطالب پرمخاطب']
        );
    }

    // Display widget content
    public function widget($args, $instance) {
        echo $args['before_widget']; 
        ?>
        <div class="single_widgets widget_thumb_post">
            <?php
                if (!empty($instance['title'])) {
                    $title = apply_filters('widget_title', $instance['title']);
                    echo $args['before_title'] . '<h4 class="title">' . $title . '</h4>' . $args['after_title'];
                }
            ?>
            <?php 
                $trend_posts = new WP_Query(
                    [
                        'post_type' => 'post',
                        'orderby' => 'comment',
                        'order' => 'DESC',
                        'post_per_page' => 6
                    ]
                )
            ?>

            <?php if( $trend_posts->have_posts(  )): ?>
                
                <!-- Trend Posts -->
                <ul>
                    <?php while( $trend_posts->have_posts(  ) ): $trend_posts->the_post(  ); ?>
                        <li>
                            <span class="left">
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

                            </span>
                            <span class="right">
                                <a class="feed-title" href="<?php echo get_the_permalink( ) ?>"><?php echo get_the_title() ?></a> 
                                <span class="post-date"><i class="ti-calendar"></i><?php echo TimeModify::jve_time_ago($trend_posts->post->post_date_gmt) ?></span>
                            </span>
                        </li> 
                    <?php endwhile; ?>
                </ul>
            <?php endif; ?>
            <?php wp_reset_postdata(  ) ?>
            </div>
        <?php
        echo $args['after_widget'];
    }

    // Widget form in admin panel
    public function form($instance) {
        $title = !empty($instance['title']) ? $instance['title'] : 'پرمخاطب';
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">عنوان</label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text"
                   value="<?php echo esc_attr($title); ?>">
        </p>
        <?php
    }

    // Save widget settings
    public function update($new_instance, $old_instance) {
        $instance = [];
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        return $instance;
    }
}

// Register the widget
function jveـregister_trend_posts_widget() {
    register_widget('TrendPostsWidget');
}
add_action('widgets_init', 'jveـregister_trend_posts_widget');
