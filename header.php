<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <link rel="stylesheet" media="all" href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/css/header.css"">
    <link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/css/index.css">
    <link rel=" preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sawarabi+Mincho&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Jacques+Francois&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sawarabi+Mincho&display=swap" rel="stylesheet">
    <title>ヘッダー</title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <header>
        <h1><a href="<?php echo esc_url(home_url('')); ?>"><?php bloginfo('name'); ?></a></h1>
        <nav class="nav">
            <a href="#">レストラン</a>
            <a href="#">ガラス体験工房<wbr>森のくに</a>
            <a href="#">ホテル</a>
            <a href="#">お知らせ</a>
            <a href="#">お問い合わせ</a>
        </nav>
    </header>
</body>

</html>