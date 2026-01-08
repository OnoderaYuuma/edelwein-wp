<?php
function edelwein_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_image_size('page_eyecatch', 1100, 610, true);
    register_nav_menu('main-menu', 'メインメニュー');

    // ▼ ブロックエディターの標準スタイルを有効化（文字色などが反映されるようになります）
    add_theme_support( 'wp-block-styles' );

    // ▼ 「全幅」「幅広」画像の配置オプションを有効化
    add_theme_support( 'align-wide' );
    
    // ▼ 埋め込みコンテンツ（YouTube等）のレスポンシブ対応
    add_theme_support( 'responsive-embeds' );
}
add_action('after_setup_theme', 'edelwein_theme_setup');

function edelwein_enqueue_scripts() {
    // リセットCSS
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
        ['destyle'], 
        filemtime(get_template_directory() . '/assets/css/style.css') 
    );
}
add_action('wp_enqueue_scripts', 'edelwein_enqueue_scripts');