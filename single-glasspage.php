<?php
get_header(); 
?>

<main id="glass">

    <section class="morino-kuni">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/glass/TOP.png" class="morino-kuni-bg" alt="トップ背景">
        <div class="morino-kuni-content">
            <div class="morino-kuni-title">
                <p>ガラス体験工房 森のくに</p>
            </div>

            <div class="morino-kuni-link">
                <h1>自分で創るきらめく思い出
                <br>体験してみませんか</h1>
            </div>
        </div>
    </section>

    <p class="morino-kuni-address">
        営業時間：9:00〜17:00(最終受付16:00) 定休日：火曜日(祝祭日は営業)
        TEL：0198-48-3009 岩手県花巻市大迫町10-45-1
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
                    $news_args = [
                        'post_type'      => 'post',
                        'posts_per_page' => 4,
                        'category_name'  => 'glass',
                    ];
                    $news_query = new WP_Query($news_args);

                    if ($news_query->have_posts()):
                        while ($news_query->have_posts()):
                            $news_query->the_post();
                            
                            // カテゴリーと色の設定
                            $categories = get_the_category();
                            $category_slug = !empty($categories) ? $categories[0]->slug : '';
                            $footer_colors = [
                                'edelwein-support' => '#b8a36c7c',
                                'glass'            => '#C4F6FA',
                                'hotel'            => '#fff71b7a',
                                'restaurant'       => '#c12b7179',
                                'others'           => '#1a535c7c',
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

    <section class="intro-section">
        <div class="intro-wrapper">
            <div class="intro-left">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/glass/ガラス体験工房様子.png" class="intro-img" alt="工房の様子">

                <div class="intro-paragraph">
                    <p>
                        私たちのガラス体験工房では、職人の手によって一つひとつ丁寧に作られた<br>
                        <a href="#">美しいガラス作品</a> を提供しています。<br>
                        豊かな自然と四季折々の風景にインスパイアされたデザインは、<br>
                        光を受けてさまざまな表情を見せる芸術品です。
                    </p>
                    <p>
                        ガラスの透明感と色彩の繊細な調和を楽しむことができる私たちの作品は、<br>
                        日常に彩りと癒しをもたらします。
                    </p>
                    <p>
                        制作過程で生まれる繊細な気泡や模様は、
                        <a href="#">世界に一つだけ</a> の個性を持ち、<br>
                        手に取ると職人のこだわりと情熱を感じていただけます。<br>
                        私たちの工房では、見学や体験教室も開催しており、
                        自分だけのオリジナル<br>作品を作る喜びも味わうことができます。
                    </p>
                    <p>
                        特別な贈り物や自分へのご褒美に、手作りのガラス作品をぜひお選びください。<br>
                        <a href="#">ここでしか手に入らない</a>、光と色の芸術を通して、
                        心に残るひとときをお届けします。<br>
                    </p>
                    <p>
                        皆さまのお越しを心よりお待ちしております。
                    </p>
                </div>
            </div>

            <div class="right-copy-wrapper">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/glass/透過ビー玉 3.png" class="glass-ball" alt="">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/glass/文字.png" class="copy-text" alt="">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/glass/三角形.png" class="copy-triangle" alt="">
            </div>
        </div>
    </section>

    <a href="https://morinokuni.base.shop/" target="_blank">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/glass/shopping.png" class="shop-banner" alt="ショッピング">
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
        <h2 class="section-title">体験メニュー</h2>
    </section>

    <section class="heading blown">
        <div class="title-block">
            <h3 class="title-main">吹きガラス<span class="title-sub">(土日月限定)</span></h3>
            <div class="arrow-line">
                <div class="diamond"></div>
                <div class="line"></div>
            </div>
        </div>
    </section>
    
    <section>
        <div class="blownglass">
            <div class="blownglass_contents">    
                <p class="glass-title">◆　グラス・一輪挿し・小鉢・ぐい吞み類・モールドロックグラス</p><br>
                <p class="glass-detail">1200℃の窯から巻き取ったガラスを、竿を回しながら吹きます。木のコテで底になる部分を平らにします。<br>
                   竿から切離して、口を広げて出来上がりです。</p><br>
                    <div class="glass">
                        <p class="glass-time">制作時間：20分程度<br>
                           体験料　：4500円<br>
                           対象年齢：中学3年生～<br>
                        </p>
                        <img class="glass_image" src="<?php echo get_template_directory_uri(); ?>/assets/img/glass/グラス.png" alt="グラス">
                    </div>
                    
                <p class="glass-title">◆　ミニグラス</p><br>
                <p class="glass-detail">小学3年生から体験できるメニュー。手のひらサイズのグラスですが、本格的な吹きガラス制作を体験できます</p><br>
                <div class="mini-glass">
                    <p class="glass-time">制作時間：20分程度<br>
                        体験料　：小学3年～6年生　4000円　　　中学生～　4500円<br>
                        対象年齢：小学生3年生～
                    </p><br>
                    <img class="mini-glass_image" src="<?php echo get_template_directory_uri(); ?>/assets/img/glass/ミニグラス.png" alt="ミニグラス">
                </div>

                <p class="glass-title">◆　ミニ一輪挿し</p><br>
                <p class="glass-detail">ガラスをぷぅーっと吹いてからそこを平らにし、切離して出来上がりです。簡単な工程なので、小学生にお勧めです。</p><br>
                <div class="single-flower-vase">
                    <p class="glass-time">制作時間：20分程度<br>
                       体験料　：2500円<br>
                       対象年齢：小学生～
                    </p>
                    <img class="single-flower-vase__image" src="<?php echo get_template_directory_uri(); ?>/assets/img/glass/ミニ一輪挿し.png" alt="ミニ一輪挿し">
                </div>

                <p class="glass-title">◆　箸置き</p><br>
                <p class="glass-detail">切り落とされたガラスを、道具でぎゅーっと押します。小さなお子様におすすめです。<br>
                   お一人当たり、4個の箸置きをつくることができます。
                </p><br>
                <div class="chopstick-rest">
                    <p class="glass-time">制作時間：15分程度<br>
                        体験料　：2000円<br>
                        対象年齢：3歳～<br>
                    </p>
                    <img class="chopstick-rest_image1" src="<?php echo get_template_directory_uri(); ?>/assets/img/glass/箸置き1.png" alt="箸置き1">
                    <img class="chopstick-rest_image2" src="<?php echo get_template_directory_uri(); ?>/assets/img/glass/箸置き2.png" alt="箸置き2">
                </div>
            </div>
        </div>
    </section>

    <section class="heading sandblast">
        <div class="title-block">
            <h3 class="title-main">サンドブラスト</h3>
            <div class="arrow-line">
                <div class="diamond"></div>
                <div class="line"></div>
            </div>
        </div>
    </section>
    <section>
        <div class="sandblasting">
            <div class="sandblasting-contents">
                <p class="sandblasting-detail">ご自分で選んだグラスに絵柄を切り抜いたシールを貼り、砂を吹き付けてくもりガラス状にします。<br>
                    世界に一つだけのオリジナルグラスを作ってみませんか？<br>
                    <a href="#" class="product-experience">型抜きの道具</a>をご用意しております。団体様にお勧めです。<br>
                    <a href="#" class="product-experience">出張体験</a>も承っております。(詳しくは<span class="here">こちら</span>)
                </p>
                <div class="sandblasting-remarks">
                    <p class="sandblasting-time">
                        種類　　：各種グラス　※グラスの種類が流動的なため、在庫がない場合があります。<br>
                        制作時間：30分～<br>
                        体験料　：1200円 ＋ グラス代350円～<br>
                        対象年齢：3歳～
                        備考：予約不要です。(団体様の場合は<span class="phone">お電話</span>にてご予約下さい。)
                    </p>
                    <img class="sandblasting-image1" src="<?php echo get_template_directory_uri(); ?>/assets/img/glass/サンドブラスト1.png" alt="">
                    <img class="sandblasting-image2" src="<?php echo get_template_directory_uri(); ?>/assets/img/glass/サンドブラスト2.png" alt="">
                </div>
            </div>
        </div>
    </section>

    <section class="heading glass-fusing-heading">
        <div class="title-block">
            <h3 class="title-main">フュージング</h3>
            <div class="arrow-line">
                <div class="diamond"></div>
                <div class="line"></div>
            </div>
        </div>
    </section>

    <section>
        <div class="fusing">
            <div class="fusing-contents">
                <p class="fusing-description">フュージングとは、<a href="#" class="glass-variety">色々なガラス</a>を<a href="#" class="kiln-firing">電気炉で焼成</a>してアクセサリーなどに組み立てるものです。<br>
                    森のくにでは、イタリアの<a href="#" class="venetian-glass">ヴェネツィアンガラス</a>を使用し、<br>
                    千の花を意味するミルフィオリをアクセントにしながら、美しく、表情豊かなガラス体験ができます。<br>
                    あなただけの素敵なデザインを作ってみませんか。<br>
                    出張体験も承っております。詳しくは<a href="#" class="more-info-link">こちら</a><br>
                 ※電気炉で焼成しますので、お渡しまでい時間がかかります。(1週間～2週間程度)<br>
                </p>
                <div class="fusing-info-block">
                    <p class="fusing-details">種類　　：デザートスプーン　アクセサリー　他　※団体向け4種類<br>
                        制作時間：30分～<br>
                        体験料　：2000円～<br>
                        対象年齢：4歳～<br>
                        備考　　：予約不要です。(団体様の場合は<span class="contact-phone">お電話</span>にてご予約下さい。)
                    </p>
                    <img class="fusing-image1" src="<?php echo get_template_directory_uri(); ?>/assets/img/glass/フュージング1.png" alt="">
                    <img class="fusing-image2" src="<?php echo get_template_directory_uri(); ?>/assets/img/glass/フュージング2.png" alt="">
                </div>
            </div>
        </div>
    </section>

    <section class="heading tombo-heading">
        <div class="title-block">
            <h3 class="title-main">トンボ玉<span class="title-sub">(要予約)</span></h3>
            <div class="arrow-line">
                <div class="diamond"></div>
                <div class="line"></div>
            </div>
        </div>
    </section>

    <section>
        <div class="tombodama">
            <div class="tombodama-contents">
                <p>色ガラス棒をガスバーナーえ溶かし、芯棒に巻き付けて穴のあいたガラス玉を作ります。<br>
                    当日のお持ち帰りは出来ません。後日、郵送させていただきます。<br>
                    パーツビーズを組み合わせて、お好みのアクセサリーに仕上げることができます。<br>
                </p>
                <div class="tombodama-info">
                    <p>種類　　：小玉1個<br>
                        制作時間：約30分<br>
                        体験料　：1800円～ (パーツ代別)<br>
                        対象年齢：中学生～<br>
                    </p>
                    <img class="tombodama-images1" src="<?php echo get_template_directory_uri(); ?>/assets/img/glass/トンボ玉1.png" alt="">
                    <img class="tombodama-images2" src="<?php echo get_template_directory_uri(); ?>/assets/img/glass/トンボ玉2.png" alt="">
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="reservation-notice">
            <p>★ご予約をいただいていない場合、当日体験できないメニューもございます。<br>
                ★ご予約の際、体験の種類、人数、日時を<span class="contact-phone">お電話</span>ください。<br>
                ★3才から小学生までの体験は、保護者同伴とさせていただきます。<br>
                ★スタッフの指示に従わすに、お怪我をされた場合の保証は致しかねます。<br>
                ★じゃらんでの予約も可能です。(予約は<span class="here">こちら</span>)<br>
                ★出張体験も行っております。(詳しくは<span class="here">こちら</span>)<br>
                ★縁結び大学で詳しく紹介されていますので<span class="here">こちら</span>もご参考にしてください。
            </p>
            <img class="info-deco-image1" src="<?php echo get_template_directory_uri(); ?>/assets/img/glass/透過ビー玉 2.png" alt="">
        </div>
    </section>

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
        <h2 class="section-title">受注生産</h2>
    </section>

    <section>
        <h1 class="sandblast-title">サンドブラスト</h1>
        <div class="sandblast-content">
            <div class="sandblast-details">
                <p>名前や日付等、オリジナルデザインのガラスを制作します。<br>
                    数量、デザイン等によりお渡しまでの日数、金額は変わります。
                </p>
                <div class="sandblast-info-item">
                    <p>種類　　：各種ガラス<br>
                        料金　　：12,000円～(要相談)<br>
                        個数　　：50個～<br>
                        備考　　：予約必須です。(<span class="link-tel">お電話</span>にてご予約下さい。)
                    </p>
                    <img class="sandblast-image" src="<?php echo get_template_directory_uri(); ?>/assets/img/glass/サンドブラスト.png" alt="">
                </div>
            </div>
        </div>
    </section>

    <section class="blownglass-boxs">
        <h1 class="blownglass-title">吹きガラス</h1>
        <div class="glassblowing-wrapper">
            <div class="glassblowing-content">
                <p>引き出物や記念品等、ご注文承ります。</p>
                <div class="glassblowing-details">
                    <p>種類　　：各種ガラス(一輪挿し、グラス、箸置きなど)<br>
                        料金　　：12,000円～(要相談)<br>
                        個数　　：50個～<br>
                        備考　　：予約必須です。(<span class="tel-highlight">お電話</span>にてご予約下さい。)
                    </p>
                    <img class="glassblowing-image" src="<?php echo get_template_directory_uri(); ?>/assets/img/glass/吹きガラス.png" alt="">
                </div>
            </div>
        </div>
    </section>
    <img class="info-deco-image2" src="<?php echo get_template_directory_uri(); ?>/assets/img/glass/透明ビー玉.png" alt="">

</main>
    
<?php get_footer(); ?>