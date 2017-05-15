<?php
//required actions
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
add_filter('xmlrpc_enabled', '__return_false');
remove_action('wp_head', 'wlwmanifest_link');
// close required actions

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'signuppageheaders');
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'wp_oembed_add_host_js');
// Отключаем сам REST API
add_filter('rest_enabled', '__return_false');

// Отключаем фильтры REST API
remove_action('xmlrpc_rsd_apis', 'rest_output_rsd');
remove_action('wp_head', 'rest_output_link_wp_head', 10, 0);
remove_action('template_redirect', 'rest_output_link_header', 11, 0);
remove_action('auth_cookie_malformed', 'rest_cookie_collect_status');
remove_action('auth_cookie_expired', 'rest_cookie_collect_status');
remove_action('auth_cookie_bad_username', 'rest_cookie_collect_status');
remove_action('auth_cookie_bad_hash', 'rest_cookie_collect_status');
remove_action('auth_cookie_valid', 'rest_cookie_collect_status');
remove_filter('rest_authentication_errors', 'rest_cookie_check_errors', 100);

// Отключаем события REST API
remove_action('init', 'rest_api_init');
remove_action('rest_api_init', 'rest_api_default_filters', 10, 1);
remove_action('parse_request', 'rest_api_loaded');

// Отключаем Embeds связанные с REST API
remove_action('rest_api_init', 'wp_oembed_register_route');
remove_filter('rest_pre_serve_request', '_oembed_rest_pre_serve_request', 10, 4);

remove_action('wp_head', 'wp_oembed_add_discovery_links');

//remove_action('wp_head', 'wp_oembed_add_host_js');
add_filter('the_content', 'do_shortcode');
add_filter('wpcf7_form_elements', 'do_shortcode');

if (function_exists('acf_add_options_page')) {
    acf_add_options_page();
}

add_action('wp_enqueue_scripts', 'add_js');

