<?php

/**
 * Utility function to register a custom post type without all the hassle
 *
 * @param  string $type
 * @param  string $singular_name
 * @param  string $plural_name
 * @param  array $args (optional) 
 */
function treize_cpt_registrar(string $type, string $singular_name, string $plural_name, array $args = array())
{
    $singular_name = strtolower($singular_name);
    $singular_name_capital = ucfirst($singular_name);
    $plural_name = strtolower($plural_name);
    $plural_name_capital = ucfirst($plural_name);;

    $labels = array(
        'name'                  => _x($plural_name_capital, 'Post Type General Name', 'treize'),
        'singular_name'         => _x($singular_name_capital, 'Post Type Singular Name', 'treize'),
        'menu_name'             => __($plural_name_capital, 'treize'),
        'name_admin_bar'        => __($plural_name_capital, 'treize'),
        'archives'              => __($singular_name_capital . ' Archives', 'treize'),
        'attributes'            => __($singular_name_capital . ' Attributes', 'treize'),
        'parent_item_colon'     => __('Parent ' . $singular_name . ':', 'treize'),
        'all_items'             => __('All ' . $plural_name, 'treize'),
        'add_new_item'          => __('Add New ' . $singular_name, 'treize'),
        'add_new'               => __('Add ' . $singular_name, 'treize'),
        'new_item'              => __('New ' . $singular_name, 'treize'),
        'edit_item'             => __('Edit ' . $singular_name, 'treize'),
        'update_item'           => __('Update ' . $singular_name, 'treize'),
        'view_item'             => __('View ' . $singular_name, 'treize'),
        'view_items'            => __('View ' . $plural_name, 'treize'),
        'search_items'          => __('Search ' . $singular_name, 'treize'),
        'not_found'             => __('Not found', 'treize'),
        'not_found_in_trash'    => __('Not found in Trash', 'treize'),
        'featured_image'        => __('Featured Image', 'treize'),
        'set_featured_image'    => __('Set featured image', 'treize'),
        'remove_featured_image' => __('Remove featured image', 'treize'),
        'use_featured_image'    => __('Use as featured image', 'treize'),
        'insert_into_item'      => __('Insert into ' . $singular_name, 'treize'),
        'uploaded_to_this_item' => __('Uploaded to this ' . $singular_name, 'treize'),
        'items_list'            => __($plural_name_capital . ' list', 'treize'),
        'items_list_navigation' => __($plural_name_capital . ' list navigation', 'treize'),
        'filter_items_list'     => __('Filter ' . $plural_name  . '  list', 'treize'),
    );

    $default_args = array(
        'label'                 => __($singular_name_capital, 'treize'),
        'labels'                => $labels,
        'supports'              => array('title'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
    );

    $mixed_args = array_merge($default_args, $args);

    register_post_type($type, $mixed_args);
}



/**
 * Utility function to register taxonomies without all the hassle
 *
 * @param  string $slug
 * @param  string $singular_name
 * @param  string $plural_name
 * @param  array $cpt_types
 * @param  array $args (optional) 
 * 
 * @return void
 */
function treize_tax_registrar(string $slug, string $singular_name, string $plural_name, array $cpt_types, array $args = array())
{
    $singular_name = strtolower($singular_name);
    $singular_name_capital = ucfirst($singular_name);
    $plural_name = strtolower($plural_name);
    $plural_name_capital = ucfirst($plural_name);;

    $labels = array(
        'name' => _x($plural_name_capital, 'taxonomy general name', 'treize'),
        'singular_name' => _x($singular_name_capital, 'taxonomy singular name', 'treize'),
        'search_items' =>  __('Search ' . $plural_name, 'treize'),
        'all_items' => __('All ' . $plural_name, 'treize'),
        'parent_item' => __('Parent ' . $singular_name, 'treize'),
        'parent_item_colon' => __('Parent ' . $singular_name . ':', 'treize'),
        'edit_item' => __('Edit ' . $singular_name, 'treize'),
        'update_item' => __('Update ' . $singular_name, 'treize'),
        'add_new_item' => __('Add new ' . $singular_name, 'treize'),
        'new_item_name' => __('New ' . $singular_name . ' name', 'treize'),
        'menu_name' => __('Manage ' . $plural_name_capital, 'treize'),
    );

    $default_args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'rewrite' => array('slug' => $slug),
    );

    $mixed_args = array_merge($default_args, $args);

    register_taxonomy($slug, $cpt_types, $mixed_args);
}


