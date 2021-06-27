<?php

use App\Models\CatalogSecondLevel;
use App\Models\Product;
use App\Models\Seller;

function getCatalog()
{
    $catalogSecondLevel = CatalogSecondLevel::with('catalogFirstLevel')->get()->toArray();
    $catalog = [];

    foreach ($catalogSecondLevel as $value) {
        $catalogFL = $value['catalog_first_level'];
        $catalogFLName = $catalogFL['link'];
        $catalogSecondLevelLink = '/' . 'catalog' . '/' . $catalogFL['link'];

        if (!array_key_exists($catalogFLName, $catalog)) {
            $catalog[$catalogFLName] = [
                'content' => [
                    'categoriesList' => [
                        [
                            "id" => $value['id'],
                            "title" => $value['title'],
                            "link" => $catalogSecondLevelLink . '/' . $value['link'],
                            "image" => $value['image'],
                            "order" => $value['order'],
                        ],
                    ],
                    'title' => $value['catalog_first_level']['title'],
                ],
                'image' => $value['catalog_first_level']['image'],
                'link' => $catalogSecondLevelLink,
                'title' => $value['catalog_first_level']['title'],
            ];
        } else {
            array_push($catalog[$catalogFLName]['content']['categoriesList'],
                [
                    "id" => $value['id'],
                    "title" => $value['title'],
                    "link" => $catalogSecondLevelLink . '/' . $value['link'],
                    "image" => $value['image'],
                    "order" => $value['order'],
                ]
            );
        }
    }
    return $catalog;
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

function getSellers($product) {
    $catalogItem = CatalogSecondLevel::where('link', $product)->get()->toArray();
    $catalogItemId = null;
    $productItem = null;
    $sellers = null;

    if(!empty($catalogItem)) {
        $catalogItemId = $catalogItem[0]['id'];
    }

    if(!is_null($catalogItemId)) {
        $productItem = Product::where('catalog_id', $catalogItemId)->with('Sellers')->get()->toArray();

        if(!empty($productItem)) {
            $sellers = $productItem[0]['sellers'];
        }
    }

    if(!empty($sellers)) {
        dd($sellers);
    }

    return $sellers;
}
