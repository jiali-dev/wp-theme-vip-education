<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

?>

<!DOCTYPE html>
<html <?php language_attributes(  ) ?>>
    <head>
		<meta charset="utf-8" />
		<meta name="author" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />

        <title><?php echo get_bloginfo('name'); ?> | <?php wp_title(''); ?></title>

        <?php wp_head(  ) ?>
    </head>

    <body <?php body_class( 'red-skin ' . (is_single( ) ? 'blog-page' : '') ) ?>>	
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div id="preloader">
            <div class="preloader"><span></span><span></span></div></div>
		
		
        <!-- ============================================================== -->
        <!-- Main wrapper - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <div id="main-wrapper">