<?php
$global_glossaries = [];
$global_tooltips = [];

/**
 * treize_acf_save_post
 *
 * @param  Int $post_id The post id that is being saved
 * @return void
 */
function treize_acf_save_post($post_id)
{
    global $global_glossaries;
    global $global_tooltips;
    $theme_settings = get_field('theme_settings', 'option');

    if ($theme_settings && isset($theme_settings['auto_inject_tooltips']) && $theme_settings['auto_inject_tooltips']) {
        // get the glossaries only once when saving the post
        $global_glossaries = get_posts([
            'post_type' => 'glossaries',
            'numberposts' => -1
        ]);

        // get the tooltips only once when saving the post
        $global_tooltips = get_posts([
            'post_type' => 'tooltips',
            'numberposts' => -1
        ]);

        if (isset($_POST['post_type']) && $_POST['post_type'] === 'page' || $_POST['post_type'] === 'post') {
            array_walk_recursive($_POST['acf'], 'update_fields_recursively');
        }
    }
}

add_action('acf/save_post', 'treize_acf_save_post', 5);

/**
 * update_fields_recursively
 *
 * @param  String &$value The wysiwyg content to update
 * @param  String $key The key of the field we need to update
 
 * @return String updates the value using a direct reference with `&`
 */
function update_fields_recursively(&$value, $key)
{
    global $global_glossaries;
    global $global_tooltips;
    $info = get_field_object($key);

    if ($info && isset($info['type']) && $info['type'] === 'wysiwyg') {
        foreach ($global_glossaries as $glossary) {
            $label = strtolower($glossary->post_title);
            $id = $glossary->ID;

            // Replace glossary title with the already entered text (case insensitive because of the ~i)
            // Skip and fail when the glossary title is already between quotes (thus in a shortcode) ~".*?"(*SKIP)(*FAIL)
            // Make sure the glossary title is not part of a bigger word by using word boundaries `\bword\b
            $value = preg_replace('~".*?"(*SKIP)(*FAIL)|\b' . preg_quote($label, '/') . '\b~i', "[tooltip-link-treize id=\"$id\" text=\"$0\"]", $value);
        }

        foreach ($global_tooltips as $tooltip) {
            $label = strtolower($tooltip->post_title);
            $id = $tooltip->ID;

            // Replace tooltip title with the already entered text (case insensitive because of the ~i)
            // Skip and fail when the tooltip title is already between quotes (thus in a shortcode) ~".*?"(*SKIP)(*FAIL)
            // Make sure the tooltip title is not part of a bigger word by using word boundaries `\bword\b
            $value = preg_replace('~".*?"(*SKIP)(*FAIL)|\b' . preg_quote($label, '/') . '\b~i', "[tooltip-treize id=\"$id\" text=\"$0\"]", $value);
        }
    }
}

/**
 * treize_add_shortcode_to_caption
 *
 * @param  String $output
 * @return void
 */
function treize_caption($output, $attr, $content)
{
    if (is_feed()) {
        return $output;
    }

    $defaults = array(
        'id' => '',
        'align' => 'alignnone',
        'width' => '',
        'caption' => ''
    );

    $attr = shortcode_atts($defaults, $attr);

    if (1 > $attr['width'] || empty($attr['caption'])) {
        return $content;
    }

    $attributes = (!empty($attr['id']) ? ' id="' . esc_attr($attr['id']) . '"' : '');
    $attributes .= ' class="wp-caption ' . esc_attr($attr['align']) . '"';
    $attributes .= ' style="width: ' . esc_attr($attr['width']) . 'px"';

    $output = '<div' . $attributes . '>';
    $output .= do_shortcode($content);
    $output .= '<p class="wp-caption-text">' . do_shortcode($attr['caption']) . '</p>';
    $output .= '</div>';

    return $output;
}

add_filter('img_caption_shortcode', 'treize_caption', 1, 3);