/* styles and scripts*/
function add_js()
{

    wp_deregister_script('jquery');wp_register_script('jquery',get_template_directory_uri().'/assets/js/vendors/jquery-3.0.0.min.js');
    wp_register_script('swiper_js',get_template_directory_uri().'/assets/js/vendors/swiper.jquery.min.js');
    wp_register_script('index_js',get_template_directory_uri().'/assets/js/index.min.js');
    wp_register_script('perfect_js',get_template_directory_uri().'/assets/js/vendors/perfect-scrollbar.jquery.min.js');
    wp_register_script('product_js',get_template_directory_uri().'/assets/js/product.min.js');
    wp_register_script('category_js',get_template_directory_uri().'/assets/js/category.min.js');
    wp_register_script('rating_js',get_template_directory_uri().'/assets/js/vendors/rating.js');
    wp_register_script('checkout_js',get_template_directory_uri().'/assets/js/checkout.min.js');
    wp_register_script('contact_js',get_template_directory_uri().'/assets/js/contact-us.min.js');
    wp_register_script('locations_js',get_template_directory_uri().'/assets/js/locations.min.js');
    wp_register_script('my-account_js',get_template_directory_uri().'/assets/js/my-account.min.js');
    wp_register_script('login_js',get_template_directory_uri().'/assets/js/login.min.js');
    wp_register_script('my-cart-single_js',get_template_directory_uri().'/assets/js/my-cart.min.js');
    wp_register_script('search-results_js',get_template_directory_uri().'/assets/js/search-results.min.js');
    wp_register_script('faq_js',get_template_directory_uri().'/assets/js/faq.min.js');
    wp_register_script('not-found_js',get_template_directory_uri().'/assets/js/not-found.min.js');
    wp_register_script('google_map','https://maps.googleapis.com/maps/api/js?key=AIzaSyANuqKy3oM3UtHBZe9xle8dEm3_1H5GMh8');

    wp_enqueue_script('jquery');

    wp_register_script('app',get_template_directory_uri().'/assets/js/app.min.js');

    if (is_page_template('page-home.php')){
        wp_enqueue_style('index_css', get_template_directory_uri().'/assets/css/index.css');
        wp_enqueue_style('swiper_css',get_template_directory_uri().'/assets/css/swiper.min.css');
        wp_enqueue_script('swiper_js');
        wp_enqueue_script('index_js');
    }

    if( is_page_template('page-faq.php') ){
        wp_enqueue_style('faq_css', get_template_directory_uri().'/assets/css/faq.css');
        wp_enqueue_script('faq_js');
    }

    if( is_404() ){
        wp_enqueue_style('css_404', get_template_directory_uri().'/assets/css/not-found-page.css');
        wp_enqueue_script('not-found_js');
    }

    if( is_page_template('page-locations.php') ){
        wp_enqueue_style('locations_css', get_template_directory_uri().'/assets/css/locations-single.css');
        wp_enqueue_style('perfect_scrollbar',get_template_directory_uri().'/assets/css/perfect-scrollbar.css');
        wp_enqueue_script('perfect_js');
        wp_enqueue_script('locations_js');

    }
    
    if( is_page_template('page-search.php') ){
        wp_enqueue_style('search-results', get_template_directory_uri().'/assets/css/search-results-page.css');
        wp_enqueue_script('search-results_js');

    }

    if( is_page_template('page-cart.php') ){

        wp_enqueue_style('my-cart-single', get_template_directory_uri().'/assets/css/my-cart-single.css');
        wp_enqueue_script('my-cart-single_js');
        wp_enqueue_style('swiper_css',get_template_directory_uri().'/assets/css/swiper.min.css');
        wp_enqueue_script('swiper_js');
        wp_enqueue_style('perfect_scrollbar',get_template_directory_uri().'/assets/css/perfect-scrollbar.css');
        wp_enqueue_script('perfect_js');

    }

    if( is_page_template('page-account.php') ){
        wp_enqueue_style('my-account-single', get_template_directory_uri().'/assets/css/my-account-page.css');
        wp_enqueue_style('sign-up_css', get_template_directory_uri().'/assets/css/sign-up-page.css');
        wp_enqueue_style('login-types-page', get_template_directory_uri().'/assets/css/login-types-page.css');
        wp_enqueue_script('login_js');
    }
    
    if( is_page_template('page-checkout.php') ){
        wp_enqueue_style('checkout_css', get_template_directory_uri().'/assets/css/checkout-page.css');
        wp_enqueue_style('confirmation_css', get_template_directory_uri().'/assets/css/confirmation-page.css');
        wp_enqueue_style('swiper_css',get_template_directory_uri().'/assets/css/swiper.min.css');
        wp_enqueue_script('swiper_js');
        wp_enqueue_script('checkout_js');
        wp_enqueue_style('perfect_scrollbar',get_template_directory_uri().'/assets/css/perfect-scrollbar.css');
        wp_enqueue_script('perfect_js');

    }

    if( is_page_template('page-contact.php') ){
        wp_enqueue_style('contact_page', get_template_directory_uri().'/assets/css/contact-us-page.css');
        wp_enqueue_style('swiper_css',get_template_directory_uri().'/assets/css/swiper.min.css');
        wp_enqueue_script('swiper_js');
        wp_enqueue_script('contact_js');
        wp_enqueue_script('google_map');
    }

    if( is_singular( 'product' ) ){
        wp_enqueue_style('swiper_css',get_template_directory_uri().'/assets/css/swiper.min.css');
        wp_enqueue_style('rating_css',get_template_directory_uri().'/assets/css/rating.min.css');
        wp_enqueue_style('product_single_css',get_template_directory_uri().'/assets/css/product-single.css');
        wp_enqueue_style('perfect_scrollbar',get_template_directory_uri().'/assets/css/perfect-scrollbar.css');
        wp_enqueue_script('swiper_js');
        wp_enqueue_script('perfect_js');
        wp_enqueue_script('product_js');
        wp_enqueue_script('rating_js');
    }

    if( is_singular( 'wpsl_stores' ) ){
        wp_enqueue_style('location_css',get_template_directory_uri().'/assets/css/locations-single.css');
        wp_enqueue_style('perfect_scrollbar',get_template_directory_uri().'/assets/css/perfect-scrollbar.css');
        wp_enqueue_script('perfect_js');
        wp_enqueue_script('locations_js');
        wp_enqueue_script('google_map');
    }

    if( is_product_category() ){
        wp_enqueue_style('perfect_scrollbar',get_template_directory_uri().'/assets/css/perfect-scrollbar.css');
        wp_enqueue_style('category_css',get_template_directory_uri().'/assets/css/category-single.css');
        wp_enqueue_script('perfect_js');
        wp_enqueue_script('category_js');
    }

    if( basename(get_page_template()) === 'page.php' ){
        wp_enqueue_style('perfect_scrollbar',get_template_directory_uri().'/assets/css/perfect-scrollbar.css');
        wp_enqueue_style('styles_main',get_template_directory_uri().'/assets/css/styles-main.css');
        wp_enqueue_style('content_page',get_template_directory_uri().'/assets/css/content-page.css');
    }

}

