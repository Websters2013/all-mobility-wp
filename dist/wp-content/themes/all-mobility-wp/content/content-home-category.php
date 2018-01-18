<?php

global $wp_query;

function the_product_price($product, $id){
	$sale_price = get_post_meta( $id, '_price', true);
	$regular_price = get_post_meta( $id, '_regular_price', true);
	if ($regular_price == ""){

		$available_variations = $product->get_available_variations();
		if($available_variations){
			#Step 2: Get product variation id
			$variation_id=$available_variations[0]['variation_id']; // Getting the variable id of just the 1st product. You can loop $available_variations to get info about each variation.
			#Step 3: Create the variable product object
			$variable_product1= new WC_Product_Variation( $variation_id );
			#Step 4: You have the data. Have fun :)
			$regular_price = $variable_product1->regular_price;
		}
	}
	if(!empty($regular_price)){
		echo '<del class="product-categories__item-product__sale">'. wc_price($regular_price).'</del>';
	}else{
		echo '<span class="product-categories__item-product__price">'. wc_price($regular_price).'</span>';
	}
	if(!empty($sale_price)){ echo '<span class="product-categories__item-product__price">'.  wc_price($sale_price) .'</span>';}
}

if( is_front_page() ){

    if( have_rows('categories_items') ):

        while ( have_rows('categories_items') ) : the_row();

            $termsIds[] = get_sub_field('categories');

        endwhile;
    endif;
    
    $product_terms  = get_terms( array(
        'taxonomy' => 'product_cat',
        'hide_empty' => false,
        'orderby' => 'include',
        'include' => $termsIds

    ) );

} elseif( is_product_category() ){

    $exclude_posts = array();

    $cat_obj = $wp_query->get_queried_object();

    $category_ID  = $cat_obj->term_id;

    if($popular_product = get_field('product_recoment', 'product_cat_'.$category_ID)) {
	    $exclude_posts['recommended'] = $popular_product;
    }
	if($top_selling_product = get_field('product_top_selling', 'product_cat_'.$category_ID)) {
		$exclude_posts['top selling'] = $top_selling_product;
	}
	if($best_value_product = get_field('product_best_value', 'product_cat_'.$category_ID)) {
		$exclude_posts['best value'] = $best_value_product;
	}

    $args = array(
        //    'posts_per_page' => -1,
        'parent'   => $category_ID,
        'taxonomy' => 'product_cat',
        //'post__not_in' => $exclude_posts
    );
    $product_terms = get_terms($args);

} elseif( is_singular('wpsl_stores') ){

    $categories = get_field('choose_categories',432);

    $product_terms  = get_terms( array(
        'taxonomy' => 'product_cat',
        'hide_empty' => false,
        'number' => 4,
        'orderby' => 'include',
        'include' => $categories
    ) );

}

if( ! empty( $product_terms ) || ! empty( $exclude_posts ) ): ?>

<!-- product-categories__inner -->
<div class="product-categories__inner">

	<?php foreach ($exclude_posts as $key => $exclude_post):
		$thumbnail = get_the_post_thumbnail_url( $exclude_post , 'thumbnail_id' );
		$_product = wc_get_product( $exclude_post );
			//var_dump($_product);//$fromPrice = wc_price($fromPrice);
		?>

      <div class="product-categories__wraper-product">

          <div class="product-categories__item-product">

              <div class="product-categories__item-product__label product-categories__item-product__label-<?php echo implode("-", explode(" ", $key ) );?>"><?= $key; ?></div>
              <div class="product-categories__item-product__pic" style="background-image: url(<?= $thumbnail ?>)"></div>
              <h2 class="product-categories__item-product__title"><?= get_the_title( $exclude_post ); ?></h2>

                <?php the_product_price($_product, $exclude_post); ?>


              <input id="compare-<?= $exclude_post; ?>" class="input-checkbox" type="checkbox" name="compare" value="<?= $exclude_post; ?>">
              <label for="compare-<?= $exclude_post; ?>" class="checkbox">Add to Compare</label>
              <a href="<?= get_permalink($exclude_post); ?>" class="btn btn_6">See more</a>

          </div>

      </div>
	<?php endforeach; ?>

    <?php foreach ($product_terms as $product_term):

        $id = $product_term->term_id;

        if( is_front_page() ){

            ( $link = get_field('link_for_the_button', 'product_cat_'.$id ) )? true : $link = get_term_link($id) ;
            ( $textLink = get_field('text_for_preview_on_home_page', 'product_cat_'.$id) )? true : $textLink = 'see more' ;
            ( $catName = get_field('custom_category_title', 'product_cat_'.$id) )? true : $catName = $product_term->name;
            if( !( $fromPrice = get_field('price_for_preview_on_home_page', 'product_cat_'.$id) ) ){
                $min_price = wpq_get_min_price_per_product_cat($id);
                (!$min_price)? $min_price = 0 : $min_price;

                $fromPrice = $min_price;
            }


            if( ( !( $previewImage = get_field('image_for_preview_on_home_page', 'product_cat_'.$id) ) ) ){
                $thumbnail_id = get_woocommerce_term_meta( $id, 'thumbnail_id', true );
                $image = wp_get_attachment_url( $thumbnail_id );
                $previewImage = $image;
            }

        } else {
            $link = get_term_link($id);
            $textLink = 'see more';
            $catName = $product_term->name;
            $min_price = wpq_get_min_price_per_product_cat($id);
            (!$min_price)? $min_price = 0 : $min_price;
            $fromPrice = $min_price;
            $thumbnail_id = get_woocommerce_term_meta( $id, 'thumbnail_id', true );
            $image = wp_get_attachment_url( $thumbnail_id );
            $previewImage = $image;
        }
        
//        $fromPrice = '$'.number_format($fromPrice, 2, '.', ' ');
        $fromPrice = wc_price($fromPrice);
        ?>

        <div>

        <!-- product-categories__item -->
        <a href="<?= $link ?>" class="product-categories__item">

            <h2 class="product-categories__title"><?= $catName ?></h2>

            <div class="product-categories__pic" style="background-image: url(<?= $previewImage ?>)"></div>

            <div class="product-categories__footer">
                <div>

                                            <span class="product-categories__price">
                                                <span>from</span>
                                                <?= $fromPrice ?>
                                            </span>

                </div>
                <div>
                    <span class="btn btn_6"><?= $textLink ?></span>
                </div>
            </div>

        </a>
        <!-- /product-categories__item -->

    </div>
    <?php endforeach; ?>
</div>
<!-- /product-categories__inner -->

<?php endif; ?>