<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

?>

<!-- Single blog Grid -->
<div class="col-lg-4 col-md-12 col-sm-12 col-12">
    <!-- Searchbard -->
    <?php get_template_part( 'partials/single/_sidebar-searchbard', 'searchbard' ) ?>
    <!-- Categories -->
    <?php get_template_part( 'partials/single/_sidebar-categories', 'categories' ) ?>
    <!-- Trending Posts -->
    <?php get_template_part( 'partials/single/_sidebar-trending-posts', 'trending-posts' ) ?>
    <!-- Tags -->
    <?php get_template_part( 'partials/single/_sidebar-tags', 'tags' ) ?>
</div>