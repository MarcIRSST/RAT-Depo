<?php include(locate_template('brain.php', false, false)); ?>

<header id="masthead" class="site__header" data-back-button-text="<?php _e('Retour', 'treize'); ?>">
    <nav class="wrapper nav">
        <a href="<?php echo home_url(); ?>" class="nav__site-title" title="<?php echo get_bloginfo('description'); ?>">
            <?php include(locate_template('assets/svg/logo.svg', false, false)); ?>
        </a>
        <div class="nav__wrapper">
            <?php if (has_nav_menu('primary-menu')) : ?>
                <?php wp_nav_menu(array(
                    'theme_location' => 'primary-menu',
                    'container_class' => 'nav__main'
                )); ?>
            <?php endif; ?>
            <?php if (has_nav_menu('secondary-menu')) : ?>
                <?php wp_nav_menu(array(
                    'theme_location' => 'secondary-menu',
                    'container_class' => 'nav__secondary'
                )); ?>
            <?php endif; ?>
        </div>
        <div class="nav__logo">
            <a href="<?php echo home_url(); ?>" title="<?php _e('Institut de recherche Robert-Sauvé en santé et en sécurité du travail') ?>">
                <?php include(locate_template('assets/svg/irsst-color-logo.svg')); ?>
            </a>
        </div>
    </nav>
    <div class="hamburger-menu">
        <div id="menu-toggler" class="hamburger-menu__toggler">
            <div class="hamburger-menu__line"></div>
            <div class="hamburger-menu__line"></div>
        </div>
    </div>
</header><!-- #masthead -->


<div class="site__content">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'treize'); ?></a>
    <div id="content" class="site-content">
