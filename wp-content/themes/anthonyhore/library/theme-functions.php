<?php

function add_site_favicon() {
    printf('<link rel="icon" href="%s" />', get_stylesheet_directory_uri() . '/dist/favicon/favicon.ico');
}
add_action('login_head', 'add_site_favicon');
add_action('admin_head', 'add_site_favicon');

// Change block editor to classic editor
// add_filter('use_block_editor_for_post', '__return_false');