<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Treize
 */
get_header();
$object = get_queried_object();
$title = get_the_title();
?>
<div id="primary">
    <main id="main" class="site-main" role="main">
        <?php if ($title) : ?>
            <section class="single-header">
                <div class="wrapper">
                    <h1 class="col-xxl-10 col-sm-12"><?php echo $title; ?></h1>
                </div>
            </section>
        <?php endif; ?>
        <?php include(locate_template('components/modules/main-flexible.php', false, false)); ?>
    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer();
