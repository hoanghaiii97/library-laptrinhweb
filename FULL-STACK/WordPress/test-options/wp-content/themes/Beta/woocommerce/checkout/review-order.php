<?php
/**
 * Review order table
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/review-order.php.
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
?>
<div class="pd_cart__info">
<?php
foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
	$_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );

	if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
		$image_id = $cart_item['data']->image_id;
		?>
		<div class="item-cart">
			<div class="cart-img"><?php echo wp_get_attachment_image( absint( $image_id ) ); ?></div>
			<div class="cart-name"><?php echo esc_html( $_product->get_name() ); ?></div>
			<div class="cart-quantity"><?php printf( '%sđ', esc_html( $cart_item['quantity'] ) ); ?></div>
		</div>
		<?php
	}
}
?>
</div>
<div class="pd_cart_preview">
	<div class="box-1">
		<span class="box-1-title"><?php esc_html_e( 'Tạm tính', 'phoenixdigi' ) ?></span>
		<span class="box-1-price"><?php wc_cart_totals_subtotal_html(); ?>đ</span>
	</div>
	<div class="box-2">
		<span class="box-2-title"><?php esc_html_e( 'Khuyến mãi', 'phoenixdigi' ) ?></span>
		<?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
		<span class="box-2-price text-right">
		<?php
		if ( is_string( $coupon ) ) {
			$coupon = new WC_Coupon( $coupon );
		}

		$amount = WC()->cart->get_coupon_discount_amount( $coupon->get_code(), WC()->cart->display_cart_ex_tax );
		$discount_amount_html = '';

		if ( $amount ) {
			$discount_amount_html = $amount;
		} elseif ( $coupon->get_free_shipping() ) {
			$discount_amount_html = '0';
		}
		echo esc_html( '-' . number_format( $discount_amount_html ) . 'đ' );
		?>
		</span>
		<?php endforeach; ?>
	</div>
	<div class="box-3 js-get-value clearfix">
		<span class="box-3-input pull-left"><input type="text" placeholder="Nhập mã giảm giá"></span>
		<span class="box-3-button pull-right text-right"><button><?php esc_html_e( 'Sử dụng', 'phoenixdigi' ) ?></button></span>
	</div>
	<div class="box-4">
		<span class="box-4-title"><?php esc_html_e( 'Thành tiền', 'phoenixdigi' ); ?></span>
		<span class="box-4-price text-right"><?php echo number_format( WC()->cart->total ) . 'đ'; ?></span>
	</div>
	</div>
</div>
