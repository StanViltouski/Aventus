<?php

/*=== Агенства ===*/

function aventus_custompost_type_agency() {
	$labels = array(
		'name'                  => 'Агенства',
		'singular_name'         => 'Agency',
	);
	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'agency' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail'),
		'menu_icon'			 =>  'dashicons-open-folder',
	);
	register_post_type( 'agency', $args );
}

add_action( 'init', 'aventus_custompost_type_agency' );


/*=== Недвижимость ===*/

function aventus_custompost_type_estate() {
	$labels = array(
		'name'                  => 'Недвижимость',
		'singular_name'         => 'Estate',

	);
	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'еstate' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail'),
		'menu_icon'			 =>  'dashicons-admin-home',
	);
	register_post_type( 'estate', $args );
}
add_action( 'init', 'aventus_custompost_type_estate' );



/*=== Типы недвижимости ===*/

 function aventus_type_taxonomy_for_estate() {
	$args = array(
		'label'        => __( 'Типы недвижимости', 'type' ),
		'public'       => true,
		'rewrite'      => true,
		'hierarchical' => true
	);

	register_taxonomy( 'categories-estate', 'estate', $args );
}

add_action( 'init', 'aventus_type_taxonomy_for_estate', 0 );



/*=== Агенства для недвижимости ===*/

function aventus_agency_taxonomy_for_estate() {

	$args = array(
		'label'        => __( 'Агенства', 'agency' ),
		'public'       => true,
		'rewrite'      => true,
		'hierarchical' => true
	);

	register_taxonomy( 'categories-agency', 'estate', $args );

}

add_action( 'init', 'aventus_agency_taxonomy_for_estate', 0 );


/*=== Добавить Terms в Taxonomy Агенства ===*/

function aventus_agency_add_terms_taxonomy_for_estate () {

    $my_posts = get_posts( array(
    	'numberposts' => -1,
    	'post_type'    => 'agency',
    ) );

    foreach ($my_posts as $my_post) {
        wp_insert_term( $my_post->post_title, 'categories-agency', array(
            'description' => $my_post->post_title,
            'parent'      => 0,
            'slug'        => $my_post->post_name,
        ) );
    }
}

add_action( 'init', 'aventus_agency_add_terms_taxonomy_for_estate', 0 );
