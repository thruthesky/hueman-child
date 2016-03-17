<?php
/**
 * @file functions.php
 *
 *
 */
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'style', get_stylesheet_uri() );
    wp_enqueue_style('font-awesome', get_stylesheet_directory_uri() . '/etc/font-awesome/css/font-awesome.min.css');
    wp_enqueue_script( 'hueman-child', get_stylesheet_directory_uri() . '/js/hueman-child.js' );
}
add_action('after_setup_theme', 'remove_admin_bar');
