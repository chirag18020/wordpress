<?php
if ( ! defined( 'WPINC' ) ){
	die;
}

class Plugin_Chirag {
	
	protected $loader;
	protected $plugin_name;
	protected $version;
	
	public function __construct() {
		if ( defined( 'PLUGIN_CHIRAG_VERSION' ) ) {
			$this->version = PLUGIN_CHIRAG_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'plugin-chirag';

		$this->load_dependencies();
		//$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}
	
	
	private function load_dependencies() {
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-plugin-chirag-loader.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-plugin-chirag-admin.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-plugin-menu-admin.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-plugin-functions-admin.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-plugin-chirag-public.php';
		
		$this->loader = new Plugin_Chirag_Loader();
	}
	
	private function define_admin_hooks() {

		$plugin_admin = new Plugin_Chirag_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

	}
	
	private function define_public_hooks() {

		$plugin_public = new Plugin_Chirag_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

	}
 	public function run() {
		$this->loader->run();
	} 
	
	public function get_plugin_name() {
		return $this->plugin_name;
	}
	
	public function get_loader() {
		return $this->loader;
	}
	
	public function get_version() {
		return $this->version;
	}
	
}