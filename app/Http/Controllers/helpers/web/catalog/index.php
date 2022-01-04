<?php

use App\Models\CatalogLevelOne;

function getCatalogCategoriesList($catalogFull) {
    return array_map(function($catalogItem) {
        return [
            'title' => $catalogItem['title'],
            'value' => $catalogItem['id'],
        ];
    }, $catalogFull);
}

function getCatalogCategoriesWithSelectedList($catalogFull, $saleOfferItemData) {
    return array_map(function($catalogLevelOneItem) use($saleOfferItemData) {
        $catalogLevelOneItemId = $catalogLevelOneItem['id'];
        $saleOfferItemDataCatalogId = $saleOfferItemData['catalog_level_two_id'];
        $catalogLevelTwoItemsList = $catalogLevelOneItem['catalog_level_two'];

        $isChecked = false;

        foreach ($catalogLevelTwoItemsList as $catalogLevelTwoItem) {
            $catalogLevelTwoItemId = $catalogLevelTwoItem['id'];

            if($catalogLevelTwoItemId === $saleOfferItemDataCatalogId) {
                $isChecked = true;
            }
        }

        return [
            'isChecked' => $isChecked,
            'title' => $catalogLevelOneItem['title'],
            'value' => $catalogLevelOneItemId,
        ];
    }, $catalogFull);
}

function getCatalogSubCategoriesList($catalogFull) {
    return array_map(function($catalogItem) {
        $catalogLevelTwoItemsList = array_map(function($catalogLevelTwoItem) {
            return [
                'title' => $catalogLevelTwoItem['title'],
                'value' => $catalogLevelTwoItem['id'],
            ];
        }, $catalogItem['catalog_level_two']);

        return [
            'content' => $catalogLevelTwoItemsList,
            'listenId' => $catalogItem['id'],
        ];
    }, $catalogFull);
}

function getCatalogSubCategoriesWithSelectedList($catalogFull, $saleOfferItemData) {
    return array_map(function($catalogLevelOneItem) use($saleOfferItemData) {
        $catalogLevelTwoItemsList = array_map(function($catalogLevelTwoItem) use($saleOfferItemData) {
            $catalogLevelTwoItemId = $catalogLevelTwoItem['id'];
            $saleOfferItemDataCatalogId = $saleOfferItemData['catalog_level_two_id'];

            return [
                'isChecked' => $catalogLevelTwoItemId === $saleOfferItemDataCatalogId,
                'title' => $catalogLevelTwoItem['title'],
                'value' => $catalogLevelTwoItemId,
            ];
        }, $catalogLevelOneItem['catalog_level_two']);

        return [
            'content' => $catalogLevelTwoItemsList,
            'listenId' => $catalogLevelOneItem['id'],
        ];
    }, $catalogFull);
}

function getCatalogFull()
{
    $catalog = getCatalogLevelOne();

    return getCatalogFullWithFullLinks($catalog);
}

function getCatalogLevelOne($withLevelTwo = true)
{
    $withLevelTwoArray = ['catalogLevelTwo'];
    $withoutLevelTwoArray = [];

    return CatalogLevelOne::query()
        ->with($withLevelTwo ? $withLevelTwoArray : $withoutLevelTwoArray)
        ->get()
        ->toArray();
}

function getCatalogLevelOneFormatted()
{
    $catalog = getCatalogLevelOne(false);

    return getCatalogLevelOneWithFullLinks($catalog);
}

function getCatalogLevelOneWithFullLinks($catalog) {
    foreach ($catalog as &$catalogLevelOneItem) {
        $catalogLevelOneItem['linkFull'] = '/catalog/' . $catalogLevelOneItem['link'];
    }

    return $catalog;
}

function getCatalogFullWithFullLinks($catalog)
{
    foreach ($catalog as &$catalogLevelOneItem) {
        $catalogLevelOneItem['linkFull'] = '/catalog/' . $catalogLevelOneItem['link'];

        foreach ($catalogLevelOneItem['catalog_level_two'] as &$catalogLevelTwoItem) {
            $catalogLevelTwoItem['linkFull'] = $catalogLevelOneItem['linkFull'] . '/' . $catalogLevelTwoItem['link'];
        }
    }

    return array_merge($catalog, $catalog, $catalog, $catalog, $catalog, $catalog, $catalog, $catalog);
}

function getCatalogLevelOneItem($catalogFull, $catalogLevelOneLink)
{
    return array_merge(...array_filter($catalogFull, function ($catalogLevelOneItem) use ($catalogLevelOneLink) {
        return $catalogLevelOneItem['link'] === $catalogLevelOneLink;
    }));
}

function getCatalogLevelTwoItem($catalogFull, $catalogLevelOneLink, $catalogLevelTwoLink)
{
    $catalogLevelOneItem = getCatalogLevelOneItem($catalogFull, $catalogLevelOneLink);

    return array_merge(...array_filter($catalogLevelOneItem['catalog_level_two'], function ($catalogLevelTwoItem) use ($catalogLevelTwoLink) {
        return $catalogLevelTwoItem['link'] === $catalogLevelTwoLink;
    }));
}

function getCatalogLevelOneItemSubcategoriesList($catalogFull, $catalogLevelOneLink)
{
    $catalogLevelOneItem = getCatalogLevelOneItem($catalogFull, $catalogLevelOneLink);

    return $catalogLevelOneItem['catalog_level_two'];
}
