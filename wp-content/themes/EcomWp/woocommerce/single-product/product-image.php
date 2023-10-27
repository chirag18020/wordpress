<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.8.0
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $product;

$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
$post_thumbnail_id = $product->get_image_id();
$wrapper_classes   = apply_filters(
	'woocommerce_single_product_image_gallery_classes',
	array(
		'woocommerce-product-gallery',
		'woocommerce-product-gallery--' . ( $post_thumbnail_id ? 'with-images' : 'without-images' ),
		'woocommerce-product-gallery--columns-' . absint( $columns ),
		'images',
	)
);
?>
<div class="<?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>" data-columns="<?php echo esc_attr( $columns ); ?>" style="opacity: 0; transition: opacity .25s ease-in-out;">
	<div class="woocommerce-product-gallery__wrapper">
		<?php
		if ( $post_thumbnail_id ) {
			$html = wc_get_gallery_image_html( $post_thumbnail_id, true );
		} else {
			$html  = '<div class="woocommerce-product-gallery__image--placeholder">';
			$html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src( 'woocommerce_single' ) ), esc_html__( 'Awaiting product image', 'woocommerce' ) );
			$html .= '</div>';
		}

		echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id ); // phpcs:disable WordPress.XSS.EscapeOutput.OutputNotEscaped

		do_action( 'woocommerce_product_thumbnails' );
		?>
	</div>
</div>

