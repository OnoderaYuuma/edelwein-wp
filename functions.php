<?php
function edelwein_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_image_size('page_eyecatch', 1100, 610, true);
    register_nav_menu('main-menu', 'メインメニュー');
    add_theme_support( 'wp-block-styles' );
    add_theme_support( 'align-wide' );
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

    // jQuery (WordPress同梱)
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

    // ▼ 追加：トップへ戻るボタン用のアニメーションJS
    wp_enqueue_script(
        'scroll-top-script',
        get_template_directory_uri() . '/assets/js/script.js', // 次の手順で作るファイル
        [],
        null,
        true // フッターで読み込む
    );
}
add_action('wp_enqueue_scripts', 'edelwein_enqueue_scripts');

// ▼ 追加：全ページのフッター手前に「トップへ戻るボタン」を自動挿入
function add_back_to_top_button() {
    // 画像パスを取得
    $img_src = get_template_directory_uri() . '/assets/img/to-btn.png';
    ?>
    <a href="#" id="back-to-top" class="back-to-top">
        <img src="<?php echo esc_url($img_src); ?>" alt="ページ上部へ戻る">
    </a>
    <?php
}
add_action('wp_footer', 'add_back_to_top_button');