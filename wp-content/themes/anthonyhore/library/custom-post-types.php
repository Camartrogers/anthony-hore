<?php
// ----- Register post types -----
add_action('init', 'register_cpts');
function register_cpts()
{
    // Product
    $labels = array(
        "name" => "Projects",
        "singular_name" => "Project",
    );

    $projects_args = array(
        "labels" => $labels,
        "public" => true,
        "rewrite" => array("with_front" => false, "slug" => "projects"),
        "menu_icon" => "dashicons-post-status",
        "show_ui" => true,
        "has_archive" => false,
        'publicly_queryable'  => true,
        "show_in_menu" => true,
        'show_in_rest'    => true,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "hierarchical" => true,
        "query_var" => true,
        "supports" => array("title", "editor", "revisions", "page-attributes", "thumbnail"),
    );

    register_post_type("projects", $projects_args);
}