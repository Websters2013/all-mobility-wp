<?php
define( 'TEMPLATEINC', TEMPLATEPATH . '/inc' );
define( 'TEMPLATEURI', get_template_directory_uri() );
define( 'DIRECT', TEMPLATEURI.'/assets/' );
show_admin_bar( false );

//define('DISALLOW_FILE_MODS',true);

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
	add_theme_support( 'woocommerce' );
}

add_filter( 'wpsl_frontend_meta_fields', 'custom_frontend_meta_fields' );

function custom_frontend_meta_fields( $store_fields ) {

	$store_fields['wpsl_my_textinput'] = array(
		'name' => 'my_textinput'
	);

	return $store_fields;
}

add_filter( 'wpsl_meta_box_fields', 'custom_meta_box_fields' );

function custom_meta_box_fields( $meta_fields ) {

	/**
	 * If no 'type' is defined it will show a normal text input field.
	 *
	 * Supported field types are checkbox, textarea and dropdown.
	 */
	$meta_fields[ __( 'Service Type', 'wpsl' ) ] = array(
		'my_textinput' => array(
			'label'    => __( 'Service', 'wpsl' ),
			'required' => false
		),
	);

	return $meta_fields;
}

//Comments

// Updating all products that have a 'comment_status' => 'closed' to 'open'

function updating_existing_products_once(){
	$args = array(
		// WC product post type
		'post_type'   => 'product',
		// all posts
		'numberposts' => -1,
		'comment_status' => 'closed',
		'post_status' => 'publish',
	);

	$shop_products = get_posts( $args );
	foreach( $shop_products as $item){
		$product = new WC_Product($item->ID);
		wp_update_post( array(
			'ID'    => $item->ID,
			'comment_status' => 'open',
		) );
	}
}

updating_existing_products_once();

add_action('transition_post_status', 'creating_a_new_product', 10, 3);
function creating_a_new_product($new_status, $old_status, $post) {
	if( $old_status != 'publish' && $new_status == 'publish' && !empty($post->ID)  && in_array( $post->post_type, array( 'product') ) ) {
		if ($post->comment_status != 'open' ){
			$product = new WC_Product($post->ID);
			wp_update_post( array(
				'ID'    => $post->ID,
				'comment_status' => 'open',
			) );
		}
	}
}


function add_favicon() {
	$favicon_url = get_stylesheet_directory_uri() . '/faviconit/favicon.ico';
	echo '<link rel="shortcut icon" href="' . $favicon_url . '" />';
}


add_action('login_head', 'add_favicon');
add_action('admin_head', 'add_favicon');


function my_filter_plugin_updates( $value ) {

    if( isset( $value->response['advanced-custom-fields-pro/acf.php'] ) ) {
        unset( $value->response['advanced-custom-fields-pro/acf.php'] );
    }
    return $value;
}
add_filter( 'site_transient_update_plugins', 'my_filter_plugin_updates' );

function updateProducts (){
$products = get_posts(

    array(
        'post_type' => 'product',
        'posts_per_page' => -1,
        'fields' => 'ids'
    )

);

    foreach ($products as $product){
        update_post_meta( $product, '_tax_status', 'taxable' );
    }

}


function updateProducts_2 (){
	$products = get_posts(

		array(
			'post_type' => 'product',
			'posts_per_page' => -1,
			'fields' => 'ids'
		)

	);

	foreach ($products as $product){
		update_post_meta( $product, 'choose_frame_type', 'rigid', 'Rigid' );
	}

}


require_once( TEMPLATEINC . '/template.php' );
require_once( TEMPLATEINC . '/actions.php' );
require_once( TEMPLATEINC . '/ajaxes.php' );
require_once( TEMPLATEINC . '/often_parts.php' );
require_once( TEMPLATEINC . '/woocommerce-func.php' );