wp_enqueue_style('style', get_template_directory_uri().'/style.css');

if ( function_exists( 'add_theme_support' ) ) add_theme_support( 'post-thumbnails' );

register_nav_menus( array(
    'menu' => 'menu',
    'footer_menu' => 'Footer Menu'
) );


//Remove wrappers
remove_action('woocommerce_before_main_content','woocommerce_output_content_wrapper',10);
//remove_action('woocommerce_before_main_content','woocommerce_breadcrumb',20);
remove_action('woocommerce_after_main_content','woocommerce_output_content_wrapper_end',10);
remove_action('woocommerce_get_sidebar','woocommerce_sidebar',10);

add_action('wb_woocommerce_single_product_summary','woocommerce_template_single_title', 5);
add_action('wb_woocommerce_single_product_summary','wb_woocommerce_template_single_rating', 10);
add_action('wb_woocommerce_single_product_summary','woocommerce_template_single_excerpt', 20);
add_action('wb_slider_preview','get_preview_slider', 5);
add_action('wb_product_review','woocommerce_output_product_data_tabs',5);
add_filter( 'woocommerce_get_price_html', 'custom_price_html', 100, 2 );
remove_action('woocommerce_single_product_summary','woocommerce_template_single_title',5);
remove_action('woocommerce_single_product_summary','woocommerce_template_single_rating',10);
remove_action('woocommerce_single_product_summary','woocommerce_template_single_price',10);
remove_action('woocommerce_single_product_summary','woocommerce_template_single_excerpt',20);
remove_action('woocommerce_single_product_summary','woocommerce_template_single_meta',40);
remove_action('woocommerce_single_variation','woocommerce_single_variation',10);
add_filter('wb_single_varitaion','woocommerce_single_variation',5);
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

remove_action( 'woocommerce_checkout_order_review', 'woocommerce_checkout_payment', 20 );
add_action( 'wb_woocmmerce_checkout_payment', 'woocommerce_checkout_payment', 20 );



function wb_get_content (){
    echo get_the_content();
}

function wb_woocommerce_template_single_rating (){
    
    global $product;
    
    if ( get_option( 'woocommerce_enable_review_rating' ) === 'no' ){
        return; 
    }

    $ratingCount =  round( $product->get_average_rating() );
    $reviewCount = $product->get_review_count();
    ?>

    <div class="rate">
        <?php if($ratingCount): ?>

            <?php for( $i = 1; $i <= $ratingCount; $i++ ){
                echo '	<img src="'.DIRECT.'img/star.png" width="30" height="25" alt="">';
            } ?>

        <?php endif; ?>
        <span class="rate__reviews"><?= $reviewCount ?> Reviews</span>
    </div>
<?php }

