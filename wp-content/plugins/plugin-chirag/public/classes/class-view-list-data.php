<?php
if ( ! defined( 'WPINC' ) ){
	die;
}

class View_List_Data {
	public function __construct() {
		add_shortcode('List-View-Data', array($this, 'get_list_data'));
	}
	
	public function get_list_data(){
		echo "Temppppppppp";
	}
	
}

$viewListData = new View_List_Data();