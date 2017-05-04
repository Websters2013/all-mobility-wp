<?php

function cart_quantity_changes(){

    $new_quantity = $_GET['countProduct'];
    $idProduct = $_GET['id'];
    $keyProduct  = $_GET['key'];
    $variation_id = $_GET['variation'];

    if( $variation_id ){
        $_product = new WC_Product_Variation($variation_id);
    } else {
        $_product = wc_get_product( $idProduct );;
    }
    
    WC()->cart->set_quantity($keyProduct, $new_quantity);

    $cartTotal  =  json_encode( WC()->cart->get_cart_total() );

    $cartSubtotal = json_encode( WC()->cart->get_cart_subtotal() );

    $discount = json_encode( WC()->cart->get_total_discount() );

    $taxes = json_encode( WC()->cart->get_tax_totals() );

    $cartPrice = json_encode( WC()->cart->get_cart_total() );

    $subtotal_product = json_encode( WC()->cart->get_product_subtotal( $_product , $new_quantity ) );

    $count_products = json_encode( WC()->cart->get_cart_contents_count() );

    $json_data = '{
        "total": '.$cartTotal.',
        "subtotal": '.$cartSubtotal.',
        "productTotal": '.$subtotal_product.',
         "taxes": '.$taxes.',
        "cartCountPrice": '.$cartPrice.',
        "discount": '.$discount.',
        "cartCountProducts" : '.$count_products.'
    }';

    echo $json_data;
    exit;
}

add_action('wp_ajax_cart_quantity_changes','cart_quantity_changes');

add_action('wp_ajax_nopriv_cart_quantity_changes', 'cart_quantity_changes');

function remove_cart_item(){

    $keyProduct = $_GET['id'];

    WC()->cart->remove_cart_item($keyProduct);
    $cartTotal  = json_encode( WC()->cart->get_cart_total() );
    $subTotal = json_encode(WC()->cart->get_cart_subtotal());
    $item = '';
    $count_products = json_encode( WC()->cart->get_cart_contents_count() );
    if ( WC()->cart->get_cart_contents_count() == 0 ) {
        $cart_items = 0;
    } else {
        $cart_items = WC()->cart->get_cart_contents_count();
        if($cart_items==1){
            $item = ' item';
        } else {
            $item = ' items';
        }
    }


    $discount = json_encode(WC()->cart->get_total_discount());

    $taxes = json_encode( WC()->cart->get_tax_totals() );

    $json_data = '{
        "subtotal": '.$subTotal.',
        "discount": '.$discount.',
        "cartCountPrice": '.$cartTotal.',
        "cartCountProducts": '.$count_products.',
        "total": '.$cartTotal.',
        "taxes": '.$taxes.'
    }';

    echo $json_data;
    exit;

}

add_action('wp_ajax_remove_cart_item','remove_cart_item');

add_action('wp_ajax_nopriv_remove_cart_item', 'remove_cart_item');

function apply_coupon_to_order(){

    $coupon_name = $_GET['inputVal'];
    $discount = '';
    $status = 0;
    if( count(WC()->cart->applied_coupons)==0 ){

        if( WC()->cart->add_discount($coupon_name)){
            $discount = json_encode(WC()->cart->get_total_discount());
            $status = 1;

        }

    } else {
        $status = 0;
        $discount = json_encode(WC()->cart->get_total_discount());
    }

    $cartTotal  = json_encode( WC()->cart->get_cart_total() );
    $subTotal = json_encode(WC()->cart->get_cart_subtotal());
    $taxes = json_encode( WC()->cart->get_tax_totals() );

    $json_data = '{
        "discount": '.$discount.',
        "subtotal": '.$subTotal.',
        "status": "'.$status.'",
        "total": '.$cartTotal.'
    }';

    echo $json_data;
    exit;

}

add_action('wp_ajax_apply_coupon_to_order','apply_coupon_to_order');

add_action('wp_ajax_nopriv_apply_coupon_to_order', 'apply_coupon_to_order');

function remove_coupon_to_order(){

    $coupon_name = $_GET['inputVal'];

    WC()->cart->remove_coupon($coupon_name);

    $sub_cart = json_encode( WC()->cart->get_cart_subtotal() );
    $taxes = json_encode( WC()->cart->get_tax_totals() );


    $json_data = '{
        "subtotal": '.$sub_cart.',
        "total": '.$sub_cart.'
    }';

    echo $json_data;
    exit;
}

add_action('wp_ajax_remove_coupon_to_order','remove_coupon_to_order');

add_action('wp_ajax_nopriv_remove_coupon_to_order', 'remove_coupon_to_order');