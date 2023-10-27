<?php 
function remove_space_head() {
	remove_action('wp_head', '_admin_bar_bump_cb');
}
add_action('get_header', 'remove_space_head');
if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'cart-thumb-image', 100, 100 );
}
function ecomwp_theme_support() {
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1200, 9999 );
	add_image_size( 'ecomwp-fullscreen', 1980, 9999 );
	$logo_width  = 120;
	$logo_height = 90;
	if ( get_theme_mod( 'retina_logo', false ) ) {
		$logo_width  = floor( $logo_width * 2 );
		$logo_height = floor( $logo_height * 2 );
	}
	add_theme_support(
		'custom-logo',
		array(
			'height'      => $logo_height,
			'width'       => $logo_width,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);
	add_theme_support( 'title-tag' );
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style',
			'navigation-widgets',
		)
	);
	load_theme_textdomain( 'ecomwp' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'customize-selective-refresh-widgets' );
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'ecomwp_theme_support' );

function custom_mime($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  $mimes['svgz'] = 'image/svg+xml';
  return $mimes;
}
add_filter( 'upload_mimes', 'custom_mime' );

function enuquescript(){
	//$theme_version = wp_get_theme()->get( 'Version' );	
	//wp_register_script( 'ecomwp', get_template_directory_uri() . '/assets/js/ecomwp.js', array(), $theme_version, false);
	//wp_localize_script( 'ecomwp', 'ecomwpAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ))); 
	
	//wp_enqueue_script( 'ajax-script', get_template_directory_uri() . '/js/ecomwp.js', array('jquery') );
	//wp_localize_script( 'ajax-script', 'ecomwpAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));        
}
add_action('wp_enqueue_scripts', 'enuquescript');

function theme_js () { 
	//$theme_version = wp_get_theme()->get( 'Version' );
    //wp_deregister_script('jquery'); 
    //wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js', array(), $theme_version, false );
    //wp_enqueue_script('jquery'); 
 } 
add_action( 'init', 'theme_js' ); 

