<?php  $product_ids = get_field('choose_4_prodcuts_for_featured_preview');

    if( !empty($product_ids) ){

        foreach ( $product_ids as $key => $id ) {

            if( $key%3 === 0 && $key !== 0 ){ break; }

            get_featured_product($id);
        }

    }


