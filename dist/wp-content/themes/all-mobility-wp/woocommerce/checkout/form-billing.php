<?php
/**
 * Checkout billing information form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-billing.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/** @global WC_Checkout $checkout */

?>
<div class="woocommerce-billing-fields">
	<?php if ( wc_ship_to_billing_address_only() && WC()->cart->needs_shipping() ) : ?>

		<h3><?php _e( 'Billing &amp; Shipping', 'woocommerce' ); ?></h3>

	<?php else : ?>

		<h3><?php _e( 'Add your billing information', 'woocommerce' ); ?></h3>

	<?php endif; ?>

	<?php do_action( 'woocommerce_before_checkout_billing_form', $checkout ); ?>

	<div class="woocommerce-billing-fields__field-wrapper">
		<div class="checkout__row">
		<div>
		<?php
		$i = 0;
		foreach ( $checkout->get_checkout_fields( 'billing' ) as $key => $field ) : ?>
			<?php

				if( $key == 'billing_country' ){

					echo '<input type="hidden" name="billing_country" value="US"  />';

				}
			

				if( $key == 'billing_country' || $key == 'billing_state' ){
					continue;
				}

				if( $key == 'billing_postcode' ){ ?>

				<p class="form-row form-wide  form-row-first validate-required validate-postcode address-field" id="billing_postcode_field">
					<label for="billing_postcode" class="">State/ZIP<abbr class="required" title="required">*</abbr></label>


					<?php $states = WC()->countries->get_states( 'US' );  ?>

					<?php if(is_array( $states ) && !empty( $states )): ?>

					<select name="billing_state" id="billing_state"  data-placeholder="" autocomplete="address-level1">
						<?php foreach ($states as $key => $state){

							if($checkout->get_value('billing_state') == $key){
								$selected = 'selected';
							} else {
								$selected = '';
							}

							?>

							<option  <?= $selected ?> value="<?= $key ?>"><?= $key ?></option>

						<?php } ?>
					</select>

					<?php endif; ?>

                    <input type="text" class="input-text"  required name="billing_postcode" id="billing_postcode" placeholder=""  autocomplete="postal-code" value=""  />


                </p>

					<?php
					continue;
				}


				if( $i == 4 ){
					echo '</div><div>';
				}

				woocommerce_form_field( $key, $field, $checkout->get_value( $key ) );
				
				$i++;
			?>
		<?php endforeach; ?>

			</div>

		</div>

	</div>

	<?php do_action( 'woocommerce_after_checkout_billing_form', $checkout ); ?>
</div>


