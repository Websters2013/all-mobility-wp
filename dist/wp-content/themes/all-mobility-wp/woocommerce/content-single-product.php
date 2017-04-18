<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $product;
?>

<?php
	/**
	 * woocommerce_before_single_product hook.
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' ); ?>

<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" class="product">

	<!-- product__inner -->
	<div class="product__inner">

		<?php do_action('wb_woocommerce_single_product_summary') ?>

		<!-- rate -->
		<div class="rate">
			<div class="rate__star">
				<div style="width: 100%"></div>
			</div>
			<span class="rate__reviews">15 Reviews</span>
		</div>
		<!-- /rate -->
		
		<?php do_action('wb_slider_preview') ?>
		
		<!-- product__price -->
		<div class="product__price">

			<?= $product->get_price_html() ?>

		</div>
		<!-- /product__price -->

		<!-- product__items -->
		<div class="product__items">
			<div class="product__add">

				<h2 class="product__add-title">Customize & Purchase</h2>

				<form action="#">
					<select name="parameter1" id="parameter1">
						<option value="0">customizable parameter</option>
						<option value="1">parameter1</option>
						<option value="2">parameter2</option>
						<option value="3">parameter3</option>
						<option value="4">parameter4</option>
					</select>
					<select name="parameter2" id="parameter2">
						<option value="0">customizable parameter</option>
						<option value="1">parameter1</option>
						<option value="2">parameter2</option>
						<option value="3">parameter3</option>
						<option value="4">parameter4</option>
					</select>
					<select name="parameter3" id="parameter3">
						<option value="0">customizable parameter</option>
						<option value="1">parameter1</option>
						<option value="2">parameter2</option>
						<option value="3">parameter3</option>
						<option value="4">parameter4</option>
					</select>
					<select name="parameter4" id="parameter4">
						<option value="0">customizable parameter</option>
						<option value="1">parameter1</option>
						<option value="2">parameter2</option>
						<option value="3">parameter3</option>
						<option value="4">parameter4</option>
						<option value="4">parameter4</option>
						<option value="4">parameter4</option>
						<option value="4">parameter4</option>
						<option value="4">parameter4</option>
					</select>
					<button type="submit" class="btn btn_2 btn_img-left">

                                    <span>

                                        <img src="img/cart.png" width="30" height="26px" alt="">

                                        add to cart</span>

					</button>
				</form>

			</div>
			<div>

				<!-- advantages -->
				<div class="advantages advantages_2">

					<ul class="advantages__list">
						<li>
                                <span>
                                    <img src="img/10938-200.png" width="32" height="32" alt="">
                                </span>
							30-days Money Back
							Guarantee</li>
						<li>
                                <span>
                                    <img src="img/Credit_Card_Payment_Safe_Secure_Shopping_Ecommerce_Pay-512.png" width="46" height="46" alt="">
                                </span>
							Safe & Secure
							Online Payments</li>
						<li>
                                <span>
                                    <img src="img/Ecommerce-Free-Shipping-icon.png" width="38" height="30" alt="">
                                </span>
							Free Shipping
							over $50</li>
						<li>
                                <span>
                                     <img src="img/icon-innovative-research.png" width="30" height="35" alt="">
                                </span>
							Expert Support
							at Your Service</li>
						<li>
                                <span>
                                    <img src="img/MAW_icon-vector-blue_14_geo_125x125.png" width="23" height="36" alt="">
                                </span>
							Local Stores
							Near You</li>
					</ul>

				</div>
				<!-- /advantages -->

			</div>
		</div>
		<!-- /product__items -->

	</div>
	<!-- /product__inner -->

	<!-- product__wrap -->
	<div class="product__wrap">

		<!-- product__description -->
		<div class="product__description product__description_pic">

			<div>

				<h2 class="site__title site__title_2"><?= get_the_title() ?></h2>
				<?= get_the_content() ?>

			</div>
			<div>

				<div class="product__pic">
					<img src="pic/scooter.jpg" width="305" height="294" alt="">
				</div>

			</div>


		</div>
		<!-- /product__description -->

		<!-- product__download -->
		<div class="product__download">
			<a href="#">Download Manual</a>
		</div>
		<!-- /product__download -->

		<!-- site__content__wrap -->
		<div class="site__content__wrap">

			<!-- site__inner -->
			<div class="site__inner">

				<?php if( have_rows('technical_specifications_block') ): ?>
							<h2 class="site__title site__title_2">Technical Specifications</h2>
								<!-- product__specification -->
								<div class="product__specification">
				         <?php    while ( have_rows('technical_specifications_block') ) : the_row(); ?>

										 <dl>
											 <dt><?= get_sub_field('haracteristic') ?></dt>
											 <dd><?= get_sub_field('value') ?></dd>
										 </dl>

				                <?php

				            endwhile; ?>
							</div>
				        <?php endif; ?>

				<!-- product__description -->
				<div class="product__description">

					<div>

						<h2 class="site__title site__title_2">Shipping and Returns</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>

					</div>

				</div>
				<!-- /product__description -->

				<h2 class="site__title site__title_2">Add-ons and Enhancements:</h2>

			</div>
			<!-- /site__inner -->

			<!-- site__aside -->
			<aside class="site__aside">

				<!-- resolve -->
				<div class="resolve">

					<svg width="58px" height="45px" viewBox="0 0 58 45" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
						<!-- Generator: Sketch 43.1 (39012) - http://www.bohemiancoding.com/sketch -->
						<desc>Created with Sketch.</desc>
						<defs></defs>
						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
							<g id="main-bg" transform="translate(-1230.000000, -1102.000000)">
								<g id="Page-1-Copy" transform="translate(1230.000000, 1101.000000)">
									<g id="Group-3" transform="translate(0.000000, 0.727200)" fill="#FEFEFE">
										<path d="M18.3934,0.2917 C23.6914,0.2937 28.9904,0.2887 34.2884,0.2947 C41.1274,0.3017 46.9454,2.6957 51.5494,7.8057 C54.4294,11.0017 56.1344,14.7537 56.8904,19.0137 C58.5634,28.4407 53.6324,38.0687 45.3684,42.3757 C40.5144,44.9047 35.4094,45.6417 30.0864,44.4307 C21.8244,42.5497 16.3644,37.4287 13.6304,29.4997 C12.9154,27.4247 12.8514,25.1117 12.6094,22.8947 C12.4824,21.7357 13.2294,20.9997 14.2284,21.0047 C15.1194,21.0087 15.8954,21.7797 15.8874,22.8387 C15.8694,25.2227 16.2864,27.5217 17.2164,29.7027 C19.7394,35.6147 24.0484,39.5197 30.3414,41.0787 C38.4224,43.0807 46.0284,39.7877 50.4814,33.5157 C57.3864,23.7897 53.3864,9.8517 42.3744,5.1827 C39.8524,4.1137 37.2204,3.5997 34.5044,3.5937 C23.3464,3.5687 13.3414,3.5877 2.1834,3.5667 C1.6154,3.5657 0.8804,3.5177 0.5264,3.1767 C0.1524,2.8147 -0.0636,2.0477 0.0164,1.5117 C0.1344,0.7197 0.8594,0.3407 1.6534,0.2927 C2.3524,0.2497 3.0554,0.2897 3.7564,0.2897 C9.0204,0.2907 13.1304,0.2897 18.3934,0.2917" ></path>
									</g>
									<path d="M22.0797,8.0028 C26.3947,8.0028 30.7107,8.0428 35.0247,7.9938 C41.5647,7.9188 47.5097,12.2548 49.5207,18.4628 C52.2277,26.8158 47.8817,35.6008 39.2977,38.1738 C31.0177,40.6558 22.5577,36.0088 20.1507,27.9228 C19.7557,26.5948 19.5847,25.1888 19.4267,23.8048 C19.2947,22.6418 20.0437,21.7728 21.0287,21.7378 C22.0047,21.7028 22.6217,22.4748 22.7207,23.7288 C23.1287,28.9028 25.6187,32.6548 30.4627,34.6478 C36.2867,37.0448 43.1057,34.3208 45.8187,28.6128 C48.9057,22.1168 45.6707,14.2568 38.8587,11.9458 C37.4967,11.4838 35.9727,11.3408 34.5217,11.3278 C27.4007,11.2648 20.2787,11.2938 13.1567,11.2928 C11.2997,11.2918 8.5947,11.3288 6.7377,11.2938 C5.4917,11.2708 4.6737,10.4178 4.8227,9.4088 C4.9527,8.5208 5.5807,8.0218 6.6077,8.0208 C11.4827,8.0168 17.2047,8.0188 22.0797,8.0188 L22.0797,8.0028 Z" fill="#FEFEFE"></path>
									<path d="M24.9073,14.826 C28.0993,14.826 31.2903,14.821 34.4823,14.827 C38.7653,14.836 41.9743,17.047 43.0943,21.141 C44.4283,26.017 41.4983,30.401 37.0133,31.672 C33.1003,32.78 28.1693,30.566 26.6733,25.814 C26.3993,24.944 26.4173,23.954 26.4483,23.024 C26.4793,22.12 27.2213,21.771 27.9943,21.762 C28.7393,21.754 29.3433,22.155 29.5223,22.958 C29.6523,23.538 29.7203,24.132 29.8373,24.715 C30.2873,26.948 32.7923,28.804 35.1423,28.654 C37.5993,28.496 39.8513,26.386 40.0273,24.077 C40.2913,20.587 38.0453,18.15 34.5253,18.143 C27.8973,18.131 21.2683,18.137 14.6403,18.132 C13.2483,18.131 12.5753,17.574 12.5973,16.461 C12.6193,15.358 13.3583,14.832 14.7033,14.841 C18.1043,14.865 21.5063,14.849 24.9073,14.849 L24.9073,14.826" id="Fill-6" fill="#F37820"></path>
								</g>
							</g>
						</g>
					</svg>

					<h2 class="resolve__title">
						Questions?
						Concerns?
					</h2>

					<div class="resolve__call">
						<span>Call now:</span>
						<a href="#">1-800-555-9999</a>
					</div>

					<a href="#" class="btn btn_4">
						CONTACT US
					</a>

				</div>
				<!-- /resolve -->

			</aside>
			<!-- /site__aside -->

		</div>
		<!-- /site__content__wrap -->

	</div>
	<!-- /product__wrap -->

	<!-- featured-products -->
	<div class="featured-products">

		<div class="swiper-container">
			<div class="swiper-wrapper">
				<div class="swiper-slide">

					<!-- featured-product -->
					<a href="#" class="featured-product">
						<h2 class="featured-product__title">Product Name </h2>

						<div class="featured-product__pic" style="background-image: url(pic/lift-chairs.png)">
						</div>

						<div class="featured-product__footer">
							<span class="featured-product__price"><del>$1,800.00</del> $1,350.00</span>
							<span class="btn btn_6">SEE MORE</span>
						</div>

					</a>
					<!-- /featured-product -->

				</div>
				<div class="swiper-slide">

					<!-- featured-product -->
					<a href="#" class="featured-product">
						<h2 class="featured-product__title">Product Name </h2>

						<div class="featured-product__pic" style="background-image: url(pic/lift-chairs.png)">
						</div>

						<div class="featured-product__footer">
							<span class="featured-product__price"><del>$1,800.00</del> $1,350.00</span>
							<span class="btn btn_6">SEE MORE</span>
						</div>

					</a>
					<!-- /featured-product -->

				</div>
				<div class="swiper-slide">

					<!-- featured-product -->
					<a href="#" class="featured-product">
						<h2 class="featured-product__title">Product Name </h2>

						<div class="featured-product__pic" style="background-image: url(pic/lift-chairs.png)">
						</div>

						<div class="featured-product__footer">
							<span class="featured-product__price"><del>$1,800.00</del> $1,350.00</span>
							<span class="btn btn_6">SEE MORE</span>
						</div>

					</a>
					<!-- /featured-product -->

				</div>
				<div class="swiper-slide">

					<!-- featured-product -->
					<a href="#" class="featured-product">
						<h2 class="featured-product__title">Product Name </h2>

						<div class="featured-product__pic" style="background-image: url(pic/lift-chairs.png)">
						</div>

						<div class="featured-product__footer">
							<span class="featured-product__price"><del>$1,800.00</del> $1,350.00</span>
							<span class="btn btn_6">SEE MORE</span>
						</div>

					</a>
					<!-- /featured-product -->

				</div>
				<div class="swiper-slide">

					<!-- featured-product -->
					<a href="#" class="featured-product">
						<h2 class="featured-product__title">Product Name </h2>

						<div class="featured-product__pic" style="background-image: url(pic/lift-chairs.png)">
						</div>

						<div class="featured-product__footer">
							<span class="featured-product__price"><del>$1,800.00</del> $1,350.00</span>
							<span class="btn btn_6">SEE MORE</span>
						</div>

					</a>
					<!-- /featured-product -->

				</div>
				<div class="swiper-slide">

					<!-- featured-product -->
					<a href="#" class="featured-product">
						<h2 class="featured-product__title">Product Name </h2>

						<div class="featured-product__pic" style="background-image: url(pic/lift-chairs.png)">
						</div>

						<div class="featured-product__footer">
							<span class="featured-product__price"><del>$1,800.00</del> $1,350.00</span>
							<span class="btn btn_6">SEE MORE</span>
						</div>

					</a>
					<!-- /featured-product -->

				</div>
			</div>

			<div class="featured-products__controls">
				<div class="swiper-button-prev"></div>
				<div class="swiper-pagination"></div>
				<div class="swiper-button-next"></div>
			</div>

		</div>

	</div>
	<!-- /featured-products -->

	<!-- reviews -->
	<div class="reviews">

		<h2 class="site__title site__title_2">Reviews (3)</h2>

		<!-- reviews__items -->
		<div class="reviews__items">

			<!-- reviews__single -->
			<div class="reviews__single">

				<!-- reviews__head -->
				<div class="reviews__head">

					<div class="reviews__pic">
						<img src="pic/userpic.jpg" width="74" height="74" alt="">
					</div>

					<div>
						<h2 class="reviews__name">Jonathan Defoe,</h2>
						<h3 class="reviews__place">Stamford, CA</h3>

						<!-- rate -->
						<div class="rate">
							<div class="rate__star">
								<div style="width: 100%"></div>
							</div>
						</div>
						<!-- /rate -->

					</div>

				</div>
				<!-- /reviews__head -->

				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>

			</div>
			<!-- /reviews__single -->

			<!-- reviews__single -->
			<div class="reviews__single">

				<!-- reviews__head -->
				<div class="reviews__head">

					<div class="reviews__pic">
						<img src="pic/userpic.jpg" width="74" height="74" alt="">
					</div>

					<div>
						<h2 class="reviews__name">Jonathan Defoe,</h2>
						<h3 class="reviews__place">Stamford, CA</h3>

						<!-- rate -->
						<div class="rate">
							<div class="rate__star">
								<div style="width: 100%"></div>
							</div>
						</div>
						<!-- /rate -->

					</div>

				</div>
				<!-- /reviews__head -->

				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>

			</div>
			<!-- /reviews__single -->

			<!-- reviews__single -->
			<div class="reviews__single">

				<!-- reviews__head -->
				<div class="reviews__head">

					<div class="reviews__pic">
						<img src="pic/userpic.jpg" width="74" height="74" alt="">
					</div>

					<div>
						<h2 class="reviews__name">Jonathan Defoe,</h2>
						<h3 class="reviews__place">Stamford, CA</h3>

						<!-- rate -->
						<div class="rate">
							<div class="rate__star">
								<div style="width: 100%"></div>
							</div>
						</div>
						<!-- /rate -->

					</div>

				</div>
				<!-- /reviews__head -->

				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>

			</div>
			<!-- /reviews__single -->

		</div>
		<!-- /reviews__items -->

	</div>
	<!-- /reviews -->

</div>

