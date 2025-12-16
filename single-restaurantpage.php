<?php
get_header(); 
?>

<main id="restaurant">

    <section class="morino-kuni">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/restaurant/restaurantTOP.png" class="morino-kuni-bg" alt="レストラン背景" />

        <div class="morino-kuni-content">
            <div class="morino-kuni-title">
                <p>レストラン ベルンドルフ</p>
            </div>

            <div class="morino-kuni-link">
                <h1>
                    大迫特産のワインと<br />
                    地元食材の料理を</br>
                    もっと美味しく
                </h1>
            </div>
        </div>
    </section>

    <p class="morino-kuni-address">
        営業時間：11:00〜15:00 ラストオーダー：14:30 定休日：火曜日<br />
        TEL：0198-48-2155　岩手県花巻市大迫町18-12-5
    </p>

    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/top/line.png" alt="線" class="section-line" />

    <section class="news-wrapper">
        <div class="news-box"> 
            <div class="news-left"> 
                <h2 class="news-title">最新情報</h2> 
                <a href="<?php echo esc_url(home_url('/news')); ?>" class="news-btn">一覧を見る ></a> 
            </div> 
            
            <div class="news-right"> 
                <div class="news-list"> 
                    <?php
                    $news_args = [
                        'post_type'      => 'post',
                        'posts_per_page' => 4,
                        'category_name'  => 'restaurant',
                        'orderby'        => 'date',
                        'order'          => 'DESC'
                    ];
                    $news_query = new WP_Query($news_args);

                    if ($news_query->have_posts()):
                        while ($news_query->have_posts()):
                            $news_query->the_post();
                            
                            $categories = get_the_category();
                            $category_slug = !empty($categories) ? $categories[0]->slug : '';
                            $footer_colors = [
                                'restaurant' => '#c12b7179',
                            ];
                            $footer_color = isset($footer_colors[$category_slug]) ? $footer_colors[$category_slug] : '#c12b7179';
                    ?>
                        <a href="<?php the_permalink(); ?>" class="news-card"> 
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('medium'); ?>
                            <?php else : ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/top/noimage.png" alt="No Image">
                            <?php endif; ?>
                            
                            <div class="news-card-content"> 
                                <h3><?php the_title(); ?></h3> 
                                <p>レストラン ベルンドルフ</p> 
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

    <section class="intro-section">
        <div class="intro-wrapper">
            <div class="intro-left">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/restaurant/TOP2.png" class="intro-img" alt="店内イメージ" />

                <div class="intro-paragraph">
                    <p>
                        私たちのレストランでは、地域の豊かな自然が育んだワインと新鮮な食材を
                        ふんだんに使った料理を提供しています。<br>
                        <a href="#" class="intro-text-link">地元の風土</a>
                        をそのままお届けする一皿一皿には、生産者の情熱と土地も恵みが詰まっています。<br>
                        地元のブドウから作られた上質なワインは、料理の味を一層引き立て、<br>
                        季節ごとの旬の食材が彩るメニューは、訪れるたびに
                        <a href="#" class="intro-text-link">新たな発見と感動</a>
                        もたらします。<br>
                        地元の農家やワイン生産者との深い信頼関係を基に、<br>
                        私たちは素材の持つ本来の味わいを最大限に引き出すことに心を込めています。<br>
                    </p>

                    <p>
                        お食事の時間がただの食事ではなく、
                        <a href="#" class="intro-text-link">地元の文化や歴史、自然の豊かさ</a>を<br>
                        感じることができる私たちの作品は、<br>
                        日常に彩りと癒しをもたらします。<br>
                        ここでしか味わえない
                        <a href="#" class="intro-text-link">贅沢な体験</a>
                        を、心ゆくまでお楽しみください。<br>
                        皆さまのお越しを心よりお待ちしております。
                    </p>
                </div>
            </div>

            <div class="right-copy-wrapper">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/restaurant/glass.png" class="glass-ball" alt="" />
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/restaurant/font.png" class="copy-text" alt="" />
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/restaurant/Polygon 5.png" class="copy-triangle" alt="" />
            </div>
        </div>
    </section>

    <a href="https://example.com" target="_blank">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/restaurant/Group 399.png" class="shop-banner" alt="ショッピング" />
    </a>

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
        <h2 class="section-title">メニュー</h2>
    </section>

    <section class="menu-section">
        <?php 
        $args_main = array(
            'post_type'      => 'restaurant_menu', // ★カスタム投稿タイプを指定
            'tax_query'      => array(             // ★タクソノミーで絞り込み
                array(
                    'taxonomy' => 'menu_category',
                    'field'    => 'slug',
                    'terms'    => 'main',          // スラッグ: main
                ),
            ),
            'posts_per_page' => -1,
            'orderby'        => 'date',
            'order'          => 'ASC'
        );
        $query_main = new WP_Query($args_main);

        if ($query_main->have_posts()): 
            $count = 0;
            while ($query_main->have_posts()): $query_main->the_post();
                
                $img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                if (!$img_url) {
                    $img_url = get_template_directory_uri() . '/assets/img/restaurant/料理.png';
                }
                $price = get_field('price', get_the_ID());

                if ($count % 3 === 0): 
        ?>
                <div class="menu-row">
        <?php   endif; ?>

                    <div class="menu-item">
                        <img class="cooking" src="<?php echo esc_url($img_url); ?>" alt="<?php the_title(); ?>">
                        <div class="menu-text">
                            <p class="menu-title--2gyo"><?php echo nl2br(get_the_title()); ?></p>
                            <?php if($price): ?>
                                <p class="menu-price">￥<?php echo esc_html($price); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>

        <?php 
                $count++;
                if ($count % 3 === 0): 
        ?>
                </div><?php   endif; ?>

            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>

            <?php if ($count % 3 !== 0): ?>
                </div>
            <?php endif; ?>

        <?php else: ?>
            <p style="text-align:center; margin-bottom: 40px;">現在メニューの準備中です。</p>
        <?php endif; ?>

        <p id="set-info" class="info-text">※ライス、スープ、サラダ付き</p>
    </section>

    <section id="wine-line-section">
        <div class="wine-icon-wrapper">
             <img class="wine-glass-icon" src="<?php echo get_template_directory_uri(); ?>/assets/img/restaurant/ワイングラス.png" alt="ワイングラス">
        </div>
        <div class="middle-lines"></div>
    </section>

    <section class="menu-section">
        <?php 
        $args_side = array(
            'post_type'      => 'restaurant_menu', // ★カスタム投稿タイプ
            'tax_query'      => array(
                array(
                    'taxonomy' => 'menu_category',
                    'field'    => 'slug',
                    'terms'    => 'side',          // スラッグ: side
                ),
            ),
            'posts_per_page' => -1,
            'orderby'        => 'date',
            'order'          => 'ASC'
        );
        $query_side = new WP_Query($args_side);

        if ($query_side->have_posts()): 
            $count = 0;
            while ($query_side->have_posts()): $query_side->the_post();

                $img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                if (!$img_url) {
                    $img_url = get_template_directory_uri() . '/assets/img/restaurant/料理.png';
                }
                $price = get_field('price', get_the_ID());

                if ($count % 3 === 0): 
        ?>
                <div class="menu-row">
        <?php   endif; ?>

                    <div class="menu-item">
                        <img class="cooking" src="<?php echo esc_url($img_url); ?>" alt="<?php the_title(); ?>">
                        <div class="menu-text">
                            <p class="menu-title--2gyo"><?php echo nl2br(get_the_title()); ?></p>
                            <?php if($price): ?>
                                <p class="menu-price">￥<?php echo esc_html($price); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>

        <?php 
                $count++;
                if ($count % 3 === 0): 
        ?>
                </div><?php   endif; ?>

            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>

            <?php if ($count % 3 !== 0): ?>
                </div>
            <?php endif; ?>

        <?php else: ?>
            <p style="text-align:center; margin-bottom: 40px;">現在準備中です。</p>
        <?php endif; ?>

        <p id="side-info" class="info-text">※スープ、サラダ付き</p>
        <div class="double-line"></div>
    </section>

    <section class="wine-header-section">
        <div class="wine-header">
            <p id="wine-title">WEIN</p>
            <img class="wine-icon-small" src="<?php echo get_template_directory_uri(); ?>/assets/img/restaurant/ワイングラス.png" alt="ワイングラス">
        </div>
    </section>

    <section class="wine-list-section">
        <div class="wine-contents">
            <?php 
            $args_wine = array(
                'post_type'      => 'restaurant_menu', // ★カスタム投稿タイプ
                'tax_query'      => array(
                    array(
                        'taxonomy' => 'menu_category',
                        'field'    => 'slug',
                        'terms'    => 'wine',          // スラッグ: wine
                    ),
                ),
                'posts_per_page' => -1,
                'orderby'        => 'date', 
                'order'          => 'ASC'
            );
            $query_wine = new WP_Query($args_wine);

            if ($query_wine->have_posts()): 
                while ($query_wine->have_posts()): $query_wine->the_post();
                    
                    $description = get_field('description', get_the_ID());
                    $p_glass     = get_field('price_glass', get_the_ID());
                    $p_bottle    = get_field('price_bottle', get_the_ID());
            ?>
                <div class="wine-item">
                    <div class="wine-text">
                        <p class="wine-name"><?php the_title(); ?></p>
                        <?php if($description): ?>
                            <p class="wine-description"><?php echo nl2br(esc_html($description)); ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="wine-price">
                        <?php if($p_glass): ?>
                            <p class="price-glass">グラス　￥<?php echo esc_html($p_glass); ?></p>
                        <?php endif; ?>
                        <?php if($p_bottle): ?>
                            <p class="price-bottle">ボトル　￥<?php echo esc_html($p_bottle); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php 
                endwhile;
                wp_reset_postdata();
            else:
            ?>
                <p style="text-align:center;">現在ワインリストの準備中です。</p>
            <?php endif; ?>
        </div>
    </section>

    <section class="drink-header-section">
        <div class="drink-header">
            <p id="drink-title">DRINK</p>
        </div>
    </section>

    <section class="drink-section-wrapper">
        <div class="drink-section">
            <div class="drink-contents">
                <?php 
                $args_drink = array(
                    'post_type'      => 'restaurant_menu', // ★カスタム投稿タイプ
                    'tax_query'      => array(
                        array(
                            'taxonomy' => 'menu_category',
                            'field'    => 'slug',
                            'terms'    => 'drink',         // スラッグ: drink
                        ),
                    ),
                    'posts_per_page' => -1,
                    'orderby'        => 'date',
                    'order'          => 'ASC'
                );
                $query_drink = new WP_Query($args_drink);

                if ($query_drink->have_posts()): 
                    while ($query_drink->have_posts()): $query_drink->the_post();
                        
                        $price = get_field('price', get_the_ID()); 
                ?>
                    <div class="drink-item">
                        <p class="drink-name">・<?php the_title(); ?></p>
                        <?php if($price): ?>
                            <p class="drink-price">￥<?php echo esc_html($price); ?></p>
                        <?php endif; ?>
                    </div>
                <?php 
                    endwhile;
                    wp_reset_postdata();
                else:
                ?>
                    <p style="text-align:center;">現在ドリンクメニューの準備中です。</p>
                <?php endif; ?>
            </div>
            <img class="drink-image" src="<?php echo get_template_directory_uri(); ?>/assets/img/restaurant/ワイングラス.png" alt="ワイングラス">
        </div>
    </section>
</main>
    
<?php get_footer(); ?>