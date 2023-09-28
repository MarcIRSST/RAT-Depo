<?php

/**
 * Remove main menus items
 *
 * @return void
 */
function treize_remove_menus()
{
    if (get_current_user_id() != 1) {
    }
}

add_action('admin_menu', 'treize_remove_menus');

/**
 * Remove specific submenu pages from the admin
 *
 * @return void
 */
function treize_remove_sub_menus()
{
    remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=category');
    remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=post_tag');
}

add_action('admin_menu', 'treize_remove_sub_menus');
