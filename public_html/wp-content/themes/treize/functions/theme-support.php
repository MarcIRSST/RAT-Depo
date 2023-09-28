<?php
load_theme_textdomain('treize', get_template_directory() . '/languages');
add_theme_support('automatic-feed-links');
add_theme_support('title-tag');
add_theme_support('menus');
add_theme_support('post-thumbnails');
add_theme_support('html5', array(
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
));
add_theme_support('custom-background', apply_filters('treize_custom_background_args', array(
    'default-color' => 'ffffff',
    'default-image' => '',
)));
add_theme_support('customize-selective-refresh-widgets');
add_theme_support('custom-logo', array(
    'height'      => 250,
    'width'       => 250,
    'flex-width'  => true,
    'flex-height' => true,
));
add_editor_style('assets/css/editor-styles.css');
