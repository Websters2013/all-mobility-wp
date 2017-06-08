<?php
/**
 * Orders
 *
 * Shows orders on the account page.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/orders.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_account_orders', $has_orders ); ?>

<?php if ( $has_orders ) : ?>

<!-- my-account -->
<div class="my-account">

	<h2 class="site__title site__title_3">My Account</h2>

	<!-- my-account__links -->
	<div class="my-account__links">
		<a href="<?= get_permalink(13) ?>" >Account overview</a>
		<a href="<?= wc_get_endpoint_url('orders') ?>" class="active">Purchase History</a>
	</div>
	<!-- /my-account__links -->

	<!-- my-account__content -->
	<div class="my-account__content">

		<!-- my-account__history -->
		<div class="my-account__history">
			<div class="my-account__history-head">
				<div>Order #</div>
				<div>Total</div>
				<div>Date</div>
				<div>Status</div>
			</div>

			<div class="my-account__history-content">

				<?php foreach ( $customer_orders->orders as $customer_order ) :
					$order      = wc_get_order( $customer_order );
					$order_number = $order->get_order_number();
					$order_cost =  wc_price( $order->get_total() ) ;
					$order_date = wc_format_datetime( $order->get_date_created(), 'n/j/Y' );
					$order_status = wc_get_order_status_name( $order->get_status() ); ?>

					<div class="my-account__history-row">
						<div><?= $order_number ?></div>
						<div><?= $order_cost ?></div>
						<div><?= $order_date ?></div>
						<div><?= $order_status ?></div>
					</div>

				<?php endforeach; ?>

			</div>
		</div>
		<!-- /my-account__history -->

	</div>
	<!-- /my-account__content -->

</div>
<!-- /my-account -->

<?php
else : ?>

    <!-- my-account -->
    <div class="my-account">

        <h2 class="site__title site__title_3">My Account</h2>

        <!-- my-account__links -->
        <div class="my-account__links">
            <a href="<?= get_permalink(13) ?>" >Account overview</a>
            <a href="<?= wc_get_endpoint_url('orders') ?>" class="active">Purchase History</a>
        </div>
        <!-- /my-account__links -->

        <!-- my-account__content -->
        <div class="my-account__content">

          No orders yet

        </div>
        <!-- /my-account__content -->

    </div>
    <!-- /my-account -->

<?php endif; ?>

<?php do_action( 'woocommerce_after_account_orders', $has_orders ); ?>
