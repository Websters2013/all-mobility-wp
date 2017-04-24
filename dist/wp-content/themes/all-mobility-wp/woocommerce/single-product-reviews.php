<?php
/**
 * Display single product reviews (comments)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product-reviews.php.
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
 * @version     2.3.2
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

if ( ! comments_open() ) {
	return;
}

?>

<!-- reviews -->
<div class="reviews">

	<h2 class="site__title site__title_2">Reviews (<?= $product->get_review_count()?>)</h2>

	<!-- reviews__items -->
	<div class="reviews__items">

		<?php if ( have_comments() ) :

			$args = array(
				'status'      => 'approve',
				'post_status' => 'publish',
				'post_type'   => 'product'
			);

			$comments = get_comments( $args );

			foreach ($comments as $comment):
				?>
				<!-- reviews__single -->
				<div class="reviews__single">

					<!-- reviews__head -->
					<div class="reviews__head">

						<div class="reviews__pic">
							<img src="<?= get_avatar_url($comment->comment_author_email) ?>" width="74" height="74" alt="">
						</div>

						<div>
							<h2 class="reviews__name"><?= $comment->comment_author ?></h2>
							<h3 class="reviews__place"><?= $comment->comment_author_email ?></h3>

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

					<p><?= $comment->comment_content ?></p>

				</div>
				<!-- /reviews__single -->
			<?php endforeach; ?>

		<?php else : ?>

			<p class="woocommerce-noreviews"><?php _e( 'There are no reviews yet.', 'woocommerce' ); ?></p>

		<?php endif; ?>

	</div>

</div>

<!-- custom form -->
		<form action="/wp-comments-post.php" method="post" id="commentform" class="comment-form">
				<select name="rating" id="rating" aria-required="true" required="" style="opacity: 0; display: none;">
				<option value="">Rate…</option>
				<option selected value="5">Perfect</option>
				<option value="4">Good</option>
				<option value="3">Average</option>
				<option value="2">Not that bad</option>
				<option value="1">Very poor</option>
			</select><div class="websters-select__arrow"></div></div></p><p class="comment-form-comment"><label for="comment">Your review <span class="required">*</span></label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" required=""></textarea></p><p class="form-submit"><input name="submit" type="submit" id="submit" class="submit" value="Submit"> <input type="hidden" name="comment_post_ID" value="59" id="comment_post_ID">
		</form>
<!-- custom form -->