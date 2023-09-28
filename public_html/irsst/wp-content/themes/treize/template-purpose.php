<?php

/**
 * Template Name: Objectif
 *
 * @package TREIZE
 */

get_header();
$object = get_queried_object();
$has_cta_banner = get_field('cta_destination');
$flexible_content = get_field('modules', $object);
$is_purpose = true;
?>

<div id="primary">
    <main id="main" role="main">
        <?php include(locate_template('components/modules/purpose-hero.php')); ?>
        <div class="purpose">
            <span class="purpose__progress-bar" id="progress-bar"></span>
            <nav class="purpose__nav nav" id="scroll-aware-navigation">
                <?php include(locate_template('components/partials/anchor-navigation.php', false, false)); ?>
            </nav>
            <div class="purpose__content" id="scroll-aware-content">
                <?php include(locate_template('components/modules/main-flexible.php', false, false)); ?>
            </div>
        </div>
        <?php if ($has_cta_banner) {
            include(locate_template('components/modules/cta-banner.php', false, false));
        } ?>
    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer();
