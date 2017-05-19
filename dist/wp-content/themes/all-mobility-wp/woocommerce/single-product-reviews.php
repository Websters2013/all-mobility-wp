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

global $product, $post;

if ( ! comments_open() ) {
	return;
}

$post_id = get_the_ID();

if ( $post_id > 0 ) {
	$where = $wpdb->prepare("%d", $post_id);
} else{
	$where = 0;
}

?>

<!-- reviews -->
<div class="reviews">

	<h2 class="site__title site__title_2">Reviews (<?= $product->get_review_count()?>)</h2>

	<!-- reviews__items -->
	<div class="reviews__items">

		<?php if ( have_comments() ) :

			$args = array(
				'status'      => 'all',
				'post_status' => 'publish',
				'post_type'   => 'product',
				'post_id' => $post_id
			);

			$comments = get_comments( $args );

			foreach ($comments as $comment):

				if ( get_option( 'woocommerce_enable_review_rating' ) !== 'no' ){
					$meta_values = get_comment_meta( $comment->comment_ID, 'rating' );
				} else {
					$meta_values = 0;
				}

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

							<?php if( $meta_values ): ?>
							<div class="rate">
								<?php for( $i = 1; $i <= $meta_values[0]; $i++ ){
									echo '	<img src="'.DIRECT.'img/star.png" width="30" height="25" alt="">';
								} ?>
							</div>
							<?php endif; ?>
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

<!-- add-review -->
<div class="add-review">

	<h2 class="site__title site__title_2">Add Your Review</h2>

	<!-- add-review__form -->
	<div class="add-review__form">
		<form action="/wp-comments-post.php" method="post"  novalidate id="commentform" class="validator comment-form">
			<?php if( is_user_logged_in()): ?>

				<?php $user = get_user_by( 'id', get_current_user_id() ); ?>

				<p>You are adding review as <?= $user->user_login ?></p>

			<?php endif; ?>
			<div class="add-review__row">
				<div><label class="site__label" for="name">Rate Product <span>*</span></label></div>
				<div>


					<label class="add-review__rate">

						<input type="hidden"  required name="rating" value="">
						<span class="add-review__rate-not-valide">Please rate the product.</span>
						<div id="#el"></div>
					</label>

				</div>
			</div>

			<?php if( !is_user_logged_in()): ?>

				<div class="add-review__row">
					<div><label  class="site__label" for="author">Your Name <span>*</span></label></div>
					<div><input   class="site__input" type="text" required name="author" id="author"></div>
				</div>
				<div class="add-review__row">
					<div><label class="site__label" for="email">Your E-mail <span>*</span></label></div>
					<div><input class="site__input" type="email" required name="email" id="email"></div>
				</div>

			<?php endif; ?>

			<div class="add-review__row">
				<div><label class="site__label" for="comment">Your Review <span>*</span></label></div>
				<div><textarea required class="site__input" name="comment" id="comment" cols="30" rows="10"></textarea></div>
			</div>
			<div class="add-review__send">
				<button class="btn btn_11" id="submit" type="submit"><span>submit</span></button>
				<input type="hidden" name="comment_post_ID" value="<?= $where ?>" id="comment_post_ID">
				<input type="hidden" name="comment_parent" id="comment_parent" value="0">
			</div>
		</form>
	</div>
	<!-- /add-review__form -->

</div>
<!-- /add-review -->