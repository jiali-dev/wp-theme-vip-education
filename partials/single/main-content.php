<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

?>

<!-- Blog Detail -->
<div class="col-lg-8 col-md-12 col-sm-12 col-12">
    <!-- Article -->
    <?php get_template_part( 'partials/single/_main-content-article', 'article' ) ?>
    <!-- Author -->
    <?php get_template_part( 'partials/single/_main-content-author', 'author' ) ?>
    <!-- Comment -->
    <?php get_template_part( 'partials/single/_main-content-comment', 'comment' ) ?>
</div>