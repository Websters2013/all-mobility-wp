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

//updating_existing_products_once();

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


require_once( TEMPLATEINC . '/template.php' );
require_once( TEMPLATEINC . '/actions.php' );
require_once( TEMPLATEINC . '/often_parts.php' );