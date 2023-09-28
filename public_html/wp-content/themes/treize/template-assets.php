<?php
/* Template Name: Assets */
$object = get_queried_object();
get_header();
?>
<div id="primary" class="assets">
    <main id="main" role="main">
        <div class="wrapper">
            <div class="section-main-container">
                <div class="section wrapper">
                    <?php include(locate_template('components/assets-examples/typos.php', false, false)); ?>
                </div>

                <div class="section wrapper">
                    <?php include(locate_template('components/assets-examples/buttons.php', false, false)); ?>
                </div>

                <div class="section wrapper">
                    <?php include(locate_template('components/assets-examples/ctas.php', false, false)); ?>
                </div>
            </div>
        </div>
    </main><!-- #main -->
</div><!-- #primary -->
<?php get_footer();
