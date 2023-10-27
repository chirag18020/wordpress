<?php
if ( ! defined( 'WPINC' ) ){
	die;
}

class Menu_Sidebar {
	public function __construct() {
		add_action('admin_menu', array($this, 'chirag_menu_sidebar'));
	}
	
	function chirag_menu_sidebar() {
		add_menu_page( 'List Data', 'List Items', 'manage_options', 'list-data', 'list_callback_function', 'dashicons-media-spreadsheet', 6 );
	/* 	 add_menu_page( 
			'Page Title', 
			'Menu Title', 
			'edit_posts', 
			'menu_slug', 
			'page_callback_function', 
			'dashicons-media-spreadsheet',
			6
		); */
	}
}
	function list_callback_function(){
		echo "Test";
	}
$menu_sidebar = new Menu_Sidebar();
