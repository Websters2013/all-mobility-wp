<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
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
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>


<?php if ( $order ) : ?>

<!-- confirmation -->
<div class="confirmation">

	<?php if ( $order->has_status( 'failed' ) ) : ?>

		<h2 class="site__title site__title_9">Success!</h2>

		<!-- confirmation__info -->
		<div class="confirmation__info">
			<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', __( 'Thank you. Your order has been received.', 'woocommerce' ), $order ); ?></p>

		</div>
		<!-- /confirmation__info -->

		<a href="<?= get_home_url() ?>" class="btn btn_16">HOME PAGE</a>

	<?php else :  ?>

	<h2 class="site__title site__title_9">Success!</h2>

	<svg width="92px" height="92px" viewBox="0 0 92 92" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
		<!-- Generator: Sketch 43.1 (39012) - http://www.bohemiancoding.com/sketch -->
		<desc>Created with Sketch.</desc>
		<defs>
			<circle id="path-1" cx="42" cy="42" r="42"></circle>
			<filter x="-8.3%" y="-6.0%" width="116.7%" height="116.7%" filterUnits="objectBoundingBox" id="filter-2">
				<feOffset dx="0" dy="2" in="SourceAlpha" result="shadowOffsetOuter1"></feOffset>
				<feGaussianBlur stdDeviation="2" in="shadowOffsetOuter1" result="shadowBlurOuter1"></feGaussianBlur>
				<feColorMatrix values="0 0 0 0 0   0 0 0 0 0   0 0 0 0 0  0 0 0 0.167940444 0" type="matrix" in="shadowBlurOuter1"></feColorMatrix>
			</filter>
		</defs>
		<g id="high-fildelity" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
			<g id="purchase-confirmation" transform="translate(-673.000000, -315.000000)">
				<g id="Group" transform="translate(677.000000, 317.000000)">
					<g id="Oval-6" opacity="0.900000036">
						<use fill="black" fill-opacity="1" filter="url(#filter-2)" xlink:href="#path-1"></use>
						<use fill="#FFFFFF" fill-rule="evenodd" xlink:href="#path-1"></use>
					</g>
					<circle id="Oval-6" fill="#F47920" opacity="0.5" cx="42" cy="42" r="39"></circle>
					<circle id="Oval-6" fill="#F47920" opacity="0.5" cx="42" cy="42" r="35"></circle>
					<circle id="Oval-6" fill="#F47920" cx="42" cy="42" r="30"></circle>
					<polyline id="Path-8" stroke="#FFFFFF" stroke-width="3" stroke-linecap="round" points="32 46 38 52 46.3296033 42.7448852 56 32"></polyline>
				</g>
			</g>
		</g>
	</svg>

	<!-- confirmation__info -->
	<div class="confirmation__info">
		<p>Your order # <?= $order->get_order_number() ?> with a total of <?= $order->get_formatted_order_total() ?> was successfully confirmed
			and currently is being processed by our team.</p>
		<p>You will receive a confirmation e-mail within a few minutes.</p>
		<p>You can track your order on <a href="<?= get_permalink(13).'/orders/' ?>">this page</a></p>
	</div>
	<!-- /confirmation__info -->

	<a href="<?= get_home_url() ?>" class="btn btn_16">HOME PAGE</a>

</div>
<!-- /confirmation -->

<?php endif;

endif; ?>