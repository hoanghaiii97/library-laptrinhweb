<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

wc_print_notices();

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) );
	return;
}

?>

<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

	<?php if ( $checkout->get_checkout_fields() ) : ?>

		<div class="col3-set clear">
			<div class="col col-1">
				<?php do_action( 'woocommerce_checkout_billing' ); ?>
			</div>

			<div class="col col-2">

				<h3 class="checkout-col-title"><?php esc_html_e( 'HÌNH THỨC THANH TOÁN' , 'phoenixdigi' ); ?></h3>

				<div class="clear"></div>

				<?php
				if ( WC()->cart->needs_payment() ) :
					if ( WC()->cart->needs_payment() ) {
						$available_gateways = WC()->payment_gateways()->get_available_payment_gateways();
						WC()->payment_gateways()->set_current_gateway( $available_gateways );
					} else {
						$available_gateways = array();
					}
				?>
					<ul class="wc_payment_methods payment_methods methods list-unstyled">
						<?php
						if ( ! empty( $available_gateways ) ) {
							foreach ( $available_gateways as $gateway ) {
								wc_get_template( 'checkout/payment-method.php', array( 'gateway' => $gateway ) );
							}
						} else {
							echo '<li class="woocommerce-notice woocommerce-notice--info woocommerce-info">' . apply_filters( 'woocommerce_no_available_payment_methods_message', WC()->customer->get_billing_country() ? __( 'Sorry, it seems that there are no available payment methods for your state. Please contact us if you require assistance or wish to make alternate arrangements.', 'woocommerce' ) : __( 'Please fill in your details above to see available payment methods.', 'woocommerce' ) ) . '</li>';
						}
						?>
					</ul>
				<?php endif; ?>

				<?php do_action( 'woocommerce_checkout_shipping' ); ?>

			</div>

			<div class="col col-3">

				<h3 id="order_review_heading" class="checkout-col-title"><?php printf( 'ĐƠN HÀNG (%s sản phẩm)', absint( WC()->cart->cart_contents_count ) ); ?></h3>

				<div class="clear"></div>

				<div id="order_review" class="woocommerce-checkout-review-order">
					<?php do_action( 'woocommerce_checkout_order_review' ); ?>
				</div>

			</div>
		</div>

	<?php endif; ?>

</form>
