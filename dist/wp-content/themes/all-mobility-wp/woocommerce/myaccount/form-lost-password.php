<?php
/**
 * Lost password form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-lost-password.php.
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
		<form method="post">
			<div>
				<label class="site__label" for="user_login">
					Username <span>*</span>
				</label>
				<input class="site__input" type="text" name="user_login" id="user_login" required>
			</div>
			<span class="sign-up__remark"><span>*</span> mandatory fields</span>
			<div class="sign-up__send">
				<input type="hidden" name="wc_reset_password" value="true" />
				<button type="submit" class="btn btn_13"><span>RESET PASSWORD</span></button>
				<?php wp_nonce_field( 'lost_password' ); ?>
			</div>
			<a href="<?= get_permalink(13) ?>" class="sign-up__log">Log in here</a>
		</form>
	</div>

</div>
<!-- /sign-up -->
