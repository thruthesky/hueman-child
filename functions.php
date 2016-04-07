<?php
/**
 * @file functions.php
 *
 *
 */

//include get_stylesheet_directory() . '/wp-include/library.php';

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'style', get_stylesheet_uri() );
    wp_enqueue_style('font-awesome', get_stylesheet_directory_uri() . '/etc/font-awesome/css/font-awesome.min.css');
    wp_enqueue_script( 'hueman-child', get_stylesheet_directory_uri() . '/js/hueman-child.js' );

    wp_enqueue_style( 'dashicons' );
    wp_enqueue_script( 'wp-util' );
}
add_action('after_setup_theme', 'remove_admin_bar');


function philgo_ad( $part ) {
    $id = 'philgo-ad';
    $response = get_transient( $id );
    if( false === $response ) {
        $response = wp_remote_get( 'http://www.philgo.com/?module=etc&action=ad&submit=1' );
        set_transient( $id, $response, 60 * 60 * 24 ); // 하루 동안 캐시
    }
	if ( is_wp_error($response) ) {
		delete_transient( $id );
		return;
	}
    $body = $response['body'];
    if ( empty($body) ) return null;
    $json = json_decode($body, true);
    if ( isset($json[$part]) ) return $json[$part];
    else return null;
}
