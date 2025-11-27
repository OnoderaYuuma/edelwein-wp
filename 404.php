<?php get_header(); ?>
<main>
    <article>
        <h1>ページが見つかりません</h1>
        <p>お探しのページは移動、もしくは削除された可能性があります。</p>
        <p>サイト内検索、または<a href="<?php echo esc_url(home_url()); ?>">トップページ</a>よりお探し下さい。</p>
        <?php get_search_form() ?>
    </article>
    <?php get_sidebar(); ?>
</main>
<?php get_footer(); ?>