<?php

function luke_theme_support(){
    // Adds dynamic title tag support
    add_theme_support('title-tag');
    // for dynamic custom logo
    add_theme_support('custom-logo');
    // for custom post thumbnails
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'luke_theme_support');

// adds the dynamic menu
function luke_menus(){

    $locations = array(
        'primary' => "Desktop Primary Left Sidebar",
        'footer' => "Footer Menu Items"
    );

    register_nav_menus($locations);
}

add_action('init', 'luke_menus');

// adds all the styles and cdns for styles
function luke_register_styles(){
    $version = wp_get_theme()->get('Version');
    wp_enqueue_style('luke-style', get_template_directory_uri() . "/style.css", array('followandrew-bootstrap'), $version, 'all');
    wp_enqueue_style('luke-bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css", array(), '4.4.1', 'all');
    wp_enqueue_style('luke-fontawesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css", array(), '5.13.0', 'all');

}

add_action('wp_enqueue_scripts', 'luke_register_styles');

//adds all the scripts for javascript 
function luke_register_scripts(){

    wp_enqueue_script('luke-jquery', "https://code.jquery.com/jquery-3.4.1.slim.min.js", array(), '3.4.1', true);
    wp_enqueue_script('luke-popper', "https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js", array(), '1.16.0', true);
    wp_enqueue_script('luke-bootstrap',"https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js", array(), '4.4.1', true);
    wp_enqueue_script('luke-main',get_template_directory_uri()."/assets/js/main.js", array(), '1.0', true);

}

add_action('wp_enqueue_scripts', 'luke_register_scripts');


function luke_widget_areas(){
    
    register_sidebar(
        array(
            'before_title' => '',
            'after_title' => '',
            'before_widget' => '<ul class="social-list list-inline py-3 mx-auto">',
            'after_widget' => '</ul>',
        ),
        array(
            'name' => 'Sidebar Area',
            'id' => 'sidebar-1',
            'description' => 'Sidebar Widget'
        )
    );
}

add_action('widgets_init', 'luke_widget_areas');

    ?>