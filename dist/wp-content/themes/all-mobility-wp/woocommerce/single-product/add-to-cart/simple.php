<?php
/**
 * Simple product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/simple.php.
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
 * @version     3.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

if ( ! $product->is_purchasable() ) {
	return;
}

echo wc_get_stock_html( $product );

if ( $product->is_in_stock() ) : ?>

	<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>

	<?php
	global $product;
	$upselsIDs = $product->get_upsell_ids();

	if( empty($upselsIDs)){
		$class_customize = 'product__items_non-customize';
	} else {
		$class_customize = '';
	}

	?>

	<div class="product__items <?= $class_customize ?>" data-price="<?= strip_tags(wc_price($product->get_price())); ?>">
		<div class="product__add">
			<form method="post" enctype='multipart/form-data' >

				<?php if( $upselsIDs ):

					$termsArray = array();

					if(!empty($upselsIDs)):

						foreach ( $upselsIDs as $key => $ID ){

							$title = get_the_title($ID);

							$termUpsell = get_the_terms($ID,'upsell_category');


							if(!empty($termUpsell)):
								$term_id = $termUpsell[0]->term_id;
								$currentTerm[$term_id][] = $ID;

							else:

								$defaultProducts[] = $ID;

							endif;
						}

					endif;

					if( !empty($currentTerm) ){

						$j = 0;

						$countTerm = count($currentTerm);

						foreach ($currentTerm as $key => $item){

							$term = get_term( $key, 'upsell_category' );


							echo '<select name="upsells_'.$j.'">
							<option value="0">'.$term->name.'</option>';

							foreach ( $item as  $attr ){
                                $_currentProduct = wc_get_product($attr);
                                echo '<option value="'.$attr.'" >'.get_the_title($attr).' '.wc_price($_currentProduct->get_price()).'</option>';
							}


							echo '</select>';


							$j++;

						}

					}



					if( !empty($defaultProducts ) ){

						if( $j > 0 ){
							$k  = $j;
						} else {
							$k = 0;
						}

						$countTerm = count( $defaultProducts );

						foreach ($defaultProducts as $key => $item){
                            $_currentProduct = wc_get_product($item); ?>
							<select name="<?= 'upsells_'.$k ?>">
								<option value="0">Add-Ons</option>
								<option data-price="<?= strip_tags($_currentProduct->get_price()); ?>" value="<?= $item ?>"><?= get_the_title($item) ?> <?= wc_price($_currentProduct->get_price()) ?></option>
							</select>

							<?php  $k++;

						}


					}

				endif; ?>

				<?php

				/**
				 * @since 2.1.0.
				 */
				do_action( 'woocommerce_before_add_to_cart_button' );

				/**
				 * @since 3.0.0.
				 */
				do_action( 'woocommerce_before_add_to_cart_quantity' );

				//			woocommerce_quantity_input( array(
				//				'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
				//				'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
				//				'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( $_POST['quantity'] ) : $product->get_min_purchase_quantity(),
				//			) );

				/**
				 * @since 3.0.0.
				 */
				do_action( 'woocommerce_after_add_to_cart_quantity' );
				?>

				<button type="submit" name="add-to-cart" value="<?php echo esc_attr( get_the_ID() ); ?>" class="btn btn_2 btn_img-left single_add_to_cart_button button alt">
			<span>

                                        <img src="<?= DIRECT ?>img/cart.png" width="30" height="26px" alt="">

				<?php echo esc_html( $product->single_add_to_cart_text() ); ?></span>
				</button>
                <div class="woocommerce-variation single_variation" style="">
                    <div class="woocommerce-variation-price featured-product__price">

                    </div>
                </div>
				<?php
				/**
				 * @since 2.1.0.
				 */
				do_action( 'woocommerce_after_add_to_cart_button' );
				?>
			</form>
		</div>
		<div class="advantages advantages_2">
			<?php get_template_part('content/content','advantages') ?>
		</div>
	</div>
	<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>

<?php endif; ?>
