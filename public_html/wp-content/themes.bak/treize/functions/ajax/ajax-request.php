<?php
function ajax_scripts()
{
    /** @var wp_query $wp_query WP Query */
    global $wp_query;
    global $posts_per_page;
    global $infinite_scroll;

    $posts_per_page = get_option('posts_per_page');
    $infinite_scroll = false;

    if (is_home() || is_category()) {
        $wp_query->set('posts_per_page', $posts_per_page);
    }

    $number_of_pages = ceil($wp_query->found_posts / $posts_per_page);
    $infinite_scroll ? $loadMoreFile = 'load-more-scroll.js' : $loadMoreFile = 'load-more-button.js';

    wp_register_script('loadmore', get_stylesheet_directory_uri() . '/assets/js/' . $loadMoreFile, array('jquery'));
    wp_localize_script('loadmore', 'updatePostList', array(
        'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php',
        'posts' => json_encode($wp_query->query_vars),
        'current_page' => get_query_var('paged') ? get_query_var('paged') : 1,
        'max_page' => $number_of_pages
    ));
    wp_enqueue_script('loadmore');
}

add_action('wp_enqueue_scripts', 'ajax_scripts');
