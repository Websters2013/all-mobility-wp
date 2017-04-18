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

    wp_enqueue_script('jquery');

    wp_register_script('app',get_template_directory_uri().'/assets/js/app.min.js');

    if (is_page_template('page-home.php')){

        wp_enqueue_style('index_css', get_template_directory_uri().'/assets/css/index.css');

        wp_enqueue_style('swiper_css',get_template_directory_uri().'/assets/css/swiper.min.css');

        wp_enqueue_script('swiper_js');

        wp_enqueue_script('index_js');
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

    $json_data='';
    $cur='';
    $paged=$_GET['currentPage']+1;
    $param = $_GET['filterData'];
    parse_str($param);

    if($k1){

        $range_1 = array(
            'key' => 'project_footage',
            'value' => array(100,1000),
            'compare' => 'BETWEEN',
            'type' => 'NUMERIC',
        );

    }
    if($k3){
        $range_2 = array(
            'key' => 'project_footage',
            'value' => array(1000,3000),
            'compare' => 'BETWEEN',
            'type' => 'NUMERIC',
        );

    }
    if($k6){

        $range_3 = array(
            'key' => 'project_footage',
            'value' => array(3000,6000),
            'compare' => 'BETWEEN',
            'type' => 'NUMERIC',
        );

    }
    if($k15){

        $range_4 = array(
            'key' => 'project_footage',
            'value' => array(6000,999999),
            'compare' => 'BETWEEN',
            'type' => 'NUMERIC',
        );

    }

    $args = array(
        'paged' => $paged,
        'post_type' => 'project',
        'posts_per_page' => '6',
        'post_status' => 'publish',
        'meta_query' => array(
            'relation' => 'OR',
            $range_1,
            $range_2,
            $range_3,
            $range_4,
        ),
    );
    $projects = new WP_query ( $args );
    $max = $projects->max_num_pages;

    if ( $projects->have_posts() ) {

        $json_data='';
        $cur='';
        while ( $projects->have_posts()) :

            $col = 10;
            $projects->the_post();

            $thumb_id = get_post_thumbnail_id();
            $thumb_url = wp_get_attachment_image_src($thumb_id,'full')[0];
            $current_icon_footage = get_field('project_footage');
            if($current_icon_footage <= 1000){
                $cur_footage = "<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 46 46'><path class='cls-1' d='M36.17,29.87L24.69,24.05V18a0.3,0.3,0,0,0-.16-0.26L13.08,11.33a0.31,0.31,0,0,0-.31,0,0.3,0.3,0,0,0-.15.26V30.27a0.27,0.27,0,0,0,0,.08,0.3,0.3,0,0,0,0,.12,0.3,0.3,0,0,0,.16.27l11.46,6.44a0.31,0.31,0,0,0,.15,0,0.3,0.3,0,0,0,.15,0L36.18,30.4A0.3,0.3,0,0,0,36.17,29.87ZM24.08,18.21v5.85L13.24,30V12.11Zm0,6.54V36.38L13.56,30.47Zm0.61,11.62V24.74l10.7,5.42Z'/></svg>";
            }
            elseif($current_icon_footage <= 3000){
                $cur_footage = "<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 46 46'><path class='cls-1' d='M35.64,21.8a0.31,0.31,0,0,0-.17-0.26l-7.74-4,7.71-4.37a0.31,0.31,0,0,0,0-.54L24,6.37a0.31,0.31,0,0,0-.29,0L12.12,12.66a0.31,0.31,0,0,0-.16.27,0.3,0.3,0,0,0,.06.18v8.82a0.27,0.27,0,0,0,0,.41v9.57a0.31,0.31,0,0,0,.15.26l11.46,6.94a0.3,0.3,0,0,0,.16,0,0.31,0.31,0,0,0,.31-0.31V28.76l11.4-6.69A0.31,0.31,0,0,0,35.64,21.8ZM23.82,7l10.85,5.95-7.59,4.3-3.25-1.67a0.31,0.31,0,0,0-.29,0l-3,1.66L12.9,12.94Zm-3.3,10.94,3,1.67v8.57l-10.61-6Zm-7.88,3.63V13.49l7.25,4.09Zm11.18-2.48-2.66-1.5,2.54-1.4,2.75,1.41ZM12.64,31.74v-9l10.84,6.16v9.44Zm11.46-3.69V19.64l3-1.7,7.6,3.89Z'/></svg>";
            }
            elseif($current_icon_footage <= 6000){
                $cur_footage = "<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 46 46'><path class='cls-1' d='M34.7,14.6a0.29,0.29,0,0,0,0,0,0.31,0.31,0,0,0-.16-0.27l-2.93-1.6,2.68-1.56a0.31,0.31,0,0,0,0-.54L22.63,4.65a0.31,0.31,0,0,0-.29,0L10.88,10.92a0.31,0.31,0,0,0,0,.54L13.6,13l-2.19,1.19a0.29,0.29,0,0,0-.13-0.05,0.31,0.31,0,0,0-.31.31v13.3a0.31,0.31,0,0,0,.16.27l11.44,6.25v6.33a0.31,0.31,0,0,0,.45.27l11.68-6.38a0.31,0.31,0,0,0,.16-0.27V14.85A0.29,0.29,0,0,0,34.7,14.6Zm-23-3.4L22.5,5.27l11,5.62L31,12.35,23.06,8a0.31,0.31,0,0,0-.29,0l-8.54,4.63Zm18.72,1.52-7.89,4.61L14.86,13l8.05-4.37Zm-16.15.64,8.12,4.59a0.31,0.31,0,0,0,.15,0,0.3,0.3,0,0,0,.15,0L31,13.06l2.77,1.51L22.92,20.7,12,14.57Zm-2.64,14.2V15l11,6.17V33.56Zm11.6,12.52V34.31l0,0a0.29,0.29,0,0,0,0-.31V21.25L34.26,15V34Z'/></svg>";
            }
            elseif($current_icon_footage > 6000){
                $cur_footage = "<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 46 46'><path class='cls-1' d='M37.34,10.76L25.9,4.46a0.3,0.3,0,0,0-.29,0l-17.13,9a0.31,0.31,0,0,0-.13.41h0a0.31,0.31,0,0,0-.15.26V27.51a0.31,0.31,0,0,0,.16.27L20,34.19a0.31,0.31,0,0,0,.15,0,0.3,0.3,0,0,0,.16,0,0.31,0.31,0,0,0,.15-0.26V33.84L22,32.89V41.7a0.31,0.31,0,0,0,.15.26,0.3,0.3,0,0,0,.3,0l11.62-6.41a0.31,0.31,0,0,0,.16-0.27V15.86a0.31,0.31,0,0,0-.15-0.26,0.3,0.3,0,0,0-.3,0L22.47,21.83l-2.06-1.06v-0.2a0.3,0.3,0,0,0,0-.09l17-9.17A0.31,0.31,0,0,0,37.34,10.76ZM19.79,33.4l-10.9-6,10.9-6v12Zm-11-6.65V14.68l10.95,6ZM33.64,16.38V35.11l-11,6.07V32.53l9.13-5.39a0.31,0.31,0,0,0,0-.54l-8.61-4.43ZM31,26.9l-8.34,4.92V22.6Zm-9-4.61v9.89l-1.61.95V21.46ZM20,20a0.29,0.29,0,0,0-.09.12L8.81,14,25.75,5.08,36.55,11Z'/></svg>";
            }

            ?>

            <?php   $cur .= '{
            "pic": "'.$thumb_url.'",
            "name": "'.get_the_title().'",
            "icon": "'.$cur_footage.'",
            "square": "'.get_field("project_footage").'",
            "link": "'.get_the_permalink().'"
            },';
            ?>

        <?php endwhile;
    }
    if($max==$paged){
        $col = 0;
    }
    $cur = substr($cur, 0, -1);

    $json_data = '{
                "col": '.$col.',
                "items": [
                  '.$cur.'
               ]
              }';

    echo $json_data;
    exit;
}

add_action('wp_ajax_get_posts','get_posts_current');

add_action('wp_ajax_nopriv_get_posts', 'get_posts_current');