function ecomwp_register_styles() {
	$theme_version = wp_get_theme()->get( 'Version' );
	
	/**Start Header script***/
	//Bootstrap CSS
	wp_enqueue_style( 'bootstrap-min', get_template_directory_uri() . '/assets/css/vendor/bootstrap.min.css', array(), $theme_version, false );
    //Fontawesome
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/vendor/font-awesome.css', array(), $theme_version, false );
    //Fontawesome Star
	wp_enqueue_style( 'fontawesome-stars', get_template_directory_uri() . '/assets/css/vendor/fontawesome-stars.css', array(), $theme_version, false );
    //Ion Icon
	wp_enqueue_style( 'ion-fonts', get_template_directory_uri() . '/assets/css/vendor/ion-fonts.css', array(), $theme_version, false );
    //Slick CSS
	wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/css/plugins/slick.css', array(), $theme_version, false );
    //Animation
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/css/plugins/animate.css', array(), $theme_version, false );
    //jQuery Ui
	wp_enqueue_style( 'jquery-ui-min', get_template_directory_uri() . '/assets/css/plugins/jquery-ui.min.css', array(), $theme_version, false );
    //Lightgallery
	wp_enqueue_style( 'lightgallery-min', get_template_directory_uri() . '/assets/css/plugins/lightgallery.min.css', array(), $theme_version, false );
    //Nice Select
	wp_enqueue_style( 'nice-select', get_template_directory_uri() . '/assets/css/plugins/nice-select.css', array(), $theme_version, false );
	
	wp_register_style( 'style-css', get_template_directory_uri() . '/style.css', array(), $theme_version, false );
	wp_enqueue_style('style-css');
	/**End Header script***/
	
	/**Start Footer script***/
	 //jQuery JS 
	wp_enqueue_script( 'jquery-1-12-4-min-js', get_template_directory_uri() . '/assets/js/vendor/jquery-1.12.4.min.js', array(), $theme_version, true );
    //Modernizer JS 
	wp_enqueue_script( 'modernizr-2-8-3-min', get_template_directory_uri() . '/assets/js/vendor/modernizr-2.8.3.min.js', array(), $theme_version, true );
    //Popper JS 
	wp_enqueue_script( 'popper-min-js', get_template_directory_uri() . '/assets/js/vendor/popper.min.js', array(), $theme_version, true );
    //Bootstrap JS 
	wp_enqueue_script( 'bootstrap-min-js', get_template_directory_uri() . '/assets/js/vendor/bootstrap.min.js', array(), $theme_version, true );
    //Slick Slider JS 
	wp_enqueue_script( 'slick-min-js', get_template_directory_uri() . '/assets/js/plugins/slick.min.js', array(), $theme_version, true );
    //Barrating JS 
	wp_enqueue_script( 'jquery-barrating-min', get_template_directory_uri() . '/assets/js/plugins/jquery.barrating.min.js', array(), $theme_version, true );
    //Counterup JS 
	wp_enqueue_script( 'jquery-counterup', get_template_directory_uri() . '/assets/js/plugins/jquery.counterup.js', array(), $theme_version, true );
    //Nice Select JS 
	wp_enqueue_script( 'jquery-nice-select', get_template_directory_uri() . '/assets/js/plugins/jquery.nice-select.js', array(), $theme_version, true );
    //Sticky Sidebar JS 
	wp_enqueue_script( 'jquery-sticky-sidebar', get_template_directory_uri() . '/assets/js/plugins/jquery.sticky-sidebar.js', array(), $theme_version, true );
    //Jquery-ui JS 
	wp_enqueue_script( 'jquery-ui', get_template_directory_uri() . '/assets/js/plugins/jquery-ui.min.js', array(), $theme_version, true );
	wp_enqueue_script( 'jquery-ui-touch-punch', get_template_directory_uri() . '/assets/js/plugins/jquery.ui.touch-punch.min.js', array(), $theme_version, true );
    //Lightgallery JS 
	wp_enqueue_script( 'lightgallery-min', get_template_directory_uri() . '/assets/js/plugins/lightgallery.min.js', array(), $theme_version, true );
    //Scroll Top JS 
	wp_enqueue_script( 'scroll-top', get_template_directory_uri() . '/assets/js/plugins/scroll-top.js', array(), $theme_version, true );
    //Theia Sticky Sidebar JS
	wp_enqueue_script( 'theia-sticky-sidebar-min', get_template_directory_uri() . '/assets/js/plugins/theia-sticky-sidebar.min.js', array(), $theme_version, true );
    //Waypoints JS 
	wp_enqueue_script( 'waypoints-min', get_template_directory_uri() . '/assets/js/plugins/waypoints.min.js', array(), $theme_version, true );
	//jQuery Zoom JS
	wp_enqueue_script( 'jquery-zoom-min', get_template_directory_uri() . '/assets/js/plugins/jquery.zoom.min.js', array(), $theme_version, true );
	//Main Js
	//wp_register_script( 'ecomwp', get_template_directory_uri() . '/assets/js/ecomwp.js', array(), $theme_version, true );
	//wp_enqueue_script( 'ecomwp' );
	
	wp_register_script( 'ecomwp', get_template_directory_uri() . '/assets/js/ecomwp.js', array(), $theme_version, true);
	wp_localize_script( 'ecomwp', 'ecomwpAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ), 'nonce'    => wp_create_nonce( 'product-filter-nonce' )));
	wp_enqueue_script('ecomwp'); 
	/**End Footer script***/
}
add_action( 'wp_enqueue_scripts', 'ecomwp_register_styles' );

function ecomwp_menus() {
	$locations = array(
		'primary'  => __( 'Desktop Horizontal Menu', 'ecomwp' ),
	);
	register_nav_menus( $locations );
}
add_action( 'init', 'ecomwp_menus' );

function menu_header() {
    $header_menu = 'primary';
    if (($locations = get_nav_menu_locations()) && isset($locations[$header_menu])) {
        $menu = wp_get_nav_menu_object($locations[$header_menu]);
        $header_menu_items = wp_get_nav_menu_items($menu->term_id);
        $header_menu_main = '<ul class="navbar-nav me-auto mb-2 mb-lg-0">' ."\n";
        foreach ((array) $header_menu_items as $key => $menu_item) {
			$active_page = ( $menu_item->object_id == get_queried_object_id() ) ? 'active' : '';
            $title = $menu_item->title;
            $url = $menu_item->url;
            $header_menu_main .= "\t\t\t\t\t". '<li class="nav-item"><a href="'. $url .'" class="nav-link '.$active_page.'">'. $title .'</a></li>' ."\n";
        }
        $header_menu_main .= "\t\t\t". '</ul>' ."\n";
    } else {
         $header_menu_main = '<!-- no list defined -->';
    }
    echo $header_menu_main;
}

if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Ecomwp General Settings',
		'menu_title'	=> 'Ecomwp Settings',
		'menu_slug' 	=> 'ecomwp-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}

if ( ! function_exists( 'wp_body_open' ) ) {

	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}

function ecomwp_skip_link() {
	echo '<a class="skip-link screen-reader-text" href="#site-content">' . __( 'Skip to the content', 'ecomwp' ) . '</a>';
}
add_action( 'wp_body_open', 'ecomwp_skip_link', 5 );

function ecomwp_sidebar_registration() {
	$shared_args = array(
		'before_title'  => '<h2 class="widget-title subheading heading-size-3">',
		'after_title'   => '</h2>',
		'before_widget' => '<div class="widget %2$s"><div class="widget-content">',
		'after_widget'  => '</div></div>',
	);
	// Footer #1.
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name'        => __( 'Footer #1', 'ecomwp' ),
				'id'          => 'footer-1',
				'description' => __( 'Widgets in this area will be displayed in the first column in the footer.', 'ecomwp' ),
			)
		)
	);
}
add_action( 'widgets_init', 'ecomwp_sidebar_registration' );
function ecomwp_read_more_tag( $html ) {
	return preg_replace( '/<a(.*)>(.*)<\/a>/iU', sprintf( '<div class="read-more-button-wrap"><a$1><span class="faux-button">$2</span> <span class="screen-reader-text">"%1$s"</span></a></div>', get_the_title( get_the_ID() ) ), $html );
}
add_filter( 'the_content_more_link', 'ecomwp_read_more_tag' );


