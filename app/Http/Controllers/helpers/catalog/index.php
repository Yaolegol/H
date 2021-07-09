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

    return array_map(function ($catalogItem) {
        $catalogItemNew = getNewArray($catalogItem);
        $catalogItemNew['link'] = 'catalog' . '/' . $catalogItemNew['link'];
        return $catalogItemNew;
    }, $catalogLevel1);
}

function getCatalogLevel2()
{

}

function getCatalogFull()
{
    $catalog = getCatalog();
    $catalogFormattedLinks = formatCatalogLinks($catalog);

    return getCatalogFormatted($catalogFormattedLinks);
}

function getCatalogFormatted($catalog)
{
    return array_reduce(
        $catalog,
        function ($acc, $catalogItem) use ($catalog) {
            $catalogItemNew = getNewArray($catalogItem);
            if ($catalogItemNew['level'] === 1) {
                $title = $catalogItemNew['title'];
                $categoriesList = array_filter($catalog, function($item) use($catalogItemNew) {
                    return $item['previous_level_id'] === $catalogItemNew['id'];
                });

                array_push(
                    $acc,
                    [
                        'content' => [
                            'categoriesList' => $categoriesList,
                            'title' => $title,
                        ],
                        'image' => $catalogItemNew['image'],
                        'link' => $catalogItemNew['link'],
                        'title' => $title,
                    ]
                );
            }

            return $acc;
        },
        []
    );
}

function formatCatalogLinks($catalog)
{
    return array_map(
        function ($catalogItem) use ($catalog) {
            $catalogItemNew = getNewArray($catalogItem);
            if ($catalogItemNew['level'] === 1) {
                $catalogItemNew['link'] = 'catalog' . '/' . $catalogItemNew['link'];
            } elseif ($catalogItemNew['level'] === 2) {
                $previousLevelId = $catalogItemNew['previous_level_id'];
                $previousLevelItemIndex = array_search($previousLevelId, array_column($catalog, 'id'));
                $previousLevelItem = $catalog[$previousLevelItemIndex];

                $catalogItemNew['link'] = 'catalog' . '/' . $previousLevelItem['link'] . '/' . $catalogItemNew['link'];
            }

            return $catalogItemNew;
        },
        $catalog
    );
}

function getNewArray($arr)
{
    return array_combine(array_keys($arr), array_values($arr));
}

function getCatalogLevel($level)
{
    $catalog = getCatalog();

    return array_filter($catalog, function ($item) use ($level) {
        return $item["level"] === $level;
    });
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
