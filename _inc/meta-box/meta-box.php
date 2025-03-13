<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// Register Meta Box
function vip_education_add_meta_box() {
    add_meta_box(
        'vip_education_more_settings',          // ID of the meta box
        'تنظیمات اضافه',                        // Title of the meta box
        'vip_education_meta_box_callback',   // Callback function
        array( 'post', 'technology' ),                              // Screen (Post type)
        'normal',                              // Context (normal, side, advanced)
        'default'                            // Priority (default, high, low)
    );
}
add_action('add_meta_boxes', 'vip_education_add_meta_box');

// Meta Box Callback Function
function vip_education_meta_box_callback($post) {
    
    // Retrieve the current value of the meta field
    $level = get_post_meta($post->ID, '_vip_education_post_level', true);
    
    // Retrieve the current value of the meta field
    $cat = get_post_meta($post->ID, '_vip_education_post_cat', true);
    
    // Retrieve the current value of the meta field
    $entity = get_post_meta($post->ID, '_vip_education_post_entity', true);
    
    // Add a nonce field for security
    wp_nonce_field('vip_education_save_meta_box_data', 'vip_education_meta_box_nonce');
    ?>
    <!-- Meta box form field -->
    <label for="vip_education_post_level">انتخاب سطح مقاله</label>
    <br>
    <select name="vip_education_post_level" id="vip_education_post_level" >
        <option>... انتخاب سطح مقاله</option>
        <option value="1" <?php selected( $level, '1' ) ?>>مقدماتی</option>
        <option value="2" <?php selected( $level, '2' ) ?>>متوسط</option>
        <option value="3" <?php selected( $level, '3' ) ?>>پیشرفته</option>
    </select>
    <br>
    <label for="vip_education_post_cat">انتخاب دسته بندی</label>
    <br>
    <?php wp_dropdown_categories( array(
        'name' => 'vip_education_post_cat',
        'show_option_none' => 'انتخاب دسته بندی',
        'selected' => $cat,
        'taxonomy' => ( get_post_type(  ) != 'post' ? get_post_type(  ).'_' : '' ) . 'category',
    ) ) ?>
    <br>
    <label for="vip_education_post_entity">انتخاب سطح مقاله</label>
    <br>
    <select name="vip_education_post_entity" id="vip_education_post_entity" >
        <option>... انتخاب نوع مقاله</option>
        <option value="1" <?php selected( $entity, '1' ) ?>>متن</option>
        <option value="2" <?php selected( $entity, '2' ) ?>>ویدئو</option>
        <option value="3" <?php selected( $entity, '3' ) ?>>صدا</option>
    </select>
    <?php 
}

// Save Meta Box Data
function vip_education_save_meta_box_data($post_id) {
    
    // Check if our nonce is set
    if (!isset($_POST['vip_education_meta_box_nonce'])) {
        return;
    }

    // Verify that the nonce is valid
    if (!wp_verify_nonce($_POST['vip_education_meta_box_nonce'], 'vip_education_save_meta_box_data')) {
        return;
    }

    // Check if this is an autosave, avoid overwriting
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Check user permissions (optional but recommended)
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // Check if the field is set and sanitize the input
    if (isset($_POST['vip_education_post_level'])) {
        $sanitized_value = intval($_POST['vip_education_post_level']);
        update_post_meta($post_id, '_vip_education_post_level', $sanitized_value);
    }
    // Check if the field is set and sanitize the input
    if (isset($_POST['vip_education_post_cat'])) {
        $sanitized_value = intval($_POST['vip_education_post_cat']);
        update_post_meta($post_id, '_vip_education_post_cat', $sanitized_value);
    }
    // Check if the field is set and sanitize the input
    if (isset($_POST['vip_education_post_entity'])) {
        $sanitized_value = intval($_POST['vip_education_post_entity']);
        update_post_meta($post_id, '_vip_education_post_entity', $sanitized_value);
    }
}
add_action('save_post', 'vip_education_save_meta_box_data');
