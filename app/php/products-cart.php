<?php
$idProd = $_GET['id'];
$flag = $_GET['flag'];

if($flag == 'remove'){

    $json_data = '{
        "cartCountProducts": "2",
        "cartCountPrice": "10000$",
        "subtotal":"10$",
        "total":"100$",
        "taxes": "200$",
        "discount":"223230$"
    }';

} else if($flag == 'changeCount'){

    $count = $_GET['countProduct'];

    $json_data = '{
        "total": "600$",
        "subtotal":"20$",
        "productTotal":"20$",
         "taxes": "200$",
        "cartCountPrice": "20000$"
    }';

} else if($flag == 'addToCart'){

    $count = $_GET['countProduct'];
    $price = $_GET['price'];

    $json_data = '{
        "cartCountProducts": "2 item"
    }';

} else if($flag == 'coupon'){

    $value = $_GET['inputVal'];

    $json_data = '{
        "subtotal": "$8888",
        "total": "$9999",
        "taxes": "200$",
        "status": 1
    }';

} else if($flag == 'couponRemove'){

    $value = $_GET['inputVal'];

    $json_data = '{
        "subtotal": "$11",
        "total": "$9999",
        "taxes": "300$"
    }';

}

$json_data = str_replace("\r\n",'',$json_data);
$json_data = str_replace("\n",'',$json_data);


echo $json_data;
exit;
?>
