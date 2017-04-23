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

                                        <img src="<?= DIRECT ?>img/cart.png" width="30" height="26px" alt="">

                                        add to cart</span>

					</button>
				</form>

				<?php do_action( 'woocommerce_single_product_summary' ); ?>

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
				<?php $title = get_the_title(); ?>
				<h2 class="site__title site__title_2"><?= $title ?></h2>
				<?= get_the_content() ?>

			</div>
			<div>
				<?php if( !($thumb_url = get_field('image_for_aside') ) ){
					$thumb_id = get_post_thumbnail_id($product_id);
					$thumb_url = wp_get_attachment_image_src($thumb_id,'full')[0];
				}
				?>
				<?php if( $thumb_url ): ?>
				<div class="product__pic">
					<img src="<?= $thumb_url ?>" alt="<?= $title ?>">
				</div>
				<?php endif; ?>
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

				<?php if( $shipping_descr = get_field('shipping_and_returns') ){ ?>


						<!-- product__description -->
						<div class="product__description">

							<div>

								<h2 class="site__title site__title_2">Shipping and Returns</h2>
								<p><?= $shipping_descr ?></p>
							</div>

						</div>
						<!-- /product__description -->

				<?php } ?>
				
			</div>
			<!-- /site__inner -->

			<!-- site__aside -->
			<aside class="site__aside">

			<?php get_template_part('content/content','aside-contact') ?>

			</aside>
			<!-- /site__aside -->

		</div>
		<!-- /site__content__wrap -->

	</div>
	<!-- /product__wrap -->

	<?php get_featured_slider_products(); ?>

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

	<?php do_action( 'wb_product_review' ); ?>
	
</div>


