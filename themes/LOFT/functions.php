<?php 
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );
function enqueue_parent_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}

function custom_excerpt_length( $length ) {
	return 30;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function add_google_fonts() {

wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Raleway:300,400,700', false ); 
}

add_action( 'wp_enqueue_scripts', 'add_google_fonts' );