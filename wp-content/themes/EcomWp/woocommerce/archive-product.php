<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );
/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
?>
<!-- Begin Uren's Breadcrumb Area -->
<div class="breadcrumb-area">
	<div class="container">
		<div class="breadcrumb-content">
			<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
				<h2 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h2>
			<?php endif; ?>
			<ul>
				<li><a href="index.html">Home</a></li>
				<li class="active"><?php woocommerce_page_title(); ?></li>
			</ul>
			<?php
				/**
				 * Hook: woocommerce_archive_description.
				 *
				 * @hooked woocommerce_taxonomy_archive_description - 10
				 * @hooked woocommerce_product_archive_description - 10
				 */
				do_action( 'woocommerce_archive_description' );
			?>
		</div>
	</div>
</div>
<div class="shop-content_wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-3 col-md-5 order-2 order-lg-1 order-md-1">
				<div class="uren-sidebar-catagories_area">
					<div class="category-module uren-sidebar_categories">
						<div class="category-module_heading">
							<h5>Filter by Categories</h5>
						</div>
						<div class="module-body">
							<ul class="module-list_item">
								<?php
									  $taxonomy     = 'product_cat';
									  $orderby      = 'name';  
									  $show_count   = 1;      
									  $pad_counts   = 0;      
									  $hierarchical = 1;
									  $title        = '';  
									  $empty        = 0;

									  $args = array(
											 'taxonomy'     => $taxonomy,
											 'orderby'      => $orderby,
											 'show_count'   => $show_count,
											 'pad_counts'   => $pad_counts,
											 'hierarchical' => $hierarchical,
											 'title_li'     => $title,
											 'hide_empty'   => $empty
									  );
									 $all_categories = get_categories( $args );
									 foreach ($all_categories as $cat) {
										if($cat->category_parent == 0) {
											$category_id = $cat->term_id;   
										?>	
											<li><a href="#" data-category="<?php echo $cat->slug; ?>"><?php echo $cat->name; ?> <span>(<?php echo $cat->count ; ?>)</span></a>
												<ul class="module-sub-list_item">
													<?php 
														$args2 = array(
																'taxonomy'     => $taxonomy,
																'child_of'     => 0,
																'parent'       => $category_id,
																'orderby'      => $orderby,
																'show_count'   => $show_count,
																'pad_counts'   => $pad_counts,
																'hierarchical' => $hierarchical,
																'title_li'     => $title,
																'hide_empty'   => $empty
														);
														$sub_cats = get_categories( $args2 );
														if($sub_cats) {
															foreach($sub_cats as $sub_category) 
															{
														?>
															<li>
																<a href="#" data-category="<?php echo $sub_category->slug; ?>"><?php echo $sub_category->name ; ?> <span>(<?php echo $sub_category->count ; ?>)</span></a>
															</li>	
													<?php  } 
														} 
													?>
												</ul>
											</li>
								<?php  }  } ?>
							</ul>
						</div>
						
						<?php do_shortcode('[product_attributes]'); ?>
					</div>
					<div class="uren-sidebar_categories">
						<div class="uren-categories_title">
							<h5>Price</h5>
						</div>
						<div class="price-filter">
							
							<!--Test start code-->
								<div class="cust-range-slide">
									<div class="values">
										₹ <span id="range1">0</span>
										<span> &dash; </span>
										₹ <span id="range2">100</span>
									</div>
									<div class="range-container">
										<div class="slider-track"></div>
										<input type="range" min="0" max="100" value="0" id="slider-1" oninput="slideOne()">
										<input type="range" min="0" max="100" value="50" id="slider-2" oninput="slideTwo()">
									</div>
								</div>	
							
							<script>
							
			
			let sliderOne = document.getElementById("slider-1");
			let sliderTwo = document.getElementById("slider-2");
			let displayValOne = document.getElementById("range1");
			let displayValTwo = document.getElementById("range2");
			let minGap = 0;
			let sliderTrack = document.querySelector(".slider-track");
			let sliderMaxValue = document.getElementById("slider-1").max;
					function slideOne(){
						//alert('yes1');
						if(parseInt(sliderTwo.value) - parseInt(sliderOne.value) <= minGap){
							sliderOne.value = parseInt(sliderTwo.value) - minGap;
						}
						displayValOne.textContent = sliderOne.value;
						fillColor();
					}
					function slideTwo(){
						//alert('yes2');
						if(parseInt(sliderTwo.value) - parseInt(sliderOne.value) <= minGap){
							sliderTwo.value = parseInt(sliderOne.value) + minGap;
						}
						displayValTwo.textContent = sliderTwo.value;
						fillColor();
					}
					function fillColor(){
						percent1 = (sliderOne.value / sliderMaxValue) * 100;
						percent2 = (sliderTwo.value / sliderMaxValue) * 100;
						sliderTrack.style.background = `linear-gradient(to right, #dadae5 ${percent1}% , #ffc400 ${percent1}% , #ffc400 ${percent2}%, #dadae5 ${percent2}%)`;
					}					
							</script>
							<style>
								.range-container {
									position: relative;
									width: 100%;
									height: 100px;
									margin-top: 30px;
								}
								.range-container input[type="range"]{
									-webkit-appearance: none;
									-moz-appearance: none;
									appearance: none;
									width: 100%;
									outline: none;
									position: absolute;
									margin: auto;
									top: 0;
									bottom: 0;
									background-color: transparent;
									pointer-events: none;
								}
								.range-container .slider-track{
									width: 100%;
									height: 10px;
									position: absolute;
									margin: auto;
									top: 0;
									bottom: 0;
									border-radius: 5px;
								}
								.range-container input[type="range"]::-webkit-slider-runnable-track{
									-webkit-appearance: none;
									height: 5px;
								}
								.range-container input[type="range"]::-moz-range-track{
									-moz-appearance: none;
									height: 5px;
								}
								.range-container input[type="range"]::-ms-track{
									appearance: none;
									height: 5px;
								}
								.range-container input[type="range"]::-webkit-slider-thumb{
									-webkit-appearance: none;
									height: 1.7em;
									width: 1.7em;
									background-color: #fff;
									border: 3px solid #ffc400;
									cursor: pointer;
									margin-top: -9px;
									pointer-events: auto;
									border-radius: 50%;
									-webkit-box-shadow: 0px 0px 6.65px 0.35px rgba(0, 0, 0, 0.15);
									box-shadow: 0px 0px 6.65px 0.35px rgba(0, 0, 0, 0.15);
								}
								.range-container input[type="range"]::-moz-range-thumb{
									-webkit-appearance: none;
									height: 1.7em;
									width: 1.7em;
									cursor: pointer;
									border-radius: 50%;
									background-color: #fff;
									pointer-events: auto;
								}
								.range-container input[type="range"]::-ms-thumb{
									appearance: none;
									height: 1.7em;
									width: 1.7em;
									cursor: pointer;
									border-radius: 50%;
									background-color: #fff;
									pointer-events: auto;
								}
								input[type="range"]:active::-webkit-slider-thumb{
									background-color: #fff;
									border: 3px solid #ffc400;
								}
								.values{
									background-color: #ffc400;
									width: 150px;
									position: relative;
									margin: auto;
									padding: 10px 0;
									border-radius: 5px;
									text-align: center;
									font-weight: 500;
									font-size: 25px;
									color: #ffffff;
								}
								.values:before{
									content: "";
									position: absolute;
									height: 0;
									width: 0;
									border-top: 15px solid #ffc400;
									border-left: 15px solid transparent;
									border-right: 15px solid transparent;
									margin: auto;
									bottom: -14px;
									left: 0;
									right: 0;
								}
							</style>
							<!--Test End code-->
							
							
							<div id="slider-range" class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"><div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 0%; width: 27.1429%;"></div><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 0%;"></span><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 27.1429%;"></span></div>
							<div class="price-slider-amount">
								<div class="label-input">
									<label>Price : </label>
									<input type="text" id="amount" name="price" placeholder="Add Your Price">
									<input type="hidden" id="minprice" name="minprice" value="">
									<input type="hidden" id="maxprice" name="maxprice" value="">
								</div>
								<!-- <button type="button">Filter</button> -->
							</div>
						</div>
					</div>
					<div class="uren-sidebar_categories">
						<div class="uren-categories_title">
							<h5>Color</h5>
						</div>
						<ul class="sidebar-checkbox_list">
							<li>
								<a href="javascript:void(0)">Black <span>(6)</span></a>
							</li>
							<li>
								<a href="javascript:void(0)">Blue <span>(2)</span></a>
							</li>
							<li>
								<a href="javascript:void(0)">Red <span>(3)</span></a>
							</li>
							<li>
								<a href="javascript:void(0)">Yellow <span>(0)</span></a>
							</li>
						</ul>
					</div>
					<div class="uren-sidebar_categories">
						<div class="uren-categories_title">
							<h5>Manufacturers</h5>
						</div>
						<ul class="sidebar-checkbox_list">
							<li>
								<a href="javascript:void(0)">Sanai <span>(10)</span></a>
							</li>
							<li>
								<a href="javascript:void(0)">Xail <span>(2)</span></a>
							</li>
							<li>
								<a href="javascript:void(0)">Chamcham <span>(1)</span></a>
							</li>
							<li>
								<a href="javascript:void(0)">Meito <span>(3)</span></a>
							</li>
							<li>
								<a href="javascript:void(0)">Walton <span>(0)</span></a>
							</li>
						</ul>
					</div>
				</div>
				<div class="sidebar-banner_area">
					<div class="banner-item img-hover_effect">
						<a href="javascript:void(0)">
							<img src="assets/images/shop/1.jpg" alt="Uren's Shop Banner Image">
						</a>
					</div>
				</div>
				<?php 
					/**
					 * Hook: woocommerce_sidebar.
					 *
					 * @hooked woocommerce_get_sidebar - 10
					 */
					do_action( 'woocommerce_sidebar' );
				?>
			</div>
			<div class="col-lg-9 col-md-7 order-1 order-lg-2 order-md-2">
				<div class="shop-toolbar">
					<div class="product-view-mode">
						<a class="grid-1" data-target="gridview-1" data-toggle="tooltip" data-placement="top" title="" data-original-title="1">1</a>
						<a class="grid-2" data-target="gridview-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="2">2</a>
						<a class="active grid-3" data-target="gridview-3" data-toggle="tooltip" data-placement="top" title="" data-original-title="3">3</a>
						<a class="grid-4" data-target="gridview-4" data-toggle="tooltip" data-placement="top" title="" data-original-title="4">4</a>
						<a class="grid-5" data-target="gridview-5" data-toggle="tooltip" data-placement="top" title="" data-original-title="5">5</a>
						<a class="list" data-target="listview" data-toggle="tooltip" data-placement="top" title="" data-original-title="List"><i class="fa fa-th-list"></i></a>
					</div>
					<div class="product-item-selection_area">
						<div class="product-short">
							<label class="select-label">Short By:</label>
							<select class="myniceselect nice-select">
								<option value="1">Default</option>
								<option value="2">Name, A to Z</option>
								<option value="3">Name, Z to A</option>
								<option value="4">Price, low to high</option>
								<option value="5">Price, high to low</option>
								<option value="5">Rating (Highest)</option>
								<option value="5">Rating (Lowest)</option>
								<option value="5">Model (A - Z)</option>
								<option value="5">Model (Z - A)</option>
							</select>
							<div class="nice-select myniceselect" tabindex="0"><span class="current">Default</span><ul class="list"><li data-value="1" class="option selected">Default</li><li data-value="2" class="option">Name, A to Z</li><li data-value="3" class="option">Name, Z to A</li><li data-value="4" class="option">Price, low to high</li><li data-value="5" class="option">Price, high to low</li><li data-value="5" class="option">Rating (Highest)</li><li data-value="5" class="option">Rating (Lowest)</li><li data-value="5" class="option">Model (A - Z)</li><li data-value="5" class="option">Model (Z - A)</li></ul></div>
						</div>
						<div class="product-showing">
							<label class="select-label">Show:</label>
							<select class="myniceselect short-select nice-select">
								<option value="1">15</option>
								<option value="1">1</option>
								<option value="1">2</option>
								<option value="1">3</option>
								<option value="1">4</option>
							</select><div class="nice-select myniceselect short-select" tabindex="0"><span class="current">15</span><ul class="list"><li data-value="1" class="option selected">15</li><li data-value="1" class="option">1</li><li data-value="1" class="option">2</li><li data-value="1" class="option">3</li><li data-value="1" class="option">4</li></ul></div>
						</div>
					</div>
				</div>
				<div id="filter_product" class="shop-product-wrap grid gridview-3 img-hover-effect_area row">
					<?php 
						if ( is_shop() || is_product_category() || is_product_tag() ) {
							 $per_page = -1;
                        if ( get_query_var( 'taxonomy' ) ) { 
                            $args = array(
                                'post_type' => 'product',
                                'posts_per_page' => $per_page,
                                'paged' => get_query_var( 'paged' ),
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => get_query_var( 'taxonomy' ),
                                        'field'    => 'slug',
                                        'terms'    => get_query_var( 'term' ),
                                    ),
                                ),
                            );
                        } else { 
                            $args = array(
                                'post_type' => 'product',
                                'orderby' => 'date',
                                'order' => 'DESC',
                                'posts_per_page' => $per_page,
                                'paged' => get_query_var( 'paged' ),
                            );
                        }
                        
                        $products = new WP_Query( $args );
                        
                        if ( $products->have_posts() ) {
                            while ( $products->have_posts() ) { 
							$products->the_post();
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
					<?php
						}
							wp_reset_postdata();
						}
					}
					else 
					{ 
						woocommerce_content();
					}
					?>
				</div>
				
				
				
			</div>
		</div>
	</div>
</div>
<?php 
get_footer( 'shop' );
