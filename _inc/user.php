<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// User social fields form
function jve_user_social_fields($user) { ?>
    <h3><?php _e( 'Menu for the top of the site', 'jve' ) ?></h3>
    <table class="form-table">
        <tr>
            <th><label for="twitter"><?php _e( 'Twitter', 'jve' ) ?></label></th>
            <td>
                <input type="text" name="twitter" id="twitter" value="<?php echo esc_attr(get_the_author_meta('twitter', $user->ID)); ?>" class="regular-text" />
            </td>
        </tr>
        <tr>
            <th><label for="facebook"><?php _e( 'Facebook', 'jve' ) ?></label></th>
            <td>
                <input type="text" name="facebook" id="facebook" value="<?php echo esc_attr(get_the_author_meta('facebook', $user->ID)); ?>" class="regular-text" />
            </td>
        </tr>
        <tr>
            <th><label for="behance"><?php _e( 'Behance', 'jve' ) ?></label></th>
            <td>
                <input type="text" name="behance" id="behance" value="<?php echo esc_attr(get_the_author_meta('behance', $user->ID)); ?>" class="regular-text" />
            </td>
        </tr>
        <tr>
            <th><label for="youtube"><?php _e( 'Youtube', 'jve' ) ?></label></th>
            <td>
                <input type="text" name="youtube" id="youtube" value="<?php echo esc_attr(get_the_author_meta('youtube', $user->ID)); ?>" class="regular-text" />
            </td>
        </tr>
        <tr>
            <th><label for="linkedin"><?php _e( 'Linkedin', 'jve' ) ?></label></th>
            <td>
                <input type="text" name="linkedin" id="linkedin" value="<?php echo esc_attr(get_the_author_meta('linkedin', $user->ID)); ?>" class="regular-text" />
            </td>
        </tr>
    </table>
<?php }
add_action('show_user_profile', 'jve_user_social_fields');
add_action('edit_user_profile', 'jve_user_social_fields');

// Save user social fields
function jve_save_user_social_fields($user_id) {
    if (!current_user_can('edit_user', $user_id)) {
        return false;
    }
    
    update_user_meta($user_id, 'facebook', sanitize_text_field($_POST['facebook']));
    update_user_meta($user_id, 'twitter', sanitize_text_field($_POST['twitter']));
    update_user_meta($user_id, 'behance', sanitize_text_field($_POST['behance']));
    update_user_meta($user_id, 'youtube', sanitize_text_field($_POST['youtube']));
    update_user_meta($user_id, 'linkedin', sanitize_text_field($_POST['linkedin']));
}
add_action('personal_options_update', 'jve_save_user_social_fields');
add_action('edit_user_profile_update', 'jve_save_user_social_fields');

// User career fields form
function jve_user_career_fields($user) { ?>
    <h3><?php _e( 'Job Position', 'jve' ) ?></h3>
    <table class="form-table">
        <tr>
            <th><label for="career"><?php _e( 'Job', 'jve' ) ?></label></th>
            <td>
                <input type="text" name="career" id="career" 
                       value="<?php echo esc_attr(get_user_meta($user->ID, 'career', true)); ?>" 
                       class="regular-text" />
                <p class="description"><?php _e( 'Write your job', 'jve' ) ?></p>
            </td>
        </tr>
    </table>
<?php }
add_action('show_user_profile', 'jve_user_career_fields');
add_action('edit_user_profile', 'jve_user_career_fields');

// Save user career
function jve_save_user_creer_fields($user_id) {
    if (!current_user_can('edit_user', $user_id)) {
        return false;
    }
    update_user_meta($user_id, 'career', sanitize_text_field($_POST['career']));
}
add_action('personal_options_update', 'jve_save_user_creer_fields');
add_action('edit_user_profile_update', 'jve_save_user_creer_fields');

