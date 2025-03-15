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

                $post_type = !empty($instance['post_type']) ? $instance['post_type'] : 'post';
            ?>

            <?php if( function_exists( 'wp_tag_cloud' ) ): ?>
                <?php
                    $cloudy_tags = wp_tag_cloud( [
                        'smallest' => 8,
                        'largest' => 14,
                        'format' => 'array',
                        'number' => 4,
                        'taxonomy' => $post_type  . '_tag',
                        'post_type' => $post_type, 
                    ] );
                    // jve_pretty_var_dump($cloudy_tags);
                ?>
                <ul>
                    <?php foreach( $cloudy_tags as $tag ): ?>
                        <li><?php echo $tag ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <div class="alert alert-warning">تگی یافت نشد!</div>
            <?php endif; ?>
        </div>
        <?php
        echo $args['after_widget'];
    }

    // Widget form in admin panel
    public function form($instance) {
        $title = !empty($instance['title']) ? $instance['title'] : 'تگ ها';
        $post_type = !empty($instance['post_type']) ? $instance['post_type'] : 'post';
        $post_types = get_post_types(['public' => true], 'objects');
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">عنوان</label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text"
                   value="<?php echo esc_attr($title); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('post_type')); ?>">نوع نوشته</label>
            <select class="widefat" id="<?php echo esc_attr($this->get_field_id('post_type')); ?>"
                    name="<?php echo esc_attr($this->get_field_name('post_type')); ?>">
                <?php foreach ($post_types as $type): ?>
                    <option value="<?php echo esc_attr($type->name); ?>" <?php selected($post_type, $type->name); ?>>
                        <?php echo esc_html($type->label); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </p>
        <?php
    }

    // Save widget settings
    public function update($new_instance, $old_instance) {
        $instance = [];
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['post_type'] = (!empty($new_instance['post_type'])) ? strip_tags($new_instance['post_type']) : 'post';
        return $instance;
    }
}

// Register the widget
function jveـregister_cloudy_tags_widget() {
    register_widget('CloudyTags');
}
add_action('widgets_init', 'jveـregister_cloudy_tags_widget');
