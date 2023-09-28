<?php
get_header();
?>
<div id="primary">

    <main id="main" class="site-main archive-news" role="main">
        <?php include(locate_template('components/modules/secondary-hero.php', false, false)); ?>
        <div class="wrapper">
            <?php
            include(locate_template('components/integrations/archive-filters.php', false, false));
            card_loop_treize(
                'components/partials/cards/annexes.php',
                array(
                    'category' => get_queried_object()->term_id
                )
            );
            ?>
        </div>
    </main><!-- #main -->

</div><!-- #primary -->
<?php get_footer();
