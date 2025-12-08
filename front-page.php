<?php get_header(); ?>

<main class="page">
    <section class="morino-kuni">
        <div class="morino-kuni-content">
            <div class="morino-kuni-title">
                <h1>EDEL WEIN support</h1>
            </div>

            <div class="morino-kuni-link">
                <a href="<?php echo esc_url(home_url('/glasspage')); ?>">ガラス工房森のくに</a>
                <a href="<?php echo esc_url(home_url('/restaurantpage')); ?>">レストランベルンドルフ</a>
                <a href="<?php echo esc_url(home_url('/hotelpage')); ?>">ホテルベルンドルフ</a>
            </div>
        </div>
    </section>

    <p class="morino-kuni-address">
        所在地：〒028-3203 岩手県花巻市大迫町 大迫10-16-1
    </p>

    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/top/line.png" alt="線" class="section-line">

    <section class="news-wrapper">
        <div class="news-box">
            <div class="news-left">
                <h2 class="news-title">最新情報</h2>
                <a href="<?php echo esc_url(home_url('/news')); ?>" class="news-btn">一覧を見る ></a>
            </div>

            <div class="news-right">
                <div class="news-list">
                    <?php
                    $sub_args = [
                        'post_type'      => 'post',
                        'posts_per_page' => 4,
                    ];
                    $sub_query = new WP_Query($sub_args);

                    if ($sub_query->have_posts()):
                        while ($sub_query->have_posts()):
                            $sub_query->the_post();
                    ?>
                            <?php
                            $categories = get_the_category();
                            $category_slug = !empty($categories) ? $categories[0]->slug : '';
                            $footer_colors = [
                                'edelwein-support' => '#b8a36c7c',
                                'glass' => '#C4F6FA',
                                'hotel' => '#fff71b7a',
                                'restaurant' => '#c12b7179',
                                'others' => '#1a535c7c',
                            ];
                            $footer_color = isset($footer_colors[$category_slug]) ? $footer_colors[$category_slug] : '#333333';
                            ?>
                            <a href="<?php the_permalink(); ?>" class="news-card">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('medium'); ?>
                                <?php else : ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/top/noimage.png" alt="No Image">
                                <?php endif; ?>

                                <div class="news-card-content">
                                    <h3><?php the_title(); ?></h3>
                                    <p>
                                        <?php
                                        if (! empty($categories)) {
                                            echo esc_html($categories[0]->name);
                                        }
                                        ?>
                                    </p>
                                </div>
                                <div class="news-card-footer" style="background-color: <?php echo esc_attr($footer_color); ?>;"></div>
                            </a>
                        <?php
                        endwhile;
                        wp_reset_postdata();
                    else:
                        ?>
                        <p>現在、最新情報はありません。</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <div id="grape">
        <img class="grape__img grape__img--fruit" src="<?php echo get_template_directory_uri(); ?>/assets/img/index/ぶどう.png" alt="">
    </div>

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
        <h2 class="section-title">目的で探す</h2>

        <div class="purpose">
            <div class="purpose__contents">

                <div class="purpose__item purpose__item--glass">
                    <a class="purpose__link" href="<?php echo esc_url(home_url('/glasspage')); ?>">
                        <img class="purpose__image_glass" src="<?php echo get_template_directory_uri(); ?>/assets/img/index/創作.png" alt="創作体験">
                    </a>
                    <a class="purpose__label" href="<?php echo esc_url(home_url('/glasspage')); ?>">ガラス工房森のくに</a>
                </div>
                <div class="purpose__item purpose__item--restaurant">
                    <a class="purpose__link" href="<?php echo esc_url(home_url('/restaurantpage')); ?>">
                        <img class="purpose__image_restaurant" src="<?php echo get_template_directory_uri(); ?>/assets/img/index/食事.png" alt="レストラン">
                    </a>
                    <a class="purpose__label" href="<?php echo esc_url(home_url('/restaurantpage')); ?>">レストラン ベルンドルフ</a>
                </div>

                <div class="purpose__item purpose__item--hotel">
                    <a class="purpose__link" href="<?php echo esc_url(home_url('/hotelpage')); ?>">
                        <img class="purpose__image purpose_image_hotel" src="<?php echo get_template_directory_uri(); ?>/assets/img/index/宿泊.png" alt="ホテル">
                    </a>
                    <a class="purpose__label" href="<?php echo esc_url(home_url('/hotelpage')); ?>">ホテル ベルンドルフ</a>
                </div>

            </div>
        </div>
    </section>

    <section class="frame-group">
        <div class="frame frame--bottom-left">
            <div class="frame__line frame__line--1"></div>
            <div class="frame__line frame__line--2"></div>
        </div>

        <div class="frame frame--bottom-right">
            <div class="frame__line frame__line--3"></div>
            <div class="frame__line frame__line--4"></div>
        </div>
    </section>

    <section class="insta-section">
        <h2 class="section-title">ガラス工房森のくに<br>Instagram</h2>
        <img class="insta-section__img" src="<?php echo get_template_directory_uri(); ?>/assets/img/index/森のくにインスタ.png" alt="ガラス工房森のくに Instagram紹介画像">
    </section>

    <div class="grape">
        <img class="grape__img grape__img--fruit" src="<?php echo get_template_directory_uri(); ?>/assets/img/index/ぶどう.png" alt="">
        <img class="grape__img grape__img--leaf" src="<?php echo get_template_directory_uri(); ?>/assets/img/index/ぶどうの葉.png" alt="">
    </div>

</main>


<?php get_footer(); ?>