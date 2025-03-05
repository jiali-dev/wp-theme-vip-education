<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

class Breadcrumb {
    
    public static function vip_education_get_breadcrumb( ) {
        ?>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo home_url( ) ?>">خانه</a></li>
                <?php if( is_single( ) || is_category( ) || is_archive( ) ): ?>
                    <?php // Retrieve the current value of the meta field
                        $cat = get_post_meta(get_the_ID(  ), '_vip_education_post_cat', true);
                    ?>
                    <li class="breadcrumb-item"><a href="<?php echo get_term_link( intval($cat) ) ?>"><?php echo get_cat_name( $cat ) ?></a></li>
                    <?php if( is_single( ) ): ?>
                        <li class="breadcrumb-item"><?php echo get_the_title(  ) ?></li>
                    <?php endif; ?>
                <?php endif; ?>
            </ol>
        <?php
    }

}