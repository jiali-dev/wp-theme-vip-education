<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

class SendMail {
    
    // Constructor to hook into 'phpmailer_init'
    public function __construct() {
        // Hook into phpmailer_init to modify email settings
        add_action('phpmailer_init', array($this, 'jve_configure_phpmailer'));
    }

    // Method to configure PHPMailer settings before sending the email
    public function jve_configure_phpmailer( $phpmailer ) {
        $options = get_option('smtp_settings');
        $host = $options['smtp_host'] ?? 'smtp.example.com';
        $auth = isset($options['smtp_auth']) ? true : false;
        $port = $options['smtp_port'] ?? 587;
        $username = $options['smtp_username'] ?? '';
        $password = $options['smtp_password'] ?? '';

        $phpmailer->isSMTP();
        $phpmailer->Host = $host;
        $phpmailer->SMTPAuth = $auth;
        $phpmailer->Port = $port;
        $phpmailer->Username = $username;
        $phpmailer->Password = $password;
    }

    public static function jve_send_mail( $to, $subject, $message ) {

        $headers = array(
            'Content-Type: text/html; charset=UTF-8',
        );

        // Sending the email using wp_mail() function
        $mail_sent = wp_mail( $to, $subject, $message, $headers );

        if ($mail_sent) {
            return true; // Email sent successfully
        } else {
            return false; // Email failed to send
        }
    }

}