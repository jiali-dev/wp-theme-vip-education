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

<!-- Footer -->
<?php get_footer(  ); ?>