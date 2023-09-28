<?php
//Base Scripts
wp_enqueue_script('treize-smooth-scroll-polyfill', get_template_directory_uri() . '/assets/js/smooth-scroll-polyfill.js', 'jquery', '4.0', true);
wp_enqueue_script('treize-hide-header', get_template_directory_uri() . '/assets/js/hide-header.js', 'jquery', '4.0', true);
wp_enqueue_script('treize-hover', get_template_directory_uri() . '/assets/js/hover.js', 'jquery', '4.0', true);
wp_enqueue_script('treize-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true);
wp_enqueue_script('treize-html5shiv', 'https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js');
wp_enqueue_script('treize-accordions', get_template_directory_uri() . '/assets/js/accordions.js', 'jquery', '4.0', true);
wp_enqueue_script('treize-global', get_template_directory_uri() . '/assets/js/global.js', 'jquery', '4.0', true);

if (is_post_type_archive('glossaries') || is_post_type_archive('bibliographies') || is_home()) {
    wp_enqueue_script('treize-archive', get_template_directory_uri() . '/assets/js/archive.js', 'jquery', '4.0', true);
    wp_enqueue_script('treize-scroll-aware-navigation', get_template_directory_uri() . '/assets/js/scroll-aware-navigation.js', array(), '20210629', true);
}

if (get_page_template_slug() === 'template-purpose.php') {
    wp_enqueue_script('treize-scroll-aware-navigation', get_template_directory_uri() . '/assets/js/scroll-aware-navigation.js', array(), '20210629', true);
    wp_enqueue_script('treize-progress-bar', get_template_directory_uri() . '/assets/js/progress-bar.js', array(), '20210629', true);
}

// FancyBox
wp_enqueue_style('fancy-css', 'https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css');
wp_enqueue_script('fancy-js', 'https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js', 'jquery', '4.0', true);

wp_script_add_data('treize-html5shiv', 'conditional', 'lt IE 9');
