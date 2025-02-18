<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

?>

<!-- Header -->
<?php get_header(  );?>

<!-- Navbar -->
<?php get_template_part( 'partials/nav/nav', 'nav' ) ?>
<!-- Page Title -->
<?php get_template_part( 'partials/single/title', 'title' ) ?>
<!-- Content Layout Start -->
<?php get_template_part( 'partials/single/content-layout-start', 'content-layout-start' ) ?>
<!-- Main Content -->
<?php get_template_part( 'partials/single/main-content', 'main-content' ) ?>
<!-- Sidebar -->
<?php get_template_part( 'partials/single/sidebar', 'sidebar' ) ?>
<!-- Content Layout End -->
<?php get_template_part( 'partials/single/content-layout-end', 'content-layout-end' ) ?>

<!-- Footer -->
<?php get_footer(  ); ?>