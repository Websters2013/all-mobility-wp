<?php
$value = $_GET['value'];
$pageSorting = $_GET['pageSorting'];
$sortingDate = $_GET['dateSorting'];

$json_data = '{
    "products": [
        {
            "name": "category1",
            "featured": "featured",
            "picture": "pic/mobile-scooters-heavy-duty.jpg",
            "title": "Product Title Even if it’s a Long one it fits (8000 Mph)",
            "content": {
                "description": ["Short bullet list of main chct if it’s pretty long or short", "Shoulmain keywords users will", "Will be limited to 3 points"],
                "specification": {
                    "head": ["Top Speed","Drive Range","Seat Width","Foldable"],
                    "content": ["3.5 mph","8.7 miles","17”","Yes"]
                }
            },
            "price": "$1,800.00",
            "oldPrice": "$1,999",
            "urlDetails": "#"
        },
        {
            "name": "category2",
            "featured": "featured",
            "picture": "pic/mobile-scooters-heavy-duty.jpg",
            "title": "Product Title Even if it’s a Long one it fits (8000 Mph)",
            "rate": {
                "starsCount": "3",
                "reviewsCount": "20 Reviews",
                "urlReviews": "#"
            },
            "content": {
                "specification": {
                    "head": ["Top Speed","Drive Range","Seat Width","Foldable"],
                    "content": ["3.5 mph","8.7 miles","17”","Yes"]
                }
            },
            "price": "$1,800.00",
            "oldPrice": "$1,999",
            "urlDetails": "#"
        },
        {
            "name": "category3",
            "picture": "pic/mobile-scooters-heavy-duty.jpg",
            "title": "Product Title Even if it’s a Long one it fits (8000 Mph)",
            "rate": {
                "starsCount": "4",
                "reviewsCount": "30 Reviews",
                "urlReviews": "#"
            },
            "content": {
                "description": ["Short bullet list of main characteristics of the product if it’s pretty long or short", "Should contain main keywords users will", "Will be limited to 3 points"],
                "specification": {
                    "head": ["Top Speed","Drive Range","Seat Width","Foldable"],
                    "content": ["3.5 mph","8.7 miles","17”","Yes"]
                }
            },
            "price": "$1,800.00",
            "oldPrice": "$1,999",
            "urlDetails": "#"
        },
        {
            "name": "category4",
            "picture": "pic/mobile-scooters-heavy-duty.jpg",
            "title": "Product Title Even if it’s a Long one it fits (8000 Mph)",
            "rate": {
                "starsCount": "2",
                "reviewsCount": "10 Reviews",
                "urlReviews": "#"
            },
            "content": {
                "description": ["Short bullet list of main characteristics of the product if it’s pretty long or short", "Should contain main keywords users will", "Will be limited to 3 points"],
                "specification": {
                    "head": ["Top Speed","Drive Range","Seat Width","Foldable"],
                    "content": ["3.5 mph","8.7 miles","17”","Yes"]
                }
            },
            "price": "$1,800.00",
            "urlDetails": "#"
        }
    ],
    "settings": {
        "pagesAll": "10",
        "currentPage": "5"
    }
}';


$json_data = str_replace("\r\n",'',$json_data);
$json_data = str_replace("\n",'',$json_data);

echo $json_data;
exit;
?>
