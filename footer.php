<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    

    
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <footer class="footer">
        <p class="footer_title">EDEL WEIN support</p>

        <section class="footer_company">
                <!-- wordpress -->
                    <?php
                        if ( is_front_page() ) {
                            $slug = 'home'; // フロントページの場合のスラッグ
                        } else {
                            $slug = get_queried_object()->post_name; // 現在のページのスラッグを取得
                        }
                    ?>
                    <?php if ( $slug === 'glass' ) : ?>
                        <?php 
                            $args_main = array(
                                'post_type'      => 'footer_company', // ★カスタム投稿タイプを指定
                                'tax_query'      => array(             // ★タクソノミーで絞り込み
                                    array(
                                        'taxonomy' => 'company_category',
                                        'field'    => 'slug',
                                        'terms'    => 'glass',          // スラッグ: 
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
                                    $store_name = get_field('store_name', get_the_ID());
                                    $tel = get_field('tel', get_the_ID());
                                    $fax = get_field('fax', get_the_ID());
                                    $postcode = get_field('postcode', get_the_ID());
                                    $address = get_field('address', get_the_ID());
                                    $businesshours = get_field('businesshours', get_the_ID());
                                    $regulerholiday = get_field('regulerholiday', get_the_ID());
                        ?>
                        <p class="footer_company_title">◆<?php echo esc_html($store_name); ?></p>
                            <div class="footer_company_content">
                                <div class="footer_company_content_imgdiv">
                                    <img class="footer_company_content_imgdiv_img" src="<?php echo esc_url($img_url); ?>" alt="<?php the_title(); ?>">
                                </div>
                                <div class="footer_company_content_textdiv">
                                    <div class="footer_company_content_textdiv-flex">
                                        <div>
                                            <p>TEL</p>
                                            <p>FAX</p>
                                            <p>所在地</p>
                                            <p></p>
                                            <p>営業時間</p>
                                            <p>定休日</p>
                                        </div>
                                        <div>
                                            <p><?php echo esc_html($tel); ?></p>
                                            <p><?php echo esc_html($fax); ?></p>
                                            <p>〒<?php echo esc_html($postcode); ?></p>
                                            <p><?php echo esc_html($address); ?></p>
                                            <p><?php echo esc_html($businesshours); ?></p>
                                            <p><?php echo esc_html($regulerholiday); ?></p>
                                        </div>
                                    </div>
                                    <p style="color: red;">※体験予約はお電話までお願い致します。</p>
                                    <a class="footer_company_content_textdiv_button" href=""><div>詳細はこちら<img class="footer_company_content_textdiv_button_img" src="<?php echo get_template_directory_uri(); ?>/assets/img/footer/link_arrow.png" alt=""></div></a>
                                </div>
                            </div>
                        </p>
                                <?php endwhile; wp_reset_postdata(); ?>
                            <?php endif; ?>
                    <?php elseif ( $slug === 'restaurantpage' ) : ?>
                        <?php 
                            $args_main = array(
                                'post_type'      => 'footer_company', // ★カスタム投稿タイプを指定
                                'tax_query'      => array(             // ★タクソノミーで絞り込み
                                    array(
                                        'taxonomy' => 'company_category',
                                        'field'    => 'slug',
                                        'terms'    => 'restaurant',          // スラッグ: 
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
                                    $store_name = get_field('store_name', get_the_ID());
                                    $tel = get_field('tel', get_the_ID());
                                    $fax = get_field('fax', get_the_ID());
                                    $postcode = get_field('postcode', get_the_ID());
                                    $address = get_field('address', get_the_ID());
                                    $businesshours = get_field('businesshours', get_the_ID());
                                    $regulerholiday = get_field('regulerholiday', get_the_ID());
                        ?>
                        <p class="footer_company_title">◆<?php echo esc_html($store_name); ?></p>
                            <div class="footer_company_content">
                                <div class="footer_company_content_imgdiv">
                                    <img class="footer_company_content_imgdiv_img" src="<?php echo esc_url($img_url); ?>" alt="<?php the_title(); ?>">
                                </div>
                                <div class="footer_company_content_textdiv">
                                    <div class="footer_company_content_textdiv-flex">
                                        <div>
                                            <p>TEL</p>
                                            <p>FAX</p>
                                            <p>所在地</p>
                                            <p></p>
                                            <p>営業時間</p>
                                            <p>定休日</p>
                                        </div>
                                        <div>
                                            <p><?php echo esc_html($tel); ?></p>
                                            <p><?php echo esc_html($fax); ?></p>
                                            <p>〒<?php echo esc_html($postcode); ?></p>
                                            <p><?php echo esc_html($address); ?></p>
                                            <p><?php echo esc_html($businesshours); ?></p>
                                            <p><?php echo esc_html($regulerholiday); ?></p>
                                        </div>
                                    </div>
                                    <a class="footer_company_content_textdiv_button" href=""><div>詳細はこちら<img class="footer_company_content_textdiv_button_img" src="<?php echo get_template_directory_uri(); ?>/assets/img/footer/link_arrow.png" alt=""></div></a>
                                </div>
                            </div>
                        </p>
                                <?php endwhile; wp_reset_postdata(); ?>
                            <?php endif; ?>
                    <?php elseif ( $slug === 'hotelpage' ) : ?>
                        <?php 
                            $args_main = array(
                                'post_type'      => 'footer_company', // ★カスタム投稿タイプを指定
                                'tax_query'      => array(             // ★タクソノミーで絞り込み
                                    array(
                                        'taxonomy' => 'company_category',
                                        'field'    => 'slug',
                                        'terms'    => 'hotel',          // スラッグ: 
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
                                    $store_name = get_field('store_name', get_the_ID());
                                    $tel = get_field('tel', get_the_ID());
                                    $fax = get_field('fax', get_the_ID());
                                    $postcode = get_field('postcode', get_the_ID());
                                    $address = get_field('address', get_the_ID());
                                    $businesshours = get_field('businesshours', get_the_ID());
                                    $checkin = get_field('checkin', get_the_ID());
                                    $checkout = get_field('checkout', get_the_ID());
                        ?>
                        <p class="footer_company_title">◆<?php echo esc_html($store_name); ?></p>
                            <div class="footer_company_content">
                                <div class="footer_company_content_imgdiv">
                                    <img class="footer_company_content_imgdiv_img" src="<?php echo esc_url($img_url); ?>" alt="<?php the_title(); ?>">
                                </div>
                                <div class="footer_company_content_textdiv">
                                    <div class="footer_company_content_textdiv-flex">
                                        <div>
                                            <p>TEL</p>
                                            <p>FAX</p>
                                            <p>所在地</p>
                                        </div>
                                        <div>
                                            <p><?php echo esc_html($tel); ?></p>
                                            <p><?php echo esc_html($fax); ?></p>
                                            <p>〒<?php echo esc_html($postcode); ?></p>
                                            <p><?php echo esc_html($address); ?></p>
                                        </div>
                                    </div>
                                    <p>日帰り入浴施設「ぶどうの湯」</p>
                                    <p>営業時間　<?php echo esc_html($businesshours); ?></p>
                                    <p>チェックイン <?php echo esc_html($checkin); ?></p>
                                    <p>チェックアウト <?php echo esc_html($checkout); ?></p>
                                    <a class="footer_company_content_textdiv_button" href=""><div>詳細はこちら<img class="footer_company_content_textdiv_button_img" src="<?php echo get_template_directory_uri(); ?>/assets/img/footer/link_arrow.png" alt=""></div></a>
                                </div>
                            </div>
                        </p>
                                <?php endwhile; wp_reset_postdata(); ?>
                            <?php endif; ?>
                    <?php else : ?>
                        <?php 
                            $args_main = array(
                                'post_type'      => 'footer_company', // ★カスタム投稿タイプを指定
                                'tax_query'      => array(             // ★タクソノミーで絞り込み
                                    array(
                                        'taxonomy' => 'company_category',
                                        'field'    => 'slug',
                                        'terms'    => 'edelwein-support',          // スラッグ: 
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
                                    $store_name = get_field('store_name', get_the_ID());
                                    $tel = get_field('tel', get_the_ID());
                                    $fax = get_field('fax', get_the_ID());
                                    $postcode = get_field('postcode', get_the_ID());
                                    $address = get_field('address', get_the_ID());
                        ?>
                        <p class="footer_company_title">◆<?php echo esc_html($store_name); ?></p>
                            <div class="footer_company_content">
                                <div class="footer_company_content_imgdiv">
                                    <img class="footer_company_content_imgdiv_img" src="<?php echo esc_url($img_url); ?>" alt="<?php the_title(); ?>">
                                </div>
                                <div class="footer_company_content_textdiv">
                                    <div class="footer_company_content_textdiv-flex">
                                        <div>
                                            <p>TEL</p>
                                            <p>FAX</p>
                                            <p>所在地</p>
                                        </div>
                                        <div>
                                            <p><?php echo esc_html($tel); ?></p>
                                            <p><?php echo esc_html($fax); ?></p>
                                            <p>〒<?php echo esc_html($postcode); ?></p>
                                            <p><?php echo esc_html($address); ?></p>
                                        </div>
                                    </div>
                                    <a class="footer_company_content_textdiv_button" href=""><div>詳細はこちら<img class="footer_company_content_textdiv_button_img" src="<?php echo get_template_directory_uri(); ?>/assets/img/footer/link_arrow.png" alt=""></div></a>
                                </div>
                            </div>
                        </p>
                                <?php endwhile; wp_reset_postdata(); ?>
                            <?php endif; ?>
                    <?php endif; ?>


        </section>

        <section class="footer_map">
            <div class="footer_map_mapdiv">
                <div class="footer_map_mapdiv_text">
                    <img class="footer_map_mapdiv_text_icon" src="<?php echo get_template_directory_uri(); ?>/assets/img/footer/map-icon.png" alt="">
                    <p><span class="footer_map_mapdiv_text_span">MAP</span><br>アクセスマップ</p>
                </div>
                <div class="footer_map_mapdiv_map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3079.7866590650383!2d141.27937507437557!3d39.47414811247057!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x5f858b7c69cd6787%3A0xdd8938fcb82adc2!2z44Ks44Op44K55L2T6aiT5bel5oi_IOajruOBruOBj-OBqw!5e0!3m2!1sja!2sjp!4v1764309442262!5m2!1sja!2sjp" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <p class="footer_map_text">
                バス停「大迫地域診療センター」／岩手県交通から徒歩約9分<br>
                JR新花巻駅から車で約23分／遠野方面から車で約25分
            </p>
        </section>

        <section class="footer_contact">
            <p class="footer_contact_title">
                CONTACT
            </p>
            <div class="footer_contact_content">
                <!-- ガラス -->
                <?php 
                            $args_main = array(
                                'post_type'      => 'footer_company', // ★カスタム投稿タイプを指定
                                'tax_query'      => array(             // ★タクソノミーで絞り込み
                                    array(
                                        'taxonomy' => 'company_category',
                                        'field'    => 'slug',
                                        'terms'    => 'glass',          // スラッグ: 
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
                                    $store_name = get_field('store_name', get_the_ID());
                                    $tel = get_field('tel', get_the_ID());
                                    $businesshours = get_field('businesshours', get_the_ID());
                        ?>
                        <div class="footer_contact_content_company">
                            <p class="footer_contact_content_company_title"><?php echo esc_html($store_name); ?></p>
                            <div class="footer_contact_content_company_detail">
                                <div>
                                    <p>TEL</p>
                                    <p>営業時間</p>
                                </div>
                                <div>
                                    <p><?php echo esc_html($tel); ?></p>
                                    <p><?php echo esc_html($businesshours); ?></p>
                                </div>
                            </div>
                            <p>※体験予約はお電話にてお願い致します。</p>
                            <a class="footer_contact_content_company_button" href="<?php echo esc_url(home_url('/glasspage')); ?>">詳細はこちら</a>
                        </div>
                                <?php endwhile; wp_reset_postdata(); ?>
                            <?php endif; ?>
                <!-- レストラン -->
                <?php 
                            $args_main = array(
                                'post_type'      => 'footer_company', // ★カスタム投稿タイプを指定
                                'tax_query'      => array(             // ★タクソノミーで絞り込み
                                    array(
                                        'taxonomy' => 'company_category',
                                        'field'    => 'slug',
                                        'terms'    => 'restaurant',          // スラッグ: 
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
                                    $store_name = get_field('store_name', get_the_ID());
                                    $tel = get_field('tel', get_the_ID());
                                    $businesshours = get_field('businesshours', get_the_ID());
                        ?>
                        <div class="footer_contact_content_company">
                            <p class="footer_contact_content_company_title"><?php echo esc_html($store_name); ?></p>
                            <div class="footer_contact_content_company_detail">
                                <div>
                                    <p>TEL</p>
                                    <p>営業時間</p>
                                </div>
                                <div>
                                    <p><?php echo esc_html($tel); ?></p>
                                    <p><?php echo esc_html($businesshours); ?></p>
                                </div>
                            </div>
                            <a class="footer_contact_content_company_button" href="<?php echo esc_url(home_url('/restaurantpage')); ?>">詳細はこちら</a>
                        </div>
                                <?php endwhile; wp_reset_postdata(); ?>
                            <?php endif; ?>
                <!-- ホテル -->
                <?php 
                            $args_main = array(
                                'post_type'      => 'footer_company', // ★カスタム投稿タイプを指定
                                'tax_query'      => array(             // ★タクソノミーで絞り込み
                                    array(
                                        'taxonomy' => 'company_category',
                                        'field'    => 'slug',
                                        'terms'    => 'hotel',          // スラッグ: 
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
                                    $store_name = get_field('store_name', get_the_ID());
                                    $tel = get_field('tel', get_the_ID());
                                    $businesshours = get_field('businesshours', get_the_ID());
                                    $checkin = get_field('checkin', get_the_ID());
                                    $checkout = get_field('checkout', get_the_ID());
                        ?>
                        <div class="footer_contact_content_company">
                            <p class="footer_contact_content_company_title">ホテル ベルンドルフ</p>
                            <div class="footer_contact_content_company_detail">
                                <div>
                                    <p>TEL</p>
                                    <p>営業時間</p>
                                </div>
                                <div>
                                    <p><?php echo esc_html($tel); ?></p>
                                    <p><?php echo esc_html($businesshours); ?></p>
                                    <div>
                                        <p>ホテル チェックイン <?php echo esc_html($checkin); ?></p>
                                        <p>　　　 チェックアウト <?php echo esc_html($checkout); ?></p>
                                    </div>
                                </div>
                            </div>
                            <a class="footer_contact_content_company_button" href="<?php echo esc_url(home_url('/hotelpage')); ?>">詳細はこちら</a>
                        </div>
                                <?php endwhile; wp_reset_postdata(); ?>
                            <?php endif; ?>
                <!-- ワインシャトー大迫店 -->
                <div class="footer_contact_content_company">
                    <p class="footer_contact_content_company_title">ワインシャトー大迫店</p>
                    <div class="footer_contact_content_company_detail">
                        <div>
                            <p>TEL</p>
                            <p>営業時間</p>
                        </div>
                        <div>
                            <p>0198-48-3200</p>
                            <p>9:00～16:30</p>
                        </div>
                    </div>
                </div>
                
            </div>
        </section>

        <nav class="footer_nav">
            <ul>
                <li><a href="<?php echo esc_url(home_url('/glasspage')); ?>">ガラス体験工房 森のくに</a></li>
                <li><a href="<?php echo esc_url(home_url('/restaurantpage')); ?>">レストラン ベルンドルフ</a></li>
                <li><a href="<?php echo esc_url(home_url('/hotelpage')); ?>">ホテル ベルンドルフ</a></li>
                <li><a href="<?php echo esc_url(home_url('/noticepage')); ?>">お知らせ</a></li>
                <li><a href="<?php echo esc_url(home_url('/contactpage')); ?>">お問い合わせ</a></li>
            </ul>
        </nav>

        <section class="footer_copyright">
            <p>&copy; EDEL WEIN support. All Rights reserved.</p>
        </section>
    </footer>
</body>
</html>
