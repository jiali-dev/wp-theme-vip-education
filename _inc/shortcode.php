<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

function jve_video_shortcodes($atts, $content = null) {
    // Set default attributes
    $atts = shortcode_atts([
        'src'    => '',
        'poster' => '',
    ], $atts, 'jve-video');

    if (empty($atts['src'])) {
        return '<p class="alert-warning">⚠️ ویدئویی یافت نشد.</p>';
    }

    ob_start(); // Start output buffering
    ?>
    <video class="video-js video-js-free-course" controls preload="auto" width="100%" height="auto" poster="<?php echo esc_url($atts['poster']); ?>">
        <source src="<?php echo esc_url($atts['src']); ?>" type="video/mp4">
        <p class="vjs-no-js alert-warning">
            را مرورگرخود یا و نمایید فعال را خود مرورگر جاوااسکریپت ویدئو این ه
            مشاهد برای : گرامی کاربر
            کنید بروزرسانی
        </p>
    </video>
    <div class="download-link center">
        <a href="<?php echo esc_url($atts['src']); ?>" class="btn btn-success" target="_blank">
            <i class="fa fa-download"></i><span class="mx-2"> دانلود</span>
        </a>
    </div>
    <?php
    return ob_get_clean(); // Return the buffered content
}
add_shortcode( 'jve-video', 'jve_video_shortcodes' );

function jve_quote_shortcodes($atts, $content = null) {
    // Set default attributes
    $atts = shortcode_atts([
        'quote'    => '',
        'quote_owner' => '',
    ], $atts, 'jve-quote');

    ob_start(); // Start output buffering
    ?>
    <blockquote>
        <span class="icon"><i class="fa fa-quote-right"></i></span>
        <p class="text"><?php echo $atts['quote'] ?></p>
        <h5 class="name"><?php echo $atts['quote_owner'] ?></h5>
    </blockquote>
    <?php
    return ob_get_clean(); // Return the buffered content
}
add_shortcode( 'jve-quote', 'jve_quote_shortcodes' );