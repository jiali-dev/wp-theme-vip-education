<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

class SendMail {

    public function __construct() {
        add_action('phpmailer_init', array($this, 'jve_configure_phpmailer'));
    }

    public function jve_configure_phpmailer($phpmailer) {
        $options = get_option('smtp_settings');
        $host = $options['smtp_host'] ?? 'smtp.example.com';
        $auth = $options['smtp_auth'] ? true : false;
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

    public static function jve_send_mail($to, $subject, $message) {
        $headers = ['Content-Type: text/html; charset=UTF-8'];
        return wp_mail($to, $subject, $message, $headers);
    }
}