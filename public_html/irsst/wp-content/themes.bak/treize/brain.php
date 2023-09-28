<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Treize
 */

global $template;
$template_name = explode('.', basename($template))[0];
$page_theme = get_field('page_theme');
$theme_class = 'theme-neutral';
$theme_colors = array(
    'impacts' => '#DC481E',
    'orange' => '#DC481E',
    'process' => '#3462E0',
    'blue' => '#3462E0',
    'neutral' => '#303030'
);
$theme_css_var = array('padding-top: 110px;', '--header-h:110px;');

if (!is_search()) {
    if ($page_theme) {
        $theme_class = 'theme-' . $page_theme;
        $theme_css_var[] = '--theme-color:' . $theme_colors[$page_theme] . ';';
    } else {
        $theme_css_var[] = '--theme-color:' . $theme_colors['neutral'] . ';';
    }
}


?>
<!doctype html>
<html <?php language_attributes(); ?> class="<?php echo $template_name . '-html' ?>">

<head>
    <!-- Google Tag Manager -->
    <script>
        (function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-NLG74N');

    </script>
    <!-- End Google Tag Manager -->
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="stylesheet" href="https://use.typekit.net/rzc3xer.css"> <!-- link to typography -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_assets('/images/fav'); ?>/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_assets('/images/fav'); ?>/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_assets('/images/fav'); ?>/favicon-16x16.png">
    <link rel="manifest" href="<?php echo get_assets('/images/fav'); ?>/site.webmanifest">
    <link rel="mask-icon" href="<?php echo get_assets('/images/fav'); ?>/safari-pinned-tab.svg" color="#000000">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <?php wp_head(); ?>
</head>

<body <?php body_class($theme_class); ?> style="<?php echo join('', $theme_css_var) ?>">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NLG74N" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div class="grid">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
    </div>
