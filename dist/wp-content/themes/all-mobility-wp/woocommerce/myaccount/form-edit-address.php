<?php
/**
 * Edit address form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-address.php.
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
	exit;
} ?>

<?php
global $wp;
$current_url = home_url(add_query_arg(array(),$wp->request));

$urls = explode('/',$current_url);
$count = count($urls)-1;

if( 'billing' === $urls[$count] ){
    $active_billing = 'active';
} elseif( 'shipping' === $urls[$count] ){
    $active_shipping = 'active';
} else {
    $active = 'active';
}

?>

<!-- my-account -->
<div class="my-account">

    <h2 class="site__title site__title_3">My Account</h2>

    <div class="my-account__links">
        <a  class="<?= $active ?>" href="<?= esc_url( wc_get_endpoint_url( 'edit-account' ) ) ?>">Account overview</a>
        <a class="<?= $active_billing ?>" href="<?= esc_url( wc_get_endpoint_url( 'edit-address/billing' ) ) ?>">Billing</a>
        <a class="<?= $active_shipping ?>" href="<?= esc_url( wc_get_endpoint_url( 'edit-address/shipping' ) ) ?>">Shipping</a>
    </div>

    <!-- my-account__content -->
    <div class="my-account__content">

        <!-- my-account__edit-data -->
        <div class="my-account__edit-data">

            <div class="my-account__form">

<?php $page_title = ( 'billing' === $load_address ) ? __( 'Billing address', 'woocommerce' ) : __( 'Shipping address', 'woocommerce' );

do_action( 'woocommerce_before_edit_account_address_form' ); ?>

<?php if ( ! $load_address ) : ?>
	<?php wc_get_template( 'myaccount/my-address.php' ); ?>
<?php else : ?>

	<form method="post">

		<h3><?php echo apply_filters( 'woocommerce_my_account_edit_address_title', $page_title, $load_address ); ?></h3>

		<div class="woocommerce-address-fields">
			<?php do_action( "woocommerce_before_edit_address_form_{$load_address}" ); ?>

			<div class="woocommerce-address-fields__field-wrapper">
				<?php foreach ( $address as $key => $field ) : ?>
					<?php woocommerce_form_field( $key, $field, ! empty( $_POST[ $key ] ) ? wc_clean( $_POST[ $key ] ) : $field['value'] ); ?>
				<?php endforeach; ?>
			</div>

			<?php do_action( "woocommerce_after_edit_address_form_{$load_address}" ); ?>

			<p>
				<input type="submit" class="button" name="save_address" value="<?php esc_attr_e( 'Save address', 'woocommerce' ); ?>" />
				<?php wp_nonce_field( 'woocommerce-edit_address' ); ?>
				<input type="hidden" name="action" value="edit_address" />
			</p>
		</div>

	</form>

    <a href="<?= get_permalink(13) ?>" class="my-account__edit my-account__back">Back to Profile</a>


<?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php do_action( 'woocommerce_after_edit_account_address_form' ); ?>
