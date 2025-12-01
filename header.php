<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    

    
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <header class="header">
        <h1><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
        <nav class="nav">
            <a href="<?php echo esc_url(home_url('/restaurant')); ?>">レストラン</a>
            <a href="<?php echo esc_url(home_url('/glass')); ?>">ガラス体験工房<wbr>森のくに</a>
            <a href="<?php echo esc_url(home_url('/hotel')); ?>">ホテル</a>
            <a href="<?php echo esc_url(home_url('/news')); ?>">お知らせ</a>
            <a href="<?php echo esc_url(home_url('/contact')); ?>">お問い合わせ</a>
        </nav>
    </header>