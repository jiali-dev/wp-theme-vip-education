<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

class Breadcrumb {
    
    public static function jve_get_breadcrumb( ) {
        ?>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo home_url( ) ?>"><?php _e( 'Home', 'jve') ?></a></li>
                <?php if( is_single( ) || is_category( ) ): ?>
                    <?php // Retrieve the current value of the meta field
                        $cat = get_post_meta(get_the_ID(  ), '_jve_post_cat', true);
                    ?>
                    <?php if( !empty($cat) & $cat > 0 ): ?>
                        <li class="breadcrumb-item"><a href="<?php echo get_term_link( intval($cat) ) ?>"><?php echo get_cat_name( $cat ) ?></a></li>
                    <?php endif; ?>
                    <?php if( is_single( ) ): ?>
                        <li class="breadcrumb-item"><?php echo get_the_title(  ) ?></li>
                    <?php endif; ?>
                <?php elseif( is_page( ) ): ?>
                    <li class="breadcrumb-item"><?php echo get_the_title(  ) ?></li>
                <?php elseif( is_search( ) ): ?>
                    <li class="breadcrumb-item">جستجوی:‌ <?php echo the_search_query(  ) ?></li>
                <?php elseif( is_archive( ) ): ?>
                    <li class="breadcrumb-item"><?php echo get_the_archive_title(  ) ?></li>
                <?php endif; ?>
            </ol>
        <?php
    }

}