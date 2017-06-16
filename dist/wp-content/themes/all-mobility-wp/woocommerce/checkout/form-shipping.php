<?php
/**
 * Checkout shipping information form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-shipping.php.
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

?>
<div class="woocommerce-shipping-fields">
	<?php if ( true === WC()->cart->needs_shipping_address() ) : ?>
		<h3><?php _e( 'Add your shipping information', 'woocommerce' ); ?></h3>
		<h3 id="ship-to-different-address">
			<input id="ship-to-different-address-checkbox" class="input-checkbox"  type="checkbox" name="ship_to_different_address" value="1" />
			<label for="ship-to-different-address-checkbox" class="checkbox">Ship to a different address?</label>
		</h3>

		<div class="shipping_address">

			<?php do_action( 'woocommerce_before_checkout_shipping_form', $checkout ); ?>

			<div class="woocommerce-shipping-fields__field-wrapper">

				<div class="checkout__row">
					<div>
						<?php
						$i = 0;
				 foreach ( $checkout->get_checkout_fields( 'shipping' )  as $key => $field ) : ?>
					<?php

					 if( $key == 'shipping_country' || $key == 'shipping_state' ){
						 continue;
					 }

					 if( $key == 'shipping_postcode' ){ ?>

						 <p class="form-row  form-row-first address-field validate-required validate-state validate-postcode" id="shipping_state_field">
							 <label for="shipping_postcode" class="">State/ZIP<abbr class="required" title="required">*</abbr></label>

                             <?php $states = WC()->countries->get_states( 'US' );  ?>

							 <?php if(is_array( $states ) && !empty( $states )): ?>

								 <select name="shipping_state" id="shipping_state"  data-placeholder="" autocomplete="address-level1">
									 <?php foreach ($states as $key => $state){

										 if($checkout->get_value('shipping_state') == $key){
											 $selected = 'selected';
										 } else {
											 $selected = '';
										 }

										 ?>

										 <option  <?= $selected ?> value="<?= $key ?>"><?= $key ?></option>

									 <?php } ?>
								 </select>
							 <?php endif; ?>

                             <input type="text" class="input-text"  required name="shipping_postcode" id="shipping_postcode" placeholder=""  autocomplete="postal-code" value=""  />


                         </p>

						 <?php
						 continue;
					 }

					 if( $i == 4 ){
						 echo '</div><div>';
					 }

					 woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>
				<?php $i++;  endforeach; ?>

					</div>

			</div>

			</div>

			<?php do_action( 'woocommerce_after_checkout_shipping_form', $checkout ); ?>

		</div>

	<?php endif; ?>
</div>

