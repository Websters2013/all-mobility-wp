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

    wp_deregister_script('jquery');

    wp_register_script('jquery',get_template_directory_uri().'/assets/js/vendors/jquery-2.2.1.min.js');

    wp_register_script('swiper_js',get_template_directory_uri().'/assets/js/vendors/swiper.jquery.min.js');
    
    wp_register_script('index_js',get_template_directory_uri().'/assets/js/index.min.js');
    wp_register_script('perfect_js',get_template_directory_uri().'/assets/js/vendors/perfect-scrollbar.jquery.min.js');
    wp_register_script('product_js',get_template_directory_uri().'/assets/js/product.min.js');
    wp_register_script('category_js',get_template_directory_uri().'/assets/js/category.min.js');
    wp_register_script('rating_js',get_template_directory_uri().'/assets/js/vendors/rating.js');

    wp_enqueue_script('jquery');

    wp_register_script('app',get_template_directory_uri().'/assets/js/app.min.js');

    if (is_page_template('page-home.php')){
        wp_enqueue_style('index_css', get_template_directory_uri().'/assets/css/index.css');
        wp_enqueue_style('swiper_css',get_template_directory_uri().'/assets/css/swiper.min.css');
        wp_enqueue_script('swiper_js');
        wp_enqueue_script('index_js');
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

    if( is_product_category() ){
        wp_enqueue_style('perfect_scrollbar',get_template_directory_uri().'/assets/css/perfect-scrollbar.css');
        wp_enqueue_style('category_css',get_template_directory_uri().'/assets/css/category-single.css');
        wp_enqueue_script('perfect_js');
        wp_enqueue_script('category_js');
    }

}

wp_enqueue_style('style', get_template_directory_uri().'/style.css');

if ( function_exists( 'add_theme_support' ) ) add_theme_support( 'post-thumbnails' );

register_nav_menus( array(
    'menu' => 'menu'
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
    if(!empty($attachment_ids)): ?>

        <!-- product__slider -->
        <div class="product__slider">

        <div class="swiper-container gallery-top">
        <div class="swiper-wrapper">
    
    <?php foreach ($image_urls as $image_url) { ?>

        <div class="swiper-slide" style="background-image:url(<?= $image_url ?>)"></div>
        
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

    AND {$wpdb->postmeta}.meta_key = '_price'

  ";

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

            $product_terms  = wp_get_object_terms( 79, 'product_cat');

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

    $productsSearch .= '"products": [
        {
            "name": "Product1",
            "src": "pic/lift-chairs.png",
            "alt": "picture",
            "href": "#",
            "price": "10000$",
            "oldPrice": "20000$",
            "categories": {
                "mainCategory": "main category 1",
                "subcategories": ["subcategory1-1", "subcategory1-2", "subcategory1-3"]
            }
        }
    ]';

    $json_data = '{'.$categories.','.$products .'}';

    $json_data = str_replace("\r\n",'',$json_data);

    $json_data = str_replace("\n",'',$json_data);

    echo $json_data;

    exit;
    
}

add_action('wp_ajax_main_search','main_search');

add_action('wp_ajax_nopriv_main_search', 'main_search');

function getTermsForSearch( $query ){
    
    $terms = get_terms(
        array(
            'taxonomy' => 'product_cat',
            'hide_empty' => false,
            'search' => $query,
            'number' => 12,
            'fields' => 'id=>parent'
        )
    );
    
    return $terms;
    
}

function getProductsSearch( $query ){

    $products = get_posts(

        array(
            'post_type' => 'product',
            'posts_per_page' => 6,
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

$value = $_GET['value'];

$value = parse_str($_GET, $value);

$json_data = '{
    "products": [
        {
            "name": "s",
            "featured": "featured",
            "picture": "pic/mobile-scooters-heavy-duty.jpg",
            "title": "Product Title Even if it’s a Long one it fits (8000 Mph)",
            "content": {
                "description": ["Short bullet list of main chct if it’s pretty long or short", "Shoulmain keywords users will", "Will be limited to 3 points"],
                "specification": {
                    "head": ["Top Speed","Drive Range","Seat Width","Foldable"],
                    "content": ["3.5 mph","8.7 miles","17”","Yes"]
                }
            },
            "price": "$1,800.00",
            "oldPrice": "$1,999",
            "urlDetails": "#"
        },
        {
            "name": "category2",
            "featured": "featured",
            "picture": "pic/mobile-scooters-heavy-duty.jpg",
            "title": "Product Title Even if it’s a Long one it fits (8000 Mph)",
            "rate": {
                "starsCount": "3",
                "reviewsCount": "20 Reviews",
                "urlReviews": "#"
            },
            "content": {
                "specification": {
                    "head": ["Top Speed","Drive Range","Seat Width","Foldable"],
                    "content": ["3.5 mph","8.7 miles","17”","Yes"]
                }
            },
            "price": "$1,800.00",
            "oldPrice": "$1,999",
            "urlDetails": "#"
        },
        {
            "name": "category3",
            "picture": "pic/mobile-scooters-heavy-duty.jpg",
            "title": "Product Title Even if it’s a Long one it fits (8000 Mph)",
            "rate": {
                "starsCount": "4",
                "reviewsCount": "30 Reviews",
                "urlReviews": "#"
            },
            "content": {
                "description": ["Short bullet list of main characteristics of the product if it’s pretty long or short", "Should contain main keywords users will", "Will be limited to 3 points"],
                "specification": {
                    "head": ["Top Speed","Drive Range","Seat Width","Foldable"],
                    "content": ["3.5 mph","8.7 miles","17”","Yes"]
                }
            },
            "price": "$1,800.00",
            "oldPrice": "$1,999",
            "urlDetails": "#"
        },
        {
            "name": "category4",
            "picture": "pic/mobile-scooters-heavy-duty.jpg",
            "title": "Product Title Even if it’s a Long one it fits (8000 Mph)",
            "rate": {
                "starsCount": "2",
                "reviewsCount": "10 Reviews",
                "urlReviews": "#"
            },
            "content": {
                "description": ["Short bullet list of main characteristics of the product if it’s pretty long or short", "Should contain main keywords users will", "Will be limited to 3 points"],
                "specification": {
                    "head": ["Top Speed","Drive Range","Seat Width","Foldable"],
                    "content": ["3.5 mph","8.7 miles","17”","Yes"]
                }
            },
            "price": "$1,800.00",
            "urlDetails": "#"
        }
    ]
}';



$json_data = str_replace("\r\n",'',$json_data);
$json_data = str_replace("\n",'',$json_data);

echo $json_data;
exit;



}

add_action('wp_ajax_get_filtered_products','get_filtered_products');

add_action('wp_ajax_nopriv_get_filtered_products', 'get_filtered_products');