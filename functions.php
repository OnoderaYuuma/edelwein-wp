<?php
function edelwein_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_image_size('page_eyecatch', 1100, 610, true);
    register_nav_menu('main-menu', 'メインメニュー');
}
add_action('after_setup_theme', 'edelwein_theme_setup');

function edelwein_enqueue_scripts() {
    // リセットCSS (destyle.css) を先に読み込む
    wp_enqueue_style(
        'destyle', 
        'https://cdn.jsdelivr.net/npm/destyle.css@4.0.1/destyle.min.css', 
        [], 
        null
    );

    wp_enqueue_script('jquery');

    // Google Fonts
    wp_enqueue_style(
        'google-fonts', 
        'https://fonts.googleapis.com/css2?family=Jacques+Francois&family=Sawarabi+Mincho&display=swap', 
        [], 
        null
    );

    // メインスタイルシート
    wp_enqueue_style(
        'main-style', 
        get_template_directory_uri() . '/assets/css/style.css',
        ['destyle'], // destyleに依存させる
        filemtime(get_template_directory() . '/assets/css/style.css') 
    );
}
add_action('wp_enqueue_scripts', 'edelwein_enqueue_scripts');