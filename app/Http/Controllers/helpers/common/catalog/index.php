<?php

use App\Models\CatalogLevelOne;

require_once('app/Http/Controllers/helpers/common/assets/index.php');

function DB_getCatalogLevelOne($withLevelTwo = true)
{
    $withArray = $withLevelTwo ? ['catalogLevelTwo'] : [];

    return CatalogLevelOne::query()
        ->with($withArray)
        ->get()
        ->toArray();
}

function checkIsCatalogItemEmpty($catalogItem) {
    if(empty($catalogItem)) {
        abort(404);
    }
}

function formatCatalogFull(&$catalog) {
    setCatalogFullLinks($catalog);
    setCatalogFullImages($catalog);
}

function getCatalogCategoriesList($catalogFull) {
    return array_map(function($catalogItem) {
        return [
            'title' => $catalogItem['title'],
            'value' => $catalogItem['id'],
        ];
    }, $catalogFull);
}

function getCatalogCategoriesWithSelectedList($catalogFull, $saleOfferItemData) {
    $offerCatalogId = $saleOfferItemData['catalog_level_two_id'];

    return array_map(function($catalogLevelOneItem) use($offerCatalogId) {
        $catalogLevelTwoList = $catalogLevelOneItem['catalog_level_two'];

        $isChecked = false;

        foreach ($catalogLevelTwoList as $catalogLevelTwoItem) {
            if($catalogLevelTwoItem['id'] === $offerCatalogId) {
                $isChecked = true;
            }
        }

        return [
            'isChecked' => $isChecked,
            'title' => $catalogLevelOneItem['title'],
            'value' => $catalogLevelOneItem['id'],
        ];
    }, $catalogFull);
}

function getCatalogLevelTwoItemsListFormatted($catalogLevelTwoList) {
    return array_map(function($catalogLevelTwoItem) {
        return [
            'title' => $catalogLevelTwoItem['title'],
            'value' => $catalogLevelTwoItem['id'],
        ];
    }, $catalogLevelTwoList);
}

function getCatalogSubCategoriesList($catalogFull) {
    return array_map(function($catalogItem) {
        $catalogLevelTwoList = $catalogItem['catalog_level_two'];
        $catalogLevelTwoListFormatted = getCatalogLevelTwoItemsListFormatted($catalogLevelTwoList);

        return [
            'content' => $catalogLevelTwoListFormatted,
            'listenId' => $catalogItem['id'],
        ];
    }, $catalogFull);
}

function getCatalogLevelTwoListFormatted($catalogLevelTwoItemsList, $offerItemCatalogId) {
    return array_map(function($catalogLevelTwoItem) use($offerItemCatalogId) {
        $catalogLevelTwoItemId = $catalogLevelTwoItem['id'];

        return [
            'isChecked' => $catalogLevelTwoItemId === $offerItemCatalogId,
            'title' => $catalogLevelTwoItem['title'],
            'value' => $catalogLevelTwoItemId,
        ];
    }, $catalogLevelTwoItemsList);
}

function getCatalogSubCategoriesWithSelectedList($catalogFull, $saleOfferItemData) {
    $offerItemCatalogId = $saleOfferItemData['catalog_level_two_id'];

    return array_map(function($catalogLevelOneItem) use($offerItemCatalogId) {
        $catalogLevelTwoItemsList = $catalogLevelOneItem['catalog_level_two'];
        $catalogLevelTwoItemsListFormatted = getCatalogLevelTwoListFormatted($catalogLevelTwoItemsList, $offerItemCatalogId);

        return [
            'content' => $catalogLevelTwoItemsListFormatted,
            'listenId' => $catalogLevelOneItem['id'],
        ];
    }, $catalogFull);
}

function getCatalogFull()
{
    $catalog = DB_getCatalogLevelOne();

    formatCatalogFull($catalog);

    return $catalog;
}

function getCatalogLevelOneFormatted()
{
    $catalog = DB_getCatalogLevelOne(false);

    return getCatalogLevelOneWithFullLinks($catalog);
}

function getCatalogLevelOneLink($link) {
    return '/catalog/' . $link;
}

function getCatalogLevelOneWithFullLinks($catalog) {
    foreach ($catalog as &$catalogLevelOneItem) {
        $catalogLevelOneItem['linkFull'] = '/catalog/' . $catalogLevelOneItem['link'];
    }

    return $catalog;
}

function getCatalogLevelOneItem($catalogFull, $catalogLevelOneLink)
{
    $catalogLevelOneItem = array_merge(...array_filter($catalogFull, function ($catalogLevelOneItem) use ($catalogLevelOneLink) {
        return $catalogLevelOneItem['link'] === $catalogLevelOneLink;
    }));

    checkIsCatalogItemEmpty($catalogLevelOneItem);

    return $catalogLevelOneItem;
}

function getCatalogLevelTwoItem($catalogLevelOneItem, $catalogLevelTwoLink)
{
    $catalogLevelTwoItem = array_merge(...array_filter($catalogLevelOneItem['catalog_level_two'], function ($catalogLevelTwoItem) use ($catalogLevelTwoLink) {
        return $catalogLevelTwoItem['link'] === $catalogLevelTwoLink;
    }));

    checkIsCatalogItemEmpty($catalogLevelTwoItem);

    return $catalogLevelTwoItem;
}

function getCatalogLevelOneItemSubcategoriesList($catalogLevelOneItem)
{
    return $catalogLevelOneItem['catalog_level_two'];
}

function getCatalogLevelTwoLink($catalogLevelOneLink, $catalogLevelTwoLink) {
    $catalogLevelOneFullLink = getCatalogLevelOneLink($catalogLevelOneLink);

    return $catalogLevelOneFullLink . '/' . $catalogLevelTwoLink;
}

function setCatalogFullImages(&$catalog) {
    foreach ($catalog as &$catalogLevelOneItem) {
        $catalogLevelOneItem['image'] = formatAssetPath($catalogLevelOneItem['image']);

        foreach ($catalogLevelOneItem['catalog_level_two'] as &$catalogLevelTwoItem) {
            $catalogLevelTwoItem['image'] = formatAssetPath($catalogLevelTwoItem['image']);
        }
    }
}

function setCatalogFullLinks(&$catalog)
{
    foreach ($catalog as &$catalogLevelOneItem) {
        $catalogLevelOneItem['linkFull'] = getCatalogLevelOneLink($catalogLevelOneItem['link']);

        foreach ($catalogLevelOneItem['catalog_level_two'] as &$catalogLevelTwoItem) {
            $catalogLevelTwoItem['linkFull'] = getCatalogLevelTwoLink($catalogLevelOneItem['link'], $catalogLevelTwoItem['link']);
        }
    }
}
