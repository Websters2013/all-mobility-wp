<!-- site__menu -->
<nav class="site__menu">

    <ul>

        <?php

        $locations = get_nav_menu_locations();

        $menu_items = wp_get_nav_menu_items($locations['menu']);

        foreach ( (array) $menu_items as $key => $menu_item ) {

            $sub_menu_class = '';

            $sub_flag = false;

            if( $menu_item->object == 'product_cat' ){

                $mainCatId  = $menu_item->object_id;

                $terms = get_terms( array(
                    'taxonomy' => 'product_cat',
                    'hide_empty' => true,
                    'parent' => $mainCatId
                ) );

                if( !empty($terms) ){
                    $sub_menu_class = ' site__menu-item_sub';
                    $sub_flag = true;
                }

                $cat_obj = $wp_query->get_queried_object();

                $category_ID  = $cat_obj->term_id;

                if ( $category_ID == $menu_item->object_id) {

                    $active = ' active';

                } else {

                    $active = '';

                }

                $args = array(
                    'posts_per_page' => 1,
                    'post_type'		=> 'product',
                    'meta_key'		=> 'featured_product',
                    'meta_value'	=> 'yes',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'product_cat',
                            'terms' => array( $mainCatId )
                        )
                    )
                );

                $featured_product = get_posts( $args );

                if( $featured_product ){

                    $featured_product_id = $featured_product[0]->ID;

                    $thumb_id = get_post_thumbnail_id( $featured_product_id );

                    $thumb_url = wp_get_attachment_image_src( $thumb_id,'full' )[0];

                    $product = wc_get_product( $featured_product_id );

                    if( $product->is_type('variable') ){

                        $regularPrice = $product->get_variation_regular_price();

                        $salePrice = $product->get_variation_sale_price();

                    } elseif( $product->is_type('simple') ) {

                        $regularPrice = $product->get_regular_price();

                        $salePrice = $product->get_sale_price();

                    }

                    if( $salePrice ){
                        $flagIsSale = "true";
                    } else {
                        $flagIsSale = "false";
                    }


                    $dataProduct = '{
                                    "src": "'.$thumb_url.'",
                                    "name": "'.$product->get_name().'",
                                    "url": "'.get_the_permalink($featured_product_id).'",
                                    "price": "'.$regularPrice.'$",
                                    "oldPrice": "'.$salePrice.'$",
                                    "onSale": "'.$flagIsSale.'"
                                }';

                } else {

                    $dataProduct = '';

                }

            } else {

                if ( $post->ID == $menu_item->object_id) {

                    $active = ' active';

                } else {

                    $active = '';

                }

            }


            ?>

            <li class="site__menu-item<?= $sub_menu_class.$active ?>">
                <a href="<?= $menu_item->url ?>"  data-product='<?= $dataProduct ?>'>
                    <span class="site__menu-icon"></span>
                    <?= $menu_item->title ?></a>

                <?php if( $sub_flag ): ?>
                    <div class="site__menu-sub">

                    <div>

                        <ul>
                            <li>
                                <a href="#" data-product='{
                                                        "src": "pic/lift-chairs.png",
                                                        "name": "4-Wheel Rollators",
                                                        "url": "ghjfghf",
                                                        "price": "1000$",
                                                        "oldPrice": "100$",
                                                        "onSale": "true"
                                                    }'>4-Wheel Rollators</a>
                            </li>
                            <li><a href="#" data-product='{
                                                        "src": "pic/lift-chairs.png",
                                                        "name": "3-Wheel Rollators",
                                                        "url": "ghjfghf",
                                                        "price": "2000$",
                                                        "oldPrice": "100$",
                                                        "onSale": "true"
                                                    }'>3-Wheel Rollators</a></li>
                            <li><a href="#" data-product='{
                                    "src": "pic/lift-chairs.png",
                                    "name": "bla bla bal",
                                    "url": "ghjfghf",
                                    "price": "1000$",
                                    "oldPrice": "100$",
                                    "onSale": "true"
                                }'>Standard Walkers</a></li>
                            <li><a href="#" data-product='{
                                                        "src": "pic/lift-chairs.png",
                                                        "name": "Heavy Duty Walkers",
                                                        "url": "ghjfghf",
                                                        "price": "2000$",
                                                        "oldPrice": "100$",
                                                        "onSale": "true"
                                                    }'>Heavy Duty Walkers</a></li>
                            <li><a href="#" data-product='{
                                                        "src": "pic/lift-chairs.png",
                                                        "name": "Standard Canes",
                                                        "url": "ghjfghf",
                                                        "price": "2000$",
                                                        "oldPrice": "100$",
                                                        "onSale": "true"
                                                    }'>Standard Canes</a></li>
                            <li><a href="#" data-product='{
                                                        "src": "pic/lift-chairs.png",
                                                        "name": "Quad Canes",
                                                        "url": "ghjfghf",
                                                        "price": "2000$",
                                                        "oldPrice": "100$",
                                                        "onSale": "true"
                                                    }'>Quad Canes</a></li>
                            <li><a href="#" data-product='{
                                                        "src": "pic/lift-chairs.png",
                                                        "name": "Folding Canes",
                                                        "url": "ghjfghf",
                                                        "price": "2000$",
                                                        "oldPrice": "100$",
                                                        "onSale": "true"
                                                    }'>Folding Canes</a></li>
                            <li><a href="#" data-product='{
                                                        "src": "pic/lift-chairs.png",
                                                        "name": "Seat Canes",
                                                        "url": "ghjfghf",
                                                        "price": "2000$",
                                                        "oldPrice": "100$",
                                                        "onSale": "true"
                                                    }'>Seat Canes</a></li>
                            <li><a href="#" data-product='{
                                                        "src": "pic/lift-chairs.png",
                                                        "name": "Fashion Canes",
                                                        "url": "ghjfghf",
                                                        "price": "2000$",
                                                        "oldPrice": "100$",
                                                        "onSale": "true"
                                                    }'>Fashion Canes</a></li>
                            <li><a href="#" data-product='{
                                                        "src": "pic/lift-chairs.png",
                                                        "name": "Heavy Duty Canes",
                                                        "url": "ghjfghf",
                                                        "price": "2000$",
                                                        "oldPrice": "100$",
                                                        "onSale": "true"
                                                    }'>Heavy Duty Canes</a></li>
                            <li><a href="#" data-product='{
                                                        "src": "pic/lift-chairs.png",
                                                        "name": "Walking Sticks",
                                                        "url": "ghjfghf",
                                                        "price": "2000$",
                                                        "oldPrice": "100$",
                                                        "onSale": "true"
                                                    }'>Walking Sticks</a></li>
                        </ul>
                        <ul>
                            <li><a href="#" data-product='{
                                                        "src": "pic/lift-chairs.png",
                                                        "name": "Cane Accessories",
                                                        "url": "ghjfghf",
                                                        "price": "2000$",
                                                        "oldPrice": "100$",
                                                        "onSale": "true"
                                                    }'>Cane Accessories</a></li>
                            <li><a href="#" data-product='{
                                                        "src": "pic/lift-chairs.png",
                                                        "name": "Crutches",
                                                        "url": "ghjfghf",
                                                        "price": "2000$",
                                                        "oldPrice": "100$",
                                                        "onSale": "true"
                                                    }'>Crutches</a></li>
                            <li><a href="#" data-product='{
                                                        "src": "pic/lift-chairs.png",
                                                        "name": "Knee Walkers",
                                                        "url": "ghjfghf",
                                                        "price": "2000$",
                                                        "oldPrice": "100$",
                                                        "onSale": "true"
                                                    }'>Knee Walkers</a></li>
                            <li><a href="#" data-product='{
                                                        "src": "pic/lift-chairs.png",
                                                        "name": "Specialty Walkers",
                                                        "url": "ghjfghf",
                                                        "price": "2000$",
                                                        "oldPrice": "100$",
                                                        "onSale": "true"
                                                    }'>Specialty Walkers</a></li>
                            <li><a href="#" data-product='{
                                                        "src": "pic/lift-chairs.png",
                                                        "name": "Two-in-one Walker-Wheelchair",
                                                        "url": "ghjfghf",
                                                        "price": "2000$",
                                                        "oldPrice": "100$",
                                                        "onSale": "true"
                                                    }'>Two-in-one Walker-Wheelchair</a></li>
                            <li><a href="#" data-product='{
                                                        "src": "pic/lift-chairs.png",
                                                        "name": "Walker Accessories",
                                                        "url": "ghjfghf",
                                                        "price": "2000$",
                                                        "oldPrice": "100$",
                                                        "onSale": "true"
                                                    }'>Walker Accessories</a></li>
                        </ul>

                    </div>
                    <div>

                        <!-- featured-product -->
                        <div class="featured-product">

                            <h2 class="featured-product__title">Product Name nme nema</h2>

                            <div class="featured-product__pic" style="background-image: url(pic/lift-chairs.png)">
                                <span class="featured-product__remark"><span>ON SALE</span></span>
                            </div>

                            <div class="featured-product__footer">
                                <span class="featured-product__price"><del>$1,800.00</del> $1,350.00</span>
                                <span class="btn">SEE MORE</span>
                            </div>

                            <div class="featured-product__loading"></div>

                        </div>
                        <!-- /featured-product -->

                    </div>

                </div>
                <?php endif; ?>
            </li>

      <?php } ?>

    </ul>

</nav>
<!-- /site__menu -->