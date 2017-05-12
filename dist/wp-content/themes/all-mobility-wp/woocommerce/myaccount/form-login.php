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
					<a href="http://mobility.websters.com.ua/wp-login.php?ywsl_social=facebook&amp;redirect=http%3A%2F%2Fmobility.websters.com.ua%2Fwp-login.php%3Fredirect_to%3Dhttp%253A%252F%252Fmobility.websters.com.ua%252Fwp-admin%252F%26reauth%3D1">

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
					<a href="http://mobility.websters.com.ua/wp-login.php?ywsl_social=twitter&amp;redirect=http%3A%2F%2Fmobility.websters.com.ua%2Fwp-login.php%3Floggedout%3Dtrue">

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
					<a href="http://mobility.websters.com.ua/wp-login.php?ywsl_social=google&amp;redirect=http%3A%2F%2Fmobility.websters.com.ua%2Fwp-login.php%3Floggedout%3Dtrue">

						<svg width="32px" height="32px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<g transform="translate(-1231.000000, -532.000000)" fill="#fff">
									<g transform="translate(1119.000000, 530.000000)">
										<path d="M126.7852,12.8629 C126.6862,13.4139 126.4622,13.9519 126.1122,14.4759 C125.3892,15.2149 124.4842,15.6059 123.3982,15.6459 C122.5382,15.6459 121.7742,15.3839 121.1072,14.8589 C120.4372,14.3349 119.8922,13.6969 119.4692,12.9439 C118.5962,11.3309 118.1612,9.7799 118.1612,8.2889 C118.1332,7.1589 118.4322,6.1379 119.0572,5.2249 C119.7982,4.3499 120.7272,3.8999 121.8452,3.8729 C122.6892,3.8999 123.4372,4.1499 124.0872,4.6179 C124.7232,5.1149 125.2372,5.7619 125.6282,6.5539 C126.4592,8.2049 126.8762,9.8469 126.8762,11.4709 C126.8762,11.8489 126.8452,12.3109 126.7852,12.8629 L126.7852,12.8629 Z M128.1252,24.9999 C128.8062,25.7779 129.1482,26.6879 129.1482,27.7359 C129.1482,29.0249 128.6492,30.0769 127.6502,30.8969 C126.6272,31.7279 125.1432,32.1569 123.1992,32.1849 C121.0312,32.1569 119.3252,31.6749 118.0762,30.7359 C116.7632,29.7969 116.1092,28.6029 116.1092,27.1529 C116.1092,26.4159 116.2572,25.7859 116.5612,25.2629 C116.8222,24.7649 117.1442,24.3489 117.5252,24.0139 C117.9202,23.6929 118.3072,23.4439 118.6882,23.2699 C119.0692,23.1089 119.3632,22.9879 119.5742,22.9079 C120.4672,22.6389 121.3412,22.4449 122.1942,22.3239 C123.0602,22.2439 123.5992,22.2179 123.8092,22.2439 C124.1632,22.2439 124.4722,22.2559 124.7352,22.2839 C126.2732,23.3579 127.4022,24.2629 128.1252,24.9999 L128.1252,24.9999 Z M132.6452,2.5069 L124.3962,2.5069 C123.3032,2.5069 122.1302,2.6339 120.8792,2.8879 C119.6152,3.1859 118.3972,3.8149 117.2252,4.7799 C115.5162,6.4299 114.6632,8.2669 114.6632,10.2919 C114.6632,11.9679 115.2662,13.4359 116.4722,14.6989 C117.6232,16.0519 119.2972,16.7429 121.4932,16.7709 C121.9072,16.7709 122.3492,16.7429 122.8182,16.6899 C122.7412,16.9079 122.6562,17.1409 122.5662,17.3989 C122.4632,17.6399 122.4112,17.9449 122.4112,18.3089 C122.4112,18.9139 122.5462,19.4349 122.8182,19.8659 C123.0502,20.3109 123.3152,20.7289 123.6132,21.1199 C122.6502,21.1459 121.4422,21.2679 119.9862,21.4809 C118.5152,21.7359 117.1112,22.2459 115.7772,23.0069 C114.5862,23.7169 113.7642,24.5409 113.3122,25.4769 C112.8422,26.4139 112.6092,27.2659 112.6092,28.0279 C112.6092,29.5949 113.3292,30.9389 114.7662,32.0649 C116.1912,33.2679 118.3482,33.8849 121.2372,33.9109 C124.6882,33.8579 127.3302,33.0339 129.1582,31.4369 C130.9232,29.8919 131.8072,28.1229 131.8072,26.1239 C131.7802,24.7159 131.4582,23.5769 130.8412,22.7039 C130.1862,21.8449 129.4242,21.0639 128.5542,20.3509 L127.1552,19.2049 C126.9532,19.0029 126.7442,18.7679 126.5312,18.4999 C126.2782,18.2179 126.1522,17.8639 126.1522,17.4319 C126.1522,16.9899 126.2762,16.6009 126.5212,16.2659 C126.7302,15.9429 126.9562,15.6549 127.2032,15.4009 C127.6332,15.0259 128.0372,14.6549 128.4192,14.2949 C128.7632,13.9319 129.0892,13.5369 129.3952,13.1079 C130.0232,12.2209 130.3492,11.0419 130.3722,9.5659 C130.3722,8.7619 130.2822,8.0569 130.1012,7.4539 C129.8802,6.8489 129.6272,6.3279 129.3422,5.8839 C129.0442,5.4159 128.7402,5.0199 128.4302,4.6979 C128.1062,4.3889 127.8162,4.1539 127.5562,3.9929 L130.0992,3.9929 L132.6452,2.5069 Z" id="Fill-11"></path>
										<polygon id="Fill-13" points="139.4926 7.0119 139.4926 2.6829 137.3956 2.6829 137.3956 7.0119 133.0676 7.0119 133.0676 9.1089 137.3956 9.1089 137.3956 13.4359 139.4926 13.4359 139.4926 9.1089 143.8196 9.1089 143.8196 7.0119"></polygon>
									</g>
								</g>
							</g>
						</svg>

					</a>
<!--							--><?php //echo do_shortcode('[yith_wc_social_login]') ?>
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