function get_preview_slider(){

    global $product;
    
    $attachment_ids = $product->get_gallery_attachment_ids();
    $thumb_id = get_post_thumbnail_id();
    $thumb_url = wp_get_attachment_image_src($thumb_id,'full')[0];
    $image_urls[] = $thumb_url;

    foreach ( $attachment_ids as $attachment_id){
        $url = wp_get_attachment_image_src( $attachment_id, 'full' )[0];
        $image_urls[] = $url;
    }

    ?>

    <?php 
    if(!empty($image_urls)): ?>

        <!-- product__slider -->
        <div class="product__slider">

        <div class="swiper-container gallery-top">
        <div class="swiper-wrapper">
    
    <?php foreach ($image_urls as $image_url) { ?>
        
        <div class="swiper-slide" style="background-image:url(<?= $image_url ?>)" data-image="<?= $image_url ?>"></div>
        
   <?php  }  ?>
        </div></div>
          <div class="swiper-container gallery-thumbs">
                            <div class="swiper-wrapper">
            <?php

        foreach ($image_urls as $image_url) { ?>
            <div class="swiper-slide">
                <div class="product__slider-thumbs" style="background-image:url(<?= $image_url ?>)"></div>
            </div>
        <?php }
        ?>
        </div></div></div>
        
   <?php  endif;?>

<?php }

add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

function woo_remove_product_tabs( $tabs ) {

    unset( $tabs['description'] );   // Remove the additional information tab

    return $tabs;
}

add_filter( 'woocommerce_taxonomy_archive_description', 'wb_woocommerce_taxonomy_archive_description_formating' );

function wb_woocommerce_taxonomy_archive_description_formating (){
    
}

function custom_price_html( $price, $product ){

    if( is_singular('product') ){

        $price_formated = str_replace('<del>','<del>List Price: ',$price);

        return str_replace( '<ins>', '', $price_formated );
    } else {
        
        return str_replace( '<ins>', '', $price );
    }


}

function wpq_get_min_price_per_product_cat( $term_id ) {

    global $wpdb;

    $sql = "

    SELECT  MIN( meta_value+0 ) as minprice

    FROM {$wpdb->posts} 

    INNER JOIN {$wpdb->term_relationships} ON ({$wpdb->posts}.ID = {$wpdb->term_relationships}.object_id)

    INNER JOIN {$wpdb->postmeta} ON ({$wpdb->posts}.ID = {$wpdb->postmeta}.post_id) 

    WHERE  

      ( {$wpdb->term_relationships}.term_taxonomy_id IN (%d) ) 

    AND {$wpdb->posts}.post_type = 'product' 

    AND {$wpdb->posts}.post_status = 'publish' 

    AND {$wpdb->postmeta}.meta_key = '_price'";
    

    return $wpdb->get_var( $wpdb->prepare( $sql, $term_id ) );

}

function wpq_get_max_price_per_product_cat( $term_id ) {

    global $wpdb;

    $sql = "

    SELECT  MAX( meta_value+0 ) as minprice

    FROM {$wpdb->posts} 

    INNER JOIN {$wpdb->term_relationships} ON ({$wpdb->posts}.ID = {$wpdb->term_relationships}.object_id)

    INNER JOIN {$wpdb->postmeta} ON ({$wpdb->posts}.ID = {$wpdb->postmeta}.post_id) 

    WHERE  

      ( {$wpdb->term_relationships}.term_taxonomy_id IN (%d) ) 

    AND {$wpdb->posts}.post_type = 'product' 

    AND {$wpdb->posts}.post_status = 'publish' 

    AND {$wpdb->postmeta}.meta_key = '_price'

  ";

    return $wpdb->get_var( $wpdb->prepare( $sql, $term_id ) );

}

function getAttrForCategory( $catID ){

    $all_attributes = wc_get_attribute_taxonomies();

    foreach ($all_attributes as $attribute){

        $currentAttrTax = $attribute->attribute_name;

        $taxonomyName = 'pa_'.$currentAttrTax;

        $terms = get_terms( array(
            'taxonomy' => $taxonomyName,
            'hide_empty' => true
        ) );

        foreach ($terms as $term) {

            $is_related = checkProduct( $taxonomyName, $term->term_id, $catID );

            if( $is_related[0] ) {

                $term->count_posts = $is_related[1];

                $outPutAttr[$attribute->attribute_name][] =  $term;

            }

        }

    }

    return $outPutAttr;
    
}

