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
?>

<div id="primary">
    <main id="main" class="site-main" role="main">
        <section class="erreur404">
            <div class="wrapper">
                <div class="centered">
                    <h1>Page non trouvée</h1>
                    <a href="<?php echo home_url(); ?>" class="cta--main"><?php _e('Retour à la page d\'accueil', 'treize'); ?></a>
                </div>
            </div>
        </section>
    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer();
