<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// Register Meta Box
function jve_add_meta_box() {
    add_meta_box(
        'jve_more_settings',          // ID of the meta box
        __( 'Extra Settings', 'jve'),                        // Title of the meta box
        'jve_meta_box_callback',   // Callback function
        array( 'post', 'technology' ),                              // Screen (Post type)
        'normal',                              // Context (normal, side, advanced)
        'default'                            // Priority (default, high, low)
    );
}
add_action('add_meta_boxes', 'jve_add_meta_box');

// Meta Box Callback Function
function jve_meta_box_callback($post) {
    
    // Retrieve the current value of the meta field
    $level = get_post_meta($post->ID, '_jve_post_level', true);
    
    // Retrieve the current value of the meta field
    $cat = get_post_meta($post->ID, '_jve_post_cat', true);
    
    // Retrieve the current value of the meta field
    $entity = get_post_meta($post->ID, '_jve_post_entity', true);
    
    // Add a nonce field for security
    wp_nonce_field('jve_save_meta_box_data', 'jve_meta_box_nonce');
    ?>
    <!-- Meta box form field -->
    <label for="jve_post_level"><?php _e( 'Article level', 'jve' ) ?></label>
    <br>
    <select name="jve_post_level" id="jve_post_level" >
        <option><?php _e( 'Article level', 'jve' ) ?></option>
        <option value="1" <?php selected( $level, '1' ) ?>> <?php _e( 'Basic', 'jve' ) ?> </option>
        <option value="2" <?php selected( $level, '2' ) ?>> <?php _e( 'Intermediate', 'jve' ) ?> </option>
        <option value="3" <?php selected( $level, '3' ) ?>> <?php _e( 'Advanced', 'jve' ) ?> </option>
    </select>
    <br>
    <label for="jve_post_cat"><?php _e( 'Category', 'jve' ) ?></label>
    <br>
    <?php wp_dropdown_categories( array(
        'name' => 'jve_post_cat',
        'show_option_none' => __( 'Category', 'jve' ),
        'selected' => $cat,
        'taxonomy' => ( get_post_type(  ) != 'post' ? get_post_type(  ).'_' : '' ) . 'category',
    ) ) ?>
    <br>
    <label for="jve_post_entity"><?php _e( 'Article entity', 'jve' ) ?></label>
    <br>
    <select name="jve_post_entity" id="jve_post_entity" >
        <option><?php _e( 'Article entity', 'jve' ) ?></option>
        <option value="text" <?php selected( $entity, 'text' ) ?>><?php _e( 'Text', 'jve' ) ?></option>
        <option value="video" <?php selected( $entity, 'video' ) ?>><?php _e( 'Video', 'jve' ) ?></option>
        <option value="audio" <?php selected( $entity, 'audio' ) ?>><?php _e( 'Audio', 'jve' ) ?></option>
    </select>
    <?php 
}

// Save Meta Box Data
function jve_save_meta_box_data($post_id) {
    
    // Check if our nonce is set
    if (!isset($_POST['jve_meta_box_nonce'])) {
        return;
    }

    // Verify that the nonce is valid
    if (!wp_verify_nonce($_POST['jve_meta_box_nonce'], 'jve_save_meta_box_data')) {
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
    if (isset($_POST['jve_post_level'])) {
        $sanitized_value = intval($_POST['jve_post_level']);
        update_post_meta($post_id, '_jve_post_level', $sanitized_value);
    }
    // Check if the field is set and sanitize the input
    if (isset($_POST['jve_post_cat'])) {
        $sanitized_value = intval($_POST['jve_post_cat']);
        update_post_meta($post_id, '_jve_post_cat', $sanitized_value);
    }
    // Check if the field is set and sanitize the input
    if (isset($_POST['jve_post_entity'])) {
        $sanitized_value = sanitize_text_field($_POST['jve_post_entity']);
        update_post_meta($post_id, '_jve_post_entity', $sanitized_value);
    }
}
add_action('save_post', 'jve_save_meta_box_data');
