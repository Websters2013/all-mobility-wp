<?php

function cart_quantity_changes(){
    
    $new_quantity = $_GET['countProduct'];
    $idProduct = $_GET['id'];
    $keyProduct  = $_GET['key'];
    $variation_id = $_GET['variation'];
		$poducts_in_list = array();

    if( $variation_id ){
        $_product = new WC_Product_Variation($variation_id);
    } else {
        $_product = wc_get_product( $idProduct );;
    }

    $allUpsells = countHidenUpsells();

    $hiddenQuanityItems = $allUpsells[$idProduct];

    WC()->cart->set_quantity($keyProduct, $new_quantity + $hiddenQuanityItems);

    $cartTotal  =  json_encode( WC()->cart->get_cart_total() );

    $cartSubtotal = json_encode( WC()->cart->get_cart_subtotal() );

    $discount = json_encode( WC()->cart->get_total_discount() );

    $taxes = json_encode( WC()->cart->get_tax_totals() );

    $cartPrice = json_encode( WC()->cart->get_cart_total() );


    $upsellsProducts = WC()->session->get('Upsells');
		$upsellSum = 0;


	foreach ($upsellsProducts as $key => $value) {
		if(array_key_exists($idProduct,$value) && !in_array($key,$poducts_in_list)) {
			$poducts_in_list[] = $key;

			if(!empty($newUpsells[$key][$idProduct]['product'])) {

				foreach ($newUpsells[$key][$idProduct]['product'] as $key_2 => $value_2){

					$upsellProduct = wc_get_product($key_2);

					$upsellSum +=  $upsellProduct->get_price() * $value_2;
				}

				$product_price = $_product->get_price()*$new_quantity + $upsellSum;

				$subtotal_product = json_encode( wc_price($product_price) );

			}
		}
	}




   /* if( $upsellsProducts ){

        foreach ($upsellsProducts as $key => $value){

            $upsellProduct = wc_get_product($key);

            $upsellSum +=  $upsellProduct->get_price()*$value['count'];
            
        }

        $product_price = $_product->get_price()*$new_quantity + $upsellSum;
        
        $subtotal_product = json_encode( wc_price($product_price) );
        
    } else {

        $subtotal_product = json_encode( WC()->cart->get_product_subtotal( $_product , $new_quantity ) );
        
    }*/
    
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

    $keyProduct = $_GET['key'];

    $idProduct = $_GET['id'];

    $value = $_GET['value'];

   if( $checkUpsells = WC()->session->get($idProduct) ){

       if( !empty($checkUpsells) ){

           foreach ($checkUpsells as $upselID => $checkUpsell) {

               foreach( WC()->cart->get_cart() as $cart_key => $cart_item ){

                   if( $upselID == $cart_item['product_id'] ){
                            $checkUpsellKey = $cart_key;
                       break;
                   }

               }

               if( $upsellCartItem = WC()->cart->get_cart_item($checkUpsellKey) ){

                   $upsellCartItemQty = $upsellCartItem['quantity'];

                   WC()->cart->set_quantity( $checkUpsellKey, ( $upsellCartItemQty - $checkUpsell['count'] ) );

               }

           }

       }

   }

    //Check qty in cart

    $itemInCart = WC()->cart->get_cart_item($keyProduct);

    $itemInCartValue = $itemInCart['quantity'];

    if( $itemInCartValue != $value ){
        WC()->cart->set_quantity($keyProduct, ( $itemInCartValue - $value ) );
    } else {
        WC()->cart->remove_cart_item($keyProduct);
    }

    // \Check qty in cart



    WC()->session->set( $idProduct, array() );

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

    if( !$discount ){
        $discount= "0";
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


function edt_cart_item(){

    $keyProduct = $_GET['key'];

    $idProduct = $_GET['id'];

    $value = $_GET['value'];

    if( $checkUpsells = WC()->session->get($idProduct) ){

        if( !empty($checkUpsells) ){

            foreach ($checkUpsells as $upselID => $checkUpsell) {

                foreach( WC()->cart->get_cart() as $cart_key => $cart_item ){

                    if( $upselID == $cart_item['product_id'] ){
                        $checkUpsellKey = $cart_key;
                        break;
                    }

                }

                if( $upsellCartItem = WC()->cart->get_cart_item($checkUpsellKey) ){

                    $upsellCartItemQty = $upsellCartItem['quantity'];

                    WC()->cart->set_quantity( $checkUpsellKey, ( $upsellCartItemQty - $checkUpsell['count'] ) );

                }

            }

        }

    }

    //Check qty in cart

    $itemInCart = WC()->cart->get_cart_item($keyProduct);

    $itemInCartValue = $itemInCart['quantity'];

    if( $itemInCartValue != $value ){
        WC()->cart->set_quantity($keyProduct, ( $itemInCartValue - $value ) );
    } else {
        WC()->cart->remove_cart_item($keyProduct);
    }

    // \Check qty in cart



    WC()->session->set( $idProduct, array() );

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

add_action('wp_ajax_edt_cart_item','edt_cart_item');

add_action('wp_ajax_nopriv_edt_cart_item', 'edt_cart_item');