function checkProduct( $taxonomyName, $termid, $catID ){
    
    $args = array (
        'post_type'  => 'product',
        'posts_per_page' => -1,
        'tax_query'  => array(
            'relation' => 'AND',
            array(
                'taxonomy' => 'product_cat',
                'field' => 'term_id',
                'terms' => $catID
            ),
            array(
                'taxonomy' 		=> $taxonomyName,
                'terms' 		=> array( $termid ),
                'operator' 		=> 'IN'
            )
        )
    );

    $attrProducts =  get_posts($args);

    $countPosts = count($attrProducts);
    
    if(empty($attrProducts)){
        $attrProducts = array( false, $countPosts );
    } else {
        $attrProducts = array( $termid, $countPosts );
    }

    return $attrProducts;
    
}

function checkPrice( $min, $max, $catID ){

    $args = array (
        'post_type'  => 'product',
        'posts_per_page' => -1,
        'tax_query'  => array(
            'relation' => 'AND',
            array(
                'taxonomy' => 'product_cat',
                'field' => 'term_id',
                'terms' => $catID
            )
        ),
        'meta_query' => array(

            array(
                'key' => '_price',
                'value' => array( $min, $max ),
                'compare' => 'BETWEEN',
                'type' => 'NUMERIC'
            )

        ),
    );

    $attrProducts =  get_posts($args);

    $countPosts = count($attrProducts);

    if(empty($attrProducts)){
        $filterCount = 0;
    } else {
        $filterCount = $countPosts;
    }

    return $filterCount;

}

function main_search(){

    $query = $_GET['value'];

    $terms = getTermsForSearch($query);

    if( $terms ):

    $allCatWithMain = array();

    foreach ( $terms as $key => $term ){

        if( $term == 0 ){
            $terms[$key] = $key;
        }

    }

    $limit = 12;

    foreach ( $terms as $key => $term ){

        if( !$allCatWithMain[$term] ){

            $allCatWithMain[$term][0] = -1;

            foreach ($terms as $sub_key => $sub_term ) {

                if( $sub_term == $term && $term !=$sub_key ){

                    $allCatWithMain[$term][] = $sub_key;

                }

            }

        }
    }

    foreach ( $allCatWithMain as $key => $item ) {

        unset($allCatWithMain[$key][0]);

    }

    $categories = '"categories": [ ';

    $counterCat = 0;

    foreach ( $allCatWithMain as $key => $item ) {

        if( $counterCat >= $limit ){ break; }

        $counterCat++;
        
        $catObj = get_term( $key,'product_cat' );

        $catName = $catObj->name;

        $catName = str_replace($query,"<span>$query</span>",$catName);

        $categories .= '{
            "name": "'.$catName.'",
            "urlCategory": "'.get_term_link($key).'",';

        if( empty($item) ){

            $categories = substr( $categories, 0, -1 );

        } else {

            if( $counterCat >= $limit ){

                $categories = substr( $categories, 0, -1 );

                $categories .= '},';

                break;
            }

            $categories .= '"subcategories": [';

            $subUrls = array();

            foreach ( $item as $value ) {

                $counterCat++;

                $catObj = get_term( $value,'product_cat' );

                $subUrls[] = $value;

                $catName = $catObj->name;

                $catName = str_replace($query,"<span>$query</span>",$catName);

                $categories .= '"'.$catName.'"'.',';

                if( $counterCat >= $limit ){
                    break;
                }

            }

            $categories = substr( $categories, 0, -1 );

            $categories .= ']';

            if( !empty($subUrls) ){

                $categories .=  ',"urlSubcategories": [';

                foreach ($subUrls as $id  ){
                    $categories .= '"'.get_term_link($id).'"'.',';
                }

                $categories = substr( $categories, 0, -1 );

                $categories .=  ']';
            }

        }


        $categories .= '},';

    }

    $categories = substr( $categories, 0, -1 );

    $categories .= ']';

    else:
        $categories = '"categories": []';
    endif;

    $productsSearch = getProductsSearch( $query );
    
    if( $productsSearch ):

        $products = '"products": [';

        foreach ( $productsSearch as $item ){

            $product = wc_get_product($item);

            $name = json_encode($product->get_name());

            $thumb_id = get_post_thumbnail_id($item);

            $thumb_url = wp_get_attachment_image_src($thumb_id,'full')[0];

            if( $product->is_type('variable') ){

                $regularPrice = $product->get_variation_regular_price();

                $salePrice = $product->get_variation_sale_price();

            } elseif( $product->is_type('simple') ) {

                $regularPrice = $product->get_regular_price();

                $salePrice = $product->get_sale_price();

            }

            $product_terms  = wp_get_object_terms( $product->get_id(), 'product_cat');

            $sub_cat = '';

            foreach ($product_terms as $term){

                if( $term->parent == 0 ){

                    $main_cat = json_encode($term->name);

                } else {

                    $sub_cat .= json_encode($term->name).',';

                }

            }

            $sub_cat = substr( $sub_cat, 0, -1 );

            ( $salePrice )? $salePrice = $salePrice.'$' : $salePrice = '' ;
            ( $regularPrice )? $regularPrice = $regularPrice.'$' : $regularPrice = '' ;

            $products .= ' {
            "name": '.$name.',
            "src": "'.$thumb_url.'",
            "alt": '.$name.',
            "href": "'.get_the_permalink($item).'",
            "price": "'.$regularPrice.'",
            "oldPrice": "'.$salePrice.'",
            "categories": {
                "mainCategory": '.$main_cat.',
                "subcategories": ['.$sub_cat.']
            }
        },';

        }

        $products = substr( $products, 0, -1 );

        $products .=']';
    
    else:

        $products = '"products": []';
        
    endif;

    $json_data = '{'.$categories.','.$products .'}';

    $json_data = str_replace("\r\n",'',$json_data);

    $json_data = str_replace("\n",'',$json_data);

    echo $json_data;

    exit;
    
}

