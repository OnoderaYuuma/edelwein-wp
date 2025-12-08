<?php get_header(); ?>
<main>
    <?php
    if (have_posts()) :
        while (have_posts()) :
            the_post();
    ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div>
                    <h1><?php the_title(); ?></h1>

                    <div class="content-Meta">
                        <?php
                        the_category('｜');
                        ?>
                        <?php
                        $m = get_the_date('m');
                        ?>
                        <a href="<?php echo get_month_link($y, $m); ?>" class="content-Meta_Date">
                            <time date-time="<?php echo get_the_date('Y-m-d'); ?>">
                                <?php echo get_the_date(); ?>
                            </time>
                        </a>
                    </div>

                    <?php if (has_post_thumbnail()): ?>
                        <div class="content-EyeCatch">
                            <?php the_post_thumbnail('page_eyecatch'); ?>
                        </div>
                    <?php endif; ?>

                    <?php the_content(); ?>
                </div>
                <div class="content-Nav">
                    <div class="content-Nav_Prev">
                        <?php previous_post_link('&lt; %link'); ?>
                    </div>
                    <div class="content-Nav_Next">
                        <?php next_post_link('%link &gt;'); ?>
                    </div>
                </div>
            </article>
        <?php endwhile; ?>
    <?php endif; ?>
</main>
<?php get_footer(); ?>