<?php global $wp_query;

$cat_obj = $wp_query->get_queried_object();

$category_ID  = $cat_obj->term_id;



if( $cat_obj->parent != 0 ){
    $category_sub = ' category_sub';
} else {
    $category_sub = '';
}


?>

<div class="category category_filters<?= $category_sub ?>" data-id-category="<?= $category_ID ?>">

    <div class="category__head">
        <div>
    <h1 class="site__title site__title_3"><?php woocommerce_page_title(); ?></h1>
    <?php if ( is_product_taxonomy() && 0 === absint( get_query_var( 'paged' ) ) ) {
        $description = wc_format_content( term_description() );
        if ( $description ) {
            echo $description;
        }
    } ?>
    </div>

        <div>

            <!-- category__sorting -->
            <div class="category__sorting">

                <form action="#">

                    <fieldset class="category__sorting-pages">
                        <label for="items-page">items per page</label>
                        <select name="items-page" id="items-page">
                            <option selected value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </fieldset>
                    <fieldset>
                        <label for="sorting-date">sorting</label>
                        <select name="sorting-date" id="sorting-date">
                            <option selected value="DESC">date: new first</option>
                            <option value="ASC">date: old first</option>
                        </select>
                    </fieldset>

                </form>

            </div>
            <!-- /category__sorting -->

        </div>

    </div>
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

            <input type="hidden" name="value-check" class="value-check">
            <input type="hidden" name="current-page" class="current-page" value="1">

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

                    <?php if( false ): ?>

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

                            <?php
                            $maxCatPrice = wpq_get_max_price_per_product_cat( $category_ID );
                            $minCatPrice = wpq_get_min_price_per_product_cat( $category_ID );
                            $delta = ( $maxCatPrice - $minCatPrice )/5;
                            $delta_min = $delta - 0.01;
                            $rangeArray = array();

                            if( $maxCatPrice > 0 ):

                                for ( $i = 1; $i <= 5; $i++ ) {

                                if( $i == 1 ){
                                    $rangeArray[$i][0] += $minCatPrice;
                                    $rangeArray[$i][1] = $rangeArray[$i][0] + $delta_min;
                                }
                                elseif( $i == 5 ){
                                    $rangeArray[$i][0] += ( $i - 1 )*$delta;
                                    $rangeArray[$i][1] = 9999999999;
                                }
                                else {
                                    $rangeArray[$i][0] += ( $i - 1 )*$delta;
                                    $rangeArray[$i][1] = $rangeArray[$i][0] + $delta_min;
                                }

                            }

                            endif;

                            $check = checkPrice( 0, 400, $category_ID ); ?>

                            <?php if( $maxCatPrice > 0 ): ?>

                            <div>

                                <?php foreach ( $rangeArray as $item ):

                                    $rangeString = $item[0].'-'.$item[1];

                                    if($item[1] == 9999999999){
                                        $second = ' and above';
                                    } else {
                                        $second = ' - $'.number_format($item[1], 2, '.', ' ');
                                    }

                                    $countProducts = checkPrice( $item[0], $item[1], $category_ID );  ?>

                                    <div>
                                        <input type="checkbox"  data-id="<?= $rangeString ?>" name="price" id="price">
                                        <label for="<?= $rangeString ?>">$<?= number_format($item[0], 2, '.', ' '); ?><?= $second ?> <span class="category__filters-count"><?= $countProducts ?></span></label>
                                    </div>

                                <?php endforeach; ?>

                            </div>

                            <?php endif; ?>
                        </div>
                    </div>

                    <?php endif; ?>

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
                                            <input type="checkbox" name="<?= $item->taxonomy ?>"  data-id="<?= $item->term_id ?>" id="<?= $item->term_id ?>" value="<?= $item->term_id ?>">
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
            <div class="category__wrap" data-rate-path="<?= DIRECT ?>">

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

                <?php get_template_part('content/content','advantages') ?>

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

</div>
