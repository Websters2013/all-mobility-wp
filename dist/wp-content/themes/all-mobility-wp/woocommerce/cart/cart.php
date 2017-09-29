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
                <div class="my-cart__caption">Your Items</div>
                <div class="my-cart__caption">Your Selected Options</div>
                <div class="my-cart__caption">Quantity</div>
                <div class="my-cart__caption">Price</div>
            </div>

			<?php

			$allUpsells = countHidenUpsells();

			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {

				$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
				$thumb_id = get_post_thumbnail_id($product_id);
				$thumb_url = wp_get_attachment_image_src($thumb_id,'full')[0];
				$productTitle = $_product->get_title();
				$link = get_permalink($product_id);
				$parent = $cart_item['data']->post->post_parent;
				$attributes = $cart_item['variation'];
				$flag_variation = 0;
                $upsellSum = 0;


				if($_product->post_type === 'product_variation') {
                    $inUpsells = $allUpsells[$cart_item['variation_id']];
	                $quantity = $cart_item['quantity'] - $inUpsells;
                    $flag_variation = 1;
                } elseif ( $inUpsells =  $allUpsells[$product_id] ){
					$quantity = $cart_item['quantity'] - $inUpsells;

				} else {
					$quantity = $cart_item['quantity'];
				}
				if( !$quantity ){
					continue;
				}


				//Upsells products
				//$customizableParametres = '';
				$customizableParametres_2 = '';

				if($flag_variation) {
                  $mainProduct = $cart_item['variation_id'];
                } else {
                  $mainProduct = $product_id;

                }
              $poducts_in_list = array();
              $newUpsells = WC()->session->get('Upsells');

              foreach ($newUpsells as $key => $value) {
                if(array_key_exists($mainProduct,$value) && !in_array($key,$poducts_in_list)) {
                  $poducts_in_list[] = $key;


	                if($_product->post_type === 'product_variation') {
		                //var_dump($newUpsells[$key][$mainProduct]['attributs'] );
		                $counter = 0;
		                foreach ($newUpsells[$key][$mainProduct]['attributs'] as $key_2 => $value_2) {
			                //var_dump($attributes[$key_2].'--'.$value_2.'<br>');
			                if(($attributes[$key_2] === $value_2) && $attributes  ) {
				                $counter++;
			                }
		                }
		                //var_dump($counter < count($attributes));
		                if($counter < count($attributes)) {
			                continue;
		                }

	                }





	                if(!empty($newUpsells[$key][$mainProduct]['product'])):

		                foreach ($newUpsells[$key][$mainProduct]['product'] as $key_2 => $value_2){

			                $upsellProduct = wc_get_product($key_2);

			                $upsellSum +=  $upsellProduct->get_price() * $value_2;

			                $customizableParametres_2 .= '<li><span>'.get_the_title($key_2) .' ('.$value_2.')</span><span>$'.$upsellProduct->get_price()*$value_2.'</span></li>';
			                //$customizableParametres .= get_the_title($key_2).' ('.$value_2.')<br/>';

		                }

                endif;
                }
              }

				// \Upsells products

				$crossSells[] = $product_id;

				if( !$cart_item['variation_id'] ){
					$variation_id = 0;

					if( $poducts_in_list ){
						$subtotal_product = wc_price(  $_product->get_price()*$quantity + $upsellSum );
					} else {
						$subtotal_product = WC()->cart->get_product_subtotal( $_product , $quantity );
					}


				} else {
                  $variation_id = $cart_item['variation_id'];

                  $variationProduct = new WC_Product_Variation($variation_id);

                  if( $poducts_in_list ){
                    $subtotal_product =  wc_price( $variationProduct->get_price()*$quantity + $upsellSum );
                  } else {
                    $subtotal_product = WC()->cart->get_product_subtotal( $variationProduct , $quantity );
                  }



				}

				?>

				<!-- my-cart__product -->
				<div class="my-cart__product"  data-variation-id="<?= $variation_id ?>"  data-product-id="<?= $product_id ?>" data-product-key="<?= $cart_item_key ?>">
                    <div>

                        <!-- my-cart__product -->
                        <div class="my-cart__name">

                            <!-- my-cart__product -->
                            <a href="<?= $link ?>" class="my-cart__pic">
                                <img src="<?= $thumb_url ?>" alt="<?= $productTitle ?>">
                            </a>
                            <!-- my-cart__product -->

                            <div>
                                <h2 class="my-cart__title"><a href="<?= $link ?>"><?= $productTitle ?></a></h2>
                                <a href="<?= $link ?>" class="my-cart__btn my-cart__btn-edit">edit item</a>
                                <a href="#" class="my-cart__btn my-cart__remove">remove item</a>
                            </div>

                        </div>
                        <!-- my-cart__product -->

                        <!-- my-cart__info -->
                        <div class="my-cart__info">

                            <div>
                                <div class="my-cart__base-price">
                                    Base Price
                                </div>

                                <div>

                                    <!-- count-product -->
                                    <div class="count-product">
                                        <input type="number" class="count-product__input site__input" value="<?= $quantity ?>" min="1" value="1">
                                        <div>
                                            <a class="count-product-cart my-cart__btn-edit" href="<?= $link ?>"><span>updete</span></a>
                                            <a class="count-product-cart my-cart__remove" href="#"><span>remove</span></a>
                                        </div>
                                    </div>
                                    <!-- /count-product -->

                                    <div class="my-cart__count">
                                        <select name="count" id="count">
					                                <?php for( $i = 1; $i<=10;$i++ ): ?>
                                              <option value="<?= $i ?>"><?= $i ?></option>
					                                <?php endfor; ?>
                                        </select>
                                    </div>

                                </div>

                                <div class="my-cart__total-price">
                                    <?php echo WC()->cart->get_product_subtotal( $_product , $quantity ); ?>
                                </div>

                            </div>
                            <?php if($attributes) { ?>
                            <div class="options">
                                <div class="options__title">
                                    Your Selected Options:
                                </div>
                                <ul>
                                    <?php foreach ($attributes as $key => $value) {
                                        $taxonomy = substr($key, 10);
	                                    $term = get_term_by('slug', $value, $taxonomy);
                                        ?>
                                    <li><span><?= get_taxonomy( $taxonomy )->label.': '.$term->name; ?></span><span></span></li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <?php } ?>

                            <?php if($customizableParametres_2){ ?>
                            <div class="options">
                                <div class="options__title">
                                    Your Selected Accessories:
                                </div>
                                <ul>
                                   <?= $customizableParametres_2; ?>
                                </ul>
                            </div>
                            <?php } ?>

                            <div class="my-cart__price-total">
                                <span>Item Total</span><span><?= $subtotal_product ?></span>
                            </div>

                        </div>
                        <!-- /my-cart__info -->

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

					<?php
					$coupons = WC()->cart->get_applied_coupons();
					$discount = WC()->cart->get_coupon_discount_amount($coupons[0]);

					$trueCoupon = count(WC()->cart->applied_coupons);

					if($trueCoupon > 0){

						$discount = WC()->cart->get_total_discount();

						$my_cart__discount = 'visible';
						$my_cart__define = 'hidden';
						$my_cart__applied = 'visible';
					} else {
						$my_cart__discount = '';
						$my_cart__define = '';
						$my_cart__applied = '';
					}

					?>


					<!-- my-cart__define -->
					<div class="my-cart__define <?= $my_cart__define ?>">
						<label for="promo-code">Have a promo code?</label>
						<div>
							<input type="text" class="site__input" name="promo-code" id="promo-code" value="<?= $coupons[0] ?>">
							<button type="button" class="btn btn_7"><span>APPLY</span></button>
						</div>
					</div>
					<!-- /my-cart__define -->

					<!-- my-cart__applied -->
					<div class="my-cart__applied <?= $my_cart__applied ?>">
						Promo code applied
						<a href="#">cancel</a>
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

				<!-- my-cart__result -->
				<div class="my-cart__result">

					<?php if( $my_cart__discount ): ?>

						<dl class="my-cart__discount <?= $my_cart__discount ?>">
							<dt>Discount</dt>
							<dd><?= $discount ?></dd>
						</dl>

					<?php endif; ?>

					<dl class="my-cart__subtotal">
						<dt>Subtotal</dt>
						<dd><?= WC()->cart->get_cart_subtotal()  ?></dd>
					</dl>

                    <!--<dl class="my-cart__subtotal">
                        <dt>Taxes</dt>
                        <dd><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">&#36;</span>100.00</span></dd>
                    </dl>-->

					<dl class="my-cart__total">
						<dt>TOTAL</dt>
						<dd><?= WC()->cart->get_cart_total() ?></dd>
					</dl>

				</div>
				<!-- /my-cart__result -->

			</div>
			<!-- /my-cart__footer -->

			<!-- my-cart__end -->
			<div class="my-cart__end">
				<div>

					<!-- advantages -->
					<div class="advantages advantages_3">

						<?php get_template_part('content/content','advantages') ?>

					</div>
					<!-- /advantages -->

				</div>
				<div>
					<?php woocommerce_button_proceed_to_checkout() ?>
				</div>
			</div>
			<!-- /my-cart__end -->

		</form>

		<?php



		foreach ( $crossSells as $crossSell ){

			$_productCross = wc_get_product($crossSell);

			$crossSelss = $_productCross->get_cross_sell_ids();

			foreach ( $crossSelss as $id ){

				$crossSellCurent = wc_get_product($id);

				if($crossSellCurent->get_parent_id() == 0 )
					$allCrossSells[] = $id;
			}

		}

		if( $allCrossSells ){
			$crossSells = array_unique($allCrossSells);
		} else {
			$crossSells = null;
		}

		if( !empty($crossSells) ) { ?>

		<!-- featured-products -->
		<div class="featured-products featured-products_2">

			<h2 class="site__title site__title_5 site__title_center"><?= get_field('cross_sell_products_title','options') ?></h2>

			<div class="swiper-container">
				<div class="swiper-wrapper">

					<?php foreach ( $crossSells as $product ):

						$_product_cross = wc_get_product($product);

						if( !$_product_cross->get_parent_id() ){
							$_product_cross_id = $_product_cross->get_id();
						} else {
							$_product_cross_id = $_product_cross->get_parent_id();
						}

						$thumb_id = get_post_thumbnail_id($_product_cross_id);
						$thumb_url = wp_get_attachment_image_src($thumb_id,'full')[0];
						$productTitle = $_product_cross->get_title();
						$link = get_permalink($product); ?>

						<div class="swiper-slide">

						<!-- featured-product -->
						<a href="<?= $link ?>" class="featured-product">
							<h2 class="featured-product__title"><?= $productTitle ?></h2>

							<div class="featured-product__pic" style="background-image: url(<?= $thumb_url ?>)">
							</div>

							<div class="featured-product__footer">
								<span class="featured-product__price"><?= $_product_cross->get_price_html(); ?>
								<span class="btn btn_6">SEE MORE</span>
							</div>

						</a>
						<!-- /featured-product -->

					</div>

					<?php endforeach; ?>

				</div>

				<div class="featured-products__controls">
					<div class="swiper-button-prev"></div>
					<div class="swiper-pagination"></div>
					<div class="swiper-button-next"></div>
				</div>

			</div>

		</div>
		<!-- /featured-products -->

		<?php } ?>

	</div>
	<!-- /my-cart__products -->

	<!-- my-cart__empty -->
	<div class="my-cart__empty">
		<div>

			<h2 class="site__title site__title_3">Your cart is currently empty.</h2>

		</div>
	</div>
	<!-- /my-cart__empty -->

</div>
<!-- /my-cart__layout -->

