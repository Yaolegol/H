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

function getOfferBreadcrumbs()
{
    return [];
}
