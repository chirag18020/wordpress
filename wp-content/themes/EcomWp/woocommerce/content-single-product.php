<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>

	<?php
	/**
	 * Hook: woocommerce_before_single_product_summary.
	 *
	 * @hooked woocommerce_show_product_sale_flash - 10
	 * @hooked woocommerce_show_product_images - 20
	 */
	do_action( 'woocommerce_before_single_product_summary' );
	?>

	<div class="summary entry-summary">
		<?php
		/**
		 * Hook: woocommerce_single_product_summary.
		 *
		 * @hooked woocommerce_template_single_title - 5
		 * @hooked woocommerce_template_single_rating - 10
		 * @hooked woocommerce_template_single_price - 10
		 * @hooked woocommerce_template_single_excerpt - 20
		 * @hooked woocommerce_template_single_add_to_cart - 30
		 * @hooked woocommerce_template_single_meta - 40
		 * @hooked woocommerce_template_single_sharing - 50
		 * @hooked WC_Structured_Data::generate_product_data() - 60
		 */
		do_action( 'woocommerce_single_product_summary' );
		?>
	</div>

	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	do_action( 'woocommerce_after_single_product_summary' );
	?>
</div>

<!--New code-->
	<div class="sp-area">
		<div class="container-fluid">
			<div class="sp-nav">	

				<div id="products-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>
					<div class="row">
						<div class="col-lg-4">
							<?php
								/**
								 * Hook: woocommerce_before_single_product_summary.
								 *
								 * @hooked woocommerce_show_product_sale_flash - 10
								 * @hooked woocommerce_show_product_images - 20
								 */
								do_action( 'woocommerce_before_single_product_summary' );
							?>
						</div>
						<div class="col-lg-8">
							<div class="sp-content">
								<div class="sp-heading">
									<h5><a href="#">Dolorem odio provident ut nihil</a></h5>
								</div>
								<span class="reference">Reference: demo_1</span>
								<div class="rating-box">
									<ul>
										<li><i class="ion-android-star"></i></li>
										<li><i class="ion-android-star"></i></li>
										<li><i class="ion-android-star"></i></li>
										<li class="silver-color"><i class="ion-android-star"></i></li>
										<li class="silver-color"><i class="ion-android-star"></i></li>
									</ul>
								</div>
								<div class="sp-essential_stuff">
									<ul>
										<li>Brands <a href="javascript:void(0)">Buxton</a></li>
										<li>Product Code: <a href="javascript:void(0)">Product 16</a></li>
										<li>Reward Points: <a href="javascript:void(0)">100</a></li>
										<li>Availability: <a href="javascript:void(0)">In Stock</a></li>
										<li>EX Tax: <a href="javascript:void(0)"><span>$453.35</span></a></li>
										<li>Price in reward points: <a href="javascript:void(0)">400</a></li>
									</ul>
								</div>
								<div class="product-size_box">
									<span>Size</span>
									<select class="myniceselect nice-select" style="display: none;">
										<option value="1">S</option>
										<option value="2">M</option>
										<option value="3">L</option>
										<option value="4">XL</option>
									</select><div class="nice-select myniceselect" tabindex="0"><span class="current">S</span><ul class="list"><li data-value="1" class="option selected">S</li><li data-value="2" class="option">M</li><li data-value="3" class="option">L</li><li data-value="4" class="option">XL</li></ul></div>
								</div>
								<div class="countdown-wrap">
									<div class="countdown item-4" data-countdown="2020/10/01" data-format="short">
										<div class="countdown__item">
											<span class="countdown__time daysLeft">0-1076</span>
											<span class="countdown__text daysText">day</span>
										</div>
										<div class="countdown__item">
											<span class="countdown__time hoursLeft">12</span>
											<span class="countdown__text hoursText">hrs</span>
										</div>
										<div class="countdown__item">
											<span class="countdown__time minsLeft">15</span>
											<span class="countdown__text minsText">mins</span>
										</div>
										<div class="countdown__item">
											<span class="countdown__time secsLeft">30</span>
											<span class="countdown__text secsText">secs</span>
										</div>
									</div>
								</div>
								<div class="quantity">
									<label>Quantity</label>
									<div class="cart-plus-minus">
										<input class="cart-plus-minus-box" value="1" type="text">
										<div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
										<div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
									<div class="dec qtybutton"><i class="fa fa-angle-down"></i></div><div class="inc qtybutton"><i class="fa fa-angle-up"></i></div></div>
								</div>
								<div class="qty-btn_area">
									<ul>
										<li><a class="qty-cart_btn" href="cart.html">Add To Cart</a></li>
										<li><a class="qty-wishlist_btn" href="wishlist.html" data-toggle="tooltip" title="" data-original-title="Add To Wishlist"><i class="ion-android-favorite-outline"></i></a>
										</li>
										<li><a class="qty-compare_btn" href="compare.html" data-toggle="tooltip" title="" data-original-title="Compare This Product"><i class="ion-ios-shuffle-strong"></i></a></li>
									</ul>
								</div>
								<div class="uren-tag-line">
									<h6>Tags:</h6>
									<a href="javascript:void(0)">vehicle</a>,
									<a href="javascript:void(0)">car</a>,
									<a href="javascript:void(0)">bike</a>
								</div>
								<div class="uren-social_link">
									<ul>
										<li class="facebook">
											<a href="https://www.facebook.com/" data-toggle="tooltip" target="_blank" title="" data-original-title="Facebook">
												<i class="fab fa-facebook"></i>
											</a>
										</li>
										<li class="twitter">
											<a href="https://twitter.com/" data-toggle="tooltip" target="_blank" title="" data-original-title="Twitter">
												<i class="fab fa-twitter-square"></i>
											</a>
										</li>
										<li class="youtube">
											<a href="https://www.youtube.com/" data-toggle="tooltip" target="_blank" title="" data-original-title="Youtube">
												<i class="fab fa-youtube"></i>
											</a>
										</li>
										<li class="google-plus">
											<a href="https://www.plus.google.com/discover" data-toggle="tooltip" target="_blank" title="" data-original-title="Google Plus">
												<i class="fab fa-google-plus"></i>
											</a>
										</li>
										<li class="instagram">
											<a href="https://rss.com/" data-toggle="tooltip" target="_blank" title="" data-original-title="Instagram">
												<i class="fab fa-instagram"></i>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	
					<!--start Description code-->
					<div class="sp-product-tab_area">
						<div class="container-fluid">
							<div class="row">
								<div class="col-lg-12">
									<div class="sp-product-tab_nav">
										<div class="product-tab">
											<ul class="nav product-menu">
												<li><a class="active" data-toggle="tab" href="#description"><span>Description</span></a>
												</li>
												<li><a data-toggle="tab" href="#specification"><span>Specification</span></a></li>
												<li><a data-toggle="tab" href="#reviews"><span>Reviews (1)</span></a></li>
											</ul>
										</div>
										<div class="tab-content uren-tab_content">
											<div id="description" class="tab-pane active show" role="tabpanel">
												<div class="product-description">
													<ul>
														<li>
															<strong>Ullam aliquam</strong>
															<span>Voluptatum, minus? Optio molestias voluptates aspernatur laborum ratione minima, natus eaque nemo rem quisquam, suscipit architecto saepe. Debitis omnis labore laborum consectetur, quas, esse voluptates minus aliquam modi nesciunt earum! Vero rerum molestiae corporis libero repellat doloremque quae sapiente ratione maiores qui aliquam, sunt obcaecati! Iure nisi doloremque numquam delectus.</span>
														</li>
														<li>
															<strong>Enim tempore</strong>
															<span>Molestias amet quibusdam eligendi exercitationem alias labore tenetur quaerat veniam similique aspernatur eveniet, suscipit corrupti itaque dolore deleniti nobis, rerum reprehenderit recusandae. Eligendi beatae asperiores nisi distinctio doloribus voluptatibus voluptas repellendus tempore unde velit temporibus atque maiores aliquid deserunt aspernatur amet, soluta fugit magni saepe fugiat vel sunt voluptate vitae</span>
														</li>
														<li>
															<strong>Laudantium suscipit</strong>
															<span>Odit repudiandae maxime, ducimus necessitatibus error fugiat nihil eum dolorem animi voluptates sunt, rem quod reprehenderit expedita, nostrum sit accusantium ut delectus. Voluptates at ipsam, eligendi labore dignissimos consectetur reprehenderit id error excepturi illo velit ratione nisi nam saepe quod! Reiciendis eos, velit fugiat voluptates accusamus nesciunt dicta ratione mollitia, asperiores error aliquam! Reprehenderit provident, omnis blanditiis fugit, accusamus deserunt illum unde, voluptatum consequuntur illo officiis labore doloremque quidem aperiam! Fuga, expedita? Laboriosam eum, tempore vitae libero voluptate omnis ducimus doloremque hic quibusdam reiciendis ab itaque aperiam maiores laudantium esse, consequuntur quos labore modi quasi recusandae distinctio iusto optio officia tempora.</span>
														</li>
														<li>
															<strong>Molestiae veritatis officia</strong>
															<span>Illum fuga esse tenetur inventore, in voluptatibus saepe iste quia cupiditate, explicabo blanditiis accusantium ut. Eaque nostrum, quisquam doloribus asperiores tempore autem. Ea perspiciatis vitae reiciendis maxime similique vel, id ratione blanditiis ullam officiis odio sunt nam quos atque accusantium ad! Repellendus, magni aliquid. Iure asperiores veniam eum unde dignissimos reprehenderit ut atque velit, harum labore nam expedita, pariatur excepturi consectetur animi optio mollitia ad a natus eaque aut assumenda inventore dolor obcaecati! Enim ab tempore nulla iusto consequuntur quod sit voluptatibus adipisci earum fuga, explicabo amet, provident, molestiae optio. Ducimus ex necessitatibus assumenda, nisi excepturi ut aspernatur est eius dignissimos pariatur unde ipsum sunt quaerat.</span>
														</li>

													</ul>
												</div>
											</div>
											<div id="specification" class="tab-pane" role="tabpanel">
												<table class="table table-bordered specification-inner_stuff">
													<tbody>
														<tr>
															<td colspan="2"><strong>Memory</strong></td>
														</tr>
													</tbody>
													<tbody>
														<tr>
															<td>test 1</td>
															<td>8gb</td>
														</tr>
													</tbody>
													<tbody>
														<tr>
															<td colspan="2"><strong>Processor</strong></td>
														</tr>
													</tbody>
													<tbody>
														<tr>
															<td>No. of Cores</td>
															<td>1</td>
														</tr>
													</tbody>
												</table>
											</div>
											<div id="reviews" class="tab-pane" role="tabpanel">
												<div class="tab-pane active" id="tab-review">
													<form class="form-horizontal" id="form-review">
														<div id="review">
															<table class="table table-striped table-bordered">
																<tbody>
																	<tr>
																		<td style="width: 50%;"><strong>Customer</strong></td>
																		<td class="text-right">15/09/20</td>
																	</tr>
																	<tr>
																		<td colspan="2">
																			<p>Good product! Thank you very much</p>
																			<div class="rating-box">
																				<ul>
																					<li><i class="ion-android-star"></i></li>
																					<li><i class="ion-android-star"></i></li>
																					<li><i class="ion-android-star"></i></li>
																					<li><i class="ion-android-star"></i></li>
																					<li><i class="ion-android-star"></i></li>
																				</ul>
																			</div>
																		</td>
																	</tr>
																</tbody>
															</table>
														</div>
														<h2>Write a review</h2>
														<div class="form-group required">
															<div class="col-sm-12 p-0">
																<label>Your Email <span class="required">*</span></label>
																<input class="review-input" type="email" name="con_email" id="con_email" required="">
															</div>
														</div>
														<div class="form-group required second-child">
															<div class="col-sm-12 p-0">
																<label class="control-label">Share your opinion</label>
																<textarea class="review-textarea" name="con_message" id="con_message"></textarea>
																<div class="help-block"><span class="text-danger">Note:</span> HTML is not
																	translated!</div>
															</div>
														</div>
														<div class="form-group last-child required">
															<div class="col-sm-12 p-0">
																<div class="your-opinion">
																	<label>Your Rating</label>
																	<span>
																<div class="br-wrapper br-theme-fontawesome-stars"><select class="star-rating" style="display: none;">
																	<option value="1">1</option>
																	<option value="2">2</option>
																	<option value="3">3</option>
																	<option value="4">4</option>
																	<option value="5">5</option>
																</select><div class="br-widget"><a href="#" data-rating-value="1" data-rating-text="1" class="br-selected br-current"></a><a href="#" data-rating-value="2" data-rating-text="2"></a><a href="#" data-rating-value="3" data-rating-text="3"></a><a href="#" data-rating-value="4" data-rating-text="4"></a><a href="#" data-rating-value="5" data-rating-text="5"></a><div class="br-current-rating">1</div></div></div>
															</span>
																</div>
															</div>
															<div class="uren-btn-ps_right">
																<button class="uren-btn-2">Continue</button>
															</div>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
							
				<!--end Description code-->
				
	<!--start Related Products code-->
	<div class="uren-product_area">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="section-title_area">
						<span></span>
						<h3>Related Products</h3>
					</div>
					<div class="product-slider uren-slick-slider slider-navigation_style-1 img-hover-effect_area slick-carousel-2 slick-initialized slick-slider" data-slick-options="{
					&quot;slidesToShow&quot;: 6,
					&quot;arrows&quot; : true
					}" data-slick-responsive="[
											{&quot;breakpoint&quot;:1501, &quot;settings&quot;: {&quot;slidesToShow&quot;: 4}},
											{&quot;breakpoint&quot;:1200, &quot;settings&quot;: {&quot;slidesToShow&quot;: 3}},
											{&quot;breakpoint&quot;:992, &quot;settings&quot;: {&quot;slidesToShow&quot;: 2}},
											{&quot;breakpoint&quot;:767, &quot;settings&quot;: {&quot;slidesToShow&quot;: 1}},
											{&quot;breakpoint&quot;:480, &quot;settings&quot;: {&quot;slidesToShow&quot;: 1}}
										]"><button class="tty-slick-text-btn tty-slick-text-prev slick-arrow slick-disabled" aria-disabled="true" style="display: block;"><i class="ion-ios-arrow-back"></i></button><div class="slick-list draggable"><div class="slick-track" style="opacity: 1; width: 1912px; transform: translate3d(0px, 0px, 0px);"><div class="slick-slide slick-current slick-active first-active" data-slick-index="0" aria-hidden="false" style="width: 239px;"><div><div class="product-slide_item" style="width: 100%; display: inline-block;">
						<div class="inner-slide">
							<div class="single-product">
								<div class="product-img">
									<a href="single-product.html" tabindex="0">
										<img class="primary-img" src="assets/images/product/medium-size/1-1.jpg" alt="Uren's Product Image">
										<img class="secondary-img" src="assets/images/product/medium-size/1-2.jpg" alt="Uren's Product Image">
									</a>
									<div class="sticker">
										<span class="sticker">New</span>
									</div>
									<div class="add-actions">
										<ul>
											<li><a class="uren-add_cart" href="cart.html" data-toggle="tooltip" data-placement="top" title="" tabindex="0" data-original-title="Add To Cart"><i class="ion-bag"></i></a>
											</li>
											<li><a class="uren-wishlist" href="wishlist.html" data-toggle="tooltip" data-placement="top" title="" tabindex="0" data-original-title="Add To Wishlist"><i class="ion-android-favorite-outline"></i></a>
											</li>
											<li><a class="uren-add_compare" href="compare.html" data-toggle="tooltip" data-placement="top" title="" tabindex="0" data-original-title="Compare This Product"><i class="ion-android-options"></i></a>
											</li>
											<li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="" tabindex="0" data-original-title="Quick View"><i class="ion-android-open"></i></a></li>
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
												<li class="silver-color"><i class="ion-android-star"></i></li>
												<li class="silver-color"><i class="ion-android-star"></i></li>
											</ul>
										</div>
										<h6><a class="product-name" href="single-product.html" tabindex="0">Veniam officiis voluptates</a></h6>
										<div class="price-box">
											<span class="new-price">$122.00</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div></div></div><div class="slick-slide slick-active" data-slick-index="1" aria-hidden="false" style="width: 239px;"><div><div class="product-slide_item" style="width: 100%; display: inline-block;">
						<div class="inner-slide">
							<div class="single-product">
								<div class="product-img">
									<a href="single-product.html" tabindex="0">
										<img class="primary-img" src="assets/images/product/medium-size/2-1.jpg" alt="Uren's Product Image">
										<img class="secondary-img" src="assets/images/product/medium-size/2-2.jpg" alt="Uren's Product Image">
									</a>
									<div class="sticker-area-2">
										<span class="sticker-2">-20%</span>
										<span class="sticker">New</span>
									</div>
									<div class="add-actions">
										<ul>
											<li><a class="uren-add_cart" href="cart.html" data-toggle="tooltip" data-placement="top" title="" tabindex="0" data-original-title="Add To Cart"><i class="ion-bag"></i></a>
											</li>
											<li><a class="uren-wishlist" href="wishlist.html" data-toggle="tooltip" data-placement="top" title="" tabindex="0" data-original-title="Add To Wishlist"><i class="ion-android-favorite-outline"></i></a>
											</li>
											<li><a class="uren-add_compare" href="compare.html" data-toggle="tooltip" data-placement="top" title="" tabindex="0" data-original-title="Compare This Product"><i class="ion-android-options"></i></a>
											</li>
											<li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="" tabindex="0" data-original-title="Quick View"><i class="ion-android-open"></i></a></li>
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
												<li class="silver-color"><i class="ion-android-star"></i></li>
												<li class="silver-color"><i class="ion-android-star"></i></li>
											</ul>
										</div>
										<h6><a class="product-name" href="single-product.html" tabindex="0">Corporis sed excepturi</a></h6>
										<div class="price-box">
											<span class="new-price new-price-2">$194.00</span>
											<span class="old-price">$241.00</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div></div></div><div class="slick-slide slick-active" data-slick-index="2" aria-hidden="false" style="width: 239px;"><div><div class="product-slide_item" style="width: 100%; display: inline-block;">
						<div class="inner-slide">
							<div class="single-product">
								<div class="product-img">
									<a href="single-product.html" tabindex="0">
										<img class="primary-img" src="assets/images/product/medium-size/3-1.jpg" alt="Uren's Product Image">
										<img class="secondary-img" src="assets/images/product/medium-size/3-2.jpg" alt="Uren's Product Image">
									</a>
									<span class="sticker">New</span>
									<div class="add-actions">
										<ul>
											<li><a class="uren-add_cart" href="cart.html" data-toggle="tooltip" data-placement="top" title="" tabindex="0" data-original-title="Add To Cart"><i class="ion-bag"></i></a>
											</li>
											<li><a class="uren-wishlist" href="wishlist.html" data-toggle="tooltip" data-placement="top" title="" tabindex="0" data-original-title="Add To Wishlist"><i class="ion-android-favorite-outline"></i></a>
											</li>
											<li><a class="uren-add_compare" href="compare.html" data-toggle="tooltip" data-placement="top" title="" tabindex="0" data-original-title="Compare This Product"><i class="ion-android-options"></i></a>
											</li>
											<li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="" tabindex="0" data-original-title="Quick View"><i class="ion-android-open"></i></a></li>
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
												<li><i class="ion-android-star"></i></li>
												<li class="silver-color"><i class="ion-android-star"></i></li>
											</ul>
										</div>
										<h6><a class="product-name" href="single-product.html" tabindex="0">Quidem iusto sapiente</a></h6>
										<div class="price-box">
											<span class="new-price">$175.00</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div></div></div><div class="slick-slide slick-active" data-slick-index="3" aria-hidden="false" style="width: 239px;"><div><div class="product-slide_item" style="width: 100%; display: inline-block;">
						<div class="inner-slide">
							<div class="single-product">
								<div class="product-img">
									<a href="single-product.html" tabindex="0">
										<img class="primary-img" src="assets/images/product/medium-size/4-1.jpg" alt="Uren's Product Image">
										<img class="secondary-img" src="assets/images/product/medium-size/4-2.jpg" alt="Uren's Product Image">
									</a>
									<div class="sticker-area-2">
										<span class="sticker-2">-5%</span>
										<span class="sticker">New</span>
									</div>
									<div class="add-actions">
										<ul>
											<li><a class="uren-add_cart" href="cart.html" data-toggle="tooltip" data-placement="top" title="" tabindex="0" data-original-title="Add To Cart"><i class="ion-bag"></i></a>
											</li>
											<li><a class="uren-wishlist" href="wishlist.html" data-toggle="tooltip" data-placement="top" title="" tabindex="0" data-original-title="Add To Wishlist"><i class="ion-android-favorite-outline"></i></a>
											</li>
											<li><a class="uren-add_compare" href="compare.html" data-toggle="tooltip" data-placement="top" title="" tabindex="0" data-original-title="Compare This Product"><i class="ion-android-options"></i></a>
											</li>
											<li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="" tabindex="0" data-original-title="Quick View"><i class="ion-android-open"></i></a></li>
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
												<li class="silver-color"><i class="ion-android-star"></i></li>
												<li class="silver-color"><i class="ion-android-star"></i></li>
											</ul>
										</div>
										<h6><a class="product-name" href="single-product.html" tabindex="0">Ullam excepturi nesciunt</a></h6>
										<div class="price-box">
											<span class="new-price new-price-2">$145.00</span>
											<span class="old-price">$190.00</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div></div></div><div class="slick-slide slick-active" data-slick-index="4" aria-hidden="false" style="width: 239px;"><div><div class="product-slide_item" style="width: 100%; display: inline-block;">
						<div class="inner-slide">
							<div class="single-product">
								<div class="product-img">
									<a href="single-product.html" tabindex="0">
										<img class="primary-img" src="assets/images/product/medium-size/5-1.jpg" alt="Uren's Product Image">
										<img class="secondary-img" src="assets/images/product/medium-size/5-2.jpg" alt="Uren's Product Image">
									</a>
									<span class="sticker">New</span>
									<div class="add-actions">
										<ul>
											<li><a class="uren-add_cart" href="cart.html" data-toggle="tooltip" data-placement="top" title="" tabindex="0" data-original-title="Add To Cart"><i class="ion-bag"></i></a>
											</li>
											<li><a class="uren-wishlist" href="wishlist.html" data-toggle="tooltip" data-placement="top" title="" tabindex="0" data-original-title="Add To Wishlist"><i class="ion-android-favorite-outline"></i></a>
											</li>
											<li><a class="uren-add_compare" href="compare.html" data-toggle="tooltip" data-placement="top" title="" tabindex="0" data-original-title="Compare This Product"><i class="ion-android-options"></i></a>
											</li>
											<li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="" tabindex="0" data-original-title="Quick View"><i class="ion-android-open"></i></a></li>
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
												<li class="silver-color"><i class="ion-android-star"></i></li>
												<li class="silver-color"><i class="ion-android-star"></i></li>
											</ul>
										</div>
										<h6><a class="product-name" href="single-product.html" tabindex="0">Minus ipsam rerum</a></h6>
										<div class="price-box">
											<span class="new-price">$130.00</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div></div></div><div class="slick-slide slick-active last-active" data-slick-index="5" aria-hidden="false" style="width: 239px;"><div><div class="product-slide_item" style="width: 100%; display: inline-block;">
						<div class="inner-slide">
							<div class="single-product">
								<div class="product-img">
									<a href="single-product.html" tabindex="0">
										<img class="primary-img" src="assets/images/product/medium-size/6-1.jpg" alt="Uren's Product Image">
										<img class="secondary-img" src="assets/images/product/medium-size/6-2.jpg" alt="Uren's Product Image">
									</a>
									<div class="sticker-area-2">
										<span class="sticker-2">-15%</span>
										<span class="sticker">New</span>
									</div>
									<div class="add-actions">
										<ul>
											<li><a class="uren-add_cart" href="cart.html" data-toggle="tooltip" data-placement="top" title="" tabindex="0" data-original-title="Add To Cart"><i class="ion-bag"></i></a>
											</li>
											<li><a class="uren-wishlist" href="wishlist.html" data-toggle="tooltip" data-placement="top" title="" tabindex="0" data-original-title="Add To Wishlist"><i class="ion-android-favorite-outline"></i></a>
											</li>
											<li><a class="uren-add_compare" href="compare.html" data-toggle="tooltip" data-placement="top" title="" tabindex="0" data-original-title="Compare This Product"><i class="ion-android-options"></i></a>
											</li>
											<li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="" tabindex="0" data-original-title="Quick View"><i class="ion-android-open"></i></a></li>
										</ul>
									</div>
								</div>
								<div class="product-content">
									<div class="product-desc_info">
										<div class="rating-box">
											<ul>
												<li><i class="ion-android-star"></i></li>
												<li><i class="ion-android-star"></i></li>
												<li class="silver-color"><i class="ion-android-star"></i></li>
												<li class="silver-color"><i class="ion-android-star"></i></li>
												<li class="silver-color"><i class="ion-android-star"></i></li>
											</ul>
										</div>
										<h6><a class="product-name" href="single-product.html" tabindex="0">Labore aliquid eos</a></h6>
										<div class="price-box">
											<span class="new-price new-price-2">$240.00</span>
											<span class="old-price">$320.00</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div></div></div><div class="slick-slide" data-slick-index="6" aria-hidden="true" style="width: 239px;" tabindex="-1"><div><div class="product-slide_item" style="width: 100%; display: inline-block;">
						<div class="inner-slide">
							<div class="single-product">
								<div class="product-img">
									<a href="single-product.html" tabindex="-1">
										<img class="primary-img" src="assets/images/product/medium-size/7-1.jpg" alt="Uren's Product Image">
										<img class="secondary-img" src="assets/images/product/medium-size/7-2.jpg" alt="Uren's Product Image">
									</a>
									<span class="sticker">New</span>
									<div class="add-actions">
										<ul>
											<li><a class="uren-add_cart" href="cart.html" data-toggle="tooltip" data-placement="top" title="" tabindex="-1" data-original-title="Add To Cart"><i class="ion-bag"></i></a>
											</li>
											<li><a class="uren-wishlist" href="wishlist.html" data-toggle="tooltip" data-placement="top" title="" tabindex="-1" data-original-title="Add To Wishlist"><i class="ion-android-favorite-outline"></i></a>
											</li>
											<li><a class="uren-add_compare" href="compare.html" data-toggle="tooltip" data-placement="top" title="" tabindex="-1" data-original-title="Compare This Product"><i class="ion-android-options"></i></a>
											</li>
											<li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="" tabindex="-1" data-original-title="Quick View"><i class="ion-android-open"></i></a></li>
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
												<li><i class="ion-android-star"></i></li>
												<li class="silver-color"><i class="ion-android-star"></i></li>
											</ul>
										</div>
										<h6><a class="product-name" href="single-product.html" tabindex="-1">Enim nobis numquam</a></h6>
										<div class="price-box">
											<span class="new-price">$190.00</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div></div></div><div class="slick-slide" data-slick-index="7" aria-hidden="true" style="width: 239px;" tabindex="-1"><div><div class="product-slide_item" style="width: 100%; display: inline-block;">
						<div class="inner-slide">
							<div class="single-product">
								<div class="product-img">
									<a href="single-product.html" tabindex="-1">
										<img class="primary-img" src="assets/images/product/medium-size/8-1.jpg" alt="Uren's Product Image">
										<img class="secondary-img" src="assets/images/product/medium-size/1-2.jpg" alt="Uren's Product Image">
									</a>
									<span class="sticker">New</span>
									<div class="add-actions">
										<ul>
											<li><a class="uren-add_cart" href="cart.html" data-toggle="tooltip" data-placement="top" title="" tabindex="-1" data-original-title="Add To Cart"><i class="ion-bag"></i></a>
											</li>
											<li><a class="uren-wishlist" href="wishlist.html" data-toggle="tooltip" data-placement="top" title="" tabindex="-1" data-original-title="Add To Wishlist"><i class="ion-android-favorite-outline"></i></a>
											</li>
											<li><a class="uren-add_compare" href="compare.html" data-toggle="tooltip" data-placement="top" title="" tabindex="-1" data-original-title="Compare This Product"><i class="ion-android-options"></i></a>
											</li>
											<li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="" tabindex="-1" data-original-title="Quick View"><i class="ion-android-open"></i></a></li>
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
												<li><i class="ion-android-star"></i></li>
												<li><i class="ion-android-star"></i></li>
											</ul>
										</div>
										<h6><a class="product-name" href="single-product.html" tabindex="-1">Dolorem voluptates aut</a></h6>
										<div class="price-box">
											<span class="new-price">$250.00</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div></div></div></div></div><button class="tty-slick-text-btn tty-slick-text-next slick-arrow" style="display: block;" aria-disabled="false"><i class="ion-ios-arrow-forward"></i></button></div>
				</div>
			</div>
		</div>
	</div>
	<!--end Related Products code-->
	
	
	<!--start shop by Brand code-->
	<div class="uren-brand_area">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="section-title_area">
						<span>Top Quality Partner</span>
						<h3>Shop By Brands</h3>
					</div>
					<div class="brand-slider uren-slick-slider img-hover-effect_area slick-carousel-3 slick-initialized slick-slider" data-slick-options="{
					&quot;slidesToShow&quot;: 6
					}" data-slick-responsive="[
											{&quot;breakpoint&quot;:1200, &quot;settings&quot;: {&quot;slidesToShow&quot;: 5}},
											{&quot;breakpoint&quot;:992, &quot;settings&quot;: {&quot;slidesToShow&quot;: 3}},
											{&quot;breakpoint&quot;:767, &quot;settings&quot;: {&quot;slidesToShow&quot;: 3}},
											{&quot;breakpoint&quot;:577, &quot;settings&quot;: {&quot;slidesToShow&quot;: 2}},
											{&quot;breakpoint&quot;:321, &quot;settings&quot;: {&quot;slidesToShow&quot;: 1}}
										]">
						<div class="slick-list draggable"><div class="slick-track" style="opacity: 1; width: 2151px; transform: translate3d(0px, 0px, 0px);"><div class="slick-slide slick-current slick-active first-active" data-slick-index="0" aria-hidden="false" style="width: 239px;"><div><div class="slide-item" style="width: 100%; display: inline-block;">
						<div class="inner-slide">
							<div class="single-product">
								<a href="javascript:void(0)" tabindex="0">
									<img src="assets/images/brand/1.jpg" alt="Uren's Brand Image">
								</a>
							</div>
						</div>
					</div></div></div><div class="slick-slide slick-active" data-slick-index="1" aria-hidden="false" style="width: 239px;"><div><div class="slide-item" style="width: 100%; display: inline-block;">
						<div class="inner-slide">
							<div class="single-product">
								<a href="javascript:void(0)" tabindex="0">
									<img src="assets/images/brand/2.jpg" alt="Uren's Brand Image">
								</a>
							</div>
						</div>
					</div></div></div><div class="slick-slide slick-active" data-slick-index="2" aria-hidden="false" style="width: 239px;"><div><div class="slide-item" style="width: 100%; display: inline-block;">
						<div class="inner-slide">
							<div class="single-product">
								<a href="javascript:void(0)" tabindex="0">
									<img src="assets/images/brand/3.jpg" alt="Uren's Brand Image">
								</a>
							</div>
						</div>
					</div></div></div><div class="slick-slide slick-active" data-slick-index="3" aria-hidden="false" style="width: 239px;"><div><div class="slide-item" style="width: 100%; display: inline-block;">
						<div class="inner-slide">
							<div class="single-product">
								<a href="javascript:void(0)" tabindex="0">
									<img src="assets/images/brand/4.jpg" alt="Uren's Brand Image">
								</a>
							</div>
						</div>
					</div></div></div><div class="slick-slide slick-active" data-slick-index="4" aria-hidden="false" style="width: 239px;"><div><div class="slide-item" style="width: 100%; display: inline-block;">
						<div class="inner-slide">
							<div class="single-product">
								<a href="javascript:void(0)" tabindex="0">
									<img src="assets/images/brand/5.jpg" alt="Uren's Brand Image">
								</a>
							</div>
						</div>
					</div></div></div><div class="slick-slide slick-active last-active" data-slick-index="5" aria-hidden="false" style="width: 239px;"><div><div class="slide-item" style="width: 100%; display: inline-block;">
						<div class="inner-slide">
							<div class="single-product">
								<a href="javascript:void(0)" tabindex="0">
									<img src="assets/images/brand/6.jpg" alt="Uren's Brand Image">
								</a>
							</div>
						</div>
					</div></div></div><div class="slick-slide" data-slick-index="6" aria-hidden="true" style="width: 239px;" tabindex="-1"><div><div class="slide-item" style="width: 100%; display: inline-block;">
						<div class="inner-slide">
							<div class="single-product">
								<a href="javascript:void(0)" tabindex="-1">
									<img src="assets/images/brand/1.jpg" alt="Uren's Brand Image">
								</a>
							</div>
						</div>
					</div></div></div><div class="slick-slide" data-slick-index="7" aria-hidden="true" style="width: 239px;" tabindex="-1"><div><div class="slide-item" style="width: 100%; display: inline-block;">
						<div class="inner-slide">
							<div class="single-product">
								<a href="javascript:void(0)" tabindex="-1">
									<img src="assets/images/brand/7.jpg" alt="Uren's Brand Image">
								</a>
							</div>
						</div>
					</div></div></div><div class="slick-slide" data-slick-index="8" aria-hidden="true" style="width: 239px;" tabindex="-1"><div><div class="slide-item" style="width: 100%; display: inline-block;">
						<div class="inner-slide">
							<div class="single-product">
								<a href="javascript:void(0)" tabindex="-1">
									<img src="assets/images/brand/2.jpg" alt="Uren's Brand Image">
								</a>
							</div>
						</div>
					</div></div></div></div></div></div>
				</div>
			</div>
		</div>
	</div>
	<!--end shop by Brand code-->
	
<!--End New code-->

<?php do_action( 'woocommerce_after_single_product' ); ?>
