<?php
/**
 * My Account Dashboard
 *
 * Shows the first intro screen on the account dashboard.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/dashboard.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if( $success_reg = $_SESSION['wb_reg'] ){

	$_SESSION['wb_reg'] = 0;

	echo "<div class='success_registration'>$success_reg</div>";

} ?>



<?php $user = new WC_Customer($current_user->ID); ?>
<!-- my-account -->
<div class="my-account">

	<h2 class="site__title site__title_3"><?php the_title() ?></h2>


	<!-- my-account__links -->
	<div class="my-account__links">
		<a href="<?= get_permalink(13) ?>" class="active">Account overview</a>
		<a href="<?= wc_get_endpoint_url('orders') ?>">Purchase History</a>
	</div>
	<!-- /my-account__links -->

	<!-- my-account__content -->
	<div class="my-account__content">

		<!-- my-account__overview -->
		<div class="my-account__overview">

			<p>
				<span><?= $current_user->user_firstname.' '.$current_user->user_lastname?></span>
				<span><?= $current_user->user_email ?></span>
				<span><?php echo get_user_meta( $current_user->ID, 'billing_phone', true ) ?></span>
			</p>

			<p>
				<span>Billing address:</span>

				<?php
				$billing_address = $user->get_billing_address();
				$billing_state = $user->get_billing_state();
				$billing_city = $user->get_billing_city();
				$billing_zip = $user->get_billing_postcode();
				?>
				<?php if( $billing_address ): ?>
				<span><?= $billing_address ?></span>
				<?php endif; ?>

				<?php if( $billing_city ): ?>
					<span><?= $billing_city.', '.$billing_state.' '.$billing_zip ?></span>
				<?php endif; ?>
			</p>

			<?php
			$shipping_address = $user->get_shipping_address();
			$shipping_state = $user->get_shipping_state();
			$shipping_city = $user->get_shipping_city();
			$shipping_zip = $user->get_shipping_postcode();
			?>

			<?php if( $shipping_address || $shipping_city ): ?>

			<p>
				<span>Shipping address:</span>

				<?php if( $shipping_address ): ?>
					<span><?= $shipping_address ?></span>
				<?php endif; ?>

				<?php if( $shipping_city ): ?>
					<span><?= $shipping_city.', '.$shipping_state.' '.$shipping_zip ?></span>
				<?php endif; ?>


			</p>

			<?php endif; ?>

			<?php $email =  $current_user->user_email;
			if($email):

				$status = mc_checklist( $email );
			
				if( $status == 'subscribed' ): ?>

					<p>I’m signed up for e-mails from AAM</p>

				<?php endif; endif; ?>

			<a href="<?= esc_url( wc_get_endpoint_url( 'edit-account' ) ) ?>" class="my-account__edit">edit account settings</a>

			<div class="my-account__log-out">
				<a href="<?php echo wp_logout_url( get_home_url() ); ?> " class="btn btn_17"><span>LOG OUT</span></a>
			</div>

		</div>
		<!-- /my-account__overview -->

	</div>
	<!-- /my-account__content -->

</div>
<!-- /my-account -->

<?php
	/**
	 * My Account dashboard.
	 *
	 * @since 2.6.0
	 */
	do_action( 'woocommerce_account_dashboard' );

	/**
	 * Deprecated woocommerce_before_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_before_my_account' );

	/**
	 * Deprecated woocommerce_after_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_after_my_account' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */ ?>




