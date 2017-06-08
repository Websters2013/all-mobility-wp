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

    <input type="radio" name="payment_method"  value="<?php echo esc_attr( $gateway->id ); ?>" id="<?= $gateway->id ?>">

    <?php

        $label_class = '';

    else :
        $label_class = 'payment_method_';
        ?>

    <input type="radio" name="payment_method" value="stripe" id="payment_method_stripe" checked>

	<?php endif; ?>

    <label for="<?= $label_class.$gateway->id ?>">

        <?php if( $gateway->id == 'stripe' ){
            $name = 'Credit Card';
        } else {
            $name = ucfirst($gateway->id);
        } ?>


        <?= $name  ?>
        <span class="checkout__payments-more">
            <span class="checkout__payments-text"><?= $gateway->get_title() ?></span>
            <span class="checkout__payments-pics">
                
                <?php if( $gateway->id == 'paypal' ){ ?>

                    <img src="<?= DIRECT ?>pic/paypal.jpg" width="48" height="30" alt="paypal">
                <?php }

                elseif( $gateway->id == 'stripe' ) { ?>
                    <img src="<?= DIRECT ?>pic/visa.jpg" width="48" height="30" alt="visa">
                    <img src="<?= DIRECT ?>pic/mastercard.jpg" width="48" height="30" alt="mastercard">
                    <img src="<?= DIRECT ?>pic/card-amex.jpg" width="50" height="30" alt="amex">
                    <img src="<?= DIRECT ?>pic/card-discover.jpg" width="48" height="30" alt="amex">
                <?php } else { ?>
                    <?= $image = $gateway->get_icon(); ?>
               <?php } ?>

            </span>
            <span class="checkout__payments-text"><?= $gateway->get_description() ?></span>

        </span>

	</label>

<!--    --><?php //if( $gateway == 'stripe' ): ?>
<!--        <div class="payment_box payment_method_stripe">-->
<!--            <div id="stripe-payment-data" data-panel-label="" data-description="" data-email="alexksnikol@gmail.com" data-amount="130000" data-name="All About Mobility" data-currency="usd" data-image="" data-bitcoin="true" data-locale="en" data-allow-remember-me="false"><p>Pay with your credit card via Stripe. TEST MODE ENABLED. In test mode, you can use the card number 4242424242424242 with any CVC and a valid expiration date or check the documentation "<a href="https://stripe.com/docs/testing">Testing Stripe</a>" for more card numbers.</p>-->
<!--            </div>		</div>-->
<!--    --><?php //endif; ?>

</div>

<?php if ( $gateway->has_fields() || $gateway->get_description() ) : ?>
<div class="payment_box payment_method_<?php echo $gateway->id; ?>" <?php if ( ! $gateway->chosen ) : ?>style="display:none;"<?php endif; ?>>
    <?php $gateway->payment_fields(); ?>
</div>
<?php endif; ?>