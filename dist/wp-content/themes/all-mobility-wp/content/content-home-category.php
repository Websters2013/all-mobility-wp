<?php

global $wp_query;

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

$cat_obj = $wp_query->get_queried_object();

$category_ID  = $cat_obj->term_id;

$args = array(
    'parent'   => $category_ID,
    'taxonomy' => 'product_cat'
);

$product_terms = get_terms($args);

}

if(!empty($product_terms)): ?>

<!-- product-categories__inner -->
<div class="product-categories__inner">
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
        
        $fromPrice = '$'.number_format($fromPrice, 2, ',', ' ');  ?>

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