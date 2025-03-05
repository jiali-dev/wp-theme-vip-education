<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;


class CloudyTags extends WP_Widget {
    
    public function __construct() {
        parent::__construct(
            'cloudy_tags_widget', // Widget ID
            'تگ های ابری', // Widget Name
            ['description' => 'ویجتی برای نمایش ابری تگ ها']
        );
    }

    // Display widget content
    public function widget($args, $instance) {
        echo $args['before_widget']; 
        ?>
        <div class="single_widgets widget_tags">
            <?php
                if (!empty($instance['title'])) {
                    $title = apply_filters('widget_title', $instance['title']);
                    echo $args['before_title'] . '<h4 class="title">' . $title . '</h4>' . $args['after_title'];
                }

            ?>

            <?php if( function_exists( 'wp_tag_cloud' ) ): ?>
                <?php
                    $cloudy_tags = wp_tag_cloud( [
                        'smallest' => 8,
                        'largest' => 14,
                        'format' => 'array',
                        'number' => 4
                    ] );
                ?>
                <ul>
                    <?php foreach( $cloudy_tags as $tag ): ?>
                        <li><?php echo $tag ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
        <?php
        echo $args['after_widget'];
    }

    // Widget form in admin panel
    public function form($instance) {
        $title = !empty($instance['title']) ? $instance['title'] : 'تگ ها';
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
function vip_educationـregister_cloudy_tags_widget() {
    register_widget('CloudyTags');
}
add_action('widgets_init', 'vip_educationـregister_cloudy_tags_widget');
