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
<div class="checkout">
<h1 class="site__title site__title_3"><?php the_title(); ?></h1>

<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">
	<div class="checkout__main">
	<?php if ( $checkout->get_checkout_fields() ) : ?>
		<div>
		<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

		<div class="col2-set" id="customer_details">
			<div class="col-1">
				<?php do_action( 'woocommerce_checkout_billing' ); ?>
			</div>

			<div class="col-2">
				<?php do_action( 'woocommerce_checkout_shipping' ); ?>
			</div>
		</div>
<!---->
<!--		--><?php //do_action( 'woocommerce_checkout_after_customer_details' ); ?>
		</div>
	<?php endif; ?>
		<div>
	<div class="total-order">
	<h3 id="order_review_heading"><?php _e( 'Order Summary', 'woocommerce' ); ?></h3>

	<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

		<div id="order_review" class="woocommerce-checkout-review-order">
			<?php do_action( 'woocommerce_checkout_order_review' ); ?>
		</div>
	</div>

	</div>

	</div>
	<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>

	<div class="checkout__payments">

		<h3>Choose payment method</h3>

		<div class="nice-radio nice-radio_2">
			<input type="radio" name="payments" id="credit-card" checked>
			<label for="credit-card">Credit Card

                                <span class="checkout__payments-more">
                                    <span class="checkout__payments-text">Credit Card (Visa, Mastercard, American Express, Discover etc.)</span>
                                    <span class="checkout__payments-pics">
                                        <img src="pic/visa.jpg" width="48" height="30" alt="visa">
                                        <img src="pic/mastercard.jpg" width="48" height="30" alt="mastercard">
                                        <img src="pic/card-amex.jpg" width="50" height="30" alt="amex">
                                        <img src="pic/card-discover.jpg" width="48" height="30" alt="amex">
                                    </span>

                                </span>

			</label>

		</div>
		<div class="nice-radio nice-radio_2">
			<input type="radio" name="payments" id="paypal">
			<label for="paypal">Paypal

                                <span class="checkout__payments-more">

                                    <span class="checkout__payments-pics">
                                       <img src="pic/paypal.jpg" width="48" height="30" alt="paypal">
                                    </span>

                                    <span class="checkout__payments-text">We accept Paypal for instant payments</span>

                                </span>

			</label>

		</div>
		<div class="nice-radio nice-radio_2">
			<input type="radio" name="payments" id="paypal-credit">
			<label for="paypal-credit">PayPal Credit

                                <span class="checkout__payments-more">

                                    <span class="checkout__payments-pics">
                                       <img src="pic/card-pp-credit.jpg" width="66" height="30" alt="paypal">
                                    </span>


                                    <span class="checkout__payments-text">PayPal Credit allows you to get a credit line you can immediately</span>

                                </span>

			</label>

		</div>

	</div>

	<p class="checkout__payments-error">Please try another payment method or call us at 1-800-ALL-MOBI for assistance.</p>

	<div id="payment" class="woocommerce-checkout-payment">
		<ul class="wc_payment_methods payment_methods methods">
			<li class="wc_payment_method payment_method_bacs">
				<input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="bacs"  checked='checked' data-order_button_text="" />

				<label for="payment_method_bacs">
					Direct Bank Transfer 	</label>
				<div class="payment_box payment_method_bacs" >
					<p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won&#8217;t be shipped until the funds have cleared in our account.</p>
				</div>
			</li>
			<li class="wc_payment_method payment_method_cheque">
				<input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="cheque"  data-order_button_text="" />

				<label for="payment_method_cheque">
					Check Payments 	</label>
				<div class="payment_box payment_method_cheque" style="display:none;">
					<p>Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
				</div>
			</li>
			<li class="wc_payment_method payment_method_cod">
				<input id="payment_method_cod" type="radio" class="input-radio" name="payment_method" value="cod"  data-order_button_text="" />

				<label for="payment_method_cod">
					Cash on Delivery 	</label>
				<div class="payment_box payment_method_cod" style="display:none;">
					<p>Pay with cash upon delivery.</p>
				</div>
			</li>
			<li class="wc_payment_method payment_method_paypal">
				<input id="payment_method_paypal" type="radio" class="input-radio" name="payment_method" value="paypal"  data-order_button_text="Proceed to PayPal" />

				<label for="payment_method_paypal">
					PayPal <img src="https://www.paypalobjects.com/webstatic/mktg/Logo/AM_mc_vs_ms_ae_UK.png" alt="PayPal Acceptance Mark" /><a href="https://www.paypal.com/gb/webapps/mpp/paypal-popup" class="about_paypal" onclick="javascript:window.open('https://www.paypal.com/gb/webapps/mpp/paypal-popup','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700'); return false;" title="What is PayPal?">What is PayPal?</a>	</label>
				<div class="payment_box payment_method_paypal" style="display:none;">
					<p>Pay via PayPal; you can pay with your credit card if you don&#8217;t have a PayPal account.</p>
				</div>
			</li>
		</ul>
		<div class="form-row place-order">
			<noscript>
				Since your browser does not support JavaScript, or it is disabled, please ensure you click the <em>Update Totals</em> button before placing your order. You may be charged more than the amount stated above if you fail to do so.			<br/><input type="submit" class="button alt" name="woocommerce_checkout_update_totals" value="Update totals" />
			</noscript>

			<button type="submit" class="button alt" name="woocommerce_checkout_place_order" id="place_order" value="Place order" data-value="Place order">
				<span>PURCHASE</span>
			</button>

			<!--<input type="submit" class="button alt" name="woocommerce_checkout_place_order" id="place_order" value="Place order" data-value="Place order" />-->

			<input type="hidden" id="_wpnonce" name="_wpnonce" value="0efbfaeeb3" /><input type="hidden" name="_wp_http_referer" value="/checkout/" />	</div>
	</div>

</form>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
</div>