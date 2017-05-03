<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
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
 * @version 3.0.3
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} ?>

<!-- my-cart__layout -->
<div class="my-cart__layout">

	<!-- my-cart__products -->
	<div class="my-cart__products">

		<form action="#">

			<div class="my-cart__head">
				<div class="my-cart__caption">Product</div>
				<div class="my-cart__caption">Price</div>
				<div class="my-cart__caption">Quantity</div>
				<div class="my-cart__caption">Total</div>
			</div>

			<?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {

				$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
				$thumb_id = get_post_thumbnail_id($product_id);
				$thumb_url = wp_get_attachment_image_src($thumb_id,'full')[0];
				$productTitle = $_product->get_title();
				$link = get_permalink($product_id);
				?>

				<!-- my-cart__product -->
				<div class="my-cart__product" data-product-id="<?= $product_id ?>" data-product-key="<?= $cart_item_key ?>">
					<div>

						<!-- my-cart__product -->
						<div class="my-cart__name">

							<!-- my-cart__product -->
							<a href="<?= $link ?>" class="my-cart__pic">
								<img src="<?= $thumb_url ?>" width="139" height="133" alt="<?= $productTitle ?>">
							</a>
							<!-- my-cart__product -->

							<div>
								<h2 class="my-cart__title"><a href="<?= $link ?>"><?= $productTitle ?></a></h2>
								<p>Customizable Parameter
									Another Parameter
									One more parameter</p>
								<a href="#" class="my-cart__edit">edit</a>
							</div>

						</div>
						<!-- my-cart__product -->

						<!-- my-cart__info -->
						<div class="my-cart__info">

							<div>
								<div class="my-cart__current-price">
									<?= $_product->get_price_html(); ?>
								</div>

								<!-- count-product -->
								<div class="count-product">
									<a class="count-product__btn count-product_del" href="#"><span>-</span></a>
									<input type="number" class="count-product__input site__input" min="1" value="1">
									<a class="count-product__btn count-product_add" href="#"><span>+</span></a>
								</div>
								<!-- /count-product -->

								<div class="my-cart__total-price">

									<span class="my-cart__total-price-caption">Total</span>

									$1,425.00
								</div>

							</div>

						</div>
						<!-- /my-cart__info -->

						<!-- my-cart__remove -->
						<a href="#" class="my-cart__remove">
							<span></span>
						</a>
						<!-- /my-cart__remove -->

						<!-- my-cart__loading -->
						<div class="my-cart__loading">
							<span class="my-cart__loading-spin"></span>
						</div>
						<!-- /my-cart__loading -->

					</div>
				</div>
				<!-- /my-cart__product -->

			<?php } ?>

			<!-- my-cart__footer -->
			<div class="my-cart__footer">

				<!-- my-cart__promo-code -->
				<div class="my-cart__promo-code">

					<!-- my-cart__define -->
					<div class="my-cart__define">
						<label for="promo-code">Have a promo code?</label>
						<div>
							<input type="text" class="site__input" name="promo-code" id="promo-code">
							<button type="button" class="btn btn_7"><span>APPLY</span></button>
						</div>
					</div>
					<!-- /my-cart__define -->

					<!-- my-cart__applied -->
					<div class="my-cart__applied">
						Promo code applied
						<!--<a href="#">cancel</a>-->
					</div>
					<!-- /my-cart__applied -->

					<!-- my-cart__invalid -->
					<div class="my-cart__invalid">
						Invalid promo code <a href="#">dismiss</a>
					</div>
					<!-- /my-cart__invalid -->

					<!-- my-cart__promo-loading -->
					<span class="my-cart__promo-loading"></span>
					<!-- /my-cart__promo-loading -->

				</div>
				<!-- /my-cart__promo-code -->

				<!-- my-cart__result -->
				<div class="my-cart__result">

					<!--<dl class="my-cart__discount">-->
					<!--<dt>Promo code discount:</dt>-->
					<!--<dd>-$3.75</dd>-->
					<!--</dl>-->
					<dl class="my-cart__subtotal">
						<dt>Subtotal</dt>
						<dd>$1,425.00</dd>
					</dl>
					<dl class="my-cart__taxes">
						<dt>Taxes</dt>
						<dd>$100.00</dd>
					</dl>
					<dl class="my-cart__total">
						<dt>TOTAL</dt>
						<dd>$1,525.00</dd>
					</dl>

				</div>
				<!-- /my-cart__result -->

				<!-- my-cart__payments -->
				<div class="my-cart__payments">
					<img src="<?= DIRECT ?>pic/visa.jpg" width="48" height="30" alt="visa">
					<img src="<?= DIRECT ?>pic/mastercard.jpg" width="48" height="30" alt="mastercard">
					<img src="<?= DIRECT ?>pic/card-amex.jpg" width="50" height="30" alt="amex">
					<img src="<?= DIRECT ?>pic/card-discover.jpg" width="48" height="30" alt="amex">
					<img src="<?= DIRECT ?>pic/paypal.jpg" width="48" height="30" alt="paypal">
					<img src="<?= DIRECT ?>pic/card-pp-credit.jpg" width="66" height="30" alt="paypal">
				</div>
				<!-- /my-cart__payments -->

			</div>
			<!-- /my-cart__footer -->

			<!-- my-cart__end -->
			<div class="my-cart__end">
				<div>

					<!-- advantages -->
					<div class="advantages advantages_3">

						<ul class="advantages__list">
							<li>
                                               <span>
                                                    <img src="img/money-back.svg" width="32" height="32" alt="">
                                                </span>
								30-days Money Back
								Guarantee</li>
							<li>
                                                <span>
                                                    <img src="img/safe-secure.svg" width="46" height="46" alt="">
                                                </span>
								Safe & Secure
								Online Payments</li>
							<li>
                                                 <span>
                                                    <img src="img/free-shipping.svg" width="38" height="30" alt="">
                                                </span>
								Free Shipping
								over $50</li>
							<li>
                                                <span>
                                                     <img src="img/expert-support.svg" width="30" height="35" alt="">
                                                </span>
								Expert Support
								at Your Service</li>
							<li>
                                                <span>
                                                    <img src="img/local-store.svg" width="23" height="36" alt="">
                                                </span>
								Local Stores
								Near You</li>
						</ul>

					</div>
					<!-- /advantages -->

				</div>
				<div>

					<button type="submit" class="btn btn_5"><span>

                                        CHECK OUT</span></button>

				</div>
			</div>
			<!-- /my-cart__end -->

		</form>






		
		<!-- featured-products -->
		<div class="featured-products featured-products_2">

			<h2 class="site__title site__title_5 site__title_center">With this product customers also purchase</h2>

			<div class="swiper-container">
				<div class="swiper-wrapper">
					<div class="swiper-slide">

						<!-- featured-product -->
						<a href="#" class="featured-product">
							<h2 class="featured-product__title">Product Name </h2>

							<div class="featured-product__pic" style="background-image: url(<?= DIRECT ?>pic/lift-chairs.png)">
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

							<div class="featured-product__pic" style="background-image: url(<?= DIRECT ?>pic/lift-chairs.png)">
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

							<div class="featured-product__pic" style="background-image: url(<?= DIRECT ?>pic/lift-chairs.png)">
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

							<div class="featured-product__pic" style="background-image: url(<?= DIRECT ?>pic/lift-chairs.png)">
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

							<div class="featured-product__pic" style="background-image: url(<?= DIRECT ?>pic/lift-chairs.png)">
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

							<div class="featured-product__pic" style="background-image: url(<?= DIRECT ?>pic/lift-chairs.png)">
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

	</div>
	<!-- /my-cart__products -->

	<!-- my-cart__empty -->
	<div class="my-cart__empty">
		<div>

			<h2 class="site__title site__title_3">Your cart is currently empty.</h2>
			<a class="btn btn_3" href="#">Return To Shop</a>

		</div>
	</div>
	<!-- /my-cart__empty -->

</div>
<!-- /my-cart__layout -->


