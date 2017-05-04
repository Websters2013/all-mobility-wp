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


    $json_data = '{
        "total": '.$cartTotal.',
        "subtotal": '.$cartSubtotal.',
        "productTotal": '.$subtotal_product.',
         "taxes": '.$taxes.',
        "cartCountPrice": '.$cartPrice.',
        "discount": '.$discount.'
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
        "total": '.$cartTotal.',
        "taxes": '.$taxes.'
    }';

    echo $json_data;
    exit;

}

add_action('wp_ajax_remove_cart_item','remove_cart_item');

add_action('wp_ajax_nopriv_remove_cart_item', 'remove_cart_item');