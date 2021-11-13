<?php

use App\Models\Region;

function getCitiesList($locationList) {
    return array_map(function($regionItem) {
        $regionItemCitiesList = array_map(function($cityItem) {
            $cityItemId = $cityItem['id'];

            return [
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

function getLocationList()
{
    return Region::with('cities')->get()->toArray();
}

function getLocationListFormatted()
{
    return getLocationList();
}

function getLocationSearchFormatted($locationList, $searchCountryId, $searchRegionId, $searchCityId)
{
    $locationData = [
        'city' => null,
        'country' => null,
        'region' => null,
    ];

    foreach ($locationList as $regionItem) {
        if($regionItem['id'] == $searchRegionId) {
            $locationData['region'] = $regionItem;

            foreach ($regionItem['cities'] as $cityItem) {
                if($cityItem['id'] == $searchCityId) {
                    $locationData['city'] = $cityItem;
                }
            }
        }
    }

    return $locationData;
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
