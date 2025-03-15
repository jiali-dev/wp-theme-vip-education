<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// Get the queried author object
global $wp_query;
$auth = $wp_query->get_queried_object();

// Pass $auth to other template parts
set_query_var('auth', $auth);

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