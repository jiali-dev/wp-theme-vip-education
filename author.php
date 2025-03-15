<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

?>


<!-- Header -->
<?php get_header(  );?>
<!-- Navbar -->
<?php get_template_part( 'partials/nav/nav', 'nav' ) ?>
<!-- Page Title -->
<?php get_template_part( 'partials/author/title', 'title' ) ?>
<!-- Page Posts -->
<?php get_template_part( 'partials/author/posts', 'posts' ) ?>
<!-- Footer -->
<?php get_footer(  ); ?>