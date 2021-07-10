<?php

use App\Models\Catalog;
use App\Models\Offer;
use App\Models\Product;
use App\Models\Seller;

function getCatalog()
{
    return Catalog::all()->toArray();
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
                $categoriesListFormatted = array_map(function($item) {
                    return [
                        'id' => $item['id'],
                        'image' => $item['image'],
                        'link' => $item['link'],
                        'linkFull' => $item['linkFull'],
                        'title' => $item['title'],
                    ];
                }, $categoriesList);

                array_push(
                    $acc,
                    [
                        'content' => [
                            'categoriesList' => array_values($categoriesListFormatted),
                            'title' => $title,
                        ],
                        'id' => $catalogItemNew['id'],
                        'image' => $catalogItemNew['image'],
                        'link' => $catalogItemNew['link'],
                        'linkFull' => $catalogItemNew['linkFull'],
                        'title' => $title,
                    ]
                );
            }

            return $acc;
        },
        []
    );
}

function getCatalogFull()
{
    $catalog = getCatalog();
    $catalogFormattedLinks = setCatalogFullLinks($catalog);

    return getCatalogFormatted($catalogFormattedLinks);
}

function getCatalogLevel2($catalogFull, $link)
{
    $catalogItem = array_merge(...array_filter($catalogFull, function($item) use($link) {
        return $item['link'] === $link;
    }));
    $catalogItemId = $catalogItem['id'];

    $catalogLevel2 = array_merge(...array_filter($catalogFull, function($item) use($catalogItemId) {
        return $item['id'] === $catalogItemId;
    }));

    return $catalogLevel2['content']['categoriesList'];
}

function getNewArray($arr)
{
    return array_combine(array_keys($arr), array_values($arr));
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

function setCatalogFullLinks($catalog)
{
    return array_map(
        function ($catalogItem) use ($catalog) {
            $catalogItemNew = getNewArray($catalogItem);
            if ($catalogItemNew['level'] === 1) {
                $catalogItemNew['linkFull'] = '/' . 'catalog' . '/' . $catalogItemNew['link'];
            } elseif ($catalogItemNew['level'] === 2) {
                $previousLevelId = $catalogItemNew['previous_level_id'];
                $previousLevelItemIndex = array_search($previousLevelId, array_column($catalog, 'id'));
                $previousLevelItem = $catalog[$previousLevelItemIndex];

                $catalogItemNew['linkFull'] = '/' . 'catalog' . '/' . $previousLevelItem['link'] . '/' . $catalogItemNew['link'];
            }

            return $catalogItemNew;
        },
        $catalog
    );
}
