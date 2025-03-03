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
            <!-- Trend Posts -->

                <ul>
                    <li>
                        <span class="left">
                            <img src="<?php echo VIP_EDUCATION_IMAGES_URI . '/blog-sm-01.jpg' ?>" alt="" class="">
                        </span>
                        <span class="right">
                            <a class="feed-title" href="#">در الکامپ امسال چه خبر است؟</a> 
                            <span class="post-date"><i class="ti-calendar"></i>10دقیقه پیش</span>
                        </span>
                    </li>
                    <li>
                        <span class="left">
                            <img src="<?php echo VIP_EDUCATION_IMAGES_URI . '/blog-sm-02.jpg' ?>" alt="" class="">
                        </span>
                        <span class="right">
                            <a class="feed-title" href="#">چگونه بهانه آوردن را متوقف کنید؟</a> 
                            <span class="post-date"><i class="ti-calendar"></i>2ساعت پیش</span>
                        </span>
                    </li>
                    <li>
                        <span class="left">
                            <img src="<?php echo VIP_EDUCATION_IMAGES_URI . '/blog-sm-03.jpg' ?>" alt="" class="">
                        </span>
                        <span class="right">
                            <a class="feed-title" href="#">مشخصات اولین تبلت فراسو</a> 
                            <span class="post-date"><i class="ti-calendar"></i>4ساعت پیش</span>
                        </span>
                    </li>
                    <li>
                        <span class="left">
                            <img src="<?php echo VIP_EDUCATION_IMAGES_URI . '/blog-sm-01.jpg' ?>" alt="" class="">
                        </span>
                        <span class="right">
                            <a class="feed-title" href="#">مالزی به دنبال دانشجویان آمریکایی</a> 
                            <span class="post-date"><i class="ti-calendar"></i>7ساعت پیش</span>
                        </span>
                    </li>
                    <li>
                        <span class="left">
                            <img src="<?php echo VIP_EDUCATION_IMAGES_URI . '/blog-sm-02.jpg' ?>" alt="" class="">
                        </span>
                        <span class="right">
                            <a class="feed-title" href="#">فیلترینگ 100 هزار واژه از سوی گوگل</a> 
                            <span class="post-date"><i class="ti-calendar"></i>3روز پیش</span>
                        </span>
                    </li>
                </ul>
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
function vip_educationـregister_trend_posts_widget() {
    register_widget('TrendPostsWidget');
}
add_action('widgets_init', 'vip_educationـregister_trend_posts_widget');
