<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

?>

<!-- Header -->
<?php get_header(  );?>

<!-- Navbar -->
<?php get_template_part( 'partials/nav/nav', 'nav' ) ?>
<!-- Hero -->
<?php get_template_part( 'partials/index/hero', 'hero' ) ?>
<!-- Facts -->
<?php get_template_part( 'partials/index/facts', 'facts' ) ?>
<!-- Facts -->
<?php get_template_part( 'partials/index/courses-slider', 'courses-slider' ) ?>
<!-- Posts -->
<?php get_template_part( 'partials/index/posts', 'posts' ) ?>
<!-- Tech Posts -->
<?php get_template_part( 'partials/index/tech-posts', 'tech-posts' ) ?>
<!-- VIP Plans -->
<?php get_template_part( 'partials/index/vip-plans', 'vip-plans' ) ?>

<!-- Footer -->
<?php get_footer(  ); ?>