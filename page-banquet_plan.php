<?php
/*
Template Name: 宴会プラン
*/
get_header();
?>

<main id="banquet_plan">
    <h1 class="main__ttl">ご宴会プラン</h1>
    
    <a href="<?php echo esc_url(home_url('/restaurantpage/top')); ?>" class="move_restaurant">＜ レストラン ベルンドルフ トップへ</a>
    
    <div class="banquet__inner">
        <article class="banquet_intro">
            <section class="banquet_intro__lead">
                <p>料理長おすすめの、ジューシーな羊肉、</p>
                <p>サフォークのステーキやハンバーグの他、</p>
                <p>パスタ・ピザ等のお料理と地元エーデルワインを各種取り揃え、</p>
                <p>スタッフ一同お客様のご来店を心よりお待ち申し上げます</p>
            </section>
            <section class="banquet_intro__note">
                <p>パーティーや会議、回忌法要、イベントなどにご利用できます。</p>
                <p>使用申し込み・お問い合わせはレストラン ベルンドルフまで。</p>
            </section>
            <hr>
        </article>

        <article class="banquet_rooms">
            <h2 class="banquet_rooms__ttl">大迫ふるさとセンター</h2>
            <section class="banquet_rooms__list">
                <figure class="banquet_rooms__room">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/banquet_plan/大ホール.png" alt="大ホール">
                    <figcaption class="banquet_rooms__name">大ホール</figcaption>
                </figure>
                <figure class="banquet_rooms__room">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/banquet_plan/大会議室.png" alt="大会議室">
                    <figcaption class="banquet_rooms__name">大会議室</figcaption>
                </figure>
                <figure class="banquet_rooms__room">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/banquet_plan/小会議室.png" alt="小会議室">
                    <figcaption class="banquet_rooms__name">小会議室</figcaption>
                </figure>
            </section>
            <address class="banquet_rooms__address">花巻市大迫町10-16-1（レストラン ベルンドルフ隣り）</address>
            <hr class="article_divider">
        </article>

        <article class="banquet_fees">
            <h2 class="banquet_fees__ttl">大迫ふるさとセンター 会場利用料金</h2>
            <p class="banquet_fees__note">※使用料は、使用時間により徴収致します。</p>
            
            <div class="banquet_fees__image-area">
                <?php 
                $fee_image = get_field('banquet_fee_image');
                if( !empty($fee_image) ): ?>
                    <img src="<?php echo esc_url($fee_image['url']); ?>" alt="<?php echo esc_attr($fee_image['alt']); ?>" class="banquet_fees__img" />
                <?php else: ?>
                    <p style="text-align:center;">料金表の画像が設定されていません。</p>
                <?php endif; ?>
            </div>
            
            <div class="banquet_contact">
                <p>ご予約はこちら</p>
                <?php 
                $tel = get_field('banquet_tel');
                if( $tel ): 
                    // 電話番号リンク用にハイフン等を削除した番号を作成
                    $tel_link = str_replace(array('-', ' ', '(', ')'), '', $tel);
                ?>
                    <a href="tel:<?php echo esc_attr($tel_link); ?>"><?php echo esc_html($tel); ?></a>
                <?php else: ?>
                    <a href="tel:0198-48-2155">0198-48-2155</a>
                <?php endif; ?>
            </div>
        </article>
    </div>
</main>

<?php get_footer(); ?>