//Woocmmerce functions ///
add_theme_support('woocommerce');


add_action('wp_ajax_ql_woocommerce_ajax_add_to_cart', 'ql_woocommerce_ajax_add_to_cart'); 
add_action('wp_ajax_nopriv_ql_woocommerce_ajax_add_to_cart', 'ql_woocommerce_ajax_add_to_cart');          
function ql_woocommerce_ajax_add_to_cart() {  
    $product_id = apply_filters('ql_woocommerce_add_to_cart_product_id', absint($_POST['product_id']));
    $quantity = empty($_POST['quantity']) ? 1 : wc_stock_amount($_POST['quantity']);
    $variation_id = absint($_POST['variation_id']);
    $passed_validation = apply_filters('ql_woocommerce_add_to_cart_validation', true, $product_id, $quantity);
    $product_status = get_post_status($product_id); 
    if ($passed_validation && WC()->cart->add_to_cart($product_id, $quantity, $variation_id) && 'publish' === $product_status) { 
        do_action('ql_woocommerce_ajax_added_to_cart', $product_id);
            if ('yes' === get_option('ql_woocommerce_cart_redirect_after_add')) { 
                wc_add_to_cart_message(array($product_id => $quantity), true); 
            } 
            WC_AJAX :: get_refreshed_fragments(); 
			ob_start();
			woocommerce_mini_cart();
			$mini_cart = ob_get_clean();
			 
			$data = array(
					'fragments' => apply_filters(
						'woocommerce_add_to_cart_fragments',
						array(
							'div.widget_shopping_cart_content' => '<div class="widget_shopping_cart_content">' . $mini_cart . '</div>',
						)
					),
					'cart_hash' => WC()->cart->get_cart_hash(),
				);
			echo wp_send_json( $data );
			
            } else { 
                $data = array( 
                    'error' => true,
                    'product_url' => apply_filters('ql_woocommerce_cart_redirect_after_error', get_permalink($product_id), $product_id));
                echo wp_send_json($data);
            }
            wp_die();
}

