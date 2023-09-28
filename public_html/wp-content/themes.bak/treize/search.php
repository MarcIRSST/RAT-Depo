<?php

/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package TREIZE
 */
get_header();
global $wp_query;
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main search-results">
        <section class="hero hero--search">
            <div class="wrapper">
                <div class="row search-results__term">
                    <h1 class="col-xxl-10 col-lg-8 col-sm-12"><?php echo get_search_query(); ?></h1>
                    <div class="search-results__close col-xxl-2 col-lg-4 col-sm-12 first-sm">
                        <a href="javascript:history.back()" id="archive-close" title="<?php _e('Retour à la page précédente', 'treize') ?>" class="back-button">
                            <?php _e('Fermer', 'treize'); ?>
                            <i><?php include(locate_template('assets/svg/close-icon.svg')); ?></i>
                        </a>
                    </div>
                </div>
                <div class="row search-results__total">
                    <div class="col-xxl-12">
                        <?php echo sprintf(__('<span>%s</span> résultats de recherches', 'treize'), $wp_query->found_posts) ?>
                    </div>
                </div>
            </div>
        </section>
        <?php if (have_posts()) : ?>
            <section class="search-results__list">
                <div class="wrapper">
                    <table class="search-results__table">
                        <thead>
                            <tr>
                                <th class="term"><?php _e('Terme', 'treize') ?></th>
                                <th class="place"><?php _e('Localisation', 'treize'); ?></th>
                                <th class="action"><?php _e('Action', 'treize'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while (have_posts()) : the_post();
                                include(locate_template('components/partials/search/search-result.php'));
                            endwhile;
                            wp_reset_postdata(); ?>
                        </tbody>
                    </table>
                </div>
            </section>
        <?php endif; ?>
    </main><!-- #main -->
</div><!-- #primary -->

<?php
// TODO: Add autocomplete
// https://searchwp.com/extensions/live-search/

get_footer();
