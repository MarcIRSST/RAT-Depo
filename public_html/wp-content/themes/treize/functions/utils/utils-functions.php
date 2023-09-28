<?php

function include_repeater($path, $field_name, $debug = false)
{
    if ($debug) {
        var_dump($field_name);
    }

    foreach ($field_name as $key => $module) {
        include(locate_template($path, false, false));
    }
}


function assets($path)
{
    echo get_bloginfo("template_url") . '/assets/' . $path;
}


function get_assets($path)
{
    return get_bloginfo("template_url") . '/assets/' . $path;
}


function card_loop_treize($card_path, $args = array())
{

    $default_args = array(
        'post_type' => 'post',
        'load_more_label' => __('Load more', 'treize'),
        'initial_posts_number' => get_option('posts_per_page'),
        'infinite_scroll' => false,
    );

    $args = array_merge($default_args, $args);

    $query_args = array(
        'post_type' => $args['post_type'],
        'numberposts' =>  -1,
        'suppress_filters' => false,
    );

    if (isset($args['category'])) {
        $query_args['category__in'] = [$args['category']];
    }

    $the_posts = get_posts($query_args);
    $max_index = count($the_posts) >= $args['initial_posts_number'] ? $args['initial_posts_number'] : count($the_posts);

    echo '<div class="posts-container">'; // open posts-container
    echo '<div id="container-items-to-be-loaded-in" class="cards-container row" data-path="' . $card_path . '">'; // open cards-container

    for ($i = 0; $i < $max_index; $i++) {
        global $post;
        $post = $the_posts[$i];
        setup_postdata($post);
        include(locate_template($card_path, false, false));
    }

    wp_reset_postdata();

    echo '</div>'; // close cards-container
    $add_button = !$args['infinite_scroll'];
    $btn_load_more_label = $args['load_more_label'];
    include(locate_template('components/integrations/loadmore-btn.php', false, false));
    echo '</div>'; // close posts-container
}


function clean_phone_number($field)
{
    $cleanPhone = str_replace(array(' ', '-', '.', '/'), '', $field);
    return $cleanPhone;
}

function clean_wysiwyg($rawField)
{
    $cleanField = strip_tags($rawField, '<strong><em><u>');
    return $cleanField;
}

function check_if_empty($array)
{
    foreach ($array as $item) {
        if ($item) {
            return true;
        }
    }
    return false;
}

function slugify($string)
{
    return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $string), '-'));
}

/**
 * get_clean_table_content
 * @description Clean the data returned by ACF to include only the correcte columns
 *
 * @param  array $table_manager_content
 * @return array $table
 */
function get_clean_table_content(array $table_manager_content)
{
    $manager_columns = $table_manager_content['table_manager_columns'];
    $manager_rows = $table_manager_content['table_manager_rows'];
    $table = array(
        'has_headers' => false,
        'headers' => array(),
        'rows' => array()
    );

    foreach ($manager_columns as $i => $col) {

        if ($col['col_is_active']) {
            $col_key_parts = explode('_', $i);
            $col_number = end($col_key_parts);
            $table['headers'][$col_number] =  array(
                'label' => $col['col_header'],
                'is_centered' => $col['col_is_centered']
            );

            if (strlen($col['col_header']) > 0) {
                $table['has_headers'] = true;
            }

            foreach ($manager_rows as $j => $row) {
                if (isset($table['rows'][$j])) {
                    array_push($table['rows'][$j]['data'], $row['col_content_' . $col_number]);
                } else {
                    $table['rows'][$j] = array(
                        'with_background' => $row['with_background'],
                        'data' => array($row['col_content_' . $col_number])
                    );
                }
            }
        }
    }

    return $table;
}


/**
 * get_anchor_navigation
 * @description Create a usable array to generate an anchored navigation based on flexible content
 *
 * @param  array $modules Flexible content of the page
 * @return array
 */
function get_anchor_navigation($modules)
{
    $anchors = array();
    $anchor_main = null;

    foreach ($modules as $module) {

        if ($anchor_group = $module['anchor_group']) {

            if (strlen($anchor_group['anchor_id']) > 0) {

                $anchor_data = array(
                    'id' => $anchor_group['anchor_id'],
                    'label' => $anchor_group['anchor_label'],
                    'number' => $anchor_group['anchor_number'],
                );

                if ($anchor_group['anchor_main']) {
                    $anchor_main = $anchor_group['anchor_id'];
                    $anchors[$anchor_main] = array(
                        'main' => $anchor_data,
                        'childs' => array()
                    );
                    continue;
                }

                if ($anchor_main) {
                    $anchors[$anchor_main]['childs'][] = $anchor_data;
                } else {
                    $anchors[] = $anchor_data;
                }
            }
        }
    }

    return $anchors;
}
