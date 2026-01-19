<?php get_header(); ?>
    <main id="groupmenu">
        <section class="frame-group">
            <div class="frame frame--top-left">
                <div class="frame__line frame__line--1"></div>
                <div class="frame__line frame__line--2"></div>
            </div>

            <div class="frame frame--top-right">
                <div class="frame__line frame__line--3"></div>
                <div class="frame__line frame__line--4"></div>
            </div>
        </section>

        <section class="search-section">
            <h2 class="section-title">団体様ご予約ランチメニュー</h2>
        </section>
        <a href="./restaurant.html" id="restaurant-top-link">＜ レストランベルンドルフトップへ</a>

        <section class="menu-wrapper">
            <div class="menu-contents">
                <div class="right-gold-line"></div>
                <div id="frame-line-1"></div>
                <div id="frame-line-2"></div>
                <div class="menu-row">
                    <?php
                        if ( is_front_page() ) {
                            $slug = 'home'; // フロントページの場合のスラッグ
                        } else {
                            $slug = get_queried_object()->post_name; // 現在のページのスラッグを取得
                        }
                    ?>
                        <?php 
                            $args_main = array(
                                'post_type'      => 'footer_company', // ★カスタム投稿タイプを指定
                                'tax_query'      => array(             // ★タクソノミーで絞り込み
                                    array(
                                        'taxonomy' => 'group_menu',
                                        'field'    => 'slug',
                                        'terms'    => 'group_menu',          // スラッグ: 
                                    ),
                                ),
                                'posts_per_page' => -1,
                                'order'          => 'ASC'
                            );
                            $query_main = new WP_Query($args_main);
    
                            if ($query_main->have_posts()):
                                while ($query_main->have_posts()): $query_main->the_post();
                                    
                                    $img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                                    if (!$img_url) {
                                        $img_url = get_template_directory_uri() . '/assets/img/footer/edel-wein-support.png';
                                    }
                                    $set_name = get_field('set_name', get_the_ID());
                                    $price = get_field('price', get_the_ID());
                                    $detail = get_field('detail', get_the_ID());
                                    $under_description = get_field('under_description', get_the_ID());

                        ?>
                        <div class="menu-item">
                            <div class="menu-title-row">
                                <p class="menu-title"><?php echo esc_html($set_name); ?></p>
                                <p class="price"><?php echo esc_html($price); ?></p>
                            </div>
                            <p class="menu-desc">
                                <?php echo esc_html($detail); ?>
                            </p>
                            <img src="<?php echo esc_url($img_url); ?>" alt="セット画像">
                        </div>
                        
                                <?php endwhile; wp_reset_postdata(); ?>
                            <?php endif; ?>

                </div>

                <!-- <div class="menu-row">
                    <div class="menu-item">
                        <div class="menu-title-row">
                            <p class="menu-title">Cセット</p>
                            <p class="price">￥1,600</p>
                        </div>
                        <p class="menu-desc">サーロインステーキ<br>
                            (スープ・サラダ・ライス・コーヒー)
                        </p>
                        <img src="/aseets/images/groupmenu/Cコース料理.png" alt="Cセット">
                    </div>

                    <div class="menu-item">
                        <div class="menu-title-row">
                            <p class="menu-title">Dセット</p>
                            <p class="note">(只今 休止中)</p>
                        </div>
                        <p class="menu-desc">牛ヒレステーキ<br>
                            (スープ・サラダ・ライス・コーヒー)
                        </p>
                        <img src="/aseets/images/groupmenu/Dコース料理.png" alt="Dセット">
                    </div>
                </div> -->

                <p class="menu-note">
                    A～Cコースにはエーデルワイン使用のワインシャーベット<br>
                    Dコースにはエーデルワイン「ナイアガラ」使用ワインケーキが付きます
                </p>
            </div>
        </section>

        <section>
            <div class="menu-notice">
                <p>★予約必須です。(<span id="phone">お電話</span>にてご予約下さい。)</p>
                <p>★10名様以上から承ります</p>
                <p>★ご予約は3日前までにお願いします。</p>
                <p>★価格は全て税込み表示です。</p>
                <p>※その他、ご予算、ご要望に応じて上記以外のメニューも承ります。<br>
                　仕入れの都合等により内容が変更となる場合がございますのでご了承ください。</p>
            </div>
        </section>
    </main>

<?php get_footer(); ?>
