<?php global $wp_query;

$cat_obj = $wp_query->get_queried_object();

$category_ID  = $cat_obj->term_id; ?>

<div class="category category_filters">

    <h1 class="site__title site__title_3"><?php woocommerce_page_title(); ?></h1>
    <?php if ( is_product_taxonomy() && 0 === absint( get_query_var( 'paged' ) ) ) {
        $description = wc_format_content( term_description() );
        if ( $description ) {
            echo $description;
        }
    } ?>

    <!-- category__inner -->
    <div class="category__inner category__inner_filters">

        <?php $attrs = getAttrForCategory( $category_ID ); ?>

        <!-- category__filters -->
        <aside class="category__filters">
            <h2 class="category__filters-title">

                <svg width="19px" height="17px" viewBox="0 0 19 17" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <!-- Generator: Sketch 43.1 (39012) - http://www.bohemiancoding.com/sketch -->
                    <desc>Created with Sketch.</desc>
                    <defs></defs>
                    <g id="high-fildelity" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="category-mobile" transform="translate(-42.000000, -281.000000)" fill="#FFFFFF">
                            <polygon id="Path-5" points="42 281.14931 48 289.14931 48 297.14931 55 294.14931 55 289.14931 61 281"></polygon>
                        </g>
                    </g>
                </svg>

                Filters <span></span>

            </h2>
            <a href="#" class="category__filters-clear hidden">
                clear
            </a>

            <!-- category__filters-items -->
            <div class="category__filters-items">
                <a href="#" class="category__filtered-close"></a>

                <h2 class="category__filters-title-inner">

                    Filters <span></span>

                </h2>

                <form action="#">

                    <div class="category__filtered hidden">
                        <span class="category__filtered-by">Filtered by:</span>

                        <ul class="category__filtered-list"></ul>

                        <a href="#" class="btn btn_9">clear all</a>

                    </div>

                    <div class="category__filters-item">
                                    <span>Price Range

                                         <svg width="6px" height="8px" viewBox="0 0 6 8" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                             <!-- Generator: Sketch 43.1 (39012) - http://www.bohemiancoding.com/sketch -->
                                             <desc>Created with Sketch.</desc>
                                             <defs></defs>
                                             <g id="high-fildelity" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round">
                                                 <g id="HD-category" transform="translate(-207.000000, -947.000000)" stroke-width="2" stroke="#444444">
                                                     <polyline id="Path-3-Copy-10" transform="translate(209.500000, 951.000000) rotate(-90.000000) translate(-209.500000, -951.000000) " points="206.5 949.5 209.5 952.5 212.5 949.5"></polyline>
                                                 </g>
                                             </g>
                                         </svg>

                                    </span>
                        <div class="category__filters-list">
                            <div>
                                <div>
                                    <input type="checkbox" name="name1" id="name1">
                                    <label for="name1">$1,100.00 - $1,199.99 <span class="category__filters-count">1</span></label>
                                </div>
                                <div>
                                    <input type="checkbox" name="name2" id="name2">
                                    <label for="name2">$1,400.00 - $1,499.99  <span class="category__filters-count">1</span></label>
                                </div>
                                <div>
                                    <input type="checkbox" name="name3" id="name3">
                                    <label for="name3">$1,500.00 - $1,599.99  <span class="category__filters-count">1</span></label>
                                </div>
                                <div>
                                    <input type="checkbox" name="name4" id="name4">
                                    <label for="name4">$1,600.00 - $1,699.99  <span class="category__filters-count">1</span></label>
                                </div>
                                <div>
                                    <input type="checkbox" name="name5" id="name5">
                                    <label for="name5">$1,900.00 and above  <span class="category__filters-count">1</span></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                    if(!empty($attrs)):
                    foreach ( $attrs as $key =>  $attr ):
                        ?>

                        <div class="category__filters-item">
                                    <span><?= $key ?>

                                         <svg width="6px" height="8px" viewBox="0 0 6 8" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                             <!-- Generator: Sketch 43.1 (39012) - http://www.bohemiancoding.com/sketch -->
                                             <desc>Created with Sketch.</desc>
                                             <defs></defs>
                                             <g id="high-fildelity" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round">
                                                 <g id="HD-category" transform="translate(-207.000000, -947.000000)" stroke-width="2" stroke="#444444">
                                                     <polyline id="Path-3-Copy-10" transform="translate(209.500000, 951.000000) rotate(-90.000000) translate(-209.500000, -951.000000) " points="206.5 949.5 209.5 952.5 212.5 949.5"></polyline>
                                                 </g>
                                             </g>
                                         </svg>

                                    </span>

                            <div class="category__filters-list">
                                <div>

                                    <?php foreach ($attr as $sub_key => $item): ?>


                                        <div>
                                            <input type="checkbox" name="<?= $item->taxonomy ?>" id="<?= $item->term_id ?>" value="<?= $item->term_id ?>">
                                            <label for="<?= $item->term_id ?>"><?= $item->name ?> <span class="category__filters-count"><?= $item->count_posts ?></span></label>
                                        </div>

                                    <?php
                                    endforeach; ?>

                                </div>
                            </div>

                        </div>

                    <?php endforeach;
                    endif;
                    ?>

                </form>
            </div>
            <!-- /category__filters-items -->

        </aside>
        <!-- /category__filters -->

        <!-- category__content -->
        <div class="category__content">

            <?php

            if( get_field('show_on_this_category', 'product_cat_'.$category_ID ) == 'show' ): ?>

            <!-- category__find-best -->
            <div class="category__find-best">

                <h2 class="site__title site__title_3 site__title_white">Mobility Scooters</h2>

                <!-- category__find-parameters -->
                <div class="category__find-parameters">
                    <div>

                        <span class="category__find-title">WEIGHT</span>

                        <select name="weight" id="weight">
                            <option value="0">weight1</option>
                            <option value="1">weight2</option>
                            <option value="2">weight3</option>
                            <option value="3">weight4</option>
                        </select>

                    </div>
                    <div>

                        <span class="category__find-title">USAGE</span>

                        <div class="nice-radio">
                            <input type="radio" name="radio" id="usage1">
                            <label for="usage1">Full-time use</label>
                        </div>
                        <div class="nice-radio">
                            <input type="radio" name="radio" id="usage2">
                            <label for="usage2">Occasional use</label>
                        </div>

                    </div>
                    <div>

                        <span class="category__find-title">FEATURES</span>

                        <div class="nice-radio">
                            <input type="radio" name="reatures" id="reatures1">
                            <label for="reatures1">Full-time use</label>
                        </div>
                        <div class="nice-radio">
                            <input type="radio" name="reatures" id="reatures2">
                            <label for="reatures2">Occasional use</label>
                        </div>

                    </div>
                    <div>

                        <button class="btn btn_3"><span>search</span></button>

                    </div>
                </div>
                <!-- /category__find-parameters -->

            </div>
            <!-- /category__find-best -->

            <?php endif; ?>

            <!-- category__wrap -->
            <div class="category__wrap">

            <!-- product-categories -->
            <div class="product-categories product-categories_2">

                <?php get_template_part('content/content','home-category') ?>

            </div>
            <!-- /product-categories -->

            </div>

            <!-- advantages -->
            <div class="advantages advantages_mob">

                <h2 class="advantages__title">
                    Why All Around Mobility
                </h2>

                <ul class="advantages__list">
                    <li>
                                    <span>
                                        <img src="img/10938-200.png" width="32" height="32" alt="">
                                    </span>
                        30-days Money Back
                        Guarantee</li>
                    <li>
                                    <span>
                                        <img src="img/Ecommerce-Free-Shipping-icon.png" width="38" height="30" alt="">
                                    </span>
                        Free Shipping
                        over $50</li>
                    <li>
                                    <span>
                                        <img src="img/Credit_Card_Payment_Safe_Secure_Shopping_Ecommerce_Pay-512.png" width="46" height="46" alt="">
                                    </span>
                        Safe & Secure
                        Online Payments</li>
                    <li>
                                    <span>
                                         <img src="img/icon-innovative-research.png" width="30" height="35" alt="">
                                    </span>
                        Expert Support
                        at Your Service</li>
                    <li>
                                    <span>
                                        <img src="img/MAW_icon-vector-blue_14_geo_125x125.png" width="23" height="36" alt="">
                                    </span>
                        Local Stores
                        Near You</li>
                </ul>

            </div>
            <!-- /advantages -->

            <?php if( $title = get_field('last_block_on_page_title', 'product_cat_'.$category_ID ) ):
                $description_shop = get_field( 'last_block_on_page_description', 'product_cat_'.$category_ID );
                ?>

            <h2 class="site__title site__title_2"><?= $title ?></h2>

            <p>"<?= $description_shop ?>"</p>

            <?php endif; ?>

        </div>
        <!-- /category__content -->

    </div>
    <!-- /category__inner -->

