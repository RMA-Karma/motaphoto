<?php

function register_my_menu() {
    register_nav_menu( 'main-menu', 'Menu principal' );
	register_nav_menu( 'menu-footer', 'Menu footer');
}
add_action( 'after_setup_theme', 'register_my_menu' );


function wpdocs_theme_name_scripts() {
	wp_enqueue_style( 'motaphoto-style', get_stylesheet_uri());
	//wp_enqueue_script( 'script', get_template_directory_uri() . '/js/example.js');
}
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );