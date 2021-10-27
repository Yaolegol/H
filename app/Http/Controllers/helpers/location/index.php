<?php

use App\Models\City;

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

function getNewArray($arr)
{
    return array_combine(array_keys($arr), array_values($arr));
}

function getLocationList()
{
    return City::where('country_id', '1')->with('region', 'country')->get()->toArray();
}

function getLocationListFormatted()
{
    $cityList = getLocationList();

    return array_reduce($cityList, function ($acc, $city) {
        $cityNew = getNewArray($city);
        $region = $cityNew['region'];
        unset($cityNew['region']);
        $regionId = $region['id'];
        $isRegionIdExists = false;

        if ($acc !== null) {
            $isRegionIdExists = array_key_exists($regionId, $acc);
        }

        if ($isRegionIdExists) {
            array_push($acc[$regionId]['cities'], $cityNew);
        } else {
            $region['cities'] = [$cityNew];
            $acc[$regionId] = $region;
        }

        return $acc;
    });
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
