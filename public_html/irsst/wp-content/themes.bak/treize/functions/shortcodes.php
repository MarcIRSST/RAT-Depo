<?php

/**
 * Create a tooltip based on the ressource id or the parameters.
 * 
 * @example [tooltip-treize id="" text=""]
 *
 * @param  array $attrs The attributes passed to the shortcode
 * @return void
 */
function treize_tooltip_shortcode(array $attrs)
{
    remove_filter('the_content', 'wpautop');
    $supported_ressources = array('tooltips', 'glossaries', 'bibliographies');
    $a = shortcode_atts(array(
        'id' => null,
        'text' => '',
    ), $attrs);

    // If the id is invalid
    if (get_post_status($a['id']) === FALSE) {
        return '<span style="color: red">' . sprintf(__('Le "id": %s n\'existe pas.', 'treize'), $a['id']) . '</span>';
    }

    // If the id is an unsupported ressource
    if (!in_array(get_post_type($a['id']), $supported_ressources)) {
        return '<span style="color: red">' . sprintf(__('Ressources: post type "%s" n\'a pas de support pour les tooltips.', 'treize'), get_post_type($a['id'])) . '</span>';
    }

    $tooltip = get_tooltip_data($a['id']);
    $tooltip['text'] = $a['text'];

    ob_start();
    include(locate_template('components/partials/tooltip.php'));
    $html = ob_get_clean();
    return $html;
}

/**
 * Create a tooltip based on the ressource id or the parameters.
 * 
 * @example [tooltip-treize id="" text=""]
 *
 * @param  array $attrs The attributes passed to the shortcode
 * @return void
 */
function treize_tooltip_link_shortcode(array $attrs)
{
    remove_filter('the_content', 'wpautop');
    $supported_ressources = array('tooltips', 'glossaries', 'bibliographies');
    $a = shortcode_atts(array(
        'id' => null,
        'text' => '',
    ), $attrs);

    // If the id is invalid
    if (get_post_status($a['id']) === FALSE) {
        return '<span style="color: red">' . sprintf(__('Le "id": %s n\'existe pas.', 'treize'), $a['id']) . '</span>';
    }

    // If the id is an unsupported ressource
    if (!in_array(get_post_type($a['id']), $supported_ressources)) {
        return '<span style="color: red">' . sprintf(__('Ressources: post type "%s" n\'a pas de support pour les tooltips.', 'treize'), get_post_type($a['id'])) . '</span>';
    }

    $tooltip = get_tooltip_data($a['id']);
    $tooltip['text'] = $a['text'];

    ob_start();
    include(locate_template('components/partials/tooltip-link.php'));
    $html = ob_get_clean();
    return $html;
}

/**
 * Utils function to get the fields according to the proper id
 *
 * @param  array $ids
 * @return array $data Key => value array of tooltip data
 */
function get_tooltip_data($id)
{
    $data = array();
    $tooltip_fields = array(
        'tooltip_show_title',
        'tooltip_subtitle',
        'tooltip_content',
        'tooltip_link_label',
        'tooltip_custom_link_url',
        'tooltip_has_custom_link'
    );

    $data['ID'] = $id;
    $data['title'] = get_the_title($id);

    foreach ($tooltip_fields as $field_label) {
        $key = str_replace('tooltip_', '', $field_label);
        $data[$key] = get_field($field_label, $id);
    }

    if (!isset($data['link_url'])) {
        $data['link_url'] = get_the_permalink($id);
    }

    return $data;
}

/**
 * Add a complex table within a wysiwyg
 * 
 * @example [table-treize id=""]
 *
 * @param  array $attrs The attributes passed to the shortcode
 * @return void
 */
function treize_table_shortcode(array $attrs)
{
    $a = shortcode_atts(array(
        'id' => null,
    ), $attrs);

    // If the id is invalid
    if (get_post_status($a['id']) === FALSE) {
        return '<span style="color: red">' . sprintf(__('Le "id": %s n\'existe pas.', 'treize'), $a['id']) . '</span>';
    }

    $row = array(
        'table' => get_field('table', $a['id']),
        'has_wrapper' => false
    );

    ob_start();
    include(locate_template('components/modules/table.php'));
    $html = ob_get_clean();
    return $html;
}

/**
 * Initialize all of our custom shortcodes.
 *
 * @return void
 */
function treize_shortcodes()
{
    add_shortcode('tooltip-treize', 'treize_tooltip_shortcode');
    add_shortcode('tooltip-link-treize', 'treize_tooltip_link_shortcode');
    add_shortcode('table-treize', 'treize_table_shortcode');
}

add_action('init', 'treize_shortcodes');
