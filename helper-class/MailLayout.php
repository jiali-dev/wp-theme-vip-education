<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

class MailLayout {

    public static function jve_contact_layout( $fullname, $title, $email, $message ) {

        ?>
        <?php ob_start(); ?>
            <html>
                <head>
                    <style>
                    /* Include the styles here */
                    body { font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f7f7f7; }
                    .email-container { width: 100%; max-width: 600px; margin: 0 auto; background-color: #ffffff; padding: 20px; border: 1px solid #e1e1e1; }
                    .email-header { background-color: #4CAF50; color: white; padding: 10px; text-align: center; font-size: 24px; }
                    .email-body { padding: 20px; color: #333333; line-height: 1.6; }
                    .email-footer { text-align: center; padding: 10px; font-size: 12px; color: #777777; background-color: #f0f0f0; border-top: 1px solid #e1e1e1; }
                    @media only screen and (max-width: 600px) { .email-container { padding: 10px; } .email-header { font-size: 20px; } }
                    </style>
                </head>
                <body>
                    <div class='email-container'>
                        <div class='email-header'>
                            <?php echo $title; ?>
                        </div>
                        <div class='email-body'>
                            <p><?php echo $message; ?></p>
                        </div>
                        <div class='email-footer'>
                            <p><?php echo $fullname ?></p>
                            <p><?php echo $email ?></p>
                        </div>
                    </div>
                </body>
            </html>
        <?php return ob_get_clean(); ?>
       <?php
    }

}