<?php

use App\Models\City;
use App\Models\Region;

function formatLocationList($locationList) {
    return array_map(function($regionItem) {
        $regionItem['linkFull'] = 'region' . '_' . $regionItem['link'];

        $formattedCities = array_map(function($city) use ($regionItem) {
            $cityLink = 'city' . '_' . $city['link'];
            $city['linkFull'] = $regionItem['linkFull'] . '-' . $cityLink;

            return $city;
        }, $regionItem['cities']);

        $regionItem['cities'] = $formattedCities;

        return $regionItem;
    }, $locationList);
}

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
    $locationList = getLocationList();
    $formattedLocationList = formatLocationList($locationList);

    return $formattedLocationList;
}

function getLocationSearchFormatted($locationList, $searchRegion)
{
    $locationData = [
        'city' => null,
        'country' => null,
        'region' => null,
    ];

    $searchLocationData = getSearchLocationData($searchRegion);

    foreach ($locationList as $regionItem) {
        if($regionItem['id'] == $searchLocationData['regionData']['id']) {
            $locationData['region'] = $regionItem;

            foreach ($regionItem['cities'] as $cityItem) {
                if($cityItem['id'] == $searchLocationData['cityData']['id']) {
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

function getSearchLocationCityData($searchCity) {
    $searchCityData = [
        'id' => '',
        'link' => '',
        'title' => '',
    ];
    $searchCityArray = explode('_', $searchCity);
    $searchCityArrayLength = count($searchCityArray);

    if($searchCityArrayLength === 2) {
        $searchCityLink = $searchCityArray[1];
        $searchCityDataDB = getSearchLocationCityDataFromDB($searchCityLink);
        $searchCityDataDBFormatted = array_merge(...$searchCityDataDB);

        $searchCityData = [
            'id' => $searchCityDataDBFormatted['id'],
            'link' => $searchCityDataDBFormatted['link'],
            'title' => $searchCityDataDBFormatted['title'],
        ];
    }

    return $searchCityData;
}

function getSearchLocationCityDataFromDB($searchCityLink) {
    return City::where([
        'link' => $searchCityLink,
    ])->get()->toArray();
}

function getSearchLocationData($searchLocation) {
    $searchLocationArray = explode('-', $searchLocation);
    $searchLocationArrayLength = count($searchLocationArray);

    $searchCountryData = [
        'id' => '1',
        'link' => '',
        'title' => 'Россия'
    ];
    $searchRegionData = [
        'id' => '',
        'link' => '',
        'title' => ''
    ];
    $searchCityData = [
        'id' => '',
        'link' => '',
        'title' => ''
    ];

    if($searchLocationArrayLength > 0) {
        $searchRegionData = getSearchLocationRegionData($searchLocationArray[0]);
    }

    if($searchLocationArrayLength > 1) {
        $searchCityData = getSearchLocationCityData($searchLocationArray[1]);
    }

    return [
        'countryData' => $searchCountryData,
        'regionData' => $searchRegionData,
        'cityData' => $searchCityData,
    ];
}

function getSearchLocationRegionData($searchRegion) {
    $searchRegionData = [
        'id' => '',
        'link' => '',
        'title' => '',
    ];
    $searchRegionArray = explode('_', $searchRegion);
    $searchRegionArrayLength = count($searchRegionArray);

    if($searchRegionArrayLength === 2) {
        $searchRegionLink = $searchRegionArray[1];
        $searchRegionDataDB = getSearchLocationRegionDataFromDB($searchRegionLink);
        $searchRegionDataDBFormatted = array_merge(...$searchRegionDataDB);

        $searchRegionData = [
            'id' => $searchRegionDataDBFormatted['id'],
            'link' => $searchRegionDataDBFormatted['link'],
            'title' => $searchRegionDataDBFormatted['title'],
        ];
    }

    return $searchRegionData;
}

function getSearchLocationRegionDataFromDB($searchRegionLink) {
    return Region::where([
        'link' => $searchRegionLink,
    ])->get()->toArray();
}
