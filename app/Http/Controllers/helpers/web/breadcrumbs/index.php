<?php

function getCatalogLevelTwoBreadcrumbs($catalogFull, $catalogLevelOneLink)
{
    $breadcrumbs = [
        [
            'active' => false,
            'link' => '/',
            'title' => 'Каталог',
        ],
    ];

    $catalogLevelOneItem = getCatalogLevelOneItem($catalogFull, $catalogLevelOneLink);

    array_push($breadcrumbs, [
        'active' => true,
        'title' => $catalogLevelOneItem['title'],
    ]);

    return $breadcrumbs;
}

function getCatalogOffersBreadcrumbs($catalogFull, $catalogLevelOneLink, $productLink)
{
    $breadcrumbs = [
        [
            'active' => false,
            'link' => '/',
            'title' => 'Каталог',
        ],
    ];

    $catalogLevelOneItem = getCatalogLevelOneItem($catalogFull, $catalogLevelOneLink);
    $catalogLevelTwoItem = getCatalogLevelTwoItem($catalogFull, $catalogLevelOneLink, $productLink);

    array_push($breadcrumbs,
        [
            'active' => false,
            'link' => $catalogLevelOneItem['linkFull'],
            'title' => $catalogLevelOneItem['title'],
        ],
        [
            'active' => true,
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
            'active' => false,
            'link' => '/',
            'title' => 'Каталог',
        ],
        [
            'active' => false,
            'link' => $catalogLevelOneItemData['linkFull'],
            'title' => $catalogLevelOneItemData['title'],
        ],
        [
            'active' => true,
            'link' => $catalogLevelTwoItemData['linkFull'],
            'title' => $catalogLevelTwoItemData['title'],
        ]
    ];
}
