<?php

use App\Models\CatalogLevelOne;

function getCatalogLevelOne()
{
    return CatalogLevelOne::query()->with('catalogLevelTwo')->get()->toArray();
}

function getCatalogFull()
{
    $catalog = getCatalogLevelOne();

    return getCatalogLevelOneWithFullLinks($catalog);
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
