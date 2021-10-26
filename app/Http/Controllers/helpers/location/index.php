<?php

use App\Models\City;

function getCitiesList($locationList) {
    return array_map(function($regionItem) {
        $regionItemCitiesList = array_map(function($cityItem) {
            return [
                'id' => 'id__radio-input__city__' . $cityItem['id'],
                'title' => $cityItem['title'],
                'value' => $cityItem['id'],
            ];
        }, $regionItem['cities']);

        return [
            'content' => $regionItemCitiesList,
            'groupName' => 'radio-group__cities',
            'inputName' => 'city_id',
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
            'id' => 'id__radio-input__region__' . $regionItem['id'],
            'title' => $regionItem['title'],
            'value' => $regionItem['id'],
        ];
    }, $locationList);
}
