<?php
/**
 * Checkout Payment Section
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/payment.php.
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
 * @version     2.5.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! is_ajax() ) {
	do_action( 'woocommerce_review_order_before_payment' );
}
?>

<div id="payment" class="woocommerce-checkout-payment">
	<?php if ( WC()->cart->needs_payment() ) : ?>

	<div class="checkout__payments wc_payment_methods payment_methods methods">

		<h3>Choose payment method</h3>

		<?php

		if ( ! empty( $available_gateways ) ) {

			foreach ( $available_gateways as $gateway ) {
				wc_get_template( 'checkout/payment-method.php', array( 'gateway' => $gateway ) );
			}

		} else {
			echo '<div class="woocommerce-notice woocommerce-notice--info woocommerce-info">' . apply_filters( 'woocommerce_no_available_payment_methods_message', WC()->customer->get_billing_country() ? __( 'Sorry, it seems that there are no available payment methods for your state. Please contact us if you require assistance or wish to make alternate arrangements.', 'woocommerce' ) : __( 'Please fill in your details above to see available payment methods.', 'woocommerce' ) ) . '</div>';
		}
		?>
		
	</div>

	<?php endif; ?>

    <!--<p class="checkout__payments-error">Please try another payment method or call us at 1-800-ALL-MOBI for assistance.</p>-->
	<div class="form-row place-order">
		<!--<noscript>
			<?php /*_e( '<p class="checkout__payments-error">Please try another payment method or call us at 1-800-ALL-MOBI for assistance.</p>', 'woocommerce' ); */?>
			<br/><input type="submit" class="button alt" name="woocommerce_checkout_update_totals" value="<?php /*esc_attr_e( 'Update totals', 'woocommerce' ); */?>" />
		</noscript>-->

		<?php wc_get_template( 'checkout/terms.php' ); ?>

		<?php do_action( 'woocommerce_review_order_before_submit' ); ?>

		<button type="submit" class="button alt" id="place_order" name="woocommerce_checkout_place_order" id="place_order" value="Place order" data-value="Place order">
			<span>PURCHASE</span>
		</button>

		<?php do_action( 'woocommerce_review_order_after_submit' ); ?>

		<?php wp_nonce_field( 'woocommerce-process_checkout' ); ?>
	</div>
</div>

<?php
if ( ! is_ajax() ) {
	do_action( 'woocommerce_review_order_after_payment' );
}
