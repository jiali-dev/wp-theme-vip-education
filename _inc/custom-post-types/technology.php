<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

function jve_register_technology_post_type() {
    $labels = array(
        'name'               => __('Technology', 'jve'),
        'singular_name'      => __('Technology', 'jve'),
        'menu_name'          => __('Technology', 'jve'),
        'name_admin_bar'     => __('Technology', 'jve'),
        'add_new'            => __('Add New', 'jve'),
        'add_new_item'       => __('Add New Technology News', 'jve'),
        'new_item'           => __('New Technology', 'jve'),
        'edit_item'          => __('Edit Technology', 'jve'),
        'view_item'          => __('View Technology', 'jve'),
        'all_items'          => __('All Technologies', 'jve'),
        'search_items'       => __('Search Technology', 'jve'),
        'not_found'          => __('No items found', 'jve'),
        'not_found_in_trash' => __('No items found in Trash', 'jve')
    );
    

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'technology' ), // You can change the slug
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-lightbulb', // Icon in admin panel
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
        'show_in_rest'       => true, // Enable Gutenberg editor
    );

    register_post_type( 'technology', $args );
}

add_action( 'init', 'jve_register_technology_post_type' );

//  Technology Category
function jve_register_technology_category() {
    $labels = array(
        'name'              => __('Technology News Categories', 'jve'),
        'singular_name'     => __('Category', 'jve'),
        'search_items'      => __('Search Categories', 'jve'),
        'all_items'         => __('All Categories', 'jve'),
        'parent_item'       => __('Parent Category', 'jve'),
        'parent_item_colon' => __('Parent Category:', 'jve'),
        'edit_item'         => __('Edit Category', 'jve'),
        'update_item'       => __('Update Category', 'jve'),
        'add_new_item'      => __('Add New Category', 'jve'),
        'new_item_name'     => __('New Category Name', 'jve'),
        'menu_name'         => __('Categories', 'jve'),
    );
    

    $args = array(
        'hierarchical'      => true, // Works like post categories
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'technology-category' ),
        'show_in_rest'      => true,
    );

    register_taxonomy( 'technology_category', array( 'technology' ), $args );
}

add_action( 'init', 'jve_register_technology_category' );

//  Technology Tag
function jve_register_technology_tag() {
    $labels = array(
        'name'                       => __('Technology News Tags', 'jve'),
        'singular_name'              => __('Tag', 'jve'),
        'search_items'               => __('Search Tags', 'jve'),
        'popular_items'              => __('Popular Tags', 'jve'),
        'all_items'                  => __('All Tags', 'jve'),
        'edit_item'                  => __('Edit Tag', 'jve'),
        'update_item'                => __('Update Tag', 'jve'),
        'add_new_item'               => __('Add New Tag', 'jve'),
        'new_item_name'              => __('New Tag Name', 'jve'),
        'separate_items_with_commas' => __('Separate tags with commas', 'jve'),
        'add_or_remove_items'        => __('Add or remove tags', 'jve'),
        'menu_name'                  => __('Tags', 'jve'),
    );
    

    $args = array(
        'hierarchical'      => false, // Works like post tags
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'technology-tag' ),
        'show_in_rest'      => true,
    );

    register_taxonomy( 'technology_tag', array( 'technology' ), $args );
}

add_action( 'init', 'jve_register_technology_tag' );

