<?php

use App\Models\CatalogLevelOne;

require_once(app_path() . '/Http/Controllers/helpers/common/assets/index.php');

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
    $offerCatalogId = $saleOfferItemData['catalog_level_one']['id'];

    return array_map(function($catalogLevelOneItem) use($offerCatalogId) {
        return [
            'isChecked' => $catalogLevelOneItem['id'] === $offerCatalogId,
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

function getCatalogLevelTwoListFormatted($catalogLevelTwoItemsList, $offerCatalogLevelTwoIdList) {
    return array_map(function($catalogLevelTwoItem) use($offerCatalogLevelTwoIdList) {
        $catalogLevelTwoItemId = $catalogLevelTwoItem['id'];

        return [
            'isChecked' => in_array($catalogLevelTwoItemId, $offerCatalogLevelTwoIdList),
            'title' => $catalogLevelTwoItem['title'],
            'value' => $catalogLevelTwoItemId,
        ];
    }, $catalogLevelTwoItemsList);
}

function getCatalogSubCategoriesWithSelectedList($catalogFull, $saleOfferItemData) {
    $offerCatalogLevelTwoIdList = array_map(function($offerCatalogLevelTwoItem) {
        return $offerCatalogLevelTwoItem['id'];
    }, $saleOfferItemData['catalog_level_two']);

    return array_map(function($catalogLevelOneItem) use($offerCatalogLevelTwoIdList) {
        $catalogLevelTwoItemsList = $catalogLevelOneItem['catalog_level_two'];
        $catalogLevelTwoItemsListFormatted = getCatalogLevelTwoListFormatted($catalogLevelTwoItemsList, $offerCatalogLevelTwoIdList);

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

    $catalogWithFullLinks = getCatalogLevelOneWithFullLinks($catalog);

    setCatalogLevelOneImages($catalogWithFullLinks);

    return $catalogWithFullLinks;
}

function getCatalogLevelOneLink($link) {
    return '/catalog/' . $link;
}

function getCatalogLevelOneWithFullLinks($catalog) {
    foreach ($catalog as &$catalogLevelOneItem) {
        setCatalogLevelOneFullLink($catalogLevelOneItem);
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

function getCatalogLevelTwoLink($catalogLevelTwoId) {
    return '/?catalogLevelTwoId=' . $catalogLevelTwoId;
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
            $catalogLevelTwoItem['linkFull'] = getCatalogLevelTwoLink($catalogLevelTwoItem['id']);
        }
    }
}

function setCatalogLevelOneImages(&$catalog) {
    foreach ($catalog as &$catalogLevelOneItem) {
        $catalogLevelOneItem['image'] = formatAssetPath($catalogLevelOneItem['image']);
    }

    return $catalog;
}

function setCatalogLevelOneFullLink(&$catalogLevelOneItem) {
    $catalogLevelOneItem['linkFull'] = getCatalogLevelOneLink($catalogLevelOneItem['link']);
}

function setCatalogLevelTwoWithOneLinks(&$catalog) {
    foreach ($catalog as &$catalogLevelTwoItem) {
        $catalogLevelTwoItem['linkFull'] = getCatalogLevelTwoLink($catalogLevelTwoItem['id']);
    }
}
