<?php
// Theme Support
function jobboard_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
}
add_action('after_setup_theme', 'jobboard_theme_setup');

// Register Custom Post Type: Job
function jobboard_register_job_post_type() {
    $labels = array(
        'name' => 'Jobs',
        'singular_name' => 'Job',
        'menu_name' => 'Jobs',
        'name_admin_bar' => 'Job',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Job',
        'new_item' => 'New Job',
        'edit_item' => 'Edit Job',
        'view_item' => 'View Job',
        'all_items' => 'All Jobs',
        'search_items' => 'Search Jobs',
        'parent_item_colon' => 'Parent Jobs:',
        'not_found' => 'No jobs found.',
        'not_found_in_trash' => 'No jobs found in Trash.',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'jobs'),
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_icon' => 'dashicons-briefcase',
        'show_in_rest' => true,
    );

    register_post_type('job', $args);
}
add_action('init', 'jobboard_register_job_post_type');

// Register Navigation Menu
function jobboard_register_menus() {
    register_nav_menus(array(
        'main-menu' => __('Main Menu'),
    ));
}
add_action('init', 'jobboard_register_menus');

// Enqueue Styles and Scripts
function jobboard_enqueue_scripts() {
    // Bootstrap CSS
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css');

    // Main stylesheet
    wp_enqueue_style('jobboard-style', get_stylesheet_uri());

    // Bootstrap JS
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'jobboard_enqueue_scripts');

function exclude_jobs_from_blog($query) {
    if (!is_admin() && $query->is_main_query() && is_home()) {
        $query->set('post_type', 'post'); // Only show regular posts on blog
    }
}
add_action('pre_get_posts', 'exclude_jobs_from_blog');



