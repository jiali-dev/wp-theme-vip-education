<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

class FilterPosts {
    
    public static function jve_show_filter( $post_type="post", $bg_class="success", $text_color="white" ) {
        ?>
            <select class="form-control form-control-sm bg-<?php echo $bg_class ?> text-<?php echo $text_color ?> filter-posts" data-post-type="<?php echo $post_type ?>" >
                <option value="new"><?php echo __('Show by: Newest', 'jve'); ?></option>
                <option value="popular"><?php echo __('Most Popular', 'jve'); ?></option>
                <option value="hot"><?php echo __('Hottest', 'jve'); ?></option>
                <option value="video"><?php echo __('Video Posts', 'jve'); ?></option>
            </select>
        <?php
    }

}