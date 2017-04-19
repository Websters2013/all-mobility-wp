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

function get_featured_slider_products( $ids = null ){ ?>
<!-- featured-products -->
<div class="featured-products">

    <h2 class="site__title site__title_2">Add-ons and Enhancements:</h2>

    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide">

                <!-- featured-product -->
                <a href="#" class="featured-product">
                    <h2 class="featured-product__title">Product Name </h2>

                    <div class="featured-product__pic" style="background-image: url(pic/lift-chairs.png)">
                    </div>

                    <div class="featured-product__footer">
                        <span class="featured-product__price"><del>$1,800.00</del> $1,350.00</span>
                        <span class="btn btn_6">SEE MORE</span>
                    </div>

                </a>
                <!-- /featured-product -->

            </div>
            <div class="swiper-slide">

                <!-- featured-product -->
                <a href="#" class="featured-product">
                    <h2 class="featured-product__title">Product Name </h2>

                    <div class="featured-product__pic" style="background-image: url(pic/lift-chairs.png)">
                    </div>

                    <div class="featured-product__footer">
                        <span class="featured-product__price"><del>$1,800.00</del> $1,350.00</span>
                        <span class="btn btn_6">SEE MORE</span>
                    </div>

                </a>
                <!-- /featured-product -->

            </div>
            <div class="swiper-slide">

                <!-- featured-product -->
                <a href="#" class="featured-product">
                    <h2 class="featured-product__title">Product Name </h2>

                    <div class="featured-product__pic" style="background-image: url(pic/lift-chairs.png)">
                    </div>

                    <div class="featured-product__footer">
                        <span class="featured-product__price"><del>$1,800.00</del> $1,350.00</span>
                        <span class="btn btn_6">SEE MORE</span>
                    </div>

                </a>
                <!-- /featured-product -->

            </div>
            <div class="swiper-slide">

                <!-- featured-product -->
                <a href="#" class="featured-product">
                    <h2 class="featured-product__title">Product Name </h2>

                    <div class="featured-product__pic" style="background-image: url(pic/lift-chairs.png)">
                    </div>

                    <div class="featured-product__footer">
                        <span class="featured-product__price"><del>$1,800.00</del> $1,350.00</span>
                        <span class="btn btn_6">SEE MORE</span>
                    </div>

                </a>
                <!-- /featured-product -->

            </div>
            <div class="swiper-slide">

                <!-- featured-product -->
                <a href="#" class="featured-product">
                    <h2 class="featured-product__title">Product Name </h2>

                    <div class="featured-product__pic" style="background-image: url(pic/lift-chairs.png)">
                    </div>

                    <div class="featured-product__footer">
                        <span class="featured-product__price"><del>$1,800.00</del> $1,350.00</span>
                        <span class="btn btn_6">SEE MORE</span>
                    </div>

                </a>
                <!-- /featured-product -->

            </div>
            <div class="swiper-slide">

                <!-- featured-product -->
                <a href="#" class="featured-product">
                    <h2 class="featured-product__title">Product Name </h2>

                    <div class="featured-product__pic" style="background-image: url(pic/lift-chairs.png)">
                    </div>

                    <div class="featured-product__footer">
                        <span class="featured-product__price"><del>$1,800.00</del> $1,350.00</span>
                        <span class="btn btn_6">SEE MORE</span>
                    </div>

                </a>
                <!-- /featured-product -->

            </div>
        </div>

        <div class="featured-products__controls">
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-next"></div>
        </div>

    </div>

</div>
<!-- /featured-products -->
<?php }