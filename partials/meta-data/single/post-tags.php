<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

$post_tags = get_the_tags();

?>

<!-- Post Tags -->

<div class="post-tags">
    <h4 class="pbm-title">تگ های پربازدید</h4>
    <?php if( $post_tags ): ?>
        <ul class="list">
            <?php foreach( $post_tags as $tag ): ?>
                <li><a href="<?php echo get_tag_link( $tag->term_id ) ?>"><?php echo $tag->name ?></a></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>