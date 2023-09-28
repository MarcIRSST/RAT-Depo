<?php

/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package TREIZE
 */

get_header();

$id = get_queried_object_id();
$object = get_queried_object();
$summary_info = get_field('summary_info');
?>

<div id="primary" class="front-page">
    <main id="main" role="main">
        <?php include(locate_template('components/modules/front-hero.php', false, false)); ?>
        <?php if ($summary_info) : ?>
            <section class="summary">
                <?php include_repeater('components/modules/summary.php', $summary_info, false); ?>
            </section>
        <?php endif; ?>
        <?php include(locate_template('components/modules/main-flexible.php', false, false)); ?>
    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer();
