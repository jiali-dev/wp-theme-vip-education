<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

?>

<!-- Onclick Sidebar -->
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div id="filter-sidebar" class="filter-sidebar">
            <div class="filt-head">
                <h4 class="filt-first">جستجوی پیشرفته</h4>
                <a href="javascript:void(0)" class="closebtn">بستن <i class="ti-close"></i></a>
            </div>
            <div class="show-hide-sidebar">

                <!-- Find New Property -->
                <div class="sidebar-widgets">

                    <!-- Search Form -->
                    <form class="form-inline addons mb-3" action="<?php echo home_url() ?>" >
                        <input name="s" class="form-control" type="search" placeholder="جستجو دوره" aria-label="Search">
                        <button class="btn my-2 my-sm-0" type="submit"><i class="ti-search"></i></button>
                    </form>
                    <form id="archive-filter">
                        <h4 class="side_title">دسته بندی ها</h4>
                        <ul class="no-ul-list mb-3">
                            <?php 
                                $categories = get_terms([
                                    'hide_empty' => true,
                                    'taxonomy'   => ['category', 'technology_category'],
                                ]);
                            ?>
                            <?php if( !empty($categories) && !is_wp_error( $categories ) ): ?>
                                <?php foreach( $categories as $cat ): ?>
                                    <li>
                                        <input id="tax_<?php echo $cat->term_id ?>" class="checkbox-custom tax" value="<?php echo $cat->term_id ?>" data-tax="<?php echo $cat->taxonomy ?>" type="checkbox">
                                        <label for="tax_<?php echo $cat->term_id ?>" class="checkbox-custom-label"> <?php echo $cat->name ?> (<?php echo $cat->count ?>) </label>
                                    </li>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <div class="alert alert-info">دسته بندی وجود ندارد!</div>
                            <?php endif; ?>
                        </ul>

                        <h4 class="side_title">نویسندگان</h4>
                        <ul class="no-ul-list mb-3">
                            <?php 
                                $authors = new WP_User_Query(
                                    [
                                        'role__in' => ['administrator', 'editor', 'author']
                                    ]
                                );
                            ?>
                            <?php if( !empty($authors) && !is_wp_error( $authors ) ): $authors = $authors->get_results(); ?>
                                <?php foreach( $authors as $author ): ?>
                                    <li>
                                        <input id="author_<?php echo $author->ID ?>" class="checkbox-custom author" value="<?php echo $author->ID ?>" type="checkbox" >
                                        <label for="author_<?php echo $author->ID ?>" class="checkbox-custom-label"><?php echo $author->display_name ?></label>
                                    </li>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <div class="alert alert-info">نویسنده ای وجود ندارد!</div>
                            <?php endif; ?>
                        </ul>

                        <h4 class="side_title">نوع دوره</h4>
                        <ul class="no-ul-list mb-3">
                            <?php $post_entities = [ 'text' => 'متن', 'video' => 'ویدئو', 'audio' => 'صدا']; ?>
                            <?php foreach( $post_entities as $key => $val ): ?>
                                <li>
                                    <input id="<?php echo $key ?>" class="checkbox-custom entity" name="post_entity"  value="<?php echo $key ?>" type="radio">
                                    <label for="<?php echo $key ?>" class="checkbox-custom-label" ><?php echo $val ?></label>
                                </li>
                            <?php endforeach; ?>
                        </ul>

                        <button class="btn btn-theme full-width mb-2" type="submit" >فیلتر</button>
                    </form>
                </div>

            </div>
    </div>
    </div>
</div>