add_action('wp_ajax_product_category_filter', 'product_category_filter'); 
add_action('wp_ajax_nopriv_product_category_filter', 'product_category_filter'); 
function product_category_filter(){
	//check_ajax_referer( 'product-filter-nonce', 'nonce' );
	
	 if (isset($_POST['category'])) {
        $category = sanitize_text_field($_POST['category']);
        //$subcategory = sanitize_text_field($_POST['subcategory']);

        $args = array(
            'post_type' => 'product',
            'posts_per_page' => -1,
            'tax_query' => array(
                array(
                    'taxonomy' => 'product_cat',
                    'field' => 'slug',
                    'terms' => $category
                )
            )
        );

        $product = new WP_Query($args);

        ob_start();

        if ($product->have_posts()) {
            while ($product->have_posts()) {
                $product->the_post();
			?>
				
				<div class="col-lg-4">
						<div class="product-slide_item">
							<div class="inner-slide">
								<div class="single-product">
									<div class="product-img">
										<?php if ( has_post_thumbnail()) : ?>
											<a class="primary-img" href="<?php the_permalink(); ?>" alt="<?php the_title_attribute(); ?>">
												<?php the_post_thumbnail(); ?>
											</a>
										<?php endif; ?>
										<div class="sticker">
											<span class="sticker">New</span>
										</div>
										<div class="add-actions">
											<ul>
												<li>
													<a class="uren-add_cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="ajax_add_to_cart add_to_cart_button" data-product_id="<?php echo get_the_ID(); ?>"><i class="ion-bag"></i></a>
												</li>
												<!--<li><a class="uren-add_cart" href="cart.html" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add To Cart"><i class="ion-bag"></i></a>
												</li>-->
												<li><a class="uren-wishlist" href="wishlist.html" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add To Wishlist"><i class="ion-android-favorite-outline"></i></a>
												</li>
												<li><a class="uren-add_compare" href="compare.html" data-toggle="tooltip" data-placement="top" title="" data-original-title="Compare This Product"><i class="ion-android-options"></i></a>
												</li>
												<li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="" data-original-title="Quick View"><i class="ion-android-open"></i></a></li>
											</ul>
										</div>
									</div>
									<div class="product-content">
										<div class="product-desc_info">
											<div class="rating-box">
												<ul>
													<li><i class="ion-android-star"></i></li>
													<li><i class="ion-android-star"></i></li>
													<li><i class="ion-android-star"></i></li>
													<li class="silver-color"><i class="ion-android-star"></i>
													</li>
													<li class="silver-color"><i class="ion-android-star"></i>
													</li>
												</ul>
											</div>
											<h6><a class="product-name" href="<?php echo $product->get_permalink(); ?>"><?php the_title(); ?></a></h6>
											<div class="price-box">
												<span class="new-price"><?php echo $product->get_price_html(); ?></span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="list-slide_item">
							<div class="single-product">
								<div class="product-img">
									<?php if ( has_post_thumbnail()) : ?>
										<a class="primary-img" href="<?php the_permalink(); ?>" alt="<?php the_title_attribute(); ?>">
											<?php the_post_thumbnail(); ?>
										</a>
									<?php endif; ?>
								</div>
								<div class="product-content">
									<div class="product-desc_info">
										<div class="rating-box">
											<ul>
												<li><i class="ion-android-star"></i></li>
												<li><i class="ion-android-star"></i></li>
												<li><i class="ion-android-star"></i></li>
												<li class="silver-color"><i class="ion-android-star"></i>
												</li>
												<li class="silver-color"><i class="ion-android-star"></i>
												</li>
											</ul>
										</div>
										<h6><a class="product-name" href="<?php echo $product->get_permalink(); ?>"><?php the_title(); ?></a></h6>
										<div class="price-box">
											<span class="new-price"><?php echo $product->get_price_html(); ?></span>
										</div>
										<div class="product-short_desc">
											<p><?php the_content(); ?></p>
										</div>
									</div>
									<div class="add-actions">
										<ul>
											<li>
												<a class="uren-add_cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="ajax_add_to_cart add_to_cart_button" data-product_id="<?php echo get_the_ID(); ?>"><i class="ion-bag"></i></a>
											</li>
											<!--<li><a class="uren-add_cart" href="cart.html" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add To Cart"><i class="ion-bag"></i></a>
											</li>-->
											<li><a class="uren-wishlist" href="wishlist.html" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add To Wishlist"><i class="ion-android-favorite-outline"></i></a>
											</li>
											<li><a class="uren-add_compare" href="compare.html" data-toggle="tooltip" data-placement="top" title="" data-original-title="Compare This Product"><i class="ion-android-options"></i></a>
											</li>
											<li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="" data-original-title="Quick View"><i class="ion-android-open"></i></a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
			
		<?php }
        } else {
            echo '<p>No products found.</p>';
        }

        wp_reset_postdata();

        $response = ob_get_clean();

        echo $response;
    }

    exit;
	
}

