<?php
//required actions
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
add_filter('xmlrpc_enabled', '__return_false');
remove_action('wp_head', 'wlwmanifest_link');
// close required actions

add_action('init', 'myStartSession', 1);
function myStartSession() {
    if(!session_id()) {
        session_start();
    }
}

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

function upsellCategory() {

    register_taxonomy(
        'upsell_category',
        'product',
        array(
            'label' => __( 'Add a Upsell Category' ),
            'hierarchical' => false
        )
    );
}

add_action( 'init', 'upsellCategory' );

add_action('wp_enqueue_scripts', 'add_js');

/* styles and scripts*/
function add_js()
{

    wp_deregister_script('jquery');wp_register_script('jquery',get_template_directory_uri().'/assets/js/vendors/jquery-3.0.0.min.js');
    wp_register_script('swiper_js',get_template_directory_uri().'/assets/js/vendors/swiper.jquery.min.js');
    wp_register_script('slick_js',get_template_directory_uri().'/assets/js/vendors/slick.min.js');
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
        wp_enqueue_style('slick_css',get_template_directory_uri().'/assets/css/slick.css');
        wp_enqueue_style('rating_css',get_template_directory_uri().'/assets/css/rating.min.css');
        wp_enqueue_style('product_single_css',get_template_directory_uri().'/assets/css/product-single.css');
        wp_enqueue_style('perfect_scrollbar',get_template_directory_uri().'/assets/css/perfect-scrollbar.css');
        wp_enqueue_script('swiper_js');
        wp_enqueue_script('slick_js');
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

    if( is_product_category() || is_page_template('page-brands.php')){
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

    if( is_wc_endpoint_url('edit-address') ) {
        wp_enqueue_script('my-account_js');
        wp_enqueue_style('perfect_scrollbar',get_template_directory_uri().'/assets/css/perfect-scrollbar.css');
        wp_enqueue_script('perfect_js');
    }

}
if(is_admin()){
//    wp_enqueue_style('style', get_template_directory_uri().'/style.css');
    wp_enqueue_style('style', get_template_directory_uri().'/style.css');
}


if ( function_exists( 'add_theme_support' ) ) add_theme_support( 'post-thumbnails' );

register_nav_menus( array(
    'menu' => 'menu',
    'footer_menu' => 'Footer Menu',
    'footer_cat_menu' => 'Category Footer Menu'
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

        <div class="slider slider-for gallery-top">


    <?php foreach ($image_urls as $image_url) { ?>

        <div style="background-image:url(<?= $image_url ?>)" data-image="<?= $image_url ?>"></div>

   <?php  }  ?>
        </div>

          <?php if(count($image_urls) > 1): ?>
          <div class="slider slider-nav gallery-thumbs">

            <?php

        foreach ($image_urls as $image_url) { ?>
            <div>
                <div class="product__slider-thumbs" style="background-image:url(<?= $image_url ?>)"></div>
            </div>
        <?php }
        ?>
        </div>
            <?php endif; ?>

        </div>

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

        $price_formated = str_replace('<del>','<div>List Price: <del>',$price);
        $price_formated = str_replace('</del>','</del></div>',$price_formated);

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

        if( $currentAttrTax == 'color' ){

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

    if( !empty($terms) ):

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

//        $catName = str_replace($query,"<span>$query</span>",$catName);

        $pattern = preg_quote($query);
        $catName  = preg_replace("/($pattern)/i",
            '<span>$1</span>', $catName);


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

//                $catName = str_replace($query,"<span>$query</span>",$catName);

                $pattern = preg_quote($query);
                $catName  = preg_replace("/($pattern)/i",
                    '<span>$1</span>', $catName);

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
            $urlSubcategories = '';
            foreach ($product_terms as $term){

                if( $term->parent == 0 ){

                    $main_cat = json_encode($term->name);
                    $urlMainCategory = json_encode( get_term_link($term->term_id,'product_cat') );
                } else {

                    $sub_cat .= json_encode($term->name).',';
                    $urlSubcategories .= json_encode(get_term_link($term->term_id,'product_cat')).',';

                }

            }

            $sub_cat = substr( $sub_cat, 0, -1 );
            $urlSubcategories = substr( $urlSubcategories, 0, -1 );

            ( $salePrice )? $salePrice = $salePrice : $salePrice = '' ;
            ( $regularPrice )? $regularPrice = $regularPrice : $regularPrice = '' ;

            $salePrice = json_encode(wc_price($salePrice));
            $regularPrice = json_encode(wc_price($regularPrice));

            $products .= ' {
            "name": '.$name.',
            "src": "'.$thumb_url.'",
            "alt": '.$name.',
            "href": "'.get_the_permalink($item).'",
            "price": '.$regularPrice.',
            "oldPrice": '.$salePrice.',
            "categories": {
                "mainCategory": '.$main_cat.',
                "urlMainCategory": '.$urlMainCategory.',
                "subcategories": ['.$sub_cat.'],
                "urlSubcategories": ['.$urlSubcategories.']
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

$currentPage = $_GET['currentPage'];

$categoryId = $_GET['idCategory'];

    parse_str($string,$output);

    foreach ($output as $key => $item){

        $technicals[$key] = explode(',',$item );

    }
    $allCharacters = array();
    $attrColors = '';
    if(!empty($technicals)):
    foreach ( $technicals as $key => $technical){

        if(  $key == 'brand' || $key == 'choose_frame_type' ){

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

        }
        elseif( $key == 'pa_color' ){

            foreach ( $technical as $item ){

                $values[] = $item;

            }

            $attrColors =  array(
                'taxonomy' => 'pa_color',
                'terms' => $values,
                'operator'	=> 'IN'
            );


        }

        else {

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
    endif;


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
            $attrColors

        ),
        'meta_query' => array(
            'relation' => 'AND',
            $allCharacters
        )

    );

    $attrProducts = new WP_Query( $args );

    $max = $attrProducts->max_num_pages;

    $attrProducts = get_posts($args);

    wp_reset_postdata();

    $products = '';

    if(!empty($attrProducts)):

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
            if( $product_id == 2364 ){
                $sdf = json_encode($available_variations);

            }
            if(!empty($available_variations)):
            $var = array();

            foreach ($available_variations as $key => $variation){
                $var[$variation['display_regular_price']] = $variation['display_price'];
            }

            ksort($var);

            $old_price = '';
            $new_price = '';
            foreach ($var as  $key =>  $item){

                $old_price .= json_encode(wc_price($key)).',';

                if($item){

                    $new_price .= json_encode(wc_price($item)).',';
                } else {
                    $new_price .= '""'.',';
                }

            }
            $regularPrice = substr( $old_price, 0, -1 );
            $salePrice = substr( $new_price, 0, -1 );
            endif;

        } elseif( $currentProduct->is_type('simple') ) {

            $regularPrice = $currentProduct->get_regular_price();

            ($regularPrice) ? $regularPrice = $regularPrice : $regularPrice = '' ;

            $salePrice = $currentProduct->get_sale_price();

            if( !$salePrice ){
                $salePrice = $regularPrice;
                $regularPrice ='';
            }

            $regularPrice = json_encode(wc_price($regularPrice));

            $salePrice = json_encode(wc_price($salePrice));



        }

        $description = '';
        if( have_rows('three_line_preview_text', $product_id) ):
                    $count = 0;
                    while ( have_rows('three_line_preview_text', $product_id) ) : the_row();

                        if( $count < 3 ){
                            $description .= json_encode(get_sub_field('new_line')).',';
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

    endif;

    $products = substr( $products, 0, -1 );

    $json_data = '{
    "products": [
       '.$products.'
    ],
    "settings": {
        "pagesAll": "'.$max.'",
        "currentPage": "'.$currentPage.'",
        "oput" : '.json_encode($outwed).'
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

        $trueValue = $value;

        $value = number_format( $value, 2, '.', ' ' );
        $above_flag = false;
    }

    return array($value,$above_flag,$trueValue);
}

add_action('woocommerce_add_to_cart', 'custome_add_to_cart',2);

function custome_add_to_cart() {

    global $woocommerce;

    $mainProduct = $_POST['add-to-cart'];

    if( WC()->session->get('upsellFlag') == 0 ):

        WC()->session->set('upsellFlag',1);

         $i = 0;

        $upSellsArray = array();

    do {

        $allProducts[] = $_POST["upsells_$i"];

        $i++;

    } while ( $_POST["upsells_$i"] != null );

    foreach ($allProducts as $product_id){

        if( $product_id == 0 ){
            continue;
        }

        WC()->cart->add_to_cart( $product_id );

        if( $newUpsells = WC()->session->get($mainProduct) ){

            if( isset( $newUpsells[$product_id]) ){
                $newUpsells[$product_id]['count']++;
            } else {
                $newUpsells[$product_id]['count'] = 1;
            }

        } else {
            $newUpsells = array();
            $newUpsells[$product_id]['count'] = 1;
        }


        WC()->session->set($mainProduct,$newUpsells);

    }
        WC()->session->set('needUpdate',1);

        WC()->session->set('upsellFlag',0);

        $newUpsells = WC()->session->get($mainProduct);
      
    endif;

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
        
    }
    $json = json_decode($result);
    return $json->{'status'};
}

    function custom_registration_redirect() {

        $_SESSION['wb_reg'] = 'Successful Registration';

        return get_permalink(13);

    }

    add_action('woocommerce_registration_redirect', 'custom_registration_redirect', 2);


add_filter( 'wpsl_templates', 'custom_templates' );

function custom_templates( $templates ) {

    $templates[] = array (
        'id'   => 'custom',
        'name' => 'AAM template',
        'path' => get_stylesheet_directory() . '/' . 'wpsl-templates/custom.php',
    );

    return $templates;
}

add_filter( 'wpsl_listing_template', 'wb_wpsl_create_underscore_templates' );

function wb_wpsl_create_underscore_templates() {

        global $wpsl, $wpsl_settings;

        $listing_template = '<li data-store-id="<%= id %>">' . "\r\n";
        $listing_template .= '<a href="<%= permalink %>"></a>'. "\r\n";
        $listing_template .= "\t\t" . '<div class="wpsl-store-location">' . "\r\n";
        $listing_template .= "\t\t\t" . '<p><%= thumb %>' . "\r\n";
        $listing_template .= "\t\t\t\t" . wpsl_store_header_template( 'listing' ) . "\r\n"; // Check which header format we use
        $listing_template .= '<% if ( my_textinput ) { %>' . "\r\n";
        $listing_template .= "\t\t" . '<span class="service_type"><%= my_textinput %></span>' . "\r\n";
        $listing_template .= '<% } %>' . "\r\n";
        $listing_template .= "\t\t\t\t" . '<span class="wpsl-street"><strong>Address:</strong> <%= address %></span>' . "\r\n";
        $listing_template .= "\t\t\t\t" . '<% if ( address2 ) { %>' . "\r\n";
        $listing_template .= "\t\t\t\t" . '<span class="wpsl-street"><%= address2 %></span>' . "\r\n";
        $listing_template .= "\t\t\t\t" . '<% } %>' . "\r\n";
        $listing_template .= "\t\t\t\t" . '<span>' . wpsl_address_format_placeholders() . '</span>' . "\r\n"; // Use the correct address format

        if ( !$wpsl_settings['hide_country'] ) {
            $listing_template .= "\t\t\t\t" . '<span class="wpsl-country"><%= country %></span>' . "\r\n";
        }

        $listing_template .= "\t\t\t" . '</p>' . "\r\n";



        // Show the phone, fax or email data if they exist.
        if ( $wpsl_settings['show_contact_details'] ) {
            $listing_template .= "\t\t\t" . '<p class="wpsl-contact-details">' . "\r\n";
            $listing_template .= "\t\t\t" . '<% if ( phone ) { %>' . "\r\n";
            $listing_template .= "\t\t\t" . '<span><strong>' . esc_html( $wpsl->i18n->get_translation( 'phone_label', __( 'Phone', 'wpsl' ) ) ) . '</strong>: <%= formatPhoneNumber( phone ) %></span>' . "\r\n";
            $listing_template .= "\t\t\t" . '<% } %>' . "\r\n";
            $listing_template .= "\t\t\t" . '<% if ( fax ) { %>' . "\r\n";
            $listing_template .= "\t\t\t" . '<span><strong>' . esc_html( $wpsl->i18n->get_translation( 'fax_label', __( 'Fax', 'wpsl' ) ) ) . '</strong>: <%= fax %></span>' . "\r\n";
            $listing_template .= "\t\t\t" . '<% } %>' . "\r\n";
            $listing_template .= "\t\t\t" . '<% if ( email ) { %>' . "\r\n";
            $listing_template .= "\t\t\t" . '<span><strong>' . esc_html( $wpsl->i18n->get_translation( 'email_label', __( 'Email', 'wpsl' ) ) ) . '</strong>: <%= email %></span>' . "\r\n";
            $listing_template .= "\t\t\t" . '<% } %>' . "\r\n";
            $listing_template .= "\t\t\t" . '</p>' . "\r\n";
        }

        $listing_template .= "\t\t\t" . wpsl_more_info_template() . "\r\n"; // Check if we need to show the 'More Info' link and info
        $listing_template .= "\t\t" . '</div>' . "\r\n";
        $listing_template .= "\t\t" . '<div class="wpsl-direction-wrap">' . "\r\n";

        if ( !$wpsl_settings['hide_distance'] ) {
            $listing_template .= "\t\t\t" . '<%= distance %> ' . esc_html( $wpsl_settings['distance_unit'] ) . '' . "\r\n";
        }

        $listing_template .= "\t\t\t" . '<%= createDirectionUrl() %>' . "\r\n";
        $listing_template .= "\t\t" . '</div>' . "\r\n";

        $listing_template .= "\t" . '</li>';

        return $listing_template;
  }

add_filter( 'wpsl_marker_props', 'custom_marker_props' );

function custom_marker_props( $marker_props ) {

    $marker_props['scaledSize'] = '50,66'; // Set this to 50% of the original size
    $marker_props['origin'] = '0,0';
    $marker_props['anchor'] = '12,35';

    return $marker_props;
}

add_filter( 'wpsl_admin_marker_dir', 'custom_admin_marker_dir' );

function custom_admin_marker_dir() {

    $admin_marker_dir = get_stylesheet_directory() . '/wpsl-markers/';

    return $admin_marker_dir;
}

define( 'WPSL_MARKER_URI', dirname( get_bloginfo( 'stylesheet_url') ) . '/wpsl-markers/' );

function getFilters( $catId ){

    $fieldsList = array();

    $filtersFieldsRanges = array(
        'seat_width',
        'weight',
        'top_speed',
        'main_use',
        'drive_range',
        'chair_size',
        'overall_width',
        'base_width_open'
    );

    $filtersFieldsRangesLabels = array(
        "Seat Width",
        "Weight Capacity",
        "Top speed",
        "Turning radius",
        "Drive Range",
        "Chair size",
        "Overall width",
        "Base width open"
    );

    $filtersFieldsLists = array(
        "brand",
        "choose_frame_type"
    );

    $filtersFieldsListsLabels = array(
        "Brand",
        "Frame Type"
    );

    foreach ( $filtersFieldsLists as $key => $field ) {

        if( $allValues = checkFiledInCategory( $field, $catId ) ) {

            $fieldsList[$field] = $allValues;

            $fieldsList[$field]['name'] = $filtersFieldsListsLabels[$key];

        }

    }

    $resultsArray['list'] = $fieldsList;

    foreach ( $filtersFieldsRanges as $key => $field ) {

        $range = getRangesByFiled( $field, $catId );

        if( !empty($range) ){

            $resultsArray['ranges'][$field] = $range;

            $resultsArray['ranges'][$field]['name'] = $filtersFieldsRangesLabels[$key];
            $resultsArray['ranges'][$field]['unit'] = getUnitByKey($field);

        }

    }

    return $resultsArray;

}

function checkFiledInCategory( $field, $catId ){

    $args = array (
        'post_type'  => 'product',
        'posts_per_page' => -1,
        'meta_value' => '',
        'fields' => 'ids',
        'tax_query'  => array(
            'relation' => 'AND',
            array(
                'taxonomy' => 'product_cat',
                'field' => 'term_id',
                'terms' => $catId
            )

        ),
        'meta_query' => array(
            array(
                'key' => $field,
                'value'   => array(''),
                'compare' => 'NOT IN'
            )

        )
    );

    $attrProducts = get_posts($args);

    if( count($attrProducts) > 0 ){

        foreach ( $attrProducts as $attrProduct ){

            $result[] = get_field( $field, $attrProduct );

        }

        $result = array_count_values($result);
    } else {

        $result  = false;

    }

    return $result;

}

function getRangesByFiled( $field, $catId ){

    $args = array (
        'post_type'  => 'product',
        'posts_per_page' => -1,
        'meta_value' => '',
        'fields' => 'ids',
        'tax_query'  => array(
            'relation' => 'AND',
            array(
                'taxonomy' => 'product_cat',
                'field' => 'term_id',
                'terms' => $catId
            ),

        ),
        'meta_query' => array(
            array(
                'key' => $field,
                'value'   => array(''),
                'compare' => 'NOT IN'
            )
        )
    );


    $attrProducts = get_posts($args);

    $fieldsValues = array();

    if(!empty($attrProducts)):

    foreach ( $attrProducts as $productId ) {

        $fieldsValues[$field][] = intval( get_field( $field, $productId ) );

    }

    $uniqueArray  = array_unique($fieldsValues[$field]);

    $uniqueArrayCount = count($uniqueArray);

    if( $uniqueArrayCount >= 4 ){
        $rangeCount = 4;
    }
    elseif( $uniqueArrayCount == 1 ){
        $rangeCount = -1;
    }
    else {
        $rangeCount = $uniqueArrayCount;
    }

        if( $rangeCount != -1 ):

        $max = max($fieldsValues[$field]);

        $min = min($fieldsValues[$field]);



            $values = $max - $min;

            $perRangeValue = ceil( $values/$rangeCount );


            $rangesArray = array();

            for( $i = 1; $i <= ( $rangeCount + 1 ) ; $i++ ){

                $maxRange = intval( floor ( $perRangeValue*$i ) ) + $min - 0.01;

                $minRange = intval( floor (  $perRangeValue*( $i-1 ) ) ) + $min;


                if( $i == 1 ){

                    $minRange = $min;

                }
                elseif( ( $rangeCount + 1 ) == $i ) {

                    $maxRange = 9999999999;

                }

                $rangesArray[$i] = array( $minRange, $maxRange );

            }

        else :

            $rangesArray = array();

        endif;

    endif;



    return $rangesArray;

}

function checkProductCountByField( $min, $max, $field,  $catID ){

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
                'key' => $field,
                'value' => array( $min, $max ),
                'compare' => 'BETWEEN',
                'type' => 'NUMERIC'
            )

        )
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

function getUnitByKey( $key ){

    $filtersFieldsRangesUnits = array(
         'seat_width' => '”',
        'weight' => 'lbs',
        'top_speed' => 'Mph',
        'main_use' => '”',
        'drive_range' => 'Miles',
        'chair_size',
        'overall_width' => '”',
        'base_width_open' => '”'
    );

    return $filtersFieldsRangesUnits[$key];
}

function  countHidenUpsells(){

    $allUpsellsProducts = array();

    foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {

        $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

        $allUpsellsProducts[] = WC()->session->get($product_id);

    }

    $mainRepeat = array();

    foreach ( $allUpsellsProducts as $eachMainUpsells ){

        if( is_array($eachMainUpsells) ):

        foreach (  $eachMainUpsells as  $key => $eachMainUpsell ){

            if( $mainRepeat[$key] ){

                $mainRepeat[$key] += $eachMainUpsell['count'];

            } else {

                $mainRepeat[$key] = $eachMainUpsell['count'];

            }

        }

        endif;
    }


    return $mainRepeat;

}

add_filter( 'wpsl_info_window_template', 'custom_info_window_template' );

function custom_info_window_template() {

    global $wpsl;

    $info_window_template = '<div  data-store-id="<%= id %>" class="wpsl-info-window">'. "\r\n";
    $info_window_template .= "\t\t" . '<p>' . "\r\n";
    $info_window_template .= "\t\t\t" .  wpsl_store_header_template() . "\r\n";
    $info_window_template .= "\t\t\t" . '<span><span class="wpsl-info-window-label">Address:</span> <%= address %></span>' . "\r\n";
    $info_window_template .= "\t\t\t" . '<% if ( address2 ) { %>' . "\r\n";
    $info_window_template .= "\t\t\t" . '<span><%= address2 %></span>' . "\r\n";
    $info_window_template .= "\t\t\t" . '<% } %>' . "\r\n";
    $info_window_template .= "\t\t\t" . '<span>' . wpsl_address_format_placeholders() . '</span>' . "\r\n";
    $info_window_template .= "\t\t" . '</p>' . "\r\n";
    $info_window_template .= "\t\t" . '<% if ( phone ) { %>' . "\r\n";
    $info_window_template .= "\t\t" . '<span><strong>' . esc_html( $wpsl->i18n->get_translation( 'phone_label', __( 'Phone', 'wpsl' ) ) ) . '</strong>: <%= formatPhoneNumber( phone ) %></span>' . "\r\n";
    $info_window_template .= "\t\t" . '<% } %>' . "\r\n";
    $info_window_template .= "\t\t" . '<% if ( fax ) { %>' . "\r\n";
    $info_window_template .= "\t\t" . '<span><strong>' . esc_html( $wpsl->i18n->get_translation( 'fax_label', __( 'Fax', 'wpsl' ) ) ) . '</strong>: <%= fax %></span>' . "\r\n";
    $info_window_template .= "\t\t" . '<% } %>' . "\r\n";
    $info_window_template .= "\t\t" . '<% if ( email ) { %>' . "\r\n";
    $info_window_template .= "\t\t" . '<span><strong>' . esc_html( $wpsl->i18n->get_translation( 'email_label', __( 'Email', 'wpsl' ) ) ) . '</strong>: <%= email %></span>' . "\r\n";
    $info_window_template .= "\t\t" . '<% } %>' . "\r\n";

    /**
     * Include the data from a custom field called 'my_textinput'.
     *
     * Before you can access the 'my_textinput' data in the template,
     * you first need to make sure the data is included in the JSON output.
     *
     * You can make the data accessible through the wpsl_frontend_meta_fields filter.
     */


    $info_window_template .= "\t\t" . '<%= createInfoWindowActions( id ) %>' . "\r\n";

    $info_window_template .= "\t" . '<a class="wpsl-info-actions_view_more" href="<%= permalink %>">View More</a>' . "\r\n";
    $info_window_template .= "\t" . '</div>' . "\r\n";

    return $info_window_template;

}

function updateFrameType() {

    $args = array (
        'post_type'  => 'product',
        'posts_per_page' => -1,
        'fields' => 'ids'
    );

    $attrProducts =  get_posts($args);
    echo 'qwe';
    foreach ($attrProducts as $item) {

//
        if ($value = get_field('choose_frame_type', $item) === 'Disassembles') {
            echo '<h2>'.get_field('choose_frame_type', $item). '</h2> id =   '. $item.'<br>';
            update_post_meta( $item, 'choose_frame_type', 'disassembles' );
        }

        if ($value = get_field('choose_frame_type', $item) === 'Rigid') {
            echo '<h2>'.get_field('choose_frame_type', $item). '</h2> id =   '. $item.'<br>';
            update_post_meta( $item, 'choose_frame_type', 'rigid' );
        }


//        wp_update_post($item);

    }

}