<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;


class SearchWidget extends WP_Widget {
    
    public function __construct() {
        parent::__construct(
            'search_widget', // Widget ID
            'جستجوی مطالب', // Widget Name
            ['description' => 'ویجتی برای فرم جستجوی مطالب']
        );
    }

    // Display widget content
    public function widget($args, $instance) {
        echo $args['before_widget']; 
        ?>
        <div class="single_widgets widget_search">
            <?php
                if (!empty($instance['title'])) {
                    $title = apply_filters('widget_title', $instance['title']);
                    echo $args['before_title'] . '<h4 class="title">' . $title . '</h4>' . $args['after_title'];
                }
            ?>
            <form action="#" class="sidebar-search-form">
                <input type="search" name="search" placeholder="عنوان وبلاگ...">
                <button type="submit"><i class="ti-search"></i></button>
            </form>
        </div>
        <?php
        echo $args['after_widget'];
    }

    // Widget form in admin panel
    public function form($instance) {
        $title = !empty($instance['title']) ? $instance['title'] : 'جستجو';
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
function jveـregister_search_widget() {
    register_widget('SearchWidget');
}
add_action('widgets_init', 'jveـregister_search_widget');