/**
 * Register all our of custom post type here
 *
 * @return void
 */
function treize_custom_post_type()
{
    treize_cpt_registrar('glossaries', 'glossaire', 'glossaire', array(
        'rewrite' => array('slug' => 'glossaire', 'with_front' => false),
        'menu_icon' => 'dashicons-format-quote'
    ));

    treize_cpt_registrar('bibliographies', 'bibliographie', 'bibliographie', array(
        'rewrite' => array('slug' => 'bibliographie', 'with_front' => false),
        'menu_icon' => 'dashicons-analytics'
    ));

    treize_cpt_registrar('tooltips', 'tooltip', 'tooltips', array(
        'publicly_queryable'  => false,
        'menu_icon' => 'dashicons-testimonial'
    ));

    treize_cpt_registrar('tables', 'tableau', 'tableaux', array(
        'publicly_queryable'  => false,
        'menu_icon' => 'dashicons-grid-view'
    ));
}

add_action('init', 'treize_custom_post_type', 0);


function treize_custom_taxonomies()
{
    treize_tax_registrar('sections', 'section', 'sections', array('bibliographies'));
}


add_action('init', 'treize_custom_taxonomies');

/**
 * Change the "post" post type menu labels to "Annex"
 *
 * @return void
 */
function treize_change_post_menu_label()
{
    global $menu;
    global $submenu;
    $menu[5][0] = __('Annexes', 'treize');
    $submenu['edit.php'][5][0] = __('Annexes', 'treize');
    $submenu['edit.php'][10][0] = __('Add annexes', 'treize');
    $submenu['edit.php'][16][0] = __('Annexes tags', 'treize');
    echo '';
}

add_action('admin_menu', 'treize_change_post_menu_label');


/**
 * Change the "post" post type labels to "Annex"
 *
 * @return void
 */
function treize_change_post_object_label()
{
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = __('Annexes', 'treize');
    $labels->singular_name = __('Annexes', 'treize');
    $labels->add_new = __('Add an annex', 'treize');
    $labels->add_new_item = __('Add an annex', 'treize');
    $labels->edit_item = __('Edit annexes', 'treize');
    $labels->new_item = __('New annex', 'treize');
    $labels->view_item = __('View annexes', 'treize');
    $labels->search_items = __('Search annexes', 'treize');
    $labels->not_found = __('No annexes found', 'treize');
    $labels->not_found_in_trash = __('No annexes found in Trash', 'treize');
}

add_action('init', 'treize_change_post_object_label');


/**
 * Remove theme and post functionnalities that we don't need
 *
 * @return void
 */
function treize_remove_post_editor()
{
    // Remove editors
    remove_post_type_support('post', 'editor');
    remove_post_type_support('page', 'editor');

    // Unregister default taxonomies
    register_taxonomy('category', array());
    register_taxonomy('post_tag', array());
}

add_action('init', 'treize_remove_post_editor');


/**
 * Manipulate post url to create anchors for single posts and single custom post type
 *
 * @param  string $url
 * @param  object $post
 * 
 * @return void
 */
function treize_filter_post_link($url, $post)
{
    if ($post->post_type === 'glossaries' || $post->post_type === 'bibliographies') {
        if (strpos($url, '%anchor%') !== false) {

            $archive_url = get_post_type_archive_link($post->post_type);

            if ($post->post_type !== 'post') {
                $archive_url = str_replace('%anchor%/', '', $archive_url);
            }

            $url = $archive_url . '#' . $post->post_name;
        }
    }

    return $url;
}

add_filter('post_link', 'treize_filter_post_link', 10, 2);
add_filter('post_type_link', 'treize_filter_post_link', 10, 2);

/**
 * Register a new rewrite rule
 *
 * @return void
 */
function treize_custom_post_type_permastruct()
{
    add_permastruct('bibliographies', '/%anchor%/', false);
    add_permastruct('glossaries', '/%anchor%/', false);
}

add_action('init', 'treize_custom_post_type_permastruct');
