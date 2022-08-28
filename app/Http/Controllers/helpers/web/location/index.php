<?php

use App\Models\Region;

function DB_getLocationList()
{
    return Region::with('cities')->get()->toArray();
}

function formatLocationList(&$locationList) {
    foreach ($locationList as &$locationItem) {
        $locationItem['catalog_level_two'] = $locationItem['cities'];
    }
}

function getCitiesList($locationList) {
    return array_map(function($regionItem) {
        $regionItemCitiesList = $regionItem['cities'];
        $regionItemCitiesListFormatted = getRegionItemCitiesListFormatted($regionItemCitiesList);

        return [
            'content' => $regionItemCitiesListFormatted,
            'listenId' => $regionItem['id'],
        ];
    }, $locationList);
}

function getCitiesWithSelectedList($locationList, $saleOfferItemData) {
    $offerCityId = $saleOfferItemData['city_id'];

    return array_map(function($regionItem) use($offerCityId) {
        $regionItemCitiesList = $regionItem['cities'];
        $regionItemCitiesListFormatted = getRegionItemCitiesListFormatted($regionItemCitiesList, $offerCityId);

        return [
            'content' => $regionItemCitiesListFormatted,
            'listenId' => $regionItem['id'],
        ];
    }, $locationList);
}

function getLocationListFormatted()
{
    $locationList = DB_getLocationList();

    formatLocationList($locationList);

    return $locationList;
}

function getLocationSearchDataFormatted($locationList, $searchCountryId, $searchRegionId, $searchCityId)
{
    $_searchCountryId = (int)$searchCountryId;
    $_searchRegionId = (int)$searchRegionId;
    $_searchCityId = (int)$searchCityId;

    $locationData = [
        'city' => null,
        'country' => null,
        'region' => null,
    ];

    foreach ($locationList as $regionItem) {
        if($regionItem['id'] === $_searchRegionId) {
            $locationData['region'] = $regionItem;

            foreach ($regionItem['cities'] as $cityItem) {
                if($cityItem['id'] === $_searchCityId) {
                    $locationData['city'] = $cityItem;
                }
            }
        }
    }

    return $locationData;
}

function getProductFilterDataFormatted($catalogFull, $catalogLevelOneId, $catalogLevelTwoId) {
    $catalogLevelOneIdFormatted = (int)$catalogLevelOneId;
    $catalogLevelTwoIdFormatted = (int)$catalogLevelTwoId;

    $productFilterData = [
        'category' => [
            'title' => 'Все продукты',
        ],
    ];

    if($catalogLevelTwoId) {
        foreach ($catalogFull as $catalogLevelOneItem) {
            $catalogLevelTwoList = $catalogLevelOneItem['catalog_level_two'];

            foreach ($catalogLevelTwoList as $catalogLevelTwoItem) {
                if($catalogLevelTwoItem['id'] === $catalogLevelTwoIdFormatted) {
                    $productFilterData['category']['title'] = $catalogLevelTwoItem['title'];
                }
            }
        }
    } elseif($catalogLevelOneId) {
        foreach ($catalogFull as $catalogLevelOneItem) {
            if($catalogLevelOneItem['id'] === $catalogLevelOneIdFormatted) {
                $productFilterData['category']['title'] = $catalogLevelOneItem['title'];
            }
        }
    }

    return $productFilterData;
}

function getRegionItemCitiesListFormatted($regionItemCitiesList, $offerCityId = 0) {
    return array_map(function($cityItem) use($offerCityId) {
        $cityItemId = $cityItem['id'];

        return [
            'isChecked' => $cityItemId === $offerCityId,
            'title' => $cityItem['title'],
            'value' => $cityItemId,
        ];
    }, $regionItemCitiesList);
}

function getRegionList($locationList) {
    return array_map(function($regionItem) {
        return [
            'title' => $regionItem['title'],
            'value' => $regionItem['id'],
        ];
    }, $locationList);
}

function getRegionWithSelectedList($locationList, $saleOfferItemData) {
    $offerRegionId = $saleOfferItemData['region_id'];

    return array_map(function($regionItem) use($offerRegionId) {
        $regionItemId = $regionItem['id'];

        return [
            'isChecked' => $regionItemId === $offerRegionId,
            'title' => $regionItem['title'],
            'value' => $regionItemId,
        ];
    }, $locationList);
}

function getSearchLocationData($request) {
    $querySearchCountryId = $request->query('search-country-id');
    $querySearchRegionId = $request->query('search-region-id');
    $querySearchCityId = $request->query('search-city-id');

    $cookieSearchCountryId = $request->cookie('search-country-id');
    $cookieSearchRegionId = $request->cookie('search-region-id');
    $cookieSearchCityId = $request->cookie('search-city-id');

    $searchCountryId = $querySearchCountryId ? $querySearchCountryId : $cookieSearchCountryId;
    $searchRegionId = $querySearchRegionId ? $querySearchRegionId : $cookieSearchRegionId;
    $searchCityId = $querySearchCityId ? $querySearchCityId : $cookieSearchCityId;

    return [
        'searchCountryId' => $searchCountryId,
        'searchRegionId' => $searchRegionId,
        'searchCityId' => $searchCityId,
    ];
}
