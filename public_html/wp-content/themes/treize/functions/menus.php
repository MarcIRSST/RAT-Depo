<?php
/**
 * Shows adminbar on frontend
 * 
 * */
function admin_bar(){

  if(is_user_logged_in()){
    add_filter( 'show_admin_bar', '__return_true' , 1000 );
  }
}
add_action('init', 'admin_bar' );

/**
 * Register the menus required by the theme
 *
 * @return void
 */
function treize_register_nav_menu()
{
    register_nav_menus(array(
        'primary-menu' => __('Menu Principale', 'treize'),
        'secondary-menu'  => __('Menu secondaire', 'treize'),
        'footer-context-menu' => esc_html__('Pied de page - Contexte', 'treize'),
        'footer-data-menu' => esc_html__('Pied de page - Données', 'treize'),
        'footer-useful-links-menu' => esc_html__('Pied de page - Liens utiles', 'treize'),
		/*GB */
		'footer-historique' => esc_html__('Pied de page - Historique', 'treize'),
		/*fin GB*/
    ));
}

add_action('after_setup_theme', 'treize_register_nav_menu');

/**
 * Add classes, icons, and description to the appropriate element within
 * the primary-menu location
 * 
 * @param string $item_output, HTML output for the menu item
 * @param object $item, menu item object
 * @param int $depth, depth in menu structure
 * @param object $args, arguments passed to wp_nav_menu()
 * @return string $item_output
 */
function treize_modify_primary_menu_links($item_output, $item, $depth, $args)
{
    if ($args->theme_location === 'primary-menu') {

        // Add a text-[THEME] class, add big arrow svg, add description
        if (in_array('menu-item--highlight', $item->classes)) {

            if (function_exists('get_field')) {
                $theme = get_field('page_theme', $item->object_id);
                $item_output = str_replace('href=', 'class="text-' . $theme . '" href=', $item_output);
            }

            $svg = '<svg xmlns="http://www.w3.org/2000/svg" width="42.537" height="42.538"><g fill="none" stroke="#303030" stroke-width="3"><path data-name="Tracé 50" d="M31.666 14.696l.12 17.09-17.09-.12"/><path data-name="Tracé 51" d="M31.02 31.205L8.395 8.578"/></g></svg>';
            $item_output = str_replace('</a>', '<span class="arrow--medium">' . $svg . '</span></a><span class="description">' . $item->description . '</span>', $item_output);
        }

        // Add theme-[PAGE_THEME] class for submenu styling
        if ($depth === 0) {
            if (function_exists('get_field')) {
                $theme = get_field('page_theme', $item->object_id);
                $item_output = str_replace('href=', 'class="theme-' . $theme . '" href=', $item_output);
            }
        }

        // Add small svg arrow
        if ($depth >= 1 && !in_array('menu-item--highlight', $item->classes)) {
            $item_output = str_replace('<a', '<a class="cta--main" ', $item_output);
        }
    }

    return $item_output;
}

add_filter('walker_nav_menu_start_el', 'treize_modify_primary_menu_links', 10, 4);


/**
 * Add classes and icons appropriate element within  the secondary-menu location
 * 
 * @param string $item_output, HTML output for the menu item
 * @param object $item, menu item object
 * @param int $depth, depth in menu structure
 * @param object $args, arguments passed to wp_nav_menu()
 * @return string $item_output
 */
function treize_modify_secondary_menu_links($item_output, $item, $depth, $args)
{
    if ($args->theme_location === 'secondary-menu' || $args->theme_location === 'footer-context-menu') {

        // Add a search icons
        if (in_array('menu-item--search-trigger', $item->classes)) {
            $svg = '<svg xmlns="http://www.w3.org/2000/svg" width="22.599" height="22.6" viewBox="0 0 22.599 22.6"><defs><style>.si{fill:none;stroke:#121212;stroke-width:2px;}</style></defs><g transform="translate(1.414 9.899) rotate(-45)"><rect class="si" width="12" height="12" rx="6"/><path class="si" d="M-8032,614.96v-6" transform="translate(8038 -597)"/></g></svg>';
            $item_output = str_replace($item->post_title, '<span class="search-icon">' . $svg . '</span>' . $item->post_title, $item_output);
        }

        // Add number of glossaries entries
        if (in_array('menu-item--glossaries', $item->classes)) {
            $number_of_glossaries = wp_count_posts('glossaries')->publish;
            $item_output = str_replace('</a>', '<sup class="glossaries-counter">(' . $number_of_glossaries . ')</sup></a>', $item_output);
        }
    }

    return $item_output;
}

add_filter('walker_nav_menu_start_el', 'treize_modify_secondary_menu_links', 10, 4);
