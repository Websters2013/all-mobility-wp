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

    wp_enqueue_script('jquery');

    wp_register_script('app',get_template_directory_uri().'/assets/js/app.min.js');

    if (is_page_template('page-home.php')){
        wp_enqueue_style('index_css', get_template_directory_uri().'/assets/css/index.css');
        wp_enqueue_style('swiper_css',get_template_directory_uri().'/assets/css/swiper.min.css');
        wp_enqueue_script('swiper_js');
        wp_enqueue_script('index_js');
    } else {
        wp_enqueue_style('index_css', get_template_directory_uri().'/assets/css/index.css');
        wp_enqueue_style('swiper_css',get_template_directory_uri().'/assets/css/swiper.min.css');
        wp_enqueue_script('swiper_js');
        wp_enqueue_script('index_js');
    }

    if( is_singular( 'product' ) ){
        wp_enqueue_style('swiper_css',get_template_directory_uri().'/assets/css/swiper.min.css');
        wp_enqueue_style('product_single_css',get_template_directory_uri().'/assets/css/product-single.css');
        wp_enqueue_style('perfect_scrollbar',get_template_directory_uri().'/assets/css/perfect-scrollbar.css');
        wp_enqueue_script('swiper_js');
        wp_enqueue_script('perfect_js');
        wp_enqueue_script('product_js');
    }

}

wp_enqueue_style('style', get_template_directory_uri().'/style.css');

if ( function_exists( 'add_theme_support' ) ) add_theme_support( 'post-thumbnails' );

register_nav_menus( array(
    'menu' => 'menu'
) );

function wb_paginate_links( $args = '' ) {
    global $wp_query, $wp_rewrite;

    // Setting up default values based on the current URL.
    $pagenum_link = html_entity_decode( get_pagenum_link() );
    $url_parts    = explode( '?', $pagenum_link );

    // Get max pages and current page out of the current query, if available.
    $total   = isset( $wp_query->max_num_pages ) ? $wp_query->max_num_pages : 1;
    $current = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;

    // Append the format placeholder to the base URL.
    $pagenum_link = trailingslashit( $url_parts[0] ) . '%_%';

    // URL base depends on permalink settings.
    $format  = $wp_rewrite->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
    $format .= $wp_rewrite->using_permalinks() ? user_trailingslashit( $wp_rewrite->pagination_base . '/%#%', 'paged' ) : '?paged=%#%';

    $defaults = array(
        'base' => $pagenum_link, // http://example.com/all_posts.php%_% : %_% is replaced by format (below)
        'format' => $format, // ?page=%#% : %#% is replaced by the page number
        'total' => $total,
        'current' => $current,
        'show_all' => false,
        'prev_next' => true,
        'prev_text' => __('&laquo; Previous'),
        'next_text' => __('Next &raquo;'),
        'end_size' => 1,
        'mid_size' => 2,
        'type' => 'plain',
        'add_args' => array(), // array of query args to add
        'add_fragment' => '',
        'before_page_number' => '',
        'after_page_number' => ''
    );

    $args = wp_parse_args( $args, $defaults );

    if ( ! is_array( $args['add_args'] ) ) {
        $args['add_args'] = array();
    }

    // Merge additional query vars found in the original URL into 'add_args' array.
    if ( isset( $url_parts[1] ) ) {
        // Find the format argument.
        $format = explode( '?', str_replace( '%_%', $args['format'], $args['base'] ) );
        $format_query = isset( $format[1] ) ? $format[1] : '';
        wp_parse_str( $format_query, $format_args );

        // Find the query args of the requested URL.
        wp_parse_str( $url_parts[1], $url_query_args );

        // Remove the format argument from the array of query arguments, to avoid overwriting custom format.
        foreach ( $format_args as $format_arg => $format_arg_value ) {
            unset( $url_query_args[ $format_arg ] );
        }

        $args['add_args'] = array_merge( $args['add_args'], urlencode_deep( $url_query_args ) );
    }

    // Who knows what else people pass in $args
    $total = (int) $args['total'];
    if ( $total < 2 ) {
        return;
    }
    $current  = (int) $args['current'];
    $end_size = (int) $args['end_size']; // Out of bounds?  Make it the default.
    if ( $end_size < 1 ) {
        $end_size = 1;
    }
    $mid_size = (int) $args['mid_size'];
    if ( $mid_size < 0 ) {
        $mid_size = 2;
    }
    $add_args = $args['add_args'];
    $r = '';
    $page_links = array();
    $dots = false;
    if ( $args['prev_next'] && $current && ( $current < $total || -1 == $total ) ) :
        $link = str_replace( '%_%', $args['format'], $args['base'] );
        $link = str_replace( '%#%', $current + 1, $link );
        if ( $add_args )
            $link = add_query_arg( $add_args, $link );
        $link .= $args['add_fragment'];

        /** This filter is documented in wp-includes/general-template.php */
        $page_links[] = '<a class="pagination__prev page-numbers disabled">' . $args['prev_text'] . '</a>';
        $page_links[] = '<a class="pagination__next page-numbers" href="' . esc_url( apply_filters( 'paginate_links', $link ) ) . '">' . $args['next_text'] . '</a>';
    endif;
    if ( $args['prev_next'] && $current && 1 < $current ) :
        $link = str_replace( '%_%', 2 == $current ? '' : $args['format'], $args['base'] );
        $link = str_replace( '%#%', $current - 1, $link );
        if ( $add_args )
            $link = add_query_arg( $add_args, $link );
        $link .= $args['add_fragment'];

        /**
         * Filter the paginated links for the given archive pages.
         *
         * @since 3.0.0
         *
         * @param string $link The paginated link URL.
         */
        $page_links[] = '<a class="pagination__prev page-numbers" href="' . esc_url( apply_filters( 'paginate_links', $link ) ) . '">' . $args['prev_text'] . '</a>';
        $page_links[] = '<a class="pagination__next page-numbers disabled">' . $args['next_text'] . '</a>';
    endif;

    for ( $n = 1; $n <= $total; $n++ ) :

        if($n ==1){
            $page_links[] = '<div class="pagination__wrap">';
        }

        if ( $n == $current ) :
            $page_links[] = "<span class='pagination__item active'>" . $args['before_page_number'] . number_format_i18n( $n ) . $args['after_page_number'] . "</span>";
            $dots = true;
        else :
            if ( $args['show_all'] || ( $n <= $end_size || ( $current && $n >= $current - $mid_size && $n <= $current + $mid_size ) || $n > $total - $end_size ) ) :
                $link = str_replace( '%_%', 1 == $n ? '' : $args['format'], $args['base'] );
                $link = str_replace( '%#%', $n, $link );
                if ( $add_args )
                    $link = add_query_arg( $add_args, $link );
                $link .= $args['add_fragment'];

                /** This filter is documented in wp-includes/general-template.php */
                $page_links[] = "<a class='pagination__item' href='" . esc_url( apply_filters( 'paginate_links', $link ) ) . "'>" . $args['before_page_number'] . number_format_i18n( $n ) . $args['after_page_number'] . "</a>";
                $dots = true;
            elseif ( $dots && ! $args['show_all'] ) :
                $page_links[] = '<span class="page-numbers dots">' . __( '&hellip;' ) . '</span>';
                $dots = false;
            endif;
        endif;

    endfor;
    $page_links[]='</div>';
    switch ( $args['type'] ) {
        case 'array' :
            return $page_links;

        case 'list' :
            $r .= "<ul class='page-numbers'>\n\t<li>";
            $r .= join("</li>\n\t<li>", $page_links);
            $r .= "</li>\n</ul>\n";
            break;

        default :
            $r = join("\n", $page_links);
            break;
    }
    return $r;
}

