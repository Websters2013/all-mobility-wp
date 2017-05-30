<?php  foreach ($allProducts as $product_id){

    if( $product_id == 0 ){
        continue;
    }

    $found = false;

    if ( sizeof( WC()->cart->get_cart() ) > 0 ) {

        foreach ( WC()->cart->get_cart() as $cart_item_key => $values ) {
            $_product = $values['data'];
            $_quantity = $values['quantity'];
            if ( $_product->id == $product_id ) {
                $found = true;
            }

        }

        if ( ! $found ){
            WC()->cart->add_to_cart( $product_id );
        } else {
            WC()->cart->set_quantity($cart_item_key, ($_quantity+1) );
        }

        $mainSessionProduct = WC()->session->get($mainProduct);

        if( $mainSessionProduct ){

            if( $mainSessionProduct[$product_id] ){

                $mainSessionProduct[$product_id]++;

            } else {

                $mainSessionProduct[$product_id] = 1;

            }

            WC()->session->set($mainProduct,$mainSessionProduct);

        } else {

            if( $upSellsArray[$product_id] ){
                $upSellsArray[$product_id]++;
            } else {
                $upSellsArray[$product_id] = 1;
            }

            WC()->session->set($mainProduct,$upSellsArray);

        }

    } else {

        WC()->cart->add_to_cart( $product_id );

        $mainSessionProduct = WC()->session->get($mainProduct);

        if( $mainSessionProduct ){

            if( $mainSessionProduct[$product_id] ){

                $mainSessionProduct[$product_id]++;

            } else {

                $mainSessionProduct[$product_id] = 1;

            }

            WC()->session->set($mainProduct,$mainSessionProduct);

        } else {

            if( $upSellsArray[$product_id] ){
                $upSellsArray[$product_id]++;
            } else {
                $upSellsArray[$product_id] = 1;
            }

            WC()->session->set($mainProduct,$upSellsArray);

        }

    }

} 