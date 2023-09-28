<?php

/**
 * Treize functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Treize
 * 
 * 
 **/

if (!function_exists('treize_setup')) {
    function treize_setup()
    {
        include(locate_template('functions/theme-support.php', false, false));
        include(locate_template('functions/image-sizes.php', false, false));
    }
}

add_action('after_setup_theme', 'treize_setup');


function treize_widgets_init()
{
    register_sidebar(array(
        'name'          => esc_html__('Sidebar', 'treize'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Add widgets here.', 'treize'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'treize_widgets_init');



function treize_scripts()
{
    // ## Stylesheets
    wp_enqueue_style('treize-style', get_stylesheet_uri());

    // ## Scripts
    include(locate_template('functions/javascript.php', false, false));
}
add_action('wp_enqueue_scripts', 'treize_scripts');


show_admin_bar(false);
include(locate_template('functions/menus.php', false, false));
include(locate_template('functions/admin-menu.php', false, false));
include(locate_template('functions/custom-post-types.php', false, false));
include(locate_template('functions/shortcodes.php', false, false));
include(locate_template('functions/filters.php', false, false));
include(locate_template('functions/utils/utils-functions.php', false, false));
include(locate_template('functions/ajax/ajax-request.php', false, false));
include(locate_template('functions/ajax/loadmore.php', false, false));
include(locate_template('functions/tinymce.php', false, false));

if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => __('Archives', 'treize'),
        'menu_title' => __('Archives', 'treize')
    ));
}
