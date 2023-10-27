<?php 
/*
 Template Name: Payment
 Text Domain:  ecomwp
*/
get_header();
?>

   <div class="payment-section-page">
		Payment Page	<br>
	<?php 
	if(!empty($_REQUEST['Mode']) && (!empty($_REQUEST['val1']))){
		echo $_REQUEST['Mode']; echo "<br>";
		echo $_REQUEST['val1']; echo "<br>";
		echo $date = $_POST['date']; 
	
		

			  global $woocommerce;
			  $address = array(
				  'first_name' => 'Chiarg',
				  'last_name'  => 'ChiargPPPPPPP',
				  //'company'    => 'Zignuts',
				  'email'      => 'chiragpa@zignuts.com',
				  'phone'      => '9428277942',
				  'address_1'  => '123 Main st.'
				  //'address_2'  => '104',
				  //'city'       => 'San Diego',
				  //'state'      => 'Ca',
				 // 'postcode'   => '92121',
				  //'country'    => 'US'
			  );

		
			  $order = wc_create_order();

			  $order->add_product( get_product( '201' ), 1 ); 
			  $order->set_address( $address, 'billing' );
			 
			  $order->calculate_totals();
			  //update_post_meta($order->id, 'weeding_data', $date);
			  $order->update_meta_data('weeding_data', $date);
			  $order->update_status("Completed", 'Imported order', TRUE); 
				
				/* function create_custom_order_programmatically() {
					$order_title = "New Custom Order"; // Set the title of the order
					$order_content = ''; // You can add additional content if needed
					//$order_title = ''; // You can add additional content if needed

					// Set up the post data
					$order_data = array(
						'post_title'    => $order_title,
						'post_content'  => $order_content,
						'post_status'   => 'publish',
						'post_type'     => 'order', // Use the registered post type slug
					);

					// Insert the post
					$order_id = wp_insert_post($order_data);

					if ($order_id) {
						// Order created successfully

						// Add custom order details as post meta
						$order_value = 50; // Example value, replace with your actual order value
						$order_title = "New Custom Order**";
						update_post_meta($order_id, '_custom_order_value', $order_value);
						//update_post_meta(get_the_ID(), 'post_title', $order_title);

						// Add any other custom meta data as needed

						return $order_id; // Return the ID of the created order
					}
					
					return false; // Failed to create the order
				}
				
				// Call the function to create the order
				$new_order_id = create_custom_order_programmatically();

				if ($new_order_id) {
					echo "Order created successfully with ID: " . $new_order_id;
				} else {
					echo "Failed to create order.";
				}
				 */
				
		
	}
	?>
	 </div>

<?php get_footer(); ?>