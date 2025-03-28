<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;


class CategoriesWidget extends WP_Widget {
    
    public function __construct() {
        parent::__construct(
            'categories_widget', // Widget ID
            __('Categories Widget', 'jve'), // Widget Name
            ['description' => __('A widget to display categories', 'jve')] // Widget Description
        );        
    }

    // Display widget content
    public function widget($args, $instance) {
        echo $args['before_widget']; 
        ?>
        <div class="single_widgets widget_category">
            <?php
                if (!empty($instance['title'])) {
                    $title = apply_filters('widget_title', $instance['title']);
                    echo $args['before_title'] . '<h4 class="title">' . $title . '</h4>' . $args['after_title'];
                }
            
                $post_type = !empty($instance['post_type']) ? $instance['post_type'] : 'post';

                $categories = get_terms([
                    'taxonomy'   => ( $post_type !== 'post' ? $post_type.'_' : '' ) . 'category',
                    'hide_empty' => true, // Show even empty categories
                    'object_type' => [$post_type],
                ]);
            ?>

            <?php if( !is_wp_error($categories) && !empty($categories) ): ?>
                <ul>
                    <?php foreach( $categories as $cat ): ?>
                        <li><a href="<?php echo get_term_link( $cat ) ?>"><?php echo $cat->name ?><span><?php echo $cat->count ?></span></a></li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <div class="alert alert-info"><?php _e( 'There is no category!', 'jve' ) ?></div>
            <?php endif; ?>
        </div>
        <?php
        echo $args['after_widget'];
    }

    // Widget form in admin panel
    public function form($instance) {
        $title = !empty($instance['title']) ? $instance['title'] : __( 'Categories', 'jve');
        $post_type = !empty($instance['post_type']) ? $instance['post_type'] : 'post';
        $post_types = get_post_types(['public' => true], 'objects');
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e( 'Title', 'jve' ) ?></label>
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
function jveـregister_categories_widget() {
    register_widget('CategoriesWidget');
}
add_action('widgets_init', 'jveـregister_categories_widget');
