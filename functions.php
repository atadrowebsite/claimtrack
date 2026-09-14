<?php
if (!defined('ABSPATH')) { exit; }

add_action('after_setup_theme', function(){
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', array('height'=>160,'width'=>520,'flex-height'=>true,'flex-width'=>true));
});

function claimtrack_theme_is_app_page($post_id = 0) {
    if (!$post_id) {
        $obj = get_queried_object();
        if ($obj instanceof WP_Post) { $post_id = (int)$obj->ID; }
    }
    if (!$post_id) { return false; }
    $post = get_post($post_id);
    return ($post instanceof WP_Post) && has_shortcode((string)$post->post_content, 'claimtrack_app');
}

add_action('wp_enqueue_scripts', function(){
    wp_enqueue_style('claimtrack-theme-style', get_stylesheet_uri(), array(), wp_get_theme()->get('Version'));
});

// ClaimTrack adalah aplikasi front-end. WordPress admin bar selalu disembunyikan di sisi publik.
add_filter('show_admin_bar', '__return_false', PHP_INT_MAX);

add_filter('body_class', function($classes){
    if (claimtrack_theme_is_app_page()) { $classes[]='page-template-page-claimtrack'; }
    return $classes;
});

// Setiap page yang berisi shortcode ClaimTrack memakai shell full-screen yang sama.
add_filter('template_include', function($template){
    if (is_front_page() || (is_page() && claimtrack_theme_is_app_page())) {
        $app_template = get_theme_file_path('page-claimtrack.php');
        if (is_readable($app_template)) { return $app_template; }
    }
    return $template;
}, 99);
