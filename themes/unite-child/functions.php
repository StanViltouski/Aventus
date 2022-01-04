<?php

add_action( 'wp_enqueue_scripts', 'my_child_theme_scripts' );


function my_child_theme_scripts() {

    /*=== Styles ===*/

	wp_enqueue_style('aventus-main-styles', get_stylesheet_directory_uri() . '/inc/css/main.css', array('bootstrap', 'unite-icons', 'unite-style'));
}

