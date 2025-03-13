<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

?>

<!-- Header -->
<?php get_header(  );?>
<!-- Navbar -->
<?php get_template_part( 'partials/nav/nav', 'nav' ) ?>
<!-- Page Title -->
<?php get_template_part( 'partials/archive/title', 'title' ) ?>
<!-- Content Layout Start -->
<?php get_template_part( 'partials/archive/content-layout-start', 'content-layout-start' ) ?>
<!-- Sidebar -->
<?php get_template_part( 'partials/archive/onclick-sidebar', 'onclick-sidebar' ) ?>
<!-- Main Content -->
<?php get_template_part( 'partials/archive/main-content', 'main-content' ) ?>
<!-- Content Layout End -->
<?php get_template_part( 'partials/archive/content-layout-end', 'content-layout-end' ) ?>
<!-- Footer -->
<?php get_footer(  ); ?>