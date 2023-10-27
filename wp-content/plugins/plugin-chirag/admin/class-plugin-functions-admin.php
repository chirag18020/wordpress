<?php
if ( ! defined( 'WPINC' ) ){
	die;
}
if( ! class_exists( 'WP_List_Table' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
	require_once(ABSPATH . 'wp-admin/includes/template.php' );
}
class Plugin_Functions_Admin extends WP_List_Table {
	private $table_data;
	public function __construct() {
		add_action('admin_menu', array($this, 'List_Items_Menu'));
		add_filter( 'set_screen_option_' . 'list_per_page', function($status, $option, $value) {
			return (int) $value;
		}, 10, 3);
		add_filter( 'submenu_file', array($this, 'remove_menu' ));
		parent::__construct(
			array(
				'plural'   => 'list-data',
				'singular' => 'list-data',
				'screen'   => isset( $args['screen'] ) ? $args['screen'] : null,
			)
		);
	}
	function List_Items_Menu() {
			global $menus;
			//$menus = add_menu_page( 'List Data', 'List Items', 'manage_options', 'list-data', array($this, 'List_All_Users_Data'), 'dashicons-media-spreadsheet', 6 );
			//add_submenu_page("list-data", "Add Items", "Add Items", 'manage_options', "add-items", [$this, "Add_List_Items"]);
			$menus = add_menu_page(
									__( 'List Items', $this->plugin_name ),
									__( 'List Items', $this->plugin_name ),
										'manage_options',
										$this->plugin_name . '/list-data',
										[ $this, 'List_All_Users_Data' ],
										'dashicons-welcome-widgets-menus',
										6
								);
				add_submenu_page(
										$this->plugin_name . '/list-data',
									__( 'Add Items', $this->plugin_name ),
									__( 'Add Items', $this->plugin_name ),
										'manage_options',
										$this->plugin_name . '/add-item',
										[ $this, 'Add_List_Items' ]
								);
				add_submenu_page(
										$this->plugin_name . '/list-data',
									__( 'Edit Item', $this->plugin_name ),
									__( 'Edit Item', $this->plugin_name ),
										'manage_options',
										$this->plugin_name . '/update-item',
										[ $this, 'Edit_List_Item' ]
								);
		
		add_action( "load-".$menus, array($this, 'add_options') );
	}
	function add_options() {
        global $table;
		$args = array( 'label' => 'List Items Show', 'default' => 3, 'option' => 'list_per_page' );
		add_screen_option( 'per_page', $args );
		$table = new Plugin_Functions_Admin();
	}
	
	function remove_menu( $submenu_file ) {
		global $plugin_page;
		$hidden_submenus = array(
			'update-item' => true,
		);
		foreach ( $hidden_submenus as $submenu => $unused ) {
			remove_submenu_page( 'list-data', $submenu );
		}
		return $submenu_file;
	}
	function no_items() {
		_e( 'No books list found, dude.' );
	}
	public function get_itemlist() {
		global $wpdb;
		$table = $wpdb->prefix . 'list_user';
        return $wpdb->get_results( "SELECT * from {$table}", ARRAY_A );
		
	}
	public function prepare_items() {
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
	
	public function get_bulk_actions() {
		$actions = [ 'bulk-delete' => 'Delete' ];
		return $actions;
	}
	function column_cb($item) {
        return sprintf( '<input type="checkbox" name="list-items[]" value="%s" />', $item['u_id'] );    
    }
	public function get_columns() {
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
	function get_sortable_columns() {
		$sortable_columns = array(
			'u_id'  => array('u_id',false),
			'u_name' => array('u_name',false),
			'u_email'   => array('u_email',false),
			'u_phone'   => array('u_phone',false)
		);
		return $sortable_columns;
	}
	function usort_reorder( $a, $b ) {
		// If no sort, default to title
		$orderby = ( ! empty( $_GET['orderby'] ) ) ? $_GET['orderby'] : 'u_id';
		// If no order, default to asc
		$order = ( ! empty($_GET['order'] ) ) ? $_GET['order'] : 'asc';
		// Determine sort order
		$result = strcmp( $a[$orderby], $b[$orderby] );
		// Send final sort direction to usort
		return ( $order === 'asc' ) ? $result : -$result;
	}
	
	public function column_default($item, $column_name) {
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
	function column_u_id($item) {
		$actions = array(
							'edit'      => sprintf('<a href="?page=update-item&item-id='.$item['u_id'].'">Edit</a>'),
							'delete'    => sprintf('<a href="?page=%s&action=%s&item-id=%s">Delete</a>',$_REQUEST['page'],'delete-item',$item['u_id']),
						);
		return sprintf('%1$s %2$s', $item['u_id'], $this->row_actions($actions) );
	}
   
	function List_All_Users_Data(){
		$table = new Plugin_Functions_Admin();
		echo '<div class="wrap"><h2>My List Table Test</h2>'; 
				$table->prepare_items(); 
				echo '<form method="post">';
						echo '<input type="hidden" name="page" value="'.$_REQUEST['page'].'" />';
						$table->search_box('search', 'search_id'); 
				echo '</form>';
				$table->display(); 
		echo '</div>'; 
	}
	function Add_List_Items(){
		$this->Save_List_Items();
			include_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/views/add-new-items.php';
		exit;
	}
	function Save_List_Items() {
		if ( isset( $_POST['name_of_nonce_field'] ) && wp_verify_nonce( $_POST['name_of_nonce_field'], 'name_of_nonce_field' ) ) 
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
			$data_insert = array(	'u_name' => $name, 
									'u_email' => $email,
									'u_phone' => $phone
								);
			$wpdb->insert($table_name , $data_insert);
			echo "Successfully inserted record.";
			echo("<script>location.href = 'admin.php?page=".$this->plugin_name."list-data';</script>");
			exit;
		}
	}
	function Edit_List_Item(){
		$this->Update_List_Item();
			include_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/views/update-item.php';
		exit;
	}
	function Update_List_Item(){
		if ( isset( $_POST['update_page_item'] ) && wp_verify_nonce( $_POST['update_page_item'], 'update_page_item' ) ) 
		{	
			global $wpdb;
			$table_name = $wpdb->prefix . "list_user";
			$id = $_POST['u_id'];
			$name = $_POST['name'];
			$email = $_POST['email'];
			$phone = $_POST['phone']; 
			$data_update = array(	'u_name' => $name, 
									'u_email' => $email,
									'u_phone' => $phone
								);
			$data_where = array('u_id' => $id);
			$query = $wpdb->update($table_name , $data_update, $data_where);
			echo "Successfully Updated record.";
			echo("<script>location.href = 'admin.php?page=".$this->plugin_name."list-data';</script>");
			exit;
		}	
	}
}




$menu_sidebar = new Plugin_Functions_Admin();
