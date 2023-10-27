<?php
if ( ! defined( 'WPINC' ) ){
	die;
}
if( ! class_exists( 'WP_List_Table' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
	require_once(ABSPATH . 'wp-admin/includes/template.php' );
}
class Crude_Functions_Admin extends WP_List_Table {
	private $table_data;
	Public function __construct() {
		
		add_action( 'wp_ajax_save_data', array( $this, 'save_data' ) );
		add_action( 'wp_ajax_nopriv_save_data', array( $this, 'save_data' ) );
		add_action( 'wp_ajax_update_data', array( $this, 'update_data' ) );
		add_action( 'wp_ajax_nopriv_update_data', array( $this, 'update_data' ) );
		add_action( 'wp_ajax_delete_data', array( $this, 'delete_data' ) );
		add_action( 'wp_ajax_nopriv_delete_data', array( $this, 'delete_data' ) );
		add_action( 'wp_ajax_view_data', array( $this, 'view_data' ) );
		add_action( 'wp_ajax_nopriv_view_data', array( $this, 'view_data' ) );
		
		add_action('admin_menu', array($this, 'Crude_Menus'));
		add_filter( 'set_screen_option_' . 'list_per_page', function($status, $option, $value) {
			return (int) $value;
		}, 10, 3);
		add_filter( 'submenu_file', array($this, 'hide_left_menu' ));
		parent::__construct(
			array(
				'plural'   => 'crude-operation',
				'singular' => 'crude-operation',
				'ajax'     => true,
				'screen'   => isset( $args['screen'] ) ? $args['screen'] : null,
			)
		);
		
	}
	Public function Crude_Menus() {
			global $menuitems;
			$menuitems = add_menu_page(
									__( 'Crude Operation', $this->plugin_name ),
									__( 'Crude Operation', $this->plugin_name ),
										'manage_options',
										$this->plugin_name . '/crude-operation',
										[ $this, 'view_data' ],
										'dashicons-welcome-widgets-menus',
										15
								);
				add_submenu_page(
										$this->plugin_name . '/crude-operation',
									__( 'Add Items', $this->plugin_name ),
									__( 'Add Items', $this->plugin_name ),
										'manage_options',
										$this->plugin_name . '/insert-item',
										[ $this, 'insert_data_page' ]
								);
				add_submenu_page(
										$this->plugin_name . '/crude-operation',
									__( 'Edit Item', $this->plugin_name ),
									__( 'Edit Item', $this->plugin_name ),
										'manage_options',
										$this->plugin_name . '/update-data',
										[ $this, 'edit_data' ]
								);
				add_submenu_page(
						$this->plugin_name . '/crude-operation',
					__( 'Edit Item', $this->plugin_name ),
					__( 'Edit Item', $this->plugin_name ),
						'manage_options',
						$this->plugin_name . '/delete-data',
						[ $this, 'delete_data' ]
				);
		
		add_action( "load-".$menuitems, array($this, 'screen_items') );
	}
	Public function screen_items() {
        global $table;
		$args = array( 'label' => 'List Items Show', 'default' => 3, 'option' => 'list_per_page' );
		add_screen_option( 'per_page', $args );
		$table = new Crude_Functions_Admin();
	}
	
	Public function hide_left_menu( $submenu_file ) {
		global $plugin_page;
		$hidden_submenus = array(
			'update-data' => true,
			'delete-data' => true,
		);
		foreach ( $hidden_submenus as $submenu => $unused ) {
			remove_submenu_page( 'crude-operation', $submenu );
		}
		return $submenu_file;
	}
	Public function no_items() {
		_e( 'No books list found, dude.' );
	}
	Public function get_itemlist() {
		global $wpdb;
		$table = $wpdb->prefix . 'list_user';
        return $wpdb->get_results( "SELECT * from {$table}", ARRAY_A );
		
	}
	Public function prepare_items() {
		//data
        $this->table_data = $this->get_itemlist();
        $columns  = $this->get_columns();
		$hidden   = array();
        $sortable = $this->get_sortable_columns();
        $primary  = 'u_id';
        $this->_column_headers = array($columns, $hidden, $sortable, $primary);
        usort($this->table_data, array(&$this, 'usort_reorder'));
        /* pagination */
		$per_page = $this->get_items_per_page('list_per_page', 3);
        $current_page = $this->get_pagenum();
        $total_items = count($this->table_data);

        $this->table_data = array_slice($this->table_data, (($current_page - 1) * $per_page), $per_page);

        $this->set_pagination_args(array(
                'total_items' => $total_items,
                'per_page'    => $per_page,
                'total_pages' => ceil( $total_items / $per_page )
        ));

        $this->items = $this->table_data;
	  
	}
	
	function get_bulk_actions() {
		$actions = [ 'bulk-delete' => 'Delete' ];
		return $actions;
	}
	Public function column_cb($item) {
        return sprintf( '<input type="checkbox" name="list-items[]" value="%s" />', $item['u_id'] );    
    }
	Public function get_columns() {
		$columns = array();
		$columns = array(
			"cb" => "<input type='checkbox' />",
			"u_id" => "ID",
			"u_name" => "Name",
			"u_email" => "Email",
			"u_phone" => "Phone"
		);
		return $columns;
	}
	Public function get_sortable_columns() {
		$sortable_columns = array(
			'u_id'  => array('u_id',false),
			'u_name' => array('u_name',false),
			'u_email'   => array('u_email',false),
			'u_phone'   => array('u_phone',false)
		);
		return $sortable_columns;
	}
	Public function usort_reorder( $a, $b ) {
		// If no sort, default to title
		$orderby = ( ! empty( $_GET['orderby'] ) ) ? $_GET['orderby'] : 'u_id';
		// If no order, default to asc
		$order = ( ! empty($_GET['order'] ) ) ? $_GET['order'] : 'asc';
		// Determine sort order
		$result = strcmp( $a[$orderby], $b[$orderby] );
		// Send final sort direction to usort
		return ( $order === 'asc' ) ? $result : -$result;
	}
	
	Public function column_default($item, $column_name) {
		switch($column_name) {
			case 'u_id':
			case 'u_name':
			case 'u_email':
			case 'u_phone':
			
		return $item[$column_name];
			default:
		return "No Values";
		}
		
	}
	Public function column_u_id($item) {
		$dnonce = wp_create_nonce( 'delete-nonce_'.$item['u_id']);
		$actions = array(
							'edit'      => sprintf('<a href="?page=update-data&action-id='.$item['u_id'].'">Edit</a>'),
							//'delete'    => sprintf('<a id="delete-data" href="?page=delete-data&_wpnonce='.$dnonce.'&action-id='.$item['u_id'].'">Delete</a>'),
							'delete'    => sprintf('<a class="delete-data" data-_wpnonce="'.$dnonce.'" data-action_id="'.$item['u_id'].'" >Delete</a>'),
						);
		return sprintf('%1$s %2$s', $item['u_id'], $this->row_actions($actions) );
	}
   
	Public function view_data(){
		$table = new Crude_Functions_Admin();
		echo '<div id="view-all-data" class="wrap"><h2>Crude Operation Data</h2>'; 
				echo '<div id="feedback"></div>';
				$table->prepare_items(); 
				echo '<form method="post">';
						echo '<input type="hidden" name="page" value="'.$_REQUEST['page'].'" />';
						$table->search_box('search', 'search_id'); 
				echo '</form>';
				$table->display(); 
		echo '</div>'; 
	}
	Public function insert_data_page(){
		$this->save_data();
			include_once plugin_dir_path( dirname( __FILE__ ) ) . 'partials/crude-operation-admin-display.php';
		//exit;
	}
	Public function save_data() {
		if ( isset( $_POST['insert_data_nonce_field'] ) && wp_verify_nonce( $_POST['insert_data_nonce_field'], 'insert_data_nonce_field' ) ) 
		{
			global $wpdb;
			$table_name = $wpdb->prefix . "list_user";
			$charset_collate = $wpdb->get_charset_collate();
			$sql = "CREATE TABLE IF NOT EXISTS $table_name (
			  u_id bigint(20) NOT NULL AUTO_INCREMENT,
			  u_name varchar(255),
			  u_email varchar(255),
			  u_phone varchar(255),
			  PRIMARY KEY u_id (u_id)
			) $charset_collate;";
			require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
			dbDelta($sql);
			$name = $_POST['name'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			if(!empty($name) && !empty($email) && !empty($phone)){
					$data_insert = array(	
							'u_name' => $name, 
							'u_email' => $email,
							'u_phone' => $phone
					);
					$result = $wpdb->insert($table_name , $data_insert);
					if($result == 1){
							echo 'Successfully inserted record.';
					}
				wp_die();
			}else{
				echo "Invalide request!";
				wp_die();
			}
		}
	}
	Public function edit_data(){
		$this->update_data();
		include_once plugin_dir_path( dirname( __FILE__ ) ) . 'partials/crude-operation-admin-edit.php';
		exit;
	}
	Public function update_data(){
		if ( isset( $_POST['update_data_nonce_field'] ) && wp_verify_nonce( $_POST['update_data_nonce_field'], 'update_data_nonce_field' ) ) 
		{	
			global $wpdb;
			$table_name = $wpdb->prefix . "list_user";
			$id = $_POST['action-id'];
			$name = $_POST['name'];
			$email = $_POST['email'];
			$phone = $_POST['phone']; 
			$data_update = array(	'u_name' => $name, 
									'u_email' => $email,
									'u_phone' => $phone
								);
			$data_where = array('u_id' => $id);
			$query = $wpdb->update($table_name , $data_update, $data_where);
			if($query == 1){
				echo 'Successfully Updated record.';
				wp_die();
			}else{
				echo 'Invalide request!';
				wp_die();
			}
		}
	}
	Public function delete_data(){

		$action_id = $_POST['action_id'];
		if ( ! wp_verify_nonce( $_POST['nonce'], 'delete-nonce_'.$action_id ) ) {
			die( 'Link has been expired!');
		}

		global $wpdb;
		$table_name = $wpdb->prefix . "list_user";
		if(!empty($action_id) && ( wp_verify_nonce( $_POST['nonce'], 'delete-nonce_'.$action_id ) ) ){ 
			$data_where = array('u_id' => $action_id);
			$delete = $wpdb->delete($table_name , $data_where);
			if($delete == 1){
				echo 'Success fully deleted record.';
			}else{
				echo 'Invalide request!';
			}
		}
		wp_die();
	}
}


$menu_sidebar2 = new Crude_Functions_Admin();
