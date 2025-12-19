<!-- 固定ページ -->
<?php get_header(); ?>

    <main id="archive">
        <div class="title">
            お知らせ一覧
        </div>
        <?php 
            $sub_args = [
                'post_type' => 'post',
                'posts_per_page' => 9,
                'post_status' => 'publish',

                'paged' => $paged,
            ];

            // サブクエリの実行
            $sub_query = new WP_Query($sub_args);

            // レストラン
            if (isset($_POST['restaurant'])){
                
                $restaurant_args = [
                    'post_type' => 'post',
                    'posts_per_page' => 9,
                    'post_status' => 'publish',
                    'category_name' => 'レストラン ベルンドルフ'
                ];

                $sub_query = new WP_Query($restaurant_args);
            }

            // // ガラス
            if (isset($_POST['glass'])){

                $glass_args = [
                    'post_type' => 'post',
                    'posts_per_page' => 9,
                    'post_status' => 'publish',
                    'category_name' => 'ガラス体験工房 森のくに'
                ];
                $sub_query = new WP_Query($glass_args);
            }
            
            // // ホテル
            if (isset($_POST['hotel'])){
                echo $wp_query->fount_posts;

                $hotel_args = [
                    'post_type' => 'post',
                    'posts_per_page' => 9,
                    'post_status' => 'publish',
                    'category_name' => 'ホテル ベルンドルフ'
                ];
                $sub_query = new WP_Query($hotel_args);
            }

            
            if (isset($_POST['support'])){

                $support_args = [
                    'post_type' => 'post',
                    'posts_per_page' => 9,
                    'post_status' => 'publish',
                    'category_name' => 'エーデルワイン・サポート'
                ];
                $sub_query = new WP_Query($support_args);
            }

        ?>
       


        <form action="#" method="post">
            <div class="filter">
                <button type="submit" name="all" <?php if (isset($_POST['all']) || !isset($_POST['restaurant']) & !isset($_POST['glass']) & !isset($_POST['hotel']) & !isset($_POST['support'])) {echo 'class="is-on"';} ?>>すべて</button>
                <button type="submit" name="restaurant" <?php if (isset($_POST['restaurant'])) {echo 'class="is-on"';} ?>>レストラン ベルンドルフ</button>
                <button type="submit" name="glass" <?php if (isset($_POST['glass'])) {echo 'class="is-on"';} ?>>ガラス体験工房 森のくに</button>
                <button type="submit" name="hotel" <?php if (isset($_POST['hotel'])) {echo 'class="is-on"';} ?>>ホテル ベルンドルフ</button>
                <button type="submit" name="support" <?php if (isset($_POST['support'])) {echo 'class="is-on"';} ?>>エーデルワインサポート</button>
            </div>
        </form>

        <div class="article-boxs">
            <?php
            if($sub_query->have_posts()) :
                while($sub_query->have_posts()):
                    // 記事を取得
                    $sub_query->the_post();
            ?>
            <article>
                <div class="under-color">
                    <div class="article-box">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/restaurant/restaurant.png" alt="画像" class="article-img">
                        <h2 class="article-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <div class="article-info">
                            <time datetime="<?php echo get_the_date('Y-m-d'); ?>" class="article-time"><?php echo get_the_date('Y-m-d'); ?></time>
                            <p class="category"><?php the_category(' '); ?></p>
                        </div>
                        
                    </div>
                </div>
            </article>
            <?php endwhile; ?>
            <?php endif; ?>
        </div>

        <hr><hr>
            <!-- ページネーション -->
                
            <div class="pagination">
                <?php 
                // ページ内に投稿できる数
                $posts_num = get_option('posts_per_page');
                // echo $posts_num;

                // 現在の最大投稿数（投稿全部）
                $count_pages = wp_count_posts();

                // 現在の最大投稿数（選択中のカテゴリ）
                // echo $sub_query->found_posts;

                if ($posts_num < $sub_query->found_posts) {
                    echo paginate_links(array(
                        'base' => get_pagenum_link(1) . '%_%',
                        'format' => 'page/%#%/',
                        'current' => max(1, $paged),
                        'prev_text' => '前のページへ',
                        'next_text' => '次のページへ',
                        'mid_size' => 2,
                        'total' => 2,
                    ));
                }
                wp_reset_postdata();
                ?>
            </div>

    </main>

<?php get_footer(); ?>
