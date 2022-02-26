<?php

use App\Models\Offer;

require_once('app/Http/Controllers/helpers/common/assets/index.php');

function DB_getOffer($id)
{
    try {
        return Offer::where('id', $id)->with([
            'catalogLevelTwo',
            'catalogLevelTwo.catalogLevelOne',
            'measure',
            'organization',
            'salePoints',
            'user',
        ])->get()->toArray();
    } catch(\Exception $err) {
        return abort(500);
    }
}

function DB_getOffers($filters) {
    try {
        return Offer::where($filters)->with([
            'catalogLevelTwo',
            'measure',
            'user',
        ])->paginate(25)->toArray();
    } catch(\Exception $err) {
        return abort(500);
    }
}

function formatOfferItem($offerItem) {
    if($offerItem['sale_points']) {
        foreach ($offerItem['sale_points'] as $key => $salePointItem) {
            $salePointPhotoArray = [];

            $salePointPhotoIteration = 1;
            while ($salePointPhotoIteration <= 3) {
                $currentPhotoName = 'photo_' . $salePointPhotoIteration;
                $currentPhotoValue = $salePointItem[$currentPhotoName];

                if($currentPhotoValue) {
                    $path = str_replace('public/', '', $currentPhotoValue);
                    $url = '/storage/' . $path;

                    array_push($salePointPhotoArray, $url);
                }

                $salePointPhotoIteration++;
            }

            $offerItem['sale_points'][$key]['photoArray'] = $salePointPhotoArray;
        }
    }

    return $offerItem;
}

function formatOffer($offer) {
    setOfferLink($offer);
    setOfferPhotoArray($offer);
    setOfferOrganizationData($offer);

    return $offer;
}

function formatOffers($offers) {
    return array_map(function ($offerItem) {
        return formatOffer($offerItem);
    }, $offers);
}

function formatOffersPaginatedData($offersPaginatedData) {
    $offersPaginatedData['data'] = formatOffers($offersPaginatedData['data']);

    return $offersPaginatedData;
}

function getLocationFilters($searchCountryId, $searchRegionId, $searchCityId) {
    $locationFilters = [];

    if($searchCountryId) {
        array_push($locationFilters, [
            'country_id' => $searchCountryId,
        ]);
    }

    if($searchRegionId) {
        array_push($locationFilters, [
            'region_id' => $searchRegionId,
        ]);
    }

    if($searchCityId) {
        array_push($locationFilters, [
            'city_id' => $searchCityId,
        ]);
    }

    return $locationFilters;
}

function getOfferFormatted($id)
{
    $offer = DB_getOffer($id);
    $offerItem = array_merge(...$offer);

    return formatOfferItem($offerItem);
}

function getOfferLink($id) {
    return '/' . 'offers' . '/' . $id;
}

function getOffersFilters($catalogLevelTwoItemId, $searchCountry, $searchRegion, $searchCity) {
    $filters = [
        'catalog_level_two_id' => $catalogLevelTwoItemId,
    ];
    $locationFilters = getLocationFilters($searchCountry, $searchRegion, $searchCity);

    return array_merge($filters, ...$locationFilters);
}

function getOffersPaginatedData($catalogLevelTwoItem, $searchCountry, $searchRegion, $searchCity)
{
    $filters = getOffersFilters($catalogLevelTwoItem['id'], $searchCountry, $searchRegion, $searchCity);
    $offersPaginatedData = DB_getOffers($filters);

    return formatOffersPaginatedData($offersPaginatedData);
}

function setOfferLink(&$offerItem) {
    $offerItem['offerLink'] = getOfferLink($offerItem['id']);
}

function setOfferOrganizationData(&$offerItem) {
    if(!isset($offerItem['organization'])) {
        return;
    }

    $offerOrganization = &$offerItem['organization'];

    $offerItem['certificateArray'] = getAssetArrayFormatted($offerOrganization, 'certificate', 5);
    $offerItem['photoArray'] = getAssetArrayFormatted($offerOrganization, 'photo', 3);
}

function setOfferPhotoArray(&$offerItem) {
    $offerItem['photoArray'] = getAssetArrayFormatted($offerItem, 'photo', 3);
}
