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
		
		<?php do_action( 'woocommerce_single_product_summary' ); ?>
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
				<?php if( !( $thumb_url = get_field('image_for_aside') ) ){
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
	
	<?php comments_template(); ?>
	
</div>


