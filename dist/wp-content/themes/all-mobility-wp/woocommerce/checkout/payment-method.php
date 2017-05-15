<?php
/**
 * Output a single payment method
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/payment-method.php.
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

<div class="nice-radio nice-radio_2 wc_payment_method payment_method_<?php echo $gateway->id; ?>" >
	<input type="radio" name="payment_method"  value="<?php echo esc_attr( $gateway->id ); ?>" id="<?= $gateway->id ?>">
	<label for="<?= $gateway->id ?>"><?= $gateway->get_title() ?>

                                <span class="checkout__payments-more">
									<span class="checkout__payments-pics">
                                       <img src="<?= DIRECT ?>pic/paypal.jpg" width="48" height="30" alt="paypal">
                                    </span>
                                    <span class="checkout__payments-text"><?= $gateway->get_description() ?></span>

                                </span>

	</label>

</div>

