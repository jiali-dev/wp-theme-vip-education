<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

?>

<!-- Author Detail -->
<div class="article_detail_wrapss single_article_wrap format-standard">	
    <div class="article_posts_thumb">
        <span class="img">
            <?php echo get_avatar( get_the_author_meta( 'email' ), 128,'', get_the_author_meta( 'display_name' )) ?>
        </span>
        <h3 class="pa-name"><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" ><?php echo get_the_author_meta( 'display_name' ) ?></a></h3>
        <ul class="social-links">
            <?php if( get_the_author_meta( 'facebook' )): ?>
                <li><a href="<?php echo get_the_author_meta( 'facebook' ) ?>"><i class="fab fa-facebook-f"></i></a></li>
            <?php endif; ?>
            <?php if( get_the_author_meta( 'twitter' )): ?>
                <li><a href="<?php echo get_the_author_meta( 'twitter' ) ?>"><i class="fab fa-twitter"></i></a></li>
            <?php endif; ?>
            <?php if( get_the_author_meta( 'behance' )): ?>
                <li><a href="<?php echo get_the_author_meta( 'behance' ) ?>"><i class="fab fa-behance"></i></a></li>
            <?php endif; ?>
            <?php if( get_the_author_meta( 'youtube' )): ?>
                <li><a href="<?php echo get_the_author_meta( 'youtube' ) ?>"><i class="fab fa-youtube"></i></a></li>
            <?php endif; ?>
            <?php if( get_the_author_meta( 'linkedin' )): ?>
                <li><a href="<?php echo get_the_author_meta( 'linkedin' ) ?>"><i class="fab fa-linkedin-in"></i></a></li>
            <?php endif; ?>
        </ul>
        <p class="pa-text"><?php echo get_the_author_meta( 'description' ) ?></p>
    </div>
    
</div>