add_action('wp_ajax_main_search','main_search');

add_action('wp_ajax_nopriv_main_search', 'main_search');

function getTermsForSearch( $query,$number = 12 ){
    
    $terms = get_terms(
        array(
            'taxonomy' => 'product_cat',
            'hide_empty' => false,
            'search' => $query,
            'number' => $number,
            'fields' => 'id=>parent'
        )
    );
    
    return $terms;
    
}

function getProductsSearch( $query, $count = 6 ){

    $products = get_posts(

        array(
            'post_type' => 'product',
            'posts_per_page' => $count,
            's' => $query,
            'post_status' => 'publish',
            'fields' => 'ids',
            'meta_key'			=> 'featured_product',
            'orderby'			=> 'meta_value',
            'order'				=> 'DESC'
        )
    
    );
    
    return $products;
    
}

function get_filtered_products(){

$string = $_GET['value'];

parse_str($string,$output);

$pageSorting = $_GET['pageSorting'];

$sortingPrice = $_GET['dateSorting'];

$filter_weight = $_GET['additionalParameters'];

$currentPage = $_GET['currentPage'];

$categoryId = $_GET['idCategory'];

    if($filter_weight) {
        
            $unique_filter = explode('&', $filter_weight);

            foreach ($unique_filter as $key =>  $item){
                $uniqueItems[] = explode('=', $item);
            }

            foreach ($uniqueItems as $uniqueItem){

                
                if( $uniqueItem[0] == 'choose_frame_type' ):

                    $allUniqueFields[] = array(
                        'key'   => $uniqueItem[0],
                        'value' => $uniqueItem[1]
                    );

                else:

                    $range = explode('-', $uniqueItem[1]);

                    $allUniqueFields[] = array(
                        'key'   => $uniqueItem[0],
                        'value' => array($range[0],$range[1]),
                        'compare' => 'BETWEEN',
                        'type' => 'NUMERIC'
                    );

                endif;



            }




    } else{
        $unique_filter = '';
    }
    
    $uniqueAttributes =  array(
        'key'   => 'weight',
        'value' => array(0,500),
        'compare' => 'BETWEEN',
        'type' => 'NUMERIC'
    );

    if( $sortingPrice == 'ASC' ){
        $orderbyElem = 'meta_value_num';
        $order = 'ASC';
        $menu_key = '_price';

    }
    elseif( $sortingPrice == 'DESC'  ){
        $orderbyElem = 'meta_value_num';
        $order = 'DESC';
        $menu_key = '_price';
    }

elseif($sortingPrice == 'recomm' ) {
    $orderbyElem = 'meta_value';
    $order = 'DESC';
    $menu_key = 'featured_product';
}
    


    foreach ($output as $key => $item){

        if( $key == 'price' ){
            $prices =  explode(',',$item );
        } else {
            $atts[$key] = explode(',',$item );
        }

    }

    foreach ($prices as $price){
        $finalPriceArray[] = explode('-',$price );
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

    $pricesRanges['relation'] = 'OR';

    foreach ( $finalPriceArray as $price ){

        $pricesRanges[] = array(
            'key' => '_price',
            'value' => $price,
            'compare' => 'BETWEEN',
            'type' => 'NUMERIC'
        );

    }

    $args = array (
        'paged' => $currentPage,
        'post_type'  => 'product',
        'fields' => 'ids',
        'posts_per_page' => $pageSorting,
        'meta_key' => $menu_key,
        'orderby' => $orderbyElem,
        'order' => $order,
        'post_status' => 'publish',
        'suppress_filters' => true,
        'tax_query'  => array(
            'relation' => 'AND',
            array(
                'taxonomy' => 'product_cat',
                'field' => 'term_id',
                'terms' => $categoryId
            ),

            $attributesQuery

        ),
        'meta_query' => array(
            'relation' => 'AND',
            $pricesRanges,
            $allUniqueFields
        )


    );

    $attrProducts = new WP_Query( $args );

    $max = $attrProducts->max_num_pages;

    $attrProducts = get_posts($args);

    wp_reset_postdata();

    $products = '';

    foreach ($attrProducts as $product_id){

        $currentProduct = wc_get_product( $product_id );

        if( get_field('featured_product',$product_id) == 'yes' ){
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

            $available_variations = $currentProduct->get_available_variations();

            foreach ($available_variations as $key => $variation){
                $var[$variation['regular_price']] = $variation['sale_price'];
            }

            ksort($var);
            $old_price = '';
            $new_price = '';
            foreach ($var as  $key =>  $item){

                $old_price .= '"'.$key.'$"'.',';

                if($item){
                    $new_price .= '"'.$item.'$"'.',';
                } else {
                    $new_price .= '""'.',';
                }

            }
            $regularPrice = substr( $old_price, 0, -1 );
            $salePrice = substr( $new_price, 0, -1 );


        } elseif( $currentProduct->is_type('simple') ) {

            $regularPrice = $currentProduct->get_regular_price();

            ($regularPrice) ? $regularPrice = $regularPrice.'$' : $regularPrice = '' ;

            $salePrice = $currentProduct->get_sale_price();
            
            if( !$salePrice ){
                $salePrice = $regularPrice;
                $regularPrice ='';
            }

            $regularPrice = json_encode($regularPrice);

            $salePrice = json_encode($salePrice);

        }

        $description = '';
        if( have_rows('three_line_preview_text', $product_id) ):
                    $count = 0;
                    while ( have_rows('three_line_preview_text', $product_id) ) : the_row();

                        if( $count < 3 ){
                            $description .= '"'.get_sub_field('new_line').'",';
                        }


                        $count++;
                    endwhile;

                    $description = substr( $description,0,-1 );

                endif;



        if( have_rows('technical_specifications_block', $product_id) ):
            $count_ch = 1 ;
            $count = 1 ;
            $description_header_ch = '';
            $description_value_ch = '';
            $description_header = '';
            $description_value = '';

            $oneChecked = false;
            while ( have_rows('technical_specifications_block', $product_id) ) : the_row();

                if( get_sub_field('show_in_preview_of_the_product')[0] == 'show' ){

                    if( $count_ch <= 4 ):

                        $oneChecked = true;
                        $description_header_ch .= json_encode(get_sub_field('haracteristic')).',';
                        $description_value_ch .= json_encode(get_sub_field('value')).',';

                    endif;

                }

                if( $count <= 4 ):
                    $description_header .= json_encode(get_sub_field('haracteristic')).',';
                    $description_value .= json_encode(get_sub_field('value')).',';
                    $count++;
                endif;


            endwhile;

            if( $oneChecked ){

                $result_h = $description_header_ch;
                $result_v = $description_value_ch;

            } else {
                $result_h = $description_header;
                $result_v = $description_value;
            }

            $result_h = substr( $result_h, 0, -1 );
            $result_v = substr( $result_v, 0, -1 );

        endif;

        if( $result_h ){
            $specification = '{
                    "head": ['.$result_h.'],
                    "content": ['.$result_v.']
                }';
        } else {
            $specification = '""';
        }



        $products .= ' {
            "name": "'.$categoryId.'",
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
                "specification": '.$specification.'
            },
            "price": ['.$salePrice.'],
            "oldPrice": ['.$regularPrice.'],
            "urlDetails": "'.$link.'"
        },';


    }

    $products = substr( $products, 0, -1 );

    $json_data = '{
    "products": [
       '.$products.'
    ],
    "settings": {
        "pagesAll": "'.$max.'",
        "currentPage": "'.$currentPage.'"
    }
}';