/****category filter**/
add_shortcode( 'product_attributes', 'get_product_attributes' );
function get_product_attributes() {
    foreach( wc_get_attribute_taxonomies() as $attribute ) {
		//print_r($attribute);
        $taxonomy = 'pa_' . $attribute->attribute_name;
        $term_names = get_terms( array( 'taxonomy' => $taxonomy, 'fields' => 'names' ) );
		//print_r($taxonomy);
		?>
			<div class="category-module_heading">
				<h5>Filter by <?php echo $attribute->attribute_label; ?></h5>
			</div>
			<div class="module-body">
				<ul class="module-list_item">
					<li><!--<a href="javascript:void(0)"> <?php //echo $attribute->attribute_label; ?> <span>(0)</span></a>-->
							<ul class="module-sub-list_item">
								<?php if(!empty($term_names)){ 
										foreach($term_names as $term){
											//print_r($term);
								?>
								<li>
									<a href="<?php //echo get_term_link($term->slug, 'product_cat'); ?>"><?php echo $term; ?> <span>(8)</span></a>
								</li>	
								<?php } } ?>
							</ul>
					</li>
				</ul>
			</div>
		<?php 
    }
}

function modify_data_in_admin_order_details( $order ){  ?>
    <div class="form-field form-field-wide">
        <h3><?php _e( 'Extra Order Details', 'woocommerce' ); ?></h3> <?php echo '<p><strong>' . __( 'Extra field 1' ) . ':</strong>' . get_post_meta( $order->id, 'weeding_data', true ) . '</p>'; ?>
    </div>
<?php }
add_action( 'woocommerce_admin_order_data_after_order_details', 'modify_data_in_admin_order_details' );

function modify_data_in_admin_billing_address( $order ){  ?>
    <div class="form-field form-field-wide">
        <h3><?php _e( 'Extra Billing Details', 'woocommerce' ); ?></h3>
        <?php echo '<p><strong>' . __( 'Extra field 2' ) . ':</strong>' . get_post_meta( $order->id, 'weeding_data', true ) . '</p>'; ?>
    </div>
<?php }
add_action( 'woocommerce_admin_order_data_after_billing_address', 'modify_data_in_admin_billing_address' );

function modify_data_in_admin_shipping_address( $order ){  ?>
    <div class="form-field form-field-wide">
        <h3><?php _e( 'Extra Shipping Details', 'woocommerce' ); ?></h3>
        <?php echo '<p><strong>' . __( 'Extra field 3' ) . ':</strong>' . get_post_meta( $order->id, 'weeding_data', true ) . '</p>'; ?>
    </div>
<?php }
add_action( 'woocommerce_admin_order_data_after_shipping_address', 'modify_data_in_admin_shipping_address' );



add_filter( 'gettext', 'change_admin_order_edit_pages_texts', 10, 3 );
function change_admin_order_edit_pages_texts( $translated_text, $text, $domain ) {
  global $pagenow, $post_type;
   if( in_array($pagenow, ['post.php', 'post-new.php']) && 'shop_order' === $post_type && is_admin() ) {
        if( 'Billing' === $text ) {
            $translated_text = __('Biller Information', $domain);
        }

       /*  if( 'Shipping' === $text ) {
            $translated_text = __('Test 2', $domain); 
        } */
    }
    return $translated_text;
}

 function create_order_post_type() {
  register_post_type('orders',
    array(
      'labels' => array(
        'name' => __('Orders'),
        'singular_name' => __('Order')
      ),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'orders'),
      'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields'),
    )
  );
  //flush_rewrite_rules();
}
add_action('init', 'create_order_post_type'); 

/* function add_custom_order_meta_box() {
    add_meta_box(
        'custom_order_meta_box',
        'Custom Order Details',
        'display_custom_order_meta_box',
        'order',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'add_custom_order_meta_box');

// Step 3: Define the Meta Box Content
function display_custom_order_meta_box($post) {
    $custom_order_value = get_post_meta($post->ID, '_custom_order_value', true);
    ?>
    <label for="custom_order_value">Custom Order Value:</label>
    <input type="text" id="custom_order_value" name="custom_order_value" value="<?php echo esc_attr($custom_order_value); ?>">
    <?php
}

// Step 4: Save the Meta Box Data
function save_custom_order_meta_data($post_id) {
    if (isset($_POST['custom_order_value'])) {
        update_post_meta($post_id, '_custom_order_value', sanitize_text_field($_POST['custom_order_value']));
    }
}
add_action('save_post', 'save_custom_order_meta_data'); */