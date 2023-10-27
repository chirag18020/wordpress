<?php
if ( ! defined( 'WPINC' ) ){
	die;
}
class Crude_Posttype_Admin {
	function __construct() {
		add_action( 'init', array ($this, 'create_crude_posttype' ) );
		//add_filter( 'register_post_type_args', array ($this, 'my_post_type_args') );
	}
	function create_crude_posttype() {
	register_post_type( 'crudepost',
			array(
				'labels' => array(
					'name' => __( 'CRUDE POST TYPE' ),
					'singular_name' => __( 'CRUDE POST TYPE' )
				),
				'public' => true,
				'has_archive' => true,
				'rest_base'          => 'result',
				'rest_controller_class' => 'WP_REST_Posts_Controller',
				'rewrite' => array('slug' => 'crudepost'),
				'show_in_rest' => true,
	  
			)
		);
	}
	
	
}


$crude_posttype_admin = new Crude_Posttype_Admin();
