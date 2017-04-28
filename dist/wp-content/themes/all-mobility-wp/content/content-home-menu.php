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
                    $productExist = true;
                } else {

                    $dataProduct = '';
                    $productExist = false;
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
                <a href="<?= $menu_item->url ?>">
                    <span class="site__menu-icon"></span>
                    <?= $menu_item->title ?></a>

                <?php if( $sub_flag ): ?>
                    <div class="site__menu-sub">

                    <div>

                        <ul>

                            <?php foreach ($terms as $item) {
                                $itemId = $item->term_id;
                                ?>

                                <li>
                                    <a href="<?= get_term_link($itemId) ?>"><?= $item->name ?></a>
                                </li>

                          <?php } ?>

                        </ul>

                    </div>
                    <div>

                        <?php if( $productExist ): ?>
                        <!-- featured-product -->
                        <div class="featured-product">

                            <h2 class="featured-product__title"><?= $product->get_name() ?></h2>

                            <div class="featured-product__pic" style="background-image: url(<?= $thumb_url ?>)">
                                <?php if($flagIsSale): ?>
                                <span class="featured-product__remark"><span>ON SALE</span></span>
                                <?php endif; ?>
                            </div>


                            <?php

                            if( !$salePrice || $salePrice == $regularPrice){
                                $salePrice = $regularPrice.'$';
                                $regularPrice = '';
                            } else {
                                $salePrice = $salePrice.'$';
                                $regularPrice = $regularPrice.'$';
                            }
                            ?>

                            <div class="featured-product__footer">
                                <span class="featured-product__price"><del><?= $regularPrice ?></del><?= $salePrice ?></span>
                                <a href="<?= get_the_permalink($featured_product_id) ?>" class="btn">SEE More</a>
                            </div>

                            <div class="featured-product__loading"></div>

                        </div>
                        <!-- /featured-product -->
                        <?php endif; ?>

                    </div>

                </div>
                <?php endif; ?>
            </li>

      <?php } ?>

    </ul>

</nav>
<!-- /site__menu -->