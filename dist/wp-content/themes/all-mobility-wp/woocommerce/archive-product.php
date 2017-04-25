<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
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
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>

		<?php
		if( is_tax('product_cat') ){
			$class_padding=' site__content_no-padding';
		} else {
			$class_padding='';
		}
		?>
	
		<!-- site__content -->
		<div class="site__content site__content_inner site__white-back<?= $class_padding ?>">

		<!-- why-us -->
		<div class="why-us">
			<div>
				<?php $frontPage_id = get_option( 'page_on_front' ); ?>
				<h2 class="why-us__title"><?= get_field('why_us_title', $frontPage_id) ?></h2>

				<?php get_template_part('content/content','advantages-why-us') ?>

			</div>
			<div class="why-us__resolve">

				<h2 class="why-us__resolve-title">Questions?
					Concerns?</h2>

				<!-- why-us__call -->
				<div class="why-us__call">
					<span>Call us now or leave a message</span>
					<a class="why-us__phone" href="#">
						<svg width="13px" height="18px" viewBox="0 0 13 18" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
							<!-- Generator: Sketch 43.1 (39012) - http://www.bohemiancoding.com/sketch -->
							<desc>Created with Sketch.</desc>
							<defs></defs>
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" opacity="0.5">
								<g transform="translate(-230.000000, -79.000000)" fill="#FFFFFF">
									<g transform="translate(230.000000, 79.000000)">
										<circle id="Oval-5-Copy-2" cx="11.5" cy="1.5" r="1.5"></circle>
										<circle id="Oval-5-Copy-5" cx="11.5" cy="6.5" r="1.5"></circle>
										<circle id="Oval-5-Copy-8" cx="11.5" cy="11.5" r="1.5"></circle>
										<circle id="Oval-5-Copy-3" cx="6.5" cy="1.5" r="1.5"></circle>
										<circle id="Oval-5-Copy-6" cx="6.5" cy="6.5" r="1.5"></circle>
										<circle id="Oval-5-Copy-9" cx="6.5" cy="11.5" r="1.5"></circle>
										<circle id="Oval-5-Copy-11" cx="6.5" cy="16.5" r="1.5"></circle>
										<circle id="Oval-5-Copy-4" cx="1.5" cy="1.5" r="1.5"></circle>
										<circle id="Oval-5-Copy-7" cx="1.5" cy="6.5" r="1.5"></circle>
										<circle id="Oval-5-Copy-10" cx="1.5" cy="11.5" r="1.5"></circle>
									</g>
								</g>
							</g>
						</svg>
						1-800-ALL-MOBI
					</a>
				</div>
				<!-- /why-us__call -->

			</div>
		</div>
		<!-- /why-us -->

		<?php get_template_part('content/content','product-category') ?>

	</div>

<?php get_footer( 'shop' ); ?>
