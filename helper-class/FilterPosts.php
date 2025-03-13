<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

class FilterPosts {
    
    public static function jve_show_filter( $post_type="post", $bg_class="success", $text_color="white" ) {
        ?>
            <select class="form-control form-control-sm bg-<?php echo $bg_class ?> text-<?php echo $text_color ?>" id="filter-posts" data-post-type="<?php echo $post_type ?>" >
                <option value="new">نمایش بر اساس : جدیدترین ها</option>
                <option value="popular">محبوب ترین ها</option>
                <option value="hot">داغ ترین ها</option>
                <option value="video">مطالب ویدئویی</option>
            </select>
        <?php
    }

}