<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

?>

<!-- Single blog Grid -->
<div class="col-lg-4 col-md-12 col-sm-12 col-12">

    <!-- Add single sidebar -->
    <?php get_sidebar( 'single' ); ?>

    <!-- Tags -->
    <?php get_template_part( 'partials/single/_sidebar-tags', 'tags' ) ?>

</div>