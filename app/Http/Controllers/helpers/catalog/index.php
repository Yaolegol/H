<?php

use App\Models\Catalog;
use App\Models\City;
use App\Models\Offer;

function getCatalog()
{
    return Catalog::all()->toArray();
}

function getCatalogBreadcrumbsLevel2($catalogFull, $catalogLevel2Link)
{
    $breadcrumbs = [
        [
            'active' => false,
            'link' => '/',
            'title' => 'Каталог',
        ],
    ];
    $catalogLevel2 = getCatalogLevel2($catalogFull, $catalogLevel2Link);
    array_push($breadcrumbs, [
        'active' => true,
        'title' => $catalogLevel2['title'],
    ]);

    return $breadcrumbs;
}

function getCatalogFormatted($catalog)
{
    return array_reduce(
        $catalog,
        function ($acc, $catalogItem) use ($catalog) {
            $catalogItemNew = getNewArray($catalogItem);
            if ($catalogItemNew['level'] === 1) {
                $title = $catalogItemNew['title'];
                $categoriesList = array_filter($catalog, function ($item) use ($catalogItemNew) {
                    return $item['previous_level_id'] === $catalogItemNew['id'];
                });
                $categoriesListFormatted = array_map(function ($item) {
                    return [
                        'id' => $item['id'],
                        'image' => $item['image'],
                        'link' => $item['link'],
                        'linkFull' => $item['linkFull'],
                        'previousLevelId' => $item['previous_level_id'],
                        'title' => $item['title'],
                    ];
                }, $categoriesList);

                array_push(
                    $acc,
                    [
                        'content' => [
                            'categoriesList' => array_values($categoriesListFormatted),
                            'title' => $title,
                        ],
                        'id' => $catalogItemNew['id'],
                        'image' => $catalogItemNew['image'],
                        'link' => $catalogItemNew['link'],
                        'linkFull' => $catalogItemNew['linkFull'],
                        'title' => $title,
                    ]
                );
            }

            return $acc;
        },
        []
    );
}

function getCatalogFull()
{
    $catalog = getCatalog();
    $catalogFormattedLinks = setCatalogFullLinks($catalog);

    return getCatalogFormatted($catalogFormattedLinks);
}

function getCatalogLevel2($catalogFull, $link)
{
    $catalogItem = array_merge(...array_filter($catalogFull, function ($item) use ($link) {
        return $item['link'] === $link;
    }));
    $catalogItemId = $catalogItem['id'];

    return array_merge(...array_filter($catalogFull, function ($item) use ($catalogItemId) {
        return $item['id'] === $catalogItemId;
    }));
}

function getCatalogLevel2CategoriesList($catalogFull, $link)
{
    $catalogLevel2 = getCatalogLevel2($catalogFull, $link);

    return $catalogLevel2['content']['categoriesList'];
}

function getNewArray($arr)
{
    return array_combine(array_keys($arr), array_values($arr));
}

function getOfferBreadcrumbs()
{
    return [];
}

function getOffers($productLink)
{
    $catalogProduct = array_merge(...Catalog::where(['link' => $productLink, 'level' => 2])->get()->toArray());
    $offers = Offer::where('catalog_id', $catalogProduct['id'])->with('catalog', 'seller', 'seller.region', 'measure')->get()->toArray();

    return setupOffers($offers);
}

function getCatalogOffersBreadcrumbs($catalogFull, $catalogLevel2Link, $productLink)
{
    $breadcrumbs = [
        [
            'active' => false,
            'link' => '/',
            'title' => 'Каталог',
        ],
    ];

    $catalogLevel2Item = array_merge(...array_filter(
        $catalogFull,
        function ($item) use ($catalogLevel2Link) {
            return $item['link'] === $catalogLevel2Link;
        }
    ));

    $catalogProduct = array_merge(...array_filter(
        $catalogLevel2Item['content']['categoriesList'],
        function ($item) use ($catalogLevel2Item, $productLink) {
            return $item['previousLevelId'] === $catalogLevel2Item['id'] && $item['link'] === $productLink;
        }
    ));

    array_push($breadcrumbs,
        [
            'active' => false,
            'link' => '/' . 'catalog' . '/' . $catalogLevel2Item['link'],
            'title' => $catalogLevel2Item['title'],
        ],
        [
            'active' => true,
            'link' => '/' . 'catalog' . '/' . $catalogLevel2Item['link'] . '/' . $catalogProduct['link'],
            'title' => $catalogProduct['title'],
        ]
    );

    return $breadcrumbs;
}

function getOffer($id)
{
    $offer = array_merge(...Offer::where('id', $id)->get()->toArray());

    return setupOffer($offer);
}

function setCatalogFullLinks($catalog)
{
    return array_map(
        function ($catalogItem) use ($catalog) {
            $catalogItemNew = getNewArray($catalogItem);
            if ($catalogItemNew['level'] === 1) {
                $catalogItemNew['linkFull'] = '/' . 'catalog' . '/' . $catalogItemNew['link'];
            } elseif ($catalogItemNew['level'] === 2) {
                $previousLevelId = $catalogItemNew['previous_level_id'];
                $previousLevelItemIndex = array_search($previousLevelId, array_column($catalog, 'id'));
                $previousLevelItem = $catalog[$previousLevelItemIndex];

                $catalogItemNew['linkFull'] = '/' . 'catalog' . '/' . $previousLevelItem['link'] . '/' . $catalogItemNew['link'];
            }

            return $catalogItemNew;
        },
        $catalog
    );
}

function getLocationList() {
    return City::where('country_id', '1')->with('region', 'country')->get()->toArray();
}

function setupOffer($offer)
{
    return [
        'id' => $offer['id'],
        "title" => $offer['title'],
        "description" => $offer['description'],
        "image" => $offer['image'],
        "price" => $offer['price'],
        "is_active" => $offer['is_active'],
    ];
}

function setupOffers($offers)
{
    return array_map(function ($item) {
        $itemNew = getNewArray($item);
        $itemNew['offerLink'] = '/' . 'offers' . '/' . $itemNew['id'];
        return $itemNew;
    }, $offers);
}
