<?php get_header(); ?>

    <main class="article">
        <div class="borders">
            <hr><hr>
        </div>
        <!-- 一覧へのパスが不安 -->
        <a href="<?php echo esc_url(get_template_directory_uri()); ?>/../../../" class="back-to-list"><span class="back-color">&lt;&lt;</span>一覧に戻る</a>

        <?php
            if(have_posts()) :
                // メインループ（記事を取り出すための処理）
                while(have_posts()):
                    // 記事の情報を取得する（タイトルや内容などを取り出す）
                    the_post();
        ?>
        <article id="single-<?php the_ID(); ?>" <?php post_class(); ?>>
            <!-- 画像の表示 -->
            <div>
                 <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/restaurant/restaurant.png" alt="画像" class="article-img"><br>
            </div>
            <div class="article-content">
                <div class="content-flex">
                    <h1 class="content-title">
                        <!-- 記事のタイトル -->
                        <?php the_title(); ?>
                    </h1>
                    <time datetime="<?php echo get_the_date("Y-m-d"); ?>" class="content-time"><?php echo get_the_date("Y年 m月 d日 H:i"); ?></time><br>
                </div>
                <!-- カテゴリーを表示 -->
                <div class="content-category">
                    <?php the_category(" | "); ?>
                </div>
                <!-- 記事の内容 -->
                 <div class="the-content">
                     <?php the_content(); ?>
                 </div>
            </div>
            
            <div class="content-meta">
                <div class="borders">
                    <hr><hr>
                </div>
                <?php
                    // 日付の表示と月別アーカイブの表示
                    $year = get_the_date("Y");
                    $month = get_the_date("m");
                    // 月別アーカイブのリンクURLを取得
                    $archiveURL = get_month_link($year, $month);
                ?>
                <a href="<?php echo $archiveURL; ?>">
                    <time date-time="<?php echo get_the_date("Y-m-d"); ?>">
                    <?php echo get_the_date(); ?>
                    </time>
                </a>
            </div>
            <div class="navbar">
                <!-- 次の記事・前の記事へのリンクを表示 -->
                <div class="navPrev">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/restaurant/front-link.png" alt="前へ" class="links"><br>
                    <div>
                        <p>前のお知らせ</p>
                        <div class="box-color">
                            <div class="box">
                                <?php previous_post_link("%link"); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="navNext">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/restaurant/next-link.png" alt="次へ" class="links"><br>
                    <div>
                        <p class="next-text">次のお知らせ</p>
                        <div class="box-color">
                            <div class="box">
                                <?php next_post_link("%link"); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </article>
        <?php endwhile; ?>
        <?php endif; ?>
    </main>

<?php get_footer(); ?>
