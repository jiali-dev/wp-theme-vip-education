<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

?>

<!-- Header -->
<?php get_header(  );?>

<!-- Navbar -->
<?php get_template_part( 'partials/nav/nav', 'nav' ) ?>
<!-- Hero -->
<?php get_template_part( 'partials/index/hero/hero', 'hero' ) ?>
<!-- Facts -->
<?php get_template_part( 'partials/index/facts/facts', 'facts' ) ?>

<!-- Footer -->
<?php get_footer(  ); ?>