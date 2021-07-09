<?php

use App\Models\Catalog;
use App\Models\Offer;
use App\Models\Product;
use App\Models\Seller;

function getCatalog()
{
    return Catalog::all()->toArray();
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
