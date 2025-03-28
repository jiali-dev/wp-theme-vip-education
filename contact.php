<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

?>

<?php /* Template Name: Contact Us */ ?>
<!-- For Translate -->
<?php __( 'Contact Us', 'jve' ) ?>

<!-- Header -->
<?php get_header(  );?>
<!-- Navbar -->
<?php get_template_part( 'partials/nav/nav', 'nav' ) ?>
<!-- Page Title -->
<?php get_template_part( 'partials/archive/title', 'title' ) ?>
<!-- Main Content -->
<?php get_template_part( 'partials/contact/main-content', 'main-content' ) ?>
<!-- Footer -->
<?php get_footer(  ); ?>