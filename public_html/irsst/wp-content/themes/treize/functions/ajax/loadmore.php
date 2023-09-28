<?php
function loadmore_handler()
{
    $initial_args = json_decode(stripslashes($_POST['query']), true);
    $card_path =  $_POST['path'];

    $query_args = array(
        'paged' => $_POST['page'] + 1,
        'post_type' => $initial_args['post_type'],
        'posts_per_page' => $initial_args['posts_per_page'],
        'suppress_filters' => false,
    );

    if (isset($initial_args['category_name']) && strlen($initial_args['category_name']) > 0) {
        $query_args['tax_query'] = array(
            array(
                'taxonomy' => 'category',
                'field' => 'slug',
                'terms' => $initial_args['category_name'],
            ),
        );
    }

    $the_posts = get_posts($query_args);
    $nb_of_posts = count($the_posts);
    $max_index = $nb_of_posts > intval($initial_args['posts_per_page']) ? $initial_args['posts_per_page'] : $nb_of_posts;

    if (count($the_posts) > 0) {
        for ($i = 0; $i < $max_index; $i++) {
            global $post;
            $post = $the_posts[$i];
            setup_postdata($post);
            include(locate_template($card_path, false, false));
        }
    }

    wp_reset_postdata();
    wp_die();
}
add_action('wp_ajax_loadmore', 'loadmore_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore', 'loadmore_handler'); // wp_ajax_nopriv_{action}
