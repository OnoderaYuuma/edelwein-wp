<?php get_header(); ?>

    <main id="single-article">
        <div class="borders">
            <hr><hr>
        </div>
        <a href="<?php echo esc_url(get_template_directory_uri()); ?>/../../../archive" class="back-to-list"><span class="back-color">&lt;&lt;</span>一覧に戻る</a>

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
                <?php 
                if (has_post_thumbnail()) {
                    $thumbnail_url = get_the_post_thumbnail_url();
                ?>
                    <img src="<?php echo esc_url($thumbnail_url); ?>" alt="記事サムネイル画像" class="article-img">
                <?php }; ?>

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
            
            <div class="borders">
                <hr><hr>
            </div>
                
            <!-- 次の記事・前の記事へのリンクを表示 -->
            <div class="navbar">
                <?php
                $prev_post = get_previous_post(); 

                if ( !empty($prev_post) ) :
                    $prev_post_url = get_permalink($prev_post->ID);
                ?>
                <div class="navPrev">
                    <!-- <<の表示 -->
                    <a href=<?php echo esc_url($prev_post_url); ?>>
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/restaurant/front-link.png" alt="前へ" class="links"><br>
                    </a>
                    <div>
                        <p>前のお知らせ</p>
                        <div class="box-color">
                            <div class="box">
                                <?php if(!empty($prev_post)): ?>
                                    <a href="<?php echo get_permalink($prev_post->ID); ?>">
                                    <?php echo get_the_post_thumbnail($prev_post->ID, 'thumbnail', array(
                                        'class' => 'nav_thumbnail',
                                    )); ?>
                                    </a>
                                <?php else: ?>
                                    <img src img src="<?php echo get_template_directory_uri(); ?>/assets/img/top/noimage.png" alt="No Image">
                                <?php endif; ?>

                                <div class="box-title">
                                    <?php 
                                    previous_post_link("%link");
                                    ?>
                                    <div class="nav_category">
                                        <?php
                                        $categorys = get_the_category($prev_post->ID);
                                        foreach ($categorys as $category) {
                                            echo '<br><a href="'.get_category_link($category->term_id).'" class="nav_category_text">';
                                            echo esc_html($category->name);
                                            echo '</a>';
                                        }
                                        ?>
                                    </div>
                                    <div class="nav_time">
                                        <?php echo get_the_time('Y-m-d', $prev_post->ID); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif ?>

                <?php
                $next_post = get_next_post(); 
                if ( !empty($next_post) ) :
                    $next_post_url = get_permalink($next_post->ID);
                ?>
                <div class="navNext">
                    <!-- >>の表示 -->
                    <a href=<?php echo esc_url($next_post_url); ?>>
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/restaurant/next-link.png" alt="次へ" class="links"><br>
                    </a>
                    <div>
                        <p class="next-text">次のお知らせ</p>
                        <div class="box-color">
                            <div class="box">
                                 <?php if(!empty($next_post)): ?>
                                    <a href="<?php echo get_permalink($next_post->ID); ?>">
                                    <?php echo get_the_post_thumbnail($next_post->ID, 'thumbnail', array(
                                        'class' => 'nav_thumbnail',
                                    )); ?>
                                    </a>
                                <?php else: ?>
                                    <img src img src="<?php echo get_template_directory_uri(); ?>/assets/img/top/noimage.png" alt="No Image">
                                <?php endif; ?>

                                <div class="box-title">
                                    <?php 
                                    next_post_link("%link");
                                    ?>
                                    <div class="nav_category">
                                        <?php
                                        $categorys = get_the_category($next_post->ID);
                                        foreach ($categorys as $category) {
                                            echo '<br><a href="'.get_category_link($category->term_id).'" class="nav_category_text">';
                                            echo esc_html($category->name);
                                            echo '</a>';
                                        }
                                        ?>
                                    </div>
                                    <div class="nav_time">
                                        <?php echo get_the_time('Y-m-d', $next_post->ID); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif ?>
            </div>
        </article>
        <?php endwhile; ?>
        <?php endif; ?>
    </main>

<?php get_footer(); ?>
