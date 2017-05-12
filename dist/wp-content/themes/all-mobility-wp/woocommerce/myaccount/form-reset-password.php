<?php
/**
 * Lost password reset form.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-reset-password.php.
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
}

wc_print_notices(); ?>

<!-- sign-up -->
<div class="sign-up sign-up_reset">

	<h2 class="site__title site__title_3 site__title_center">Reset Password</h2>

	<div class="sign-up__form">
		<form method="post" class="woocommerce-ResetPassword lost_reset_password reset">
			<div>
				<label class="site__label" for="password_1">
					New Password <span>*</span>
				</label>
				<input class="site__input woocommerce-Input woocommerce-Input--text input-text" type="password" name="password_1" id="password_1" required>
			</div>
			<div>
				<label class="site__label" for="password_2">
					Confirm <span>*</span>
				</label>
				<input class="site__input woocommerce-Input woocommerce-Input--text input-text" type="password" name="password_2" id="password_2" required>
			</div>
			<span class="sign-up__remark"><span>*</span> mandatory fields</span>
			<div class="sign-up__send">
				<input type="hidden" name="reset_key" value="<?php echo esc_attr( $args['key'] ); ?>" />
				<input type="hidden" name="reset_login" value="<?php echo esc_attr( $args['login'] ); ?>" />
				<input type="hidden" name="wc_reset_password" value="true" />
				<button type="submit" class="btn btn_13"><span>RESET PASSWORD</span></button>
			</div>
			<a href="<?= get_permalink(13) ?>" class="sign-up__log">Log in here</a>
			<?php wp_nonce_field( 'reset_password' ); ?>
		</form>
	</div>

</div>
<!-- /sign-up -->
