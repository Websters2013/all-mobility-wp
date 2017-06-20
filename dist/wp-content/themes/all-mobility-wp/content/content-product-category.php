<?php global $wp_query;

$cat_obj = $wp_query->get_queried_object();

$category_ID  = $cat_obj->term_id;



if( $cat_obj->parent != 0 ){
    $category_sub = ' category_sub';
} else {
    $category_sub = '';
}


$mobilityScootersId = 145;

$powerWheelChairs = 125; ?>

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
                            <option selected value="15">15</option>
                            <option value="25">25</option>
                            <option value="35">35</option>
                        </select>
                    </fieldset>
                    <fieldset>
                        <label for="sorting-date">sorting</label>
                        <select name="sorting-date" id="sorting-date">
                            <option selected value="recomm">Recommended</option>
                            <option  value="ASC">Price: low to high</option>
                            <option value="DESC">Price: high to low</option>
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

                    <?php if( get_field('show_this_filter','product_cat_'.$category_ID ) == 'show' ): ?>

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
                            $i = 0;
                            if( have_rows('price_builder','product_cat_'.$category_ID) ):

                                        while ( have_rows('price_builder','product_cat_'.$category_ID ) ) : the_row();
                                            $i++;
                                            $last = get_sub_field('last_above_range');
                                            $min = get_sub_field('start_price');
                                            $max =  get_sub_field('end_price');

                                            if( $last[0] ){
                                                $maxDisplay = 'and above';
                                                $max = 999999999999;
                                            } else {
                                                $maxDisplay = wc_price($max);
                                            }

                                            $minDisplay = wc_price($min);

                                            $number = checkPrice( $min, $max, $category_ID );

                                            ?>

                                            <div>
                                                <input type="checkbox"  data-id="<?= $min.'-'.$max ?>" name="_price" id="price_<?= $i ?>">
                                                <label for="price_<?= $i ?>"><?= $minDisplay ?> - <?= $maxDisplay ?> <span class="category__filters-count"><?= $number ?></span></label>
                                            </div>

                                            <?php
                                        endwhile;
                                    endif; ?>

                            <div>

                            </div>
                        </div>
                    </div>

                    <?php endif; ?>

                    <?php
                    
                    $allFilters = getFilters($category_ID);

                    if(!empty($allFilters['ranges'])):

                    foreach ( $allFilters['ranges'] as $key => $filter ):
                        $unit = $filter['unit']; ?>

                        <div class="category__filters-item">
                                    <span><?= $filter['name'] ?>

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

                                    <?php foreach ( $filter as $sub_key => $item ) {

                                        if( !is_array($item) ){
                                            continue;
                                        }

                                        $range = $item[0].'-'.$item[1];

                                        if( $item[1] == 9999999999 ){
                                            $rightRange = 'and above' ;
                                        } else {
                                            $rightRange = $item[1].' '.$unit;
                                        }

                                        $range_for_display = $item[0].' - '.$rightRange;

                                        $countRe = checkProductCountByField($item[0],$item[1],$key,$category_ID);

                                        ?>

                                        <div>
                                            <input type="checkbox" name="<?= $key ?>" id="<?= $key.'_'.$sub_key ?>" data-id="<?= $range ?>">
                                            <label for="<?= $key.'_'.$sub_key ?>"><?= $range_for_display ?> <span class="category__filters-count"><?= $countRe ?></span></label>
                                        </div>

                                    <?php } ?>

                                </div>
                            </div>
                        </div>

                    <?php endforeach;
                    endif;

                    if(!empty($allFilters['list'])):

                        foreach ( $allFilters['list'] as $key => $filter ): ?>

                            <div class="category__filters-item">
                                    <span><?= $filter['name'] ?>

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

                                        <?php  foreach ( $filter as $sub_key => $item ) {

                                            if( $sub_key == 'name' ){
                                                continue;
                                            }

                                            ?>

                                            <div>

                                                <input type="checkbox" name="<?= $key ?>" id="<?= $sub_key ?>" data-id="<?= $sub_key ?>">
                                                <label for="<?= $sub_key ?>"><?= $sub_key ?> <span class="category__filters-count"><?= $item ?></span></label>
                                            </div>

                                        <?php  } ?>

                                    </div>
                                </div>
                            </div>

                        <?php endforeach;
                    endif;

                    if( !empty($attrs) ){
                        foreach ( $attrs as $attr ){
                        ?>
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

                                        <?php  foreach ( $attr as $sub_key => $item ) {
                                            $attr_id = $item->term_id;
                                            ?>

                                            <div>

                                                <input type="checkbox" name="pa_color" id="<?= $attr_id ?>" data-id="<?= $attr_id ?>">
                                                <label for="<?= $attr_id ?>"><?= ucfirst($item->name) ?> <span class="category__filters-count"><?= $item->count_posts ?></span></label>
                                            </div>

                                        <?php  } ?>

                                    </div>
                                </div>
                            </div>
                   <?php }
                    }

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

                <h2 class="site__title site__title_3 site__title_white"><?= $cat_obj->name; ?></h2>



                <?php
                if( $mobilityScootersId == $category_ID || $powerWheelChairs == $category_ID || $category_ID == 116 ): ?>

                <!-- category__find-parameters -->
                <form class="category__find-parameters">
                    <div>

                        <span class="category__find-title">WEIGHT</span>

                        <select name="weight" id="weight">
                            <option selected value="0-999999999">All</option>
                            <option value="0-250">250 lbs or less</option>
                            <option value="251-300">251 - 300 lbs</option>
                            <option value="351-999999999">351 lbs or more</option>
                        </select>

                    </div>

                    <?php if( $category_ID == $mobilityScootersId ): ?>

                        <div>

                            <span class="category__find-title">Main Use</span>

                            <div class="nice-radio">
                                <input type="radio"  checked name="main_use" id="usage1" data-id="0-40" value="0-40">
                                <label for="usage1">Indoor</label>
                            </div>
                            <div class="nice-radio">
                                <input type="radio" name="main_use" id="usage2" data-id="40-999999999" value="40-999999999">
                                <label for="usage2">Outdoor</label>
                            </div>

                        </div>
                        <div>

                            <span class="category__find-title">Usage</span>

                            <div class="nice-radio">
                                <input type="radio" checked name="drive_range" id="reatures1" data-id="12-999999999" value="12-999999999">
                                <label for="reatures1">Full-time</label>
                            </div>
                            <div class="nice-radio">
                                <input type="radio" name="drive_range" id="reatures2" data-id="0-12" value="0-12">
                                <label for="reatures2">Occasional</label>
                            </div>

                        </div>
                    <?php endif;

                    if( $category_ID == $powerWheelChairs ): ?>

                        <div>

                            <span class="category__find-title">Pricing Category</span>

                            <div class="nice-radio">
                                <input type="radio"  checked name="_price" id="price1" data-id="0-3000" value="1">
                                <label for="price1">Budget</label>
                            </div>
                            <div class="nice-radio">
                                <input type="radio" name="_price" id="price2" data-id="3000-999999999" value="2">
                                <label for="price2">Deluxe</label>
                            </div>

                        </div>
                        <div>

                            <span class="category__find-title">Usage</span>

                            <div class="nice-radio">
                                <input type="radio" checked name="drive_range" id="reatures1" data-id="12-999999999" value="12-999999999">
                                <label for="reatures1">Full-time</label>
                            </div>
                            <div class="nice-radio">
                                <input type="radio" name="drive_range" id="reatures2" data-id="0-12" value="0-12">
                                <label for="reatures2">Occasional</label>
                            </div>

                        </div>
                   <?php  endif;  ?>

                    <?php

                    if( $category_ID == 116 ): ?>

                        <div>

                            <span class="category__find-title">Pricing Category</span>

                            <div class="nice-radio">
                                <input type="radio" checked name="_price" id="price1" data-id="0-1000" value="3">
                                <label for="price1">Budget</label>
                            </div>
                            <div class="nice-radio">
                                <input type="radio" name="_price" id="price2" data-id="1000-999999999" value="3">
                                <label for="price2">Deluxe</label>
                            </div>

                        </div>
                        <div>

                            <span class="category__find-title">Frame Type</span>

                            <div class="nice-radio">
                                <input type="radio" checked name="choose_frame_type" id="reatures1" data-id="disassembles" value="Disassembles">
                                <label for="reatures1">Disassembles</label>
                            </div>
                            <div class="nice-radio">
                                <input type="radio" name="choose_frame_type" id="reatures2" data-id="rigid" value="rigid">
                                <label for="reatures2">Rigid</label>
                            </div>

                        </div>
                   <?php  endif;  ?>
                    <div>

                        <button class="btn btn_3" type="submit"><span>search</span></button>

                    </div>
                </form>
                <!-- /category__find-parameters -->

                <?php endif; ?>

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

            <!-- pagination-wrap -->
            <div class="pagination-wrap">

            </div>
            <!-- /pagination-wrap -->

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

            <?= $description_shop ?>

            <?php endif; ?>

        </div>
        <!-- /category__content -->

    </div>
    <!-- /category__inner -->

</div>


<?php
$string = 'weight=0-999999999&_price=1 000.00-999999999999&drive_range=12-999999999';



parse_str($string,$output);



foreach ($output as $key => $item){

    $technicals[$key] = explode(',',$item );

}


$allCharacters = array();
foreach ( $technicals as $key => $technical){

    if(  $key == 'brand' || $key == 'frame_color' || $key == 'choose_frame_type' ){

        if(!empty($item)):

            $currentHar = array();

            $currentHar['relation'] = 'OR';

            foreach ( $technical as $item ){

                $outwed = $item;

                $currentHar[] =  array(
                    'key' => $key,
                    'value' => $item,
                    'compare'	=> '='
                );

            }

        endif;

        $allCharacters[] = $currentHar;

    } else {

        if(!empty($item)):

            $currentHar = array();

            $currentHar['relation'] = 'OR';

            foreach ( $technical as $item ){

                $item = explode('-',$item);

                $currentHar[] =  array(
                    'key' => $key,
                    'value' => $item,
                    'compare'	=> 'BETWEEN',
                    'type' => 'NUMERIC'
                );

            }

        endif;

        $allCharacters[] = $currentHar;

    }

}

?>