<?php $string = 'pa_brand=25';

    parse_str($string,$output);

    foreach ($output as $key => $item){
        $atts[$key] = explode( ',',$item );
    }

    if( $string ){

        $attributes_filter = '';

        foreach ( $atts as $key => $item ){
            $attributesQuery[] =  array(
                'taxonomy' 		=> $key,
                'terms' 		=> $item,
                'operator' 		=> 'IN'
            );
        }

    } else {
        $attributes_filter = '';
    }

    $term_id = 10;

    $args = array (
        'post_type'  => 'product',
        'fields' => 'ids',
        'posts_per_page' => -1,
        'meta_key'			=> '_price',
        'orderby'			=> 'meta_value_num',
        'order' => 'DESC',
//        'post_status' => 'publish',
        'tax_query'  => array(
            'relation' => 'AND',
            array(
                'taxonomy' => 'product_cat',
                'field' => 'term_id',
                'terms' => $term_id
            ),

            $attributesQuery

        ),
        'meta_query' => array(

            array(
                'key' => '_price',
                'value' => array(0, 14000),
                'compare' => 'BETWEEN',
                'type' => 'NUMERIC'
            ),
            array(
                'key' => 'featured_product'
            )

        ),

    );

    $attrProducts =  get_posts($args);
    var_dump($attrProducts);
    $products = '';

    foreach ($attrProducts as $product_id){

        $currentProduct = wc_get_product($product_id);

        if( get_field('featured_product',$product_id) ){
            $featured = 'featured';
        } else {
            $featured = '';
        }

        $thumb_id = get_post_thumbnail_id($product_id);
        $thumb_url = wp_get_attachment_image_src($thumb_id,'full')[0];
        $name = json_encode($currentProduct->get_name());
        $rate = $currentProduct->get_rating_count();
        $review = $currentProduct->get_review_count();
        $link = get_permalink($product_id);
        $review_link = $link.'?to_review=true';

        if( $currentProduct->is_type('variable') ){

            $regularPrice = $currentProduct->get_variation_regular_price();

            $salePrice = $currentProduct->get_variation_sale_price();

        } elseif( $currentProduct->is_type('simple') ) {

            $regularPrice = $currentProduct->get_regular_price();

            $salePrice = $currentProduct->get_sale_price();

        }

        ( $salePrice )? $salePrice = $salePrice.'$' : $salePrice = '' ;

        ( $regularPrice )? $regularPrice = $regularPrice.'$' : $regularPrice = '' ;

        $description = '';

        if( have_rows('technical_specifications_block', $product_id) ):
           $count = 0 ;
            while ( have_rows('technical_specifications_block', $product_id) ) : the_row();

                if( $count <= 2 ){
                    $description .= '"'.get_sub_field('value').'",';
                }

            endwhile; $count++;
            $description = substr( $description, 0, -1 );
        endif;

        $products .= ' {
            "name": "'.$term_id.'",
            "featured": "'.$featured.'",
            "picture": "'.$thumb_url.'",
            "title": '.$name.',
            "rate": {
                "starsCount": "'.$rate.'",
                "reviewsCount": "'.$review.' Reviews",
                "urlReviews": "'.$review_link.'"
            },
            "content": {
                 "description": ['.$description.'],
                  "specification": {
                    "head": ["Top Speed","Drive Range","Seat Width","Foldable"],
                    "content": ["3.5 mph","8.7 miles","17”","Yes"]
                }
            },
            "price": "'.$salePrice.'",
            "oldPrice": "'.$regularPrice.'",
            "urlDetails": "'.$link.'"
        },';


    }

    $products = substr( $products, 0, -1 );

    $json_data = '{
    "products": [
       '.$products.'
    ]
}';
var_dump($json_data);
?>

    <?php

   $min_price = wpq_get_min_price_per_product_cat(10);

   $max_price = wpq_get_max_price_per_product_cat(10);

   $delta = round( $max_price - $min_price )/5;

   $ranges = array();

    for( $i = 0; $i <=4; $i++ ){

        if( $i==0 ){
            $ranges[$i][] = $min_price;
            $ranges[$i][] = ($min_price+$delta);
        }

    }

    echo $delta;
    echo $min_price;
    echo $max_price;
    ?>

</div>
