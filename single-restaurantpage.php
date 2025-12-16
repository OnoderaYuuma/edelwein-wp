<?php
get_header(); 
?>

<main id="restaurant">
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
        // --------------------------------------------------
        // ① メイン料理 (カテゴリー: restaurant-menu-main)
        // --------------------------------------------------
        $args_main = array(
            'post_type'      => 'post',
            'category_name'  => 'restaurant-menu-main', // スラッグ変更
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
                $price = get_field('price');

                if ($count % 3 === 0): 
        ?>
                <div class="menu-row">
        <?php   endif; ?>

                    <div class="menu-item">
                        <img class="cooking" src="<?php echo esc_url($img_url); ?>" alt="<?php the_title(); ?>">
                        <div class="menu-text">
                            <p class="menu-title--2gyo"><?php echo nl2br(get_the_title()); ?></p>
                            <?php if($price): ?>
                                <p class="menu-price">￥<?php echo esc_html($price); ?>円</p>
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
        // --------------------------------------------------
        // ② カレー・パスタ (カテゴリー: restaurant-menu-side)
        // --------------------------------------------------
        $args_side = array(
            'post_type'      => 'post',
            'category_name'  => 'restaurant-menu-side', // スラッグ変更
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
                $price = get_field('price');

                if ($count % 3 === 0): 
        ?>
                <div class="menu-row">
        <?php   endif; ?>

                    <div class="menu-item">
                        <img class="cooking" src="<?php echo esc_url($img_url); ?>" alt="<?php the_title(); ?>">
                        <div class="menu-text">
                            <p class="menu-title--2gyo"><?php echo nl2br(get_the_title()); ?></p>
                            <?php if($price): ?>
                                <p class="menu-price">￥<?php echo esc_html($price); ?>円</p>
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
            // --------------------------------------------------
            // ③ ワイン (カテゴリー: restaurant-menu-wine)
            // --------------------------------------------------
            $args_wine = array(
                'post_type'      => 'post',
                'category_name'  => 'restaurant-menu-wine', // スラッグ変更
                'posts_per_page' => -1,
                'orderby'        => 'date', 
                'order'          => 'ASC'
            );
            $query_wine = new WP_Query($args_wine);

            if ($query_wine->have_posts()): 
                while ($query_wine->have_posts()): $query_wine->the_post();
                    
                    $description = get_field('description');
                    $p_glass     = get_field('price_glass');
                    $p_bottle    = get_field('price_bottle');
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
                // --------------------------------------------------
                // ④ ドリンク (カテゴリー: restaurant-menu-drink)
                // --------------------------------------------------
                $args_drink = array(
                    'post_type'      => 'post',
                    'category_name'  => 'restaurant-menu-drink', // スラッグ変更
                    'posts_per_page' => -1,
                    'orderby'        => 'date',
                    'order'          => 'ASC'
                );
                $query_drink = new WP_Query($args_drink);

                if ($query_drink->have_posts()): 
                    while ($query_drink->have_posts()): $query_drink->the_post();
                        
                        $price = get_field('price'); 
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