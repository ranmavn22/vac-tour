<?php
if (!defined('ABSPATH')) {
    die();
}
function temoignages_init() {
	register_post_type( 'temoignages', array(
		'labels'            => array(
			'name'                => __( 'Temoignages', 'enfold' ),
			'singular_name'       => __( 'Temoignages', 'enfold' ),
			'all_items'           => __( 'All Temoignages', 'enfold' ),
			'new_item'            => __( 'New Temoignages', 'enfold' ),
			'add_new'             => __( 'Add New', 'enfold' ),
			'add_new_item'        => __( 'Add New Temoignages', 'enfold' ),
			'edit_item'           => __( 'Edit Temoignages', 'enfold' ),
			'view_item'           => __( 'View Temoignages', 'enfold' ),
			'search_items'        => __( 'Search Temoignages', 'enfold' ),
			'not_found'           => __( 'No Temoignages found', 'enfold' ),
			'not_found_in_trash'  => __( 'No Temoignages found in trash', 'enfold' ),
			'parent_item_colon'   => __( 'Parent Temoignages', 'enfold' ),
			'menu_name'           => __( 'Temoignages', 'enfold' ),
		),
		'public'            => true,
		'hierarchical'      => false,
		'show_ui'           => true,
		'show_in_nav_menus' => true,
		'supports'          => array( 'title', 'editor','thumbnail', 'excerpt' ),
		'has_archive'       => true,
		'rewrite'           => array( 'slug' => 'temoignages' ,'with_front' => false ),
		'query_var'         => true,
		'menu_icon'         => 'dashicons-admin-post',
		'show_in_rest'      => true,
		'rest_base'         => 'temoignages',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'temoignages_init' );