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

    <?php if( $gateway->id != 'stripe' ): ?>


            <input class="input-radio" type="radio" name="payment_method"  value="<?php echo esc_attr( $gateway->id ); ?>" id="payment_method_<?= $gateway->id ?>">


    <?php

        //$label_class = '';
        $label_class = 'payment_method_';

    else :
        $label_class = 'payment_method_';
        ?>

    <input type="radio" name="payment_method" value="stripe" id="payment_method_stripe" checked>

	<?php endif; ?>

    <label for="<?= $label_class.$gateway->id ?>">

        <?php
        $name = ucfirst($gateway->get_title());
        ?>


        <?= $name  ?>
        <span class="checkout__payments-more">
            <span class="checkout__payments-text"><?= $gateway->get_description() ?></span>
            <span class="checkout__payments-pics">
                
                <?php if( $gateway->id == 'ppec_paypal' ){ ?>

                    <img src="<?= DIRECT ?>pic/paypal.jpg" width="48" height="30" alt="paypal">
                    <img src="<?= DIRECT ?>/pic/card-pp-credit.jpg" width="" height="30" class="ppcreditlogo ec_checkout_page_button_type_pc" align="top" alt="Check out with PayPal Credit">
                <?php }

                elseif( $gateway->id == 'stripe' || $gateway->id == 'usaepay') { ?>
                    <img src="<?= DIRECT ?>pic/visa.jpg" width="48" height="30" alt="visa">
                    <img src="<?= DIRECT ?>pic/mastercard.jpg" width="48" height="30" alt="mastercard">
                    <img src="<?= DIRECT ?>pic/card-amex.jpg" width="50" height="30" alt="amex">
                    <img src="<?= DIRECT ?>pic/card-discover.jpg" width="48" height="30" alt="amex">
                <?php } else { ?>
                    <?= $image = $gateway->get_icon(); ?>
                       <?php } ?>

            </span>

        </span>

	</label>
	<?php if( $gateway->id == 'usaepay' ){ ?>
	<?php if ( $gateway->has_fields() || $gateway->get_description() ) : ?>
      <div class="payment_box payment_method_<?php echo $gateway->id; ?>" style="display:none;">
				<?php $gateway->payment_fields(); ?>
      </div>
	<?php endif; ?>
	<?php }  ?>

</div>
