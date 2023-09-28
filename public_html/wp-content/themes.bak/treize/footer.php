<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Treize
 */


$footer = get_field('footer', 'option');
$title = null;
$content = null;
$logo = null;


if ($footer) {
    $title = $footer['title'];
    $content = $footer['content'];
    $logo = $footer['logo'];
    $first_menu_title = $footer['first-menu-title'] ?? '';
    $second_menu_title = $footer['second-menu-title'] ?? '';
}
?>
</div>
<footer>
    <div class="wrapper">
        <div class="footer-logo">
            <?php include(locate_template('assets/svg/logo-white.svg', false, false)); ?>
        </div>

        <div class="row footer-content">

            <div class="col-xxl-4 col-md-12 xs-text">
                <?php if ($content) : ?>
                    <p><?php echo $content; ?></p>
                <?php endif; ?>
            </div>

            <div class="col-xxl-4 col-md-12 footer-menu">
                <?php if (has_nav_menu('footer-context-menu')) : ?>
                    <h6><?php echo $first_menu_title; ?></h6>
                    <?php wp_nav_menu(array('theme_location' => 'footer-context-menu')); ?>
                <?php endif; ?>
            </div>

            <div class="col-xxl-4 col-md-12 footer-menu">
                <?php if (has_nav_menu('footer-data-menu')) : ?>
                    <h6><?php echo $second_menu_title; ?></h6>
                    <?php wp_nav_menu(array('theme_location' => 'footer-data-menu')); ?>
                <?php endif; ?>
            </div>

        </div>

        <div class="row footer-bottom">
            <div class="credits col-xxl-4 col-md-12 footer--bottom-col">
                <?php if ($logo) : ?>
                    <a href="<?php echo home_url(); ?>" class="logo-container" title="<?php _e('Return to home', 'treize'); ?>">
                        <img src="<?php echo $logo['sizes']['sizes-1024']; ?>" alt="<?php $logo['alt'] ?: _e('IRSST\'s logo', 'treize'); ?>">
                    </a>
                <?php endif; ?>
                <p>© <?php echo date("Y"); ?> IRSST. <?php _e('Tous droits réservés.', 'treize'); ?></p>
            </div>
            <div class="col-xxl-4 col-md-12 menu--useful-links footer--bottom-col">
                <?php if (has_nav_menu('footer-useful-links-menu')) : ?>
                    <?php wp_nav_menu(array('theme_location' => 'footer-useful-links-menu')); ?>
                <?php endif; ?>
            </div>

            <div class="treize-link-container col-xxl-4 col-md-12 footer--bottom-col">
				<a href="https://retourautravail.irsst.qc.ca/uncategorized/production" class="treize-link">Réalisation du site</a>
                <!--<a href="https://treize.pro/" target="_blank" class="treize-link"><?php _e('Conception web par ', 'treize'); ?><span>TREIZE</span></a>-->
            </div>
        </div>

    </div>
</footer><!-- #colophon -->
</div>

<?php include(locate_template('components/partials/search/modal.php')); ?>

<?php wp_footer(); ?>

</body>

</html>
