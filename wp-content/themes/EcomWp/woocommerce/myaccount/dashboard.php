<?php
/**
 * My Account Dashboard
 *
 * Shows the first intro screen on the account dashboard.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/dashboard.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$allowed_html = array(
	'a' => array(
		'href' => array(),
	),
);
?>

				<div class="tab-content myaccount-tab-content" id="account-page-tab-content">
					<div class="tab-pane fade show active" id="account-dashboard" role="tabpanel" aria-labelledby="account-dashboard-tab">
						<div class="myaccount-dashboard">
							<p>		
								<?php
									printf(
										/* translators: 1: user display name 2: logout url */
										wp_kses( __( 'Hello %1$s (not %1$s? <a href="%2$s">Log out</a>)', 'woocommerce' ), $allowed_html ),
										'<strong>' . esc_html( $current_user->display_name ) . '</strong>',
										esc_url( wc_logout_url() )
									);
								?>
							</p>		
							<!-- New code ----->
								<?php
										/* translators: 1: Orders URL 2: Address URL 3: Account URL. */
										$dashboard_desc = __( 'From your account dashboard you can view your <a href="%1$s">recent orders</a>, manage your <a href="%2$s">billing address</a>, and <a href="%3$s">edit your password and account details</a>.', 'woocommerce' );
										if ( wc_shipping_enabled() ) {
											/* translators: 1: Orders URL 2: Addresses URL 3: Account URL. */
											$dashboard_desc = __( 'From your account dashboard you can view your <a href="%1$s">recent orders</a>, manage your <a href="%2$s">shipping and billing addresses</a>, and <a href="%3$s">edit your password and account details</a>.', 'woocommerce' );
										}
										printf(
											wp_kses( $dashboard_desc, $allowed_html ),
											esc_url( wc_get_endpoint_url( 'orders' ) ),
											esc_url( wc_get_endpoint_url( 'edit-address' ) ),
											esc_url( wc_get_endpoint_url( 'edit-account' ) )
										);
								?>
							<!-- End New code-->
							
						</div>
					</div>
					<div class="tab-pane fade" id="account-orders" role="tabpanel" aria-labelledby="account-orders-tab">
						<div class="myaccount-orders">
							<h4 class="small-title">MY ORDERS</h4>
							<div class="table-responsive">
								<table class="table table-bordered table-hover">
									<tbody>
										<tr>
											<th>ORDER</th>
											<th>DATE</th>
											<th>STATUS</th>
											<th>TOTAL</th>
											<th></th>
										</tr>
										<tr>
											<td><a class="account-order-id" href="javascript:void(0)">#5364</a></td>
											<td>Mar 27, 2019</td>
											<td>On Hold</td>
											<td>£162.00 for 2 items</td>
											<td><a href="javascript:void(0)" class="uren-btn uren-btn_dark uren-btn_sm"><span>View</span></a>
											</td>
										</tr>
										<tr>
											<td><a class="account-order-id" href="javascript:void(0)">#5356</a></td>
											<td>Mar 27, 2019</td>
											<td>On Hold</td>
											<td>£162.00 for 2 items</td>
											<td><a href="javascript:void(0)" class="uren-btn uren-btn_dark uren-btn_sm"><span>View</span></a>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="account-edit-address" role="tabpanel" aria-labelledby="account-edit-address-tab">
						<div class="myaccount-address">
						<?php  wc_get_template( 'myaccount/my-address.php' ); ?>
						</div>
					</div>
					
					
					<?php 
					$user = wp_get_current_user();
					do_action( 'woocommerce_before_edit_account_form' );  ?>
					<div class="tab-pane fade" id="account-edit-account" role="tabpanel" aria-labelledby="account-edit-account-tab">
						<div class="myaccount-details">
							<form class="uren-form woocommerce-EditAccountForm edit-account" action="" method="post" <?php do_action( 'woocommerce_edit_account_form_tag' ); ?> >
								<?php do_action( 'woocommerce_edit_account_form_start' ); ?>
								<div class="uren-form-inner">
									<div class="single-input single-input-half">
										<label for="account-details-firstname"><?php esc_html_e( 'First name', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
										<input type="text" id="account-details-firstname" name="account_first_name" id="account_first_name" autocomplete="given-name" value="<?php echo esc_attr( $user->first_name ); ?>" />
									</div>
									<div class="single-input single-input-half">
										<label for="account-details-lastname"><?php esc_html_e( 'Last name', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
										<input type="text" id="account-details-lastname" name="account_last_name" id="account_last_name" autocomplete="family-name" value="<?php echo esc_attr( $user->last_name ); ?>" />
									</div>
									<div class="single-input single-input-half">
										<label for="account-details-display-name"><?php esc_html_e( 'Display name', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
										<input type="text" id="account-details-display-name" name="account_display_name" id="account_display_name" value="<?php echo esc_attr( $user->display_name ); ?>" /> <span><em><?php esc_html_e( 'This will be how your name will be displayed in the account section and in reviews', 'woocommerce' ); ?></em></span>
									</div>
									<div class="single-input single-input-half">
										<label for="account-details-email"><?php esc_html_e( 'Email address', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
										<input type="email" id="account-details-email" name="account_email" id="account_email" autocomplete="email" value="<?php echo esc_attr( $user->user_email ); ?>" />
									</div>
									<div class="single-input">
										<label for="account-details-oldpass"><?php esc_html_e( 'Current password (leave blank to leave unchanged)', 'woocommerce' ); ?></label>
										<input type="password" id="account-details-oldpass" name="password_current" id="password_current" autocomplete="off" />
									</div>
									<div class="single-input">
										<label for="account-details-newpass"><?php esc_html_e( 'New password (leave blank to leave unchanged)', 'woocommerce' ); ?></label>
										<input type="password" id="account-details-newpass" name="password_1" id="password_1" autocomplete="off" />
									</div>
									<div class="single-input">
										<label for="account-details-confpass"><?php esc_html_e( 'Confirm new password', 'woocommerce' ); ?></label>
										<input type="password" id="account-details-confpass" name="password_2" id="password_2" autocomplete="off" />
									</div>
									<?php do_action( 'woocommerce_edit_account_form' ); ?>
									<div class="single-input">
									<?php wp_nonce_field( 'save_account_details', 'save-account-details-nonce' ); ?>
										<button type="submit" class="uren-btn uren-btn_dark<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" name="save_account_details" value="<?php esc_attr_e( 'Save changes', 'woocommerce' ); ?>"><?php esc_html_e( 'Save changes', 'woocommerce' ); ?></button>
										<input type="hidden" name="action" value="save_account_details" />
									</div>
								</div>
								<?php do_action( 'woocommerce_edit_account_form_end' ); ?>
							</form>
						</div>
					</div>
					<?php do_action( 'woocommerce_after_edit_account_form' ); ?>
				</div>
			</div>
		</div>
</div>
			<!-- Old code --->
<?php
	/**
	 * My Account dashboard.
	 *
	 * @since 2.6.0
	 */
	do_action( 'woocommerce_account_dashboard' );

	/**
	 * Deprecated woocommerce_before_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_before_my_account' );

	/**
	 * Deprecated woocommerce_after_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_after_my_account' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */



