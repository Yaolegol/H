<?php

function getCatalogLevelTwoBreadcrumbs($catalogLevelOneItem)
{
    $breadcrumbs = [
        [
            'isLink' => true,
            'link' => '/catalog',
            'title' => 'Каталог',
        ],
    ];

    array_push($breadcrumbs, [
        'isLink' => false,
        'title' => $catalogLevelOneItem['title'],
    ]);

    return $breadcrumbs;
}

function getCatalogOffersBreadcrumbs($catalogLevelOneItem, $catalogLevelTwoItem)
{
    $breadcrumbs = [
        [
            'isLink' => true,
            'link' => '/',
            'title' => 'Каталог',
        ],
    ];

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

function getOfferBreadcrumbs()
{
    return [
        [
            'isLink' => true,
            'link' => '/catalog',
            'title' => 'Каталог',
        ],
    ];
}
