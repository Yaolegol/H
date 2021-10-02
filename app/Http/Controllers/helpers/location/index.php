<?php

use App\Models\City;

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
