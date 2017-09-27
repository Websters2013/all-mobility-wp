<?php
/**
 * Variable product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/variable.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.5.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

$attribute_keys = array_keys( $attributes );

do_action( 'woocommerce_before_add_to_cart_form' );

global $product;
$upselsIDs = $product->get_upsell_ids(); ?>

<div class="product__items">
	<div class="product__add">

	<h2 class="product__add-title">Customize & Purchase</h2>

<form class="variations_form" method="post" enctype='multipart/form-data' data-product_id="<?php echo absint( $product->get_id() ); ?>" data-product_variations="<?php echo htmlspecialchars( wp_json_encode( $available_variations ) ) ?>">


	<?php do_action( 'woocommerce_before_variations_form' ); ?>

	<?php if ( empty( $available_variations ) && false !== $available_variations ) : ?>
		<p class="stock out-of-stock"><?php _e( 'This product is currently out of stock and unavailable.', 'woocommerce' ); ?></p>
	<?php else : ?>
		<div class="variations" cellspacing="0">
				<?php foreach ( $attributes as $attribute_name => $options ) :

					$attributeTextname = str_replace( 'pa_' , '' ,$attribute_name);
					 $attributeTextname = ucfirst($attributeTextname);
					?>

							<?php
								$selected = isset( $_REQUEST[ 'attribute_' . sanitize_title( $attribute_name ) ] ) ? wc_clean( stripslashes( urldecode( $_REQUEST[ 'attribute_' . sanitize_title( $attribute_name ) ] ) ) ) : $product->get_variation_default_attribute( $attribute_name );


								wc_dropdown_variation_attribute_options(
									array( 'options' => $options,
										'attribute' => $attribute_name,
										'product' => $product,
										'selected' => $selected,
										'show_option_none' => $attributeTextname.' *'
									)
								);
								echo end( $attribute_keys ) === $attribute_name ? apply_filters( 'woocommerce_reset_variations_link', '<a class="reset_variations" href="#">' . esc_html__( 'Clear', 'woocommerce' ) . '</a>' ) : '';
							?>

				<?php endforeach;?>

		</div>

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
                        <option value="<?= $item ?>"><?= get_the_title($item) ?> <?= wc_price($_currentProduct->get_price()) ?></option>
                    </select>

                    <?php  $k++;

                }


            }

        endif; ?>

		<?php
		do_action('wb_single_varitaion');
		do_action( 'woocommerce_before_add_to_cart_button' ); ?>

		<div class="single_variation_wrap">
			<?php
				/**
				 * woocommerce_before_single_variation Hook.
				 */
				do_action( 'woocommerce_before_single_variation' );

				/**
				 * woocommerce_single_variation hook. Used to output the cart button and placeholder for variation data.
				 * @since 2.4.0
				 * @hooked woocommerce_single_variation - 10 Empty div for variation data.
				 * @hooked woocommerce_single_variation_add_to_cart_button - 20 Qty and cart button.
				 */
				do_action( 'woocommerce_single_variation' );

				/**
				 * woocommerce_after_single_variation Hook.
				 */
				do_action( 'woocommerce_after_single_variation' );
			?>
		</div>

		<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
	<?php endif; ?>


	<?php do_action( 'woocommerce_after_variations_form' ); ?>
</form>
</div>
	<div class="advantages advantages_2">
		<?php get_template_part('content/content','advantages') ?>
	</div>

</div>
<?php
do_action( 'woocommerce_after_add_to_cart_form' );