$json_data = str_replace("\r\n",'',$json_data);
$json_data = str_replace("\n",'',$json_data);

echo $json_data;
exit;

}

add_action('wp_ajax_get_filtered_products','get_filtered_products');

add_action('wp_ajax_nopriv_get_filtered_products', 'get_filtered_products');

function formatPriceForRanges( $value, $last = false ){

    if( $last ){
        $value  = 'and above';
        $above_flag = true;
    } else {
        $value = number_format( $value, 2, '.', ' ' );
        $above_flag = false;
    }

    return array($value,$above_flag);
}

add_action('woocommerce_add_to_cart', 'custome_add_to_cart');

function custome_add_to_cart() {

    global $woocommerce;
    
    $i = 0;

    do {
        $allProducts[] = $_POST["upsells_$i"];
        $i++;
    } while ( $_POST["upsells_$i"] != null );


    foreach ($allProducts as $product_id){

        $found = false;

        if ( sizeof( WC()->cart->get_cart() ) > 0 ) {
            foreach ( WC()->cart->get_cart() as $cart_item_key => $values ) {
                $_product = $values['data'];
                if ( $_product->id == $product_id )
                    $found = true;
            }
            // if product not found, add it
            if ( ! $found )
                WC()->cart->add_to_cart( $product_id );
        } else {
            // if no products in cart, add it
            WC()->cart->add_to_cart( $product_id );
        }

    }


}


function mc_checklist(
    $email, $debug = false,
    $apikey = '73c564882b33fedb38ccb3e03fcb4101-us15',
    $listid = '302397633b',
    $server = 'us15' )
{
    $userid = md5($email);
    $auth = base64_encode( 'user:'. $apikey );
    $data = array(
        'apikey'        => $apikey,
        'email_address' => $email
    );
    $json_data = json_encode($data);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://'.$server.'.api.mailchimp.com/3.0/lists/'.$listid.'/members/' . $userid);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json',
        'Authorization: Basic '. $auth));
    curl_setopt($ch, CURLOPT_USERAGENT, 'PHP-MCAPI/2.0');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
    $result = curl_exec($ch);
    if ($debug) {
        var_dump($result);
    }
    $json = json_decode($result);
    return $json->{'status'};
}