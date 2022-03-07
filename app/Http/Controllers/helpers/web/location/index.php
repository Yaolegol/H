<?php

use App\Models\Region;

function DB_getLocationList()
{
    return Region::with('cities')->get()->toArray();
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
    return array_map(function($regionItem) use($saleOfferItemData) {
        $regionItemCitiesList = array_map(function($cityItem) use($saleOfferItemData) {
            $cityItemId = $cityItem['id'];
            $saleOfferItemDataCityId = $saleOfferItemData['city_id'];

            return [
                'isChecked' => $cityItemId === $saleOfferItemDataCityId,
                'title' => $cityItem['title'],
                'value' => $cityItemId,
            ];
        }, $regionItem['cities']);

        return [
            'content' => $regionItemCitiesList,
            'listenId' => $regionItem['id'],
        ];
    }, $locationList);
}

function getLocationListFormatted()
{
    return DB_getLocationList();
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

function getRegionItemCitiesListFormatted($regionItemCitiesList) {
    return array_map(function($cityItem) {
        $cityItemId = $cityItem['id'];

        return [
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
    return array_map(function($regionItem) use($saleOfferItemData) {
        $regionItemId = $regionItem['id'];
        $saleOfferItemDataRegionId = $saleOfferItemData['region_id'];

        return [
            'isChecked' => $regionItemId === $saleOfferItemDataRegionId,
            'title' => $regionItem['title'],
            'value' => $regionItemId,
        ];
    }, $locationList);
}
