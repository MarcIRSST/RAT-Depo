<?php

/**
 * Annexes (posts) archive page
 */
get_header();
$annexes_archive_content = get_field("annexes_archive_content", 'options');
$query = new WP_Query(array(
    'post_type' => 'post',
    'posts_per_page' => -1,
    'meta_key' => 'short_title',
    'orderby' => 'short_title',
    'order'   => 'ASC',
));
?>
<div id="primary">
    <main id="main" class="site-main archive archive--annexes" role="main">
        <?php
        $hero_title = '<h1>' . __('Annexes', 'treize') . '</h1>';
        $has_search = false;
        include(locate_template('components/partials/archive/hero.php'));
        ?>
        <section class="archive annexes wrapper">
            <div class="row">
                <div class="col-xxl-4 col-xl-6 col-md-8 col-sm-12">
                    <div class="annexes__description"><?php echo $annexes_archive_content; ?></div>
                </div>
                <div class="annexes__container col-xxl-7 col-xxl-offset-1 col-xl-12 col-xl-offset-0">
                    <?php if ($query->have_posts()) :
                        while ($query->have_posts()) : $query->the_post();
                            include(locate_template('components/partials/cards/annex.php'));
                        endwhile;
                        wp_reset_postdata();
                    endif; ?>
                </div>
            </div>
        </section>
    </main><!-- #main -->
</div><!-- #primary -->
<?php get_footer();
