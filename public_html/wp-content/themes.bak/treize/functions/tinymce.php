<?php //Tiny MCE modifications
function my_mce_buttons_2($buttons)
{
    array_unshift($buttons, 'styleselect');
    return $buttons;
}
add_filter('mce_buttons_2', 'my_mce_buttons_2');

function my_add_mce_button()
{
    if (!current_user_can('edit_posts') && !current_user_can('edit_pages')) {
        return;
    }
    if (true) {
        add_filter('mce_external_plugins', 'my_add_tinymce_plugin');
        add_filter('mce_buttons', 'my_register_mce_button');
    }
}
add_action('acf/fields/wysiwyg/toolbars', 'my_add_mce_button');

function my_add_tinymce_plugin($plugin_array)
{
    $plugin_array['my_mce_button'] = get_template_directory_uri() . '/assets/js/mce-button.js';
    return $plugin_array;
}

function my_register_mce_button($buttons)
{
    array_push($buttons, 'mybutton');
    array_push($buttons, 'treize-tooltip');
    array_push($buttons, 'treize-tables');
    array_push($buttons, 'treize-bordered-content');
    return $buttons;
    //Tiny MCE modifications
}

/*
* Callback function to filter the MCE settings
*/

function my_mce_before_init_insert_formats($init_array)
{

    $style_formats = array(
        array(
            'title' => 'Bigger paragraph',
            'block' => 'span',
            'classes' => 'big-text',
            'wrapper' => true,
        ),
        array(
            'title' => 'Medium paragraph',
            'block' => 'span',
            'classes' => 'medium-text',
            'wrapper' => true,
        ),
    );

    $init_array['style_formats'] = json_encode($style_formats);

    return $init_array;
}
// Attach callback to 'tiny_mce_before_init' 
add_filter('tiny_mce_before_init', 'my_mce_before_init_insert_formats');
