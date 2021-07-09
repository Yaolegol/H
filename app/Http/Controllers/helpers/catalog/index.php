<?php

use App\Models\Catalog;
use App\Models\Offer;
use App\Models\Product;
use App\Models\Seller;

function getCatalog()
{
    return Catalog::all()->toArray();


//    $catalogSecondLevel = CatalogSecondLevel::with('catalogFirstLevel')->get()->toArray();
//    $catalog = [];
//
//    foreach ($catalogSecondLevel as $value) {
//        $catalogFL = $value['catalog_first_level'];
//        $catalogFLName = $catalogFL['link'];
//        $catalogSecondLevelLink = '/' . 'catalog' . '/' . $catalogFL['link'];
//
//        if (!array_key_exists($catalogFLName, $catalog)) {
//            $catalog[$catalogFLName] = [
//                'content' => [
//                    'categoriesList' => [
//                        [
//                            "id" => $value['id'],
//                            "title" => $value['title'],
//                            "link" => $catalogSecondLevelLink . '/' . $value['link'],
//                            "image" => $value['image'],
//                            "order" => $value['order'],
//                        ],
//                    ],
//                    'title' => $value['catalog_first_level']['title'],
//                ],
//                'image' => $value['catalog_first_level']['image'],
//                'link' => $catalogSecondLevelLink,
//                'title' => $value['catalog_first_level']['title'],
//            ];
//        } else {
//            array_push($catalog[$catalogFLName]['content']['categoriesList'],
//                [
//                    "id" => $value['id'],
//                    "title" => $value['title'],
//                    "link" => $catalogSecondLevelLink . '/' . $value['link'],
//                    "image" => $value['image'],
//                    "order" => $value['order'],
//                ]
//            );
//        }
//    }
//    return $catalog;
}

function getCatalogLevel1()
{
    $catalog = getCatalog();

    $catalogLevel1 = array_filter($catalog, function ($item) {
        return $item["level"] === 1;
    });

    return array_map(function($catalogItem, $key) {
        $catalogItemNew = array_combine(array_keys($catalogItem), array_values($catalogItem));
        $catalogItemNew['link'] = 'catalog' . '/' . $catalogItemNew['link'];
        return $catalogItemNew;
    }, $catalogLevel1, array_keys($catalogLevel1));
}

function getCatalogSecondLevel($name)
{
    $catalog = getCatalog();
    return [
        'breadcrumbs' => [
            [
                'active' => false,
                'link' => '/',
                'title' => 'Каталог',
            ],
            [
                'active' => true,
                'link' => '/catalog/' . $name,
                'title' => $catalog[$name]['title'],
            ]
        ],
        'catalog' => $catalog[$name]['content']['categoriesList'],
    ];
}

function getOffers($product)
{
    $catalogItem = CatalogSecondLevel::where('link', $product)->get()->toArray();
    $catalogItemId = null;
    $productItem = null;
    $productItemId = null;
    $offerList = [];

    if (!empty($catalogItem)) {
        $catalogItemId = $catalogItem[0]['id'];
    }

    if (!is_null($catalogItemId)) {
        $productItem = Product::where('catalog_id', $catalogItemId)->get()->toArray();

        if (!empty($productItem)) {
            $productItemId = $productItem[0]['id'];
        }
    }

    if (!is_null($productItemId)) {
        $offerList = Offer::where('product_id', $productItemId)->with('seller', 'product')->get()->toArray();
    }

    return $offerList;
}
