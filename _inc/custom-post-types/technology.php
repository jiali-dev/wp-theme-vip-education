<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

function vip_education_register_technology_post_type() {
    $labels = array(
        'name'               => 'تکنولوژی',
        'singular_name'      => 'تکنولوژی',
        'menu_name'          => 'تکنولوژی',
        'name_admin_bar'     => 'تکنولوژی',
        'add_new'            => 'افزودن جدید',
        'add_new_item'       => 'افزودن اخبار تکنولوژی جدید',
        'new_item'           => 'تکنولوژی جدید',
        'edit_item'          => 'ویرایش تکنولوژی',
        'view_item'          => 'مشاهده تکنولوژی',
        'all_items'          => 'همه تکنولوژی‌ها',
        'search_items'       => 'جستجوی تکنولوژی',
        'not_found'          => 'موردی یافت نشد',
        'not_found_in_trash' => 'در زباله‌دان پیدا نشد'
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

add_action( 'init', 'vip_education_register_technology_post_type' );

//  Technology Category
function vip_education_register_technology_category() {
    $labels = array(
        'name'              => 'دسته‌بندی‌های اخبار تکنولوژی',
        'singular_name'     => 'دسته‌بندی',
        'search_items'      => 'جستجوی دسته‌بندی',
        'all_items'         => 'همه دسته‌بندی‌ها',
        'parent_item'       => 'دسته‌بندی مادر',
        'parent_item_colon' => 'دسته‌بندی مادر:',
        'edit_item'         => 'ویرایش دسته‌بندی',
        'update_item'       => 'به‌روزرسانی دسته‌بندی',
        'add_new_item'      => 'افزودن دسته‌بندی جدید',
        'new_item_name'     => 'نام دسته‌بندی جدید',
        'menu_name'         => 'دسته‌بندی‌',
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

add_action( 'init', 'vip_education_register_technology_category' );

//  Technology Tag
function vip_education_register_technology_tag() {
    $labels = array(
        'name'              => 'برچسب‌های اخبار تکنولوژی',
        'singular_name'     => 'برچسب',
        'search_items'      => 'جستجوی برچسب',
        'popular_items'     => 'برچسب‌های پرکاربرد',
        'all_items'         => 'همه برچسب‌ها',
        'edit_item'         => 'ویرایش برچسب',
        'update_item'       => 'به‌روزرسانی برچسب',
        'add_new_item'      => 'افزودن برچسب جدید',
        'new_item_name'     => 'نام برچسب جدید',
        'separate_items_with_commas' => 'برچسب‌ها را با کاما جدا کنید',
        'add_or_remove_items' => 'افزودن یا حذف برچسب‌ها',
        'menu_name'         => 'برچسب‌',
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

add_action( 'init', 'vip_education_register_technology_tag' );

