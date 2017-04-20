<?php global $wp_query;

$cat_obj = $wp_query->get_queried_object();
$category_ID  = $cat_obj->term_id; ?>

    <h1 class="site__title site__title_3"><?php woocommerce_page_title(); ?></h1>
    <?php if ( is_product_taxonomy() && 0 === absint( get_query_var( 'paged' ) ) ) {
        $description = wc_format_content( term_description() );
        if ( $description ) {
            echo $description;
        }
    } ?>

    <!-- category__inner -->
    <div class="category__inner category__inner_filters">

        <?php var_dump(getAttrForCategory( $category_ID )); ?>

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

                Filters <span>(2)</span>

            </h2>
            <a href="#" class="category__filters-clear">
                clear
            </a>

            <!-- category__filters-items -->
            <div class="category__filters-items">
                <div>
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
                                <a href="#">$1,100.00 - $1,199.99 1</a>
                                <a href="#">$1,400.00 - $1,499.99 5</a>
                                <a href="#">$1,500.00 - $1,599.99 1</a>
                                <a href="#">$1,600.00 - $1,699.99 1</a>
                                <a href="#">$1,900.00 and above 13</a>
                            </div>
                        </div>
                    </div>
                    <div class="category__filters-item">
                                <span>Brand

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
                                <a href="#">Brand1</a>
                                <a href="#">Brand2</a>
                                <a href="#">Brand3</a>
                                <a href="#">Brand4</a>
                                <a href="#">Brand5</a>
                            </div>
                        </div>
                    </div>
                    <div class="category__filters-item">
                                <span>Frame Type

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
                                <a href="#">Type1</a>
                                <a href="#">Type2</a>
                                <a href="#">Type3</a>
                                <a href="#">Type4</a>
                                <a href="#">Type5</a>
                            </div>
                        </div>
                    </div>
                    <div class="category__filters-item">
                                <span>Seat Width

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
                                <a href="#">width1</a>
                                <a href="#">width2</a>
                                <a href="#">width3</a>
                                <a href="#">width4</a>
                                <a href="#">width5</a>
                            </div>
                        </div>
                    </div>
                    <div class="category__filters-item">
                                <span>Frame Color

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
                                <a href="#">Black 4</a>
                                <a href="#">Blue 8</a>
                                <a href="#">Gray 1</a>
                                <a href="#">Orange 1</a>
                                <a href="#">Pink 1</a>
                                <a href="#">(more)</a>
                            </div>
                        </div>
                    </div>
                </div>
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

            <!-- product-categories -->
            <div class="product-categories product-categories_2">

                <?php get_template_part('content/content','home-category') ?>

            </div>
            <!-- /product-categories -->

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