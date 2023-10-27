<?php 
function remove_space_head() {
	remove_action('wp_head', '_admin_bar_bump_cb');
}
add_action('get_header', 'remove_space_head');
function custom_polylang_langswitcher() {
	$output = '';
	if ( function_exists( 'pll_the_languages' ) ) {
		$args   = [
			'show_flags' => 1,
			'show_names' => 0,
			'echo'       => 0,
		];
		$output = '<ul class="polylang_langswitcher">'.pll_the_languages( $args ). '</ul>';
	}

	return $output;
}
add_shortcode( 'polylang_langswitcher', 'custom_polylang_langswitcher' );

function enuquescript(){				
	wp_enqueue_script( 'ajax-script', get_template_directory_uri() . '/js/ecomwp.js', array('jquery') );
	wp_localize_script( 'ajax-script', 'ecomwpAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));        
}
add_action('wp_enqueue_scripts', 'enuquescript');

function lasBombas_theme_support() {

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
}
add_action( 'after_setup_theme', 'lasBombas_theme_support' );

function custom_mime($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  $mimes['svgz'] = 'image/svg+xml';
  return $mimes;
}
add_filter( 'upload_mimes', 'custom_mime' );

function theme_js () { 
	$theme_version = wp_get_theme()->get( 'Version' );
    wp_deregister_script('jquery'); 
    wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js', array(), $theme_version, false );
    wp_enqueue_script('jquery'); 
 } 
add_action( 'init', 'theme_js' ); 

function lasbombas_register_styles() {
	$theme_version = wp_get_theme()->get( 'Version' );
	/**Start Header script***/
	wp_register_style( 'bootstrap-min-css', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), $theme_version, false );
	wp_enqueue_style('bootstrap-min-css');
	wp_register_style( 'style-css', get_template_directory_uri() . '/style.css', array(), $theme_version, false );
	wp_enqueue_style('style-css');
	wp_register_style( 'responsive-css', get_template_directory_uri() . '/assets/css/responsive.css', array(), $theme_version, false );
	wp_enqueue_style('responsive-css');
	wp_register_style( 'slick-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');
	wp_enqueue_style('slick-css');
	/**End Header script***/
	/**Start Footer script***/
	wp_register_script( 'jquery-min', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js', array(), $theme_version, false );
	wp_enqueue_script('jquery-min');
	wp_register_script( 'jquery-ui-min', 'https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js', array(), $theme_version, false );
	wp_enqueue_script('jquery-ui-min');
	wp_enqueue_script( 'bootstrap-bundle-min-js', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array(), $theme_version, false );
	wp_register_script( 'slick-min', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array(), $theme_version, false );
	wp_enqueue_script('slick-min');
	wp_enqueue_script( 'swiper-bundle-js', get_template_directory_uri() . '/assets/js/swiper-bundle.min.js', array(), $theme_version, false );
	/**End Footer script***/
}
add_action( 'wp_enqueue_scripts', 'lasbombas_register_styles' );

function lasbombas_menus() {
	$locations = array(
		'primary'  => __( 'Desktop Horizontal Menu', 'ecomwp' ),
		'footer-one'   => __( 'Footer Menu One', 'ecomwp' ),
		'footer-two'   => __( 'Footer Menu Two', 'ecomwp' ),
	);
	register_nav_menus( $locations );
}
add_action( 'init', 'lasbombas_menus' );

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

function menu_footer_1() {
    $foot_menu1 = 'footer-one';
    if (($locations = get_nav_menu_locations()) && isset($locations[$foot_menu1])) {
        $menu = wp_get_nav_menu_object($locations[$foot_menu1]);
        $foote_menu_items1 = wp_get_nav_menu_items($menu->term_id);
        $foot_menu_one = '<ul>' ."\n";
        foreach ((array) $foote_menu_items1 as $key => $menu_item) {
            $title = $menu_item->title;
            $url = $menu_item->url;
            $foot_menu_one .= "\t\t\t\t\t". '<li><a href="'. $url .'" class="f-link"><svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M9.31641 0.746094C8.89453 0.429688 8.47266 0.429688 8.12109 0.746094C7.76953 1.16797 7.76953 1.58984 8.12109 1.94141L12.7969 6.40625H0.84375C0.316406 6.47656 0.0351562 6.75781 0 7.25C0.0351562 7.77734 0.316406 8.05859 0.84375 8.09375H12.7969L8.12109 12.5586C7.76953 12.9453 7.76953 13.332 8.12109 13.7539C8.47266 14.1055 8.89453 14.1055 9.31641 13.7539L15.5039 7.84766C15.6445 7.70703 15.75 7.49609 15.75 7.25C15.75 7.03906 15.6445 6.82812 15.5039 6.65234L9.31641 0.746094Z" fill="white"/>
										</svg><p>'. $title .'</p></a></li>' ."\n";
        }
        $foot_menu_one .= "\t\t\t". '</ul>' ."\n";
    } else {
         $foot_menu_one = '<!-- no list defined -->';
    }
    echo $foot_menu_one;
}
function menu_footer_2() {
    $foot_menu2 = 'footer-two';
    if (($locations = get_nav_menu_locations()) && isset($locations[$foot_menu2])) {
        $menu = wp_get_nav_menu_object($locations[$foot_menu2]);
        $foote_menu_items2 = wp_get_nav_menu_items($menu->term_id);
        $foot_menu_two = '<ul>' ."\n";
        foreach ((array) $foote_menu_items2 as $key => $menu_item) {
            $title = $menu_item->title;
            $url = $menu_item->url;
            $foot_menu_two .= "\t\t\t\t\t". '<li><a href="'. $url .'" class="f-link"><svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M9.31641 0.746094C8.89453 0.429688 8.47266 0.429688 8.12109 0.746094C7.76953 1.16797 7.76953 1.58984 8.12109 1.94141L12.7969 6.40625H0.84375C0.316406 6.47656 0.0351562 6.75781 0 7.25C0.0351562 7.77734 0.316406 8.05859 0.84375 8.09375H12.7969L8.12109 12.5586C7.76953 12.9453 7.76953 13.332 8.12109 13.7539C8.47266 14.1055 8.89453 14.1055 9.31641 13.7539L15.5039 7.84766C15.6445 7.70703 15.75 7.49609 15.75 7.25C15.75 7.03906 15.6445 6.82812 15.5039 6.65234L9.31641 0.746094Z" fill="white"/>
										</svg><p>'. $title .'</p></a></li>' ."\n";
        }
        $foot_menu_two .= "\t\t\t". '</ul>' ."\n";
    } else {
         $foot_menu_two = '<!-- no list defined -->';
    }
    echo $foot_menu_two;
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
`
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
	