function theme_pagination() {
    global $projects, $wp_rewrite;
    $pages = '';
    $max = $projects->max_num_pages;
    if (!$current = get_query_var('paged')) $current = 1;
    $a['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));
    $a['total'] = $max;
    $a['current'] = $current;

    $total = 1; //1 - выводить текст "Страница N из N", 0 - не выводить
    $a['mid_size'] = 3; //сколько ссылок показывать слева и справа от текущей
    $a['end_size'] = 1; //сколько ссылок показывать в начале и в конце
    $a['prev_text'] = ''; //текст ссылки "Предыдущая страница"
    $a['next_text'] = ''; //текст ссылки "Следующая страница"
    $a['class'] = 'new'; //текст ссылки "Следующая страница"

    if ($max > 1) echo '<div class="pagination">';

    echo $pages . wb_paginate_links($a);
    if ($max > 1) echo '</div>';
}

function get_posts_current(){


}

add_action('wp_ajax_get_posts','get_posts_current');

add_action('wp_ajax_nopriv_get_posts', 'get_posts_current');


//Remove wrappers
remove_action('woocommerce_before_main_content','woocommerce_output_content_wrapper',10);
remove_action('woocommerce_before_main_content','woocommerce_breadcrumb',20);
remove_action('woocommerce_after_main_content','woocommerce_output_content_wrapper_end',10);
remove_action('woocommerce_get_sidebar','woocommerce_sidebar',10);

add_action('wb_woocommerce_single_product_summary','woocommerce_template_single_title', 5);
add_action('wb_woocommerce_single_product_summary','woocommerce_template_single_rating', 10);
add_action('wb_woocommerce_single_product_summary','woocommerce_template_single_excerpt', 20);
add_action('wb_slider_preview','get_preview_slider', 5);
add_action('wb_product_review','woocommerce_output_product_data_tabs',5);
add_filter( 'woocommerce_get_price_html', 'custom_price_html', 100, 2 );

function wb_get_content (){
    echo get_the_content();
}

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


function custom_price_html( $price, $product ){

    if( is_singular('product') ){

        $price_formated = str_replace('<del>','<del>List Price: ',$price);

        return str_replace( '<ins>', '', $price_formated );
    } else {
        
        return str_replace( '<ins>', '', $price );
    }


}

//woocommerce get lowest price in category
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