<div class="sp-img_area">
	<div class="sp-img_slider slick-img-slider uren-slick-slider slick-carousel-0 slick-initialized slick-slider" data-slick-options="{
		&quot;slidesToShow&quot;: 1,
		&quot;arrows&quot;: false,
		&quot;fade&quot;: true,
		&quot;draggable&quot;: false,
		&quot;swipe&quot;: false,
		&quot;asNavFor&quot;: &quot;.sp-img_slider-nav&quot;
		}"><div class="slick-list draggable" style="height: 465px;"><div class="slick-track" style="opacity: 1; width: 2748px;"><div class="slick-slide slick-current slick-active first-active last-active" data-slick-index="0" aria-hidden="false" style="width: 458px; position: relative; left: 0px; top: 0px; z-index: 999; opacity: 1;"><div><div class="single-slide red zoom" style="width: 100%; display: inline-block; position: relative; overflow: hidden;">
				<img src="assets/images/product/large-size/1.jpg" alt="Uren's Product Image">
			<img role="presentation" alt="" src="file:///C:/xampp/htdocs/wordpress/wp-content/themes/EcomWp/assets/images/product/large-size/1.jpg" class="zoomImg" style="position: absolute; top: -326.272px; left: -12.0702px; opacity: 0; width: 800px; height: 800px; border: none; max-width: none; max-height: none;"></div></div></div><div class="slick-slide" data-slick-index="1" aria-hidden="true" style="width: 458px; position: relative; left: -458px; top: 0px; z-index: 998; opacity: 0;" tabindex="-1"><div><div class="single-slide orange zoom" style="width: 100%; display: inline-block; position: relative; overflow: hidden;">
				<img src="assets/images/product/large-size/2.jpg" alt="Uren's Product Image">
			<img role="presentation" alt="" src="file:///C:/xampp/htdocs/wordpress/wp-content/themes/EcomWp/assets/images/product/large-size/2.jpg" class="zoomImg" style="position: absolute; top: 0px; left: 0px; opacity: 0; width: 800px; height: 800px; border: none; max-width: none; max-height: none;"></div></div></div><div class="slick-slide" data-slick-index="2" aria-hidden="true" style="width: 458px; position: relative; left: -916px; top: 0px; z-index: 998; opacity: 0;" tabindex="-1"><div><div class="single-slide brown zoom" style="width: 100%; display: inline-block; position: relative; overflow: hidden;">
				<img src="assets/images/product/large-size/3.jpg" alt="Uren's Product Image">
			<img role="presentation" alt="" src="file:///C:/xampp/htdocs/wordpress/wp-content/themes/EcomWp/assets/images/product/large-size/3.jpg" class="zoomImg" style="position: absolute; top: 0px; left: 0px; opacity: 0; width: 800px; height: 800px; border: none; max-width: none; max-height: none;"></div></div></div><div class="slick-slide" data-slick-index="3" aria-hidden="true" style="width: 458px; position: relative; left: -1374px; top: 0px; z-index: 998; opacity: 0;" tabindex="-1"><div><div class="single-slide umber zoom" style="width: 100%; display: inline-block; position: relative; overflow: hidden;">
				<img src="assets/images/product/large-size/4.jpg" alt="Uren's Product Image">
			<img role="presentation" alt="" src="file:///C:/xampp/htdocs/wordpress/wp-content/themes/EcomWp/assets/images/product/large-size/4.jpg" class="zoomImg" style="position: absolute; top: 0px; left: 0px; opacity: 0; width: 800px; height: 800px; border: none; max-width: none; max-height: none;"></div></div></div><div class="slick-slide" data-slick-index="4" aria-hidden="true" style="width: 458px; position: relative; left: -1832px; top: 0px; z-index: 998; opacity: 0;" tabindex="-1"><div><div class="single-slide black zoom" style="width: 100%; display: inline-block; position: relative; overflow: hidden;">
				<img src="assets/images/product/large-size/5.jpg" alt="Uren's Product Image">
			<img role="presentation" alt="" src="file:///C:/xampp/htdocs/wordpress/wp-content/themes/EcomWp/assets/images/product/large-size/5.jpg" class="zoomImg" style="position: absolute; top: 0px; left: 0px; opacity: 0; width: 800px; height: 800px; border: none; max-width: none; max-height: none;"></div></div></div><div class="slick-slide" data-slick-index="5" aria-hidden="true" style="width: 458px; position: relative; left: -2290px; top: 0px; z-index: 998; opacity: 0;" tabindex="-1"><div><div class="single-slide green zoom" style="width: 100%; display: inline-block; position: relative; overflow: hidden;">
				<img src="assets/images/product/large-size/6.jpg" alt="Uren's Product Image">
			<img role="presentation" alt="" src="file:///C:/xampp/htdocs/wordpress/wp-content/themes/EcomWp/assets/images/product/large-size/6.jpg" class="zoomImg" style="position: absolute; top: 0px; left: 0px; opacity: 0; width: 800px; height: 800px; border: none; max-width: none; max-height: none;"></div></div></div></div></div></div>
		<div class="sp-img_slider-nav slick-slider-nav uren-slick-slider slider-navigation_style-3 slick-carousel-1 slick-gutter-30 slick-initialized slick-slider" data-slick-options="{
				&quot;slidesToShow&quot;: 3,
				&quot;asNavFor&quot;: &quot;.sp-img_slider&quot;,
				&quot;focusOnSelect&quot;: true,
				&quot;arrows&quot; : true,
				&quot;spaceBetween&quot;: 30
			}" data-slick-responsive="[
					{&quot;breakpoint&quot;:1501, &quot;settings&quot;: {&quot;slidesToShow&quot;: 3}},
					{&quot;breakpoint&quot;:992, &quot;settings&quot;: {&quot;slidesToShow&quot;: 4}},
					{&quot;breakpoint&quot;:768, &quot;settings&quot;: {&quot;slidesToShow&quot;: 3}},
					{&quot;breakpoint&quot;:575, &quot;settings&quot;: {&quot;slidesToShow&quot;: 2}}
				]"><button class="tty-slick-text-btn tty-slick-text-prev slick-arrow slick-disabled" aria-disabled="true" style="display: block;"><i class="ion-ios-arrow-back"></i></button><div class="slick-list draggable"><div class="slick-track" style="opacity: 1; width: 738px; transform: translate3d(0px, 0px, 0px);"><div class="slick-slide slick-current slick-active first-active" data-slick-index="0" aria-hidden="false" style="width: 123px;"><div><div class="single-slide red" style="width: 100%; display: inline-block;">
				<img src="assets/images/product/small-size/1.jpg" alt="Uren's Product Thumnail">
			</div></div></div><div class="slick-slide slick-active" data-slick-index="1" aria-hidden="false" style="width: 123px;"><div><div class="single-slide orange" style="width: 100%; display: inline-block;">
				<img src="assets/images/product/small-size/2.jpg" alt="Uren's Product Thumnail">
			</div></div></div><div class="slick-slide slick-active last-active" data-slick-index="2" aria-hidden="false" style="width: 123px;"><div><div class="single-slide brown" style="width: 100%; display: inline-block;">
				<img src="assets/images/product/small-size/3.jpg" alt="Uren's Product Thumnail">
			</div></div></div><div class="slick-slide" data-slick-index="3" aria-hidden="true" style="width: 123px;" tabindex="-1"><div><div class="single-slide umber" style="width: 100%; display: inline-block;">
				<img src="assets/images/product/small-size/4.jpg" alt="Uren's Product Thumnail">
			</div></div></div><div class="slick-slide" data-slick-index="4" aria-hidden="true" style="width: 123px;" tabindex="-1"><div><div class="single-slide red" style="width: 100%; display: inline-block;">
				<img src="assets/images/product/small-size/5.jpg" alt="Uren's Product Thumnail">
			</div></div></div><div class="slick-slide" data-slick-index="5" aria-hidden="true" style="width: 123px;" tabindex="-1"><div><div class="single-slide orange" style="width: 100%; display: inline-block;">
				<img src="assets/images/product/small-size/6.jpg" alt="Uren's Product Thumnail">
			</div></div></div></div></div><button class="tty-slick-text-btn tty-slick-text-next slick-arrow" style="display: block;" aria-disabled="false"><i class="ion-ios-arrow-forward"></i></button></div>
	</div>
<!--end Newcode-->