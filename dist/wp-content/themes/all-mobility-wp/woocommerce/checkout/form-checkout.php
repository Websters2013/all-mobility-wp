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
global $woocommerce;

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
				<?php if ( ! is_user_logged_in() && $checkout->is_registration_enabled() ) : ?>
					<div class="woocommerce-account-fields">
						<?php if ( ! $checkout->is_registration_required() ) : ?>

							<p class="form-row form-row-wide create-account">
								<input class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" id="createaccount" <?php checked( ( true === $checkout->get_value( 'createaccount' ) || ( true === apply_filters( 'woocommerce_create_account_default_checked', false ) ) ), true ) ?> type="checkbox" name="createaccount" value="1" />

								<label for="createaccount" class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox woocommerce-form__label-createaccount">
									<?php _e( 'Save this information and create and account with us to get discounts and special offers', 'woocommerce' ); ?>
								</label>
							</p>

						<?php endif; ?>

						<?php do_action( 'woocommerce_before_checkout_registration_form', $checkout ); ?>

						<?php if ( $checkout->get_checkout_fields( 'account' ) ) : ?>

							<div class="create-account create-account-input">
								<?php foreach ( $checkout->get_checkout_fields( 'account' )  as $key => $field ) : ?>
									<?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>
								<?php endforeach; ?>
								<div class="clear"></div>
							</div>

						<?php endif; ?>

						<?php do_action( 'woocommerce_after_checkout_registration_form', $checkout ); ?>
					</div>
				<?php endif; ?>
			</div>



		</div>

            <?php //do_action( 'woocommerce_checkout_after_customer_details' ); ?>
		</div>
	<?php endif; ?>
		<div>
	<div class="total-order">
	<h3 id="order_review_heading"><span><?php _e( 'Order Summary', 'woocommerce' ); ?></span> <a href="<?= $woocommerce->cart->get_cart_url(); ?>">edit</a></h3>

	<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

		<div id="order_review" class="woocommerce-checkout-review-order">
			<?php do_action( 'woocommerce_checkout_order_review' ); ?>
		</div>

		<div class="resolve resolve_2">

			<h2 class="resolve__title">
				<?= get_field('contact_text') ?>
			</h2>
			<?php $phone = get_field('phone_ch') ?>
			<div class="resolve__call">
				<span>Call now:</span>
				<a href="tel:<?= $phone ?>"><?= $phone ?></a>
			</div>

		</div>

	</div>

	</div>

	</div>
	
	<?php do_action('wb_woocmmerce_checkout_payment') ?>
	
	
</form>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
</div>