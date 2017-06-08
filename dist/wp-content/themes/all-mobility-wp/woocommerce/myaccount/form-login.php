<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
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
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$register_part = $_GET['reg'];

?>

<?php wc_print_notices(); ?>

<?php do_action( 'woocommerce_before_customer_login_form' ); ?>

<?php if( !$register_part ): ?>
		<!-- login-types -->
		<div class="login-types">

			<h1 class="login-types__caption">My Account</h1>

			<div>

				<h2 class="login-types__title">Log In</h2>

				<div class="login-types__in">
					<form  method="post">
						<div>
							<label class="site__label" for="username">
								E-mail
							</label>
							<input class="site__input" type="text" name="username" id="username" required value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>">
						</div>
						<div>
							<label class="site__label" for="password">
								Password
							</label>
							<input class="site__input" type="password" name="password" id="password" required>
						</div>
						<div class="login-types__send">
							<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
							<button type="submit" class="btn btn_17" name="login" value="<?php esc_attr_e( 'Login', 'woocommerce' ); ?>"><span>LOG IN</span></button>

						</div>
						<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>" class="login-types__forgot"><?php _e( 'forgot password?', 'woocommerce' ); ?></a>
					</form>
				</div>

			</div>
			<div>

				<h2 class="login-types__title">Create Account</h2>

				<div class="login-types__social">
					<a href="https://allaroundmobility.com/wp-login.php?ywsl_social=facebook&amp;redirect=https%3A%2F%2Fallaroundmob.wpengine.com%2Fwp-login.php%3Fredirect_to%3Dhttps%253A%252F%252Fallaroundmob.wpengine.com%252Fwp-admin%252F%26reauth%3D1">

						<svg width="16px" height="33px" viewBox="0 0 16 33" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<g transform="translate(-1119.000000, -532.000000)" fill="#fff">
									<g transform="translate(1119.000000, 530.000000)">
										<path d="M11.4682,7.6821 L15.1282,7.6821 L15.1282,2.0001 L10.1522,2.0001 C3.1032,2.0001 3.2702,7.4631 3.2702,8.2791 L3.2702,12.7421 L0.000199999999,12.7421 L0.000199999999,18.2001 L3.2702,18.2001 L3.2702,34.4171 L9.9872,34.4171 L9.9872,18.2001 L14.4942,18.2001 C14.4942,18.2001 14.9162,15.5821 15.1212,12.7221 L10.0122,12.7221 L10.0122,8.9901 C10.0122,8.4321 10.7442,7.6821 11.4682,7.6821" id="Fill-7"></path>
									</g>
								</g>
							</g>
						</svg>

					</a>
					<a href="https://allaroundmobility.com/wp-login.php?ywsl_social=twitter&amp;redirect=https%3A%2F%2Fallaroundmob.wpengine.com%2Fwp-login.php%3Fredirect_to%3Dhttps%253A%252F%252Fallaroundmob.wpengine.com%252Fwp-admin%252F%26reauth%3D1">

						<svg width="42px" height="30px" viewBox="0 0 42 30" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">

							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<g transform="translate(-1166.000000, -533.000000)" fill="#fff">
									<g transform="translate(1119.000000, 530.000000)">
										<path d="M84.1015,16.6081 C86.4555,16.4141 88.0525,15.3431 88.6675,13.8911 C87.8175,14.4131 85.1815,14.9821 83.7255,14.4391 C83.6545,14.0971 83.5745,13.7721 83.4965,13.4791 C82.3875,9.4051 78.5885,6.1241 74.6085,6.5201 C74.9305,6.3901 75.2575,6.2681 75.5825,6.1601 C76.0205,6.0031 78.5905,5.5841 78.1865,4.6771 C77.8445,3.8801 74.7045,5.2811 74.1135,5.4641 C74.8945,5.1711 76.1855,4.6661 76.3235,3.7691 C75.1265,3.9321 73.9535,4.4981 73.0465,5.3211 C73.3735,4.9681 73.6225,4.5381 73.6745,4.0761 C70.4835,6.1131 68.6215,10.2211 67.1135,14.2071 C65.9305,13.0601 64.8805,12.1561 63.9385,11.6541 C61.2975,10.2371 58.1405,8.7601 53.1835,6.9201 C53.0315,8.5601 53.9945,10.7411 56.7695,12.1911 C56.1675,12.1101 55.0695,12.2901 54.1895,12.5001 C54.5485,14.3791 55.7175,15.9271 58.8845,16.6751 C57.4375,16.7711 56.6895,17.1001 56.0125,17.8101 C56.6705,19.1171 58.2795,20.6541 61.1715,20.3391 C57.9555,21.7251 59.8615,24.2931 62.4785,23.9101 C58.0125,28.5221 50.9705,28.1831 46.9285,24.3261 C57.4845,38.7091 80.4295,32.8321 83.8485,18.9781 C86.4105,18.9991 87.9165,18.0901 88.8495,17.0881 C87.3745,17.3391 85.2355,17.0801 84.1015,16.6081" id="Fill-9"></path>
									</g>
								</g>
							</g>
						</svg>
					</a>

				</div>

			</div>
			
			<div>

				<h2 class="login-types__title">Create Account</h2>

				<div class="login-types__create">
					<p>Sign up here to get promotions
						and discounts!</p>
					<a href="<?= get_permalink().'?reg=true' ?>" class="btn btn_13">SIGN UP</a>
				</div>

				</div>

		</div>
		<!-- /login-types -->
<?php endif; ?>

<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' && $register_part ) : ?>
	
	<!-- sign-up -->
	<div class="sign-up">

		<h2 class="site__title site__title_3 site__title_center">Sign Up</h2>

		<div class="sign-up__form">
			<form method="post" class="register">

				<div>
					<label class="site__label" for="billing_first_name">
						First Name <span>*</span>
					</label>
					<input class="site__input" type="text" name="billing_first_name" id="billing_first_name" required value="<?php if ( ! empty( $_POST['billing_first_name'] ) ) echo esc_attr( $_POST['billing_first_name'] ); ?>">
				</div>
				<div>
					<label class="site__label" for="billing_last_name">
						Last Name <span>*</span>
					</label>
					<input class="site__input" type="text" name="billing_last_name" id="billing_last_name" required value="<?php if ( ! empty( $_POST['billing_last_name'] ) ) echo esc_attr( $_POST['billing_last_name'] ); ?>">
				</div>
				<div>
					<label class="site__label" for="email">
						E-mail <span>*</span>
					</label>
					<input class="site__input" type="email" name="email" id="email" required value="<?php if ( ! empty( $_POST['email'] ) ) echo esc_attr( $_POST['email'] ); ?>">
				</div>
				<div>
					<label class="site__label" for="reg_password">
						Password <span>*</span>
					</label>
					<input type="password" class="site__input woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" />

				</div>
				<div>
					<label class="site__label" for="password2">
						Confirm
						Password <span>*</span>
					</label>
					<input class="site__input" type="password" name="password2" id="password2" required>
				</div>
				<span class="sign-up__remark"><span>*</span> mandatory fields</span>
				<div class="sign-up__send">
					<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
					<input type="submit" class="woocommerce-Button button btn btn_13" name="register" value="<?php esc_attr_e( 'SIGN UP', 'woocommerce' ); ?>" />

				</div>
				<a href="<?= get_permalink(13) ?>" class="sign-up__log">Log in here</a>
			</form>
		</div>

	</div>
	<!-- /sign-up -->

<?php endif; ?>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
