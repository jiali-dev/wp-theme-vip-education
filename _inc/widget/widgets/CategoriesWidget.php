<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;


class CategoriesWidget extends WP_Widget {
    
    public function __construct() {
        parent::__construct(
            'categories_widget', // Widget ID
            'دسته های مطالب', // Widget Name
            ['description' => 'ویجتی برای نمایش دسته بندی مطالب']
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
            
                $categories = get_terms([
                    'taxonomy'   => 'category',
                    'hide_empty' => true, // Show even empty categories
                ]);
            ?>

            <?php if( !empty($categories) ): ?>
                <ul>
                    <?php foreach( $categories as $cat ): ?>
                        <li><a href="<?php echo get_term_link( $cat ) ?>"><?php echo $cat->name ?><span><?php echo $cat->count ?></span></a></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
        <?php
        echo $args['after_widget'];
    }

    // Widget form in admin panel
    public function form($instance) {
        $title = !empty($instance['title']) ? $instance['title'] : 'دسته بندی ها';
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
function jveـregister_categories_widget() {
    register_widget('CategoriesWidget');
}
add_action('widgets_init', 'jveـregister_categories_widget');
