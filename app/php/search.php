<?php
$value = $_GET['value'];

$json_data = '{
    "categories": [
        {
            "name": "category1",
            "urlCategory": "222",
            "subcategories": ["subcategory1-1", "subcategory1-2", "subcategory1-3"],
            "urlSubcategories": ["1", "#", "#"]
        },
        {
            "name": "category2",
            "urlCategory": "#",
            "subcategories": ["subcategory2-1", "subcategory2-2", "subcategory2-3"],
             "urlSubcategories": ["#", "#", "#"]
        },
        {
            "name": "category3",
             "urlCategory": "#",
            "subcategories": ["subcategory3-1", "subcategory3-2", "subcategory3-3"],
             "urlSubcategories": ["#", "#", "#"]
        },
        {
            "name": "category4",
             "urlCategory": "#",
            "subcategories": ["subcategory4-1", "subcategory4-2", "subcategory4-3"],
             "urlSubcategories": ["#", "#", "#"]
        },
        {
            "name": "category5"
        }
    ],
    "products": [
        {
            "name": "Product1",
            "src": "pic/lift-chairs.png",
            "alt": "picture",
            "href": "#",
            "price": "10000$",
            "oldPrice": "20000$",
            "categories": {
                "mainCategory": "main category 1",
                "urlMainCategory": "222",
                "subcategories": ["subcategory1-1", "subcategory1-2", "subcategory1-3"],
                "urlSubcategories": ["7689", "#", "#"]
            }
        },
        {
            "name": "Product2",
            "src": "pic/lift-chairs.png",
            "alt": "picture",
            "href": "#",
            "price": "12000$",
            "oldPrice": "22000$",
            "categories": {
                "mainCategory": "main category 1",
                "urlMainCategory": "222",
                "subcategories": ["subcategory2-1", "subcategory2-2", "subcategory2-3"],
                "urlSubcategories": ["#", "#", "#"]
            }
        },
        {
            "name": "Product3",
            "src": "pic/lift-chairs.png",
            "alt": "picture",
            "href": "#",
            "price": "13000$",
            "oldPrice": "23000$",
            "categories": {
                "mainCategory": "main category 3",
                "urlMainCategory": "#",
                "subcategories": ["subcategory3-1", "subcategory3-2", "subcategory3-3"],
                "urlSubcategories": ["#", "#", "#"]
            }
        },
        {
            "name": "Product4",
            "src": "pic/lift-chairs.png",
            "alt": "picture",
            "href": "#",
            "price": "14000$",
            "oldPrice": "24000$",
            "categories": {
                "mainCategory": "main category 4",
                "subcategories": ["subcategory4-1", "subcategory4-2", "subcategory4-3"],
                "urlSubcategories": ["#", "#", "#"]
            }
        },
        {
            "name": "Product5",
            "src": "pic/lift-chairs.png",
            "alt": "picture",
            "href": "#",
            "price": "15000$",
            "oldPrice": "25000$",
            "categories": {
                "mainCategory": "main category 5",
                "urlMainCategory": "#",
                "subcategories": ["subcategory5-1", "subcategory5-2", "subcategory5-3"],
                "urlSubcategories": ["#", "#", "#"]
            }
        },
        {
            "name": "Product6",
            "src": "pic/lift-chairs.png",
            "alt": "picture",
            "href": "#",
            "price": "16000$",
            "oldPrice": "26000$",
            "categories": {
                "mainCategory": "main category 6",
                "urlMainCategory": "#",
                "subcategories": ["subcategory6-1", "subcategory6-2", "subcategory6-3"],
                "urlSubcategories": ["#", "#", "#"]
            }
        },
        {
            "name": "Product7",
            "src": "pic/lift-chairs.png",
            "alt": "picture",
            "href": "#",
            "price": "17000$",
            "oldPrice": "27000$",
            "categories": {
                "mainCategory": "main category 7",
                "urlMainCategory": "#",
                "subcategories": ["subcategory7-1", "subcategory7-2", "subcategory7-3"],
                "urlSubcategories": ["#", "#", "#"]
            }
        },
        {
            "name": "Product8",
            "src": "pic/lift-chairs.png",
            "alt": "picture",
            "href": "#",
            "price": "18000$",
            "oldPrice": "28000$",
            "categories": {
                "mainCategory": "main category 8",
                "urlMainCategory": "#",
                "subcategories": ["subcategory8-1", "subcategory8-2", "subcategory8-3"],
                "urlSubcategories": ["#", "#", "#"]
            }
        }
    ]
}';



$json_data = str_replace("\r\n",'',$json_data);
$json_data = str_replace("\n",'',$json_data);

echo $json_data;
exit;
?>
