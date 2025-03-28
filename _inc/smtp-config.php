<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

function jve_smtp_menu() {
    add_menu_page(
        __( 'SMTP Settings', 'jve' ),                // Page Title
        __( 'SMTP Settings', 'jve' ),                // Menu Title
        'manage_options',               // Capability
        'smtp-settings',                // Menu Slug
        'jve_smtp_settings_page',           // Callback Function to display the page
        'dashicons-email',              // Icon
        20                               // Position
    );
}
add_action('admin_menu', 'jve_smtp_menu');

function jve_smtp_settings_page() {
    ?>
    <div class="wrap">
        <h1><?php _e( 'SMTP Settings', 'jve' ); ?></h1>
        <form method="post" action="options.php">
            <?php
                // Output nonce, action, and settings fields
                settings_fields( 'smtp_settings_group' );
                do_settings_sections( 'smtp-settings' );
                submit_button(  __( 'Save Settings', 'jve' ) );
            ?>
        </form>
    </div>
    <?php
}

function jve_smtp_settings_init() {
    // Register the settings
    register_setting(
        'smtp_settings_group',  // Option group
        'smtp_settings'         // Option name
    );

    // Add settings section
    add_settings_section(
        'smtp_settings_section',    // Section ID
        'SMTP Settings',            // Section Title
        'jve_smtp_settings_section_cb', // Section Callback
        'smtp-settings'             // Settings page
    );

    // Add fields for Host, SMTPAuth, Port, Username, and Password
    add_settings_field(
        'smtp_host',                // Field ID
        'SMTP Host',                // Field Title
        'jve_smtp_host_field_cb',       // Field Callback
        'smtp-settings',            // Settings page
        'smtp_settings_section'     // Section
    );

    add_settings_field(
        'smtp_auth',                // Field ID
        'SMTP Authentication',      // Field Title
        'jve_smtp_auth_field_cb',       // Field Callback
        'smtp-settings',            // Settings page
        'smtp_settings_section'     // Section
    );

    add_settings_field(
        'smtp_port',                // Field ID
        'SMTP Port',                // Field Title
        'jve_smtp_port_field_cb',       // Field Callback
        'smtp-settings',            // Settings page
        'smtp_settings_section'     // Section
    );

    add_settings_field(
        'smtp_username',            // Field ID
        'SMTP Username',            // Field Title
        'jve_smtp_username_field_cb',   // Field Callback
        'smtp-settings',            // Settings page
        'smtp_settings_section'     // Section
    );

    add_settings_field(
        'smtp_password',            // Field ID
        'SMTP Password',            // Field Title
        'jve_smtp_password_field_cb',   // Field Callback
        'smtp-settings',            // Settings page
        'smtp_settings_section'     // Section
    );

    add_settings_field(
        'smtp_email',            // Field ID
        'Email To',            // Field Email
        'jve_smtp_email_field_cb',   // Field Callback
        'smtp-settings',            // Settings page
        'smtp_settings_section'     // Section
    );
}
add_action( 'admin_init', 'jve_smtp_settings_init' );

// Callback for the settings section description
function jve_smtp_settings_section_cb() {
    echo 'Configure your SMTP settings below.';
}

// Callback for the SMTP Host field
function jve_smtp_host_field_cb() {
    $options = get_option('smtp_settings');
    echo '<input type="text" name="smtp_settings[smtp_host]" value="' . esc_attr($options['smtp_host'] ?? '') . '" class="regular-text">';
}

// Callback for the SMTP Authentication field
function jve_smtp_auth_field_cb() {
    $options = get_option('smtp_settings');
    $checked = isset($options['smtp_auth']) && $options['smtp_auth'] ? 'checked' : '';
    echo '<input type="checkbox" name="smtp_settings[smtp_auth]" value="1" ' . $checked . '> Enable SMTP Authentication';
}

// Callback for the SMTP Port field
function jve_smtp_port_field_cb() {
    $options = get_option('smtp_settings');
    echo '<input type="number" name="smtp_settings[smtp_port]" value="' . esc_attr($options['smtp_port'] ?? '587') . '" class="small-text">';
}

// Callback for the SMTP Username field
function jve_smtp_username_field_cb() {
    $options = get_option('smtp_settings');
    echo '<input type="text" name="smtp_settings[smtp_username]" value="' . esc_attr($options['smtp_username'] ?? '') . '" class="regular-text">';
}

// Callback for the SMTP Password field
function jve_smtp_password_field_cb() {
    $options = get_option('smtp_settings');
    echo '<input type="password" name="smtp_settings[smtp_password]" value="' . esc_attr($options['smtp_password'] ?? '') . '" class="regular-text">';
}

// Callback for the SMTP Password field
function jve_smtp_email_field_cb() {
    $options = get_option('smtp_settings');
    echo '<input type="email" name="smtp_settings[smtp_email]" value="' . esc_attr($options['smtp_email'] ?? '') . '" class="regular-text">';
}


