<?php
function edelwein_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_image_size('page_eyecatch', 1100, 610, true);
    register_nav_menu('main-menu', 'メインメニュー');
}
add_action('after_setup_theme', 'edelwein_theme_setup');
function edelwein_enqueue_scripts() {
    wp_enqueue_script('jquery');

    wp_enqueue_style(
        'google-fonts', 
        'https://fonts.googleapis.com/css2?family=Jacques+Francois&family=Sawarabi+Mincho&display=swap', 
        [], 
        null
    );
    wp_enqueue_style(
        'main-style', 
        get_stylesheet_uri()
    );

    wp_enqueue_style(
        'header-css', 
        get_template_directory_uri() . '/assets/css/header.css', 
        [], 
    );
    wp_enqueue_style(
        'index-css', 
        get_template_directory_uri() . '/assets/css/index.css', 
        [], 
    );
}
add_action('wp_enqueue_scripts', 'edelwein_enqueue_scripts');
