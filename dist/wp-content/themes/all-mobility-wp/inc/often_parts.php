<?php
function get_featured_product( $product_id ){ ?>
    <div>

        <?php    $thumb_id = get_post_thumbnail_id($product_id);
        $thumb_url = wp_get_attachment_image_src($thumb_id,'full')[0];
        $product = wc_get_product( $product_id) ; ?>

        <!-- featured-product -->
        <a href="<?= get_the_permalink( $product_id ) ?>" class="featured-product">
            <span class="site__featured">featured</span>
            <h2 class="featured-product__title"><?= get_the_title($product_id) ?></h2>

            <div class="featured-product__pic" style="background-image: url(<?= $thumb_url ?>)"></div>

            <div class="featured-product__footer">
                <!--            <span class="featured-product__price"><del>$1,800.00</del> $1,350.00</span>-->
            <span class="featured-product__price"><?= $product->get_price_html() ?>
                <span class="btn btn_6">SEE MORE</span>
            </div>

        </a>
        <!-- /featured-product -->

    </div>
<?php }

function get_featured_slider_products( $ids = null ){

    global $product;

    $product = wc_get_product(get_the_ID());

    $crossSellsIds = $product->get_cross_sell_ids();



    if(!empty( $crossSellsIds )): ?>

    <!-- featured-products -->
    <div class="featured-products featured-products_2">

        <div class="swiper-container">
            <div class="swiper-wrapper featured-products__wrapper">

                <?php foreach ($crossSellsIds as $crossSellsId):

	                //var_dump($crossSellsId);

                    $link = get_permalink($crossSellsId);
                    $title = get_the_title($crossSellsId);
                    $thumb_id = get_post_thumbnail_id($crossSellsId);
                    $thumb_url = wp_get_attachment_image_src($thumb_id,'full')[0];
                    $product = wc_get_product($crossSellsId);

                    if( $product->is_type('variable') ){

                        $regularPrice =  $product->get_variation_regular_price();

                        $salePrice = $product->get_variation_sale_price();

                    } elseif( $product->is_type('simple') ) {

                        $regularPrice =  $product->get_regular_price();

                        $salePrice = $product->get_sale_price();

                    }

                    if( !$salePrice || $salePrice == $regularPrice){
                        $salePrice = wc_price( $regularPrice );
                        $regularPrice = '';
                    } else {
                        $salePrice = wc_price( $salePrice );
                        $regularPrice = wc_price( $regularPrice );
                    }

                    ?>

                    <div class="swiper-slide featured-products__slide">

                        <!-- featured-product -->
                        <a href="<?= $link ?>" class="featured-product">
                            <h2 class="featured-product__title"><?= $title ?></h2>

                            <div class="featured-product__pic" style="background-image: url(<?= $thumb_url ?>)">
                            </div>

                            <div class="featured-product__footer">
                                <span class="featured-product__price"><del><?= $regularPrice ?></del><?= $salePrice ?></span>
                                <span class="btn btn_6">SEE MORE</span>
                            </div>

                        </a>
                        <!-- /featured-product -->

                    </div>

                <?php endforeach; ?>

            </div>

            <div class="featured-products__controls">
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-next"></div>
            </div>

        </div>

    </div>
    <!-- /featured-products -->

<?php endif; ?>

<?php }