<?php

// Enqueuing
function load_css()
{

    wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', [], 1, 'all');
    wp_enqueue_style('bootstrap');

    wp_register_style('main', get_template_directory_uri() . '/css/main.css', [], 1, 'all');
    wp_enqueue_style('main');

}
add_action('wp_enqueue_scripts', 'load_css');

function load_js()
{
    wp_enqueue_script('jquery');

    wp_register_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', ['jquery'], 1, true);
    wp_enqueue_script('bootstrap');
}
add_action('wp_enqueue_scripts', 'load_js');


// Nav Menus
register_nav_menus( array(
    'top-menu' => __( 'Top Menu', 'theme' ),
    'footer-menu' => __( 'Footer Menu', 'theme' ),
) );

// Theme Support
add_theme_support('menus');
add_theme_support( 'post-thumbnails' );

// Image Sizes
add_image_size('small', 600, 600, false);
add_image_size('custom_hero_size', 1200, 600, true);


// post type for my admin sidebar 
function my_custom_post_type () {
    $args = array(

        'labels' => array(
            'name' => 'Cars',
            'singular_name' => 'Car',
            'menu_name' => 'Cars',
            'add_new_item' => 'Add New Car',
        ),

        // hierarchical true means to set the post type as a page false means a post. For this instance, I set it as a page to fit what i need it for  
        'hierarchical' => true,
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-car',
        
        'supports' => array('title', 'editor', 'thumbnail'), // i want users to edit everything in the admin
    );

    register_post_type('cars', $args);
}
add_action('init', 'my_custom_post_type');

// creating a taxonomy for the post type 
function my_custom_taxonomy () {
    $args = array(

        'labels' => array(
            'name' => 'Brands',
            'singular_name' => 'Brand',
            'menu_name' => 'Brands',
            'add_new_item' => 'Add New Brand',
        ),
        'hierarchical' => true, // i need you to act like a category. True means category and false is a tag
        'public' => true,
    );

    // i register it and attach it to the cars post type. it is for it. then i pass the args 
    register_taxonomy('brands', array('cars'), $args);
}
add_action('init', 'my_custom_taxonomy');



// enabled options page for ACF 
// if (function_exists('acf_add_options_page')) {
//     acf_add_options_page();
// }
