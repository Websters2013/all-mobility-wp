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
        "cartCountPrice": '.$cartPrice.'
    }';

    echo $json_data;
    exit;
}

add_action('wp_ajax_cart_quantity_changes','cart_quantity_changes');