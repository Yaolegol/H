<?php

use App\Models\CatalogLevelOne;

function getCatalogCategoriesList($catalogFull) {
    return array_map(function($catalogItem) {
        return [
            'id' => 'id__radio-input__catalog-level-one__' . $catalogItem['id'],
            'title' => $catalogItem['title'],
            'value' => $catalogItem['id'],
        ];
    }, $catalogFull);
}

function getCatalogSubCategoriesList($catalogFull) {
    return array_map(function($catalogItem) {
        $catalogLevelTwoItemsList = array_map(function($catalogLevelTwoItem) {
            return [
                'id' => 'id__radio-input__catalog-level-two__' . $catalogLevelTwoItem['id'],
                'title' => $catalogLevelTwoItem['title'],
                'value' => $catalogLevelTwoItem['id'],
            ];
        }, $catalogItem['catalog_level_two']);

        return [
            'content' => $catalogLevelTwoItemsList,
            'groupName' => 'radio-group__catalog_level_two',
            'inputName' => 'catalog_level_two_id',
            'listenId' => $catalogItem['id'],
        ];
    }, $catalogFull);
}

function getCatalogFull()
{
    $catalog = getCatalogLevelOne();

    return getCatalogLevelOneWithFullLinks($catalog);
}

function getCatalogLevelOne()
{
    return CatalogLevelOne::query()->with('catalogLevelTwo')->get()->toArray();
}

function getCatalogLevelOneWithFullLinks($catalog)
{
    foreach ($catalog as &$catalogLevelOneItem) {
        $catalogLevelOneItem['linkFull'] = '/catalog/' . $catalogLevelOneItem['link'];

        foreach ($catalogLevelOneItem['catalog_level_two'] as &$catalogLevelTwoItem) {
            $catalogLevelTwoItem['linkFull'] = $catalogLevelOneItem['linkFull'] . '/' . $catalogLevelTwoItem['link'];
        }
    }

    return $catalog;
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
