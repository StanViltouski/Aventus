<?php
/**
 * Plugin Name: My AJAX
 */

add_action( 'wp_ajax_get_cat', 'ajax_show_posts' );
add_action( 'wp_ajax_nopriv_get_cat', 'ajax_show_posts' );


function ajax_show_posts() {

	$link = ! empty( $_POST['link'] ) ? esc_attr( $_POST['link'] ) : false;
	$slug = $link ? wp_basename( $link ) : false;


    $resent_list = new WP_Query(array('post_type'=> 'estate', 'order'=> 'ASC', 'posts_per_page'=> -1, 'categories-agency' => $slug));

    if ( $resent_list->have_posts() ) :
        while ( $resent_list->have_posts() ) :
        $resent_list->the_post();

	require plugin_dir_path( __FILE__ ) . 'view.php';

    endwhile; endif;
	wp_die();
}

add_action( 'wp_enqueue_scripts', 'my_assets' );


function my_assets() {
	wp_enqueue_script( 'my-ajax-script', plugins_url( 'index.js', __FILE__ ), array( 'jquery' ) );

	wp_localize_script( 'my-ajax-script', 'url', array(
		'ajaxurl' => admin_url( 'admin-ajax.php' )
	));
}