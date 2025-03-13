<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// User social fields form
function jve_user_social_fields($user) { ?>
    <h3>شبکه های اجتماعی</h3>
    <table class="form-table">
        <tr>
            <th><label for="twitter">توئیتر</label></th>
            <td>
                <input type="text" name="twitter" id="twitter" value="<?php echo esc_attr(get_the_author_meta('twitter', $user->ID)); ?>" class="regular-text" />
            </td>
        </tr>
        <tr>
            <th><label for="facebook">فیسبوک</label></th>
            <td>
                <input type="text" name="facebook" id="facebook" value="<?php echo esc_attr(get_the_author_meta('facebook', $user->ID)); ?>" class="regular-text" />
            </td>
        </tr>
        <tr>
            <th><label for="behance">بیهانس</label></th>
            <td>
                <input type="text" name="behance" id="behance" value="<?php echo esc_attr(get_the_author_meta('behance', $user->ID)); ?>" class="regular-text" />
            </td>
        </tr>
        <tr>
            <th><label for="youtube">یوتیوب</label></th>
            <td>
                <input type="text" name="youtube" id="youtube" value="<?php echo esc_attr(get_the_author_meta('youtube', $user->ID)); ?>" class="regular-text" />
            </td>
        </tr>
        <tr>
            <th><label for="linkedin">لینکدین</label></th>
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

