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

    // Google Fonts
    wp_enqueue_style(
        'google-fonts', 
        'https://fonts.googleapis.com/css2?family=Jacques+Francois&family=Sawarabi+Mincho&display=swap', 
        [], 
        null
    );

    wp_enqueue_style(
        'main-style', 
        get_template_directory_uri() . '/assets/css/style.css',
        [], 
        filemtime(get_template_directory() . '/assets/css/style.css') 
    );
    
}
add_action('wp_enqueue_scripts', 'edelwein_enqueue_scripts');

// function edelwein_category_card_footer_color() {
//     if (is_single() && in_category('')) {
//         $categories = get_the_category();
//         if (!empty($categories)) {
//             $category = $categories[0];
//             $category_slug = $category->slug;
            
//             $colors = [
//                 'edelwein-support' => '#B8A36C',
//                 'glass' => '#C4F6FA',
//                 'hotel' => '#FFF61B',
//                 'restaurant' => '#C12B72',
//                 'others' => '#1A535C',
//             ];
            
//             $color = $colors[$category_slug] ?? '#333333';
            
//             echo '<style>.news-card-footer { background-color: ' . esc_attr($color) . '; }</style>';
//         }
//     }
// }
// add_action('wp_head', 'edelwein_category_card_footer_color');