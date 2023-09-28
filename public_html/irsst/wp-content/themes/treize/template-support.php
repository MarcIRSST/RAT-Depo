<?php

/**
 * Template Name: Support
 *
 * @package TREIZE
 */

get_header();
$object = get_queried_object();
?>

<div id="primary">
    <main id="main" role="main">
        <?php
        // Using the purpose hero because the client wanted to add a contextual text
        include(locate_template('components/modules/purpose-hero.php'));
        include(locate_template('components/modules/main-flexible.php', false, false));
        ?>
    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer();
