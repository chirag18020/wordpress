<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.visualvisitor.com
 * @since      1.0.0
 *
 * @package    Brand_Logo
 * @subpackage Brand_Logo/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Brand_Logo
 * @subpackage Brand_Logo/public
 * @author     Zignuts <chiragpa@zignuts.com>
 */
class Brand_Logo_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->brand_slider_code();
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Brand_Logo_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Brand_Logo_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/brand-logo-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Brand_Logo_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Brand_Logo_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/brand-logo-public.js', array( 'jquery' ), $this->version, false );

	}
	
	public function brand_slider_code(){
		add_shortcode('brand_slider', array($this, 'slider_code'));
	}
	
	function slider_code (){
	ob_start();
	$award = get_field( "award_section" );
	$award_list = $award['awards_slider'];
	echo '<div class="brand-slider-container">';
		echo '<div class="brand-slider">';
			echo '<div class="row">';
					$i=0;
					foreach($award_list as $lists){
						$exist_list = $lists['awards_list'];
						$logo_list = array_filter($exist_list, 'array_filter');
						
						if(!empty($logo_list)){
							//echo "Count : ".count($logo_list);
							//echo "<br>"; echo "Index : ".$i;
							echo '<ul id="rcbrands'.$i.'" class="brandsection">';
									
									if(!empty($logo_list)){
										
										foreach($logo_list as $logo){
											if(!empty($logo['upload_logo'])){
												echo "<li><img src='".$logo['upload_logo']['url']."' /></li>";
											}
										}
									}
							echo '</ul>';
					   }
					   $i++;
					}
			echo '</div>';
		echo '</div>';
	echo '</div>';
	 ?>
		<!--
		<div class="brand-slider-container">
			<div class="brand-slider">
				<div class="row">
					<ul id="rcbrand1">
						<li><img src="http://localhost/wordpress/wp-content/uploads/2023/08/wordpress.png" /></li>
						<li><img src="http://localhost/wordpress/wp-content/uploads/2023/08/html5.png" /></li>
						<li><img src="http://localhost/wordpress/wp-content/uploads/2023/08/css3.png" /></li>
						<li><img src="http://localhost/wordpress/wp-content/uploads/2023/08/windows.png" /></li>
						<li><img src="http://localhost/wordpress/wp-content/uploads/2023/08/jquery.png" /></li>
						<li><img src="http://localhost/wordpress/wp-content/uploads/2023/08/js.png" /></li>
					</ul>
					<ul id="rcbrand2">
						<li><img src="http://localhost/wordpress/wp-content/uploads/2023/08/wordpress.png" /></li>
						<li><img src="http://localhost/wordpress/wp-content/uploads/2023/08/html5.png" /></li>
						<li><img src="http://localhost/wordpress/wp-content/uploads/2023/08/css3.png" /></li>
						<li><img src="http://localhost/wordpress/wp-content/uploads/2023/08/windows.png" /></li>
						<li><img src="http://localhost/wordpress/wp-content/uploads/2023/08/jquery.png" /></li>
						<li><img src="http://localhost/wordpress/wp-content/uploads/2023/08/js.png" /></li>
					</ul>
					<ul id="rcbrand3">
						<li><img src="http://localhost/wordpress/wp-content/uploads/2023/08/wordpress.png" /></li>
						<li><img src="http://localhost/wordpress/wp-content/uploads/2023/08/html5.png" /></li>
						<li><img src="http://localhost/wordpress/wp-content/uploads/2023/08/css3.png" /></li>
						<li><img src="http://localhost/wordpress/wp-content/uploads/2023/08/windows.png" /></li>
						<li><img src="http://localhost/wordpress/wp-content/uploads/2023/08/jquery.png" /></li>
						<li><img src="http://localhost/wordpress/wp-content/uploads/2023/08/js.png" /></li>
					</ul>
				</div>
			</div>
		</div>
		-->
	<?php 
		return ob_get_clean();
    }
	
}
