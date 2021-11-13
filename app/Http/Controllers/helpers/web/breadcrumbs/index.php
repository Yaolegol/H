<?php

function getCatalogLevelTwoBreadcrumbs($catalogFull, $catalogLevelOneLink)
{
    $breadcrumbs = [
        [
            'isLink' => true,
            'link' => '/',
            'title' => 'Каталог',
        ],
    ];

    $catalogLevelOneItem = getCatalogLevelOneItem($catalogFull, $catalogLevelOneLink);

    array_push($breadcrumbs, [
        'isLink' => false,
        'title' => $catalogLevelOneItem['title'],
    ]);

    return $breadcrumbs;
}

function getCatalogOffersBreadcrumbs($catalogFull, $catalogLevelOneLink, $productLink)
{
    $breadcrumbs = [
        [
            'isLink' => true,
            'link' => '/',
            'title' => 'Каталог',
        ],
    ];

    $catalogLevelOneItem = getCatalogLevelOneItem($catalogFull, $catalogLevelOneLink);
    $catalogLevelTwoItem = getCatalogLevelTwoItem($catalogFull, $catalogLevelOneLink, $productLink);

    array_push($breadcrumbs,
        [
            'isLink' => true,
            'link' => $catalogLevelOneItem['linkFull'],
            'title' => $catalogLevelOneItem['title'],
        ],
        [
            'isLink' => false,
            'link' => $catalogLevelTwoItem['linkFull'],
            'title' => $catalogLevelTwoItem['title'],
        ]
    );

    return $breadcrumbs;
}

function getOfferBreadcrumbs($catalogFull, $offer)
{
    $offerCatalogLevelTwoId = $offer['catalog_level_two']['id'];
    $offerCatalogLevelOneId = $offer['catalog_level_two']['catalog_level_one_id'];

    $catalogLevelOneItemData = array_merge(...array_filter($catalogFull, function ($catalogLevelOneItem) use ($offerCatalogLevelOneId) {
        return $catalogLevelOneItem['id'] == $offerCatalogLevelOneId;
    }));

    $catalogLevelTwoItemData = array_merge(...array_filter($catalogLevelOneItemData['catalog_level_two'], function ($catalogLevelTwoItem) use ($offerCatalogLevelTwoId) {
        return $catalogLevelTwoItem['id'] == $offerCatalogLevelTwoId;
    }));


    return [
        [
            'isLink' => true,
            'link' => '/',
            'title' => 'Каталог',
        ],
        [
            'isLink' => true,
            'link' => $catalogLevelOneItemData['linkFull'],
            'title' => $catalogLevelOneItemData['title'],
        ],
        [
            'isLink' => true,
            'link' => $catalogLevelTwoItemData['linkFull'],
            'title' => $catalogLevelTwoItemData['title'],
        ]
    ];
}
