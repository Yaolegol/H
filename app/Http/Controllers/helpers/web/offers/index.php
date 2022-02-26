<?php

use App\Models\Offer;

require_once('app/Http/Controllers/helpers/common/assets/index.php');

function DB_getOffer($id)
{
    try {
        $offerData = Offer::where('id', $id)->with([
            'catalogLevelTwo',
            'catalogLevelTwo.catalogLevelOne',
            'measure',
            'organization',
            'salePoints',
            'user',
        ])->get()->toArray();

        if(empty($offerData)) {
            return abort(400);
        }

        return $offerData;
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

function formatOffer($offerItem) {
    setOfferLink($offerItem);
    setOfferPhotoArray($offerItem);
    setOfferOrganizationData($offerItem);
    setOfferSalePointsData($offerItem);
    setOfferCatalogLinks($offerItem);

    return $offerItem;
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

    return formatOffer($offerItem);
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

function setOfferCatalogLinks(&$offerItem) {
    $offerItemCatalogLevelTwo = &$offerItem['catalog_level_two'];
    $offerItemCatalogLevelOne = &$offerItemCatalogLevelTwo['catalog_level_one'];
    $offerItemCatalogLevelTwoLink = $offerItemCatalogLevelTwo['link'];
    $offerItemCatalogLevelOneLink = $offerItemCatalogLevelOne['link'];

    $offerItemCatalogLevelTwo['linkFull'] = getCatalogLevelOneLink($offerItemCatalogLevelOneLink);
    $offerItemCatalogLevelOne['linkFull'] = getCatalogLevelTwoLink($offerItemCatalogLevelOneLink, $offerItemCatalogLevelTwoLink);
}

function setOfferLink(&$offerItem) {
    $offerItem['offerLink'] = getOfferLink($offerItem['id']);
}

function setOfferOrganizationData(&$offerItem) {
    if(!isset($offerItem['organization'])) {
        return;
    }

    $offerOrganization = &$offerItem['organization'];

    $offerOrganization['certificateArray'] = getAssetArrayFormatted($offerOrganization, 'certificate', 5);
    $offerOrganization['photoArray'] = getAssetArrayFormatted($offerOrganization, 'photo', 3);
}

function setOfferPhotoArray(&$offerItem) {
    $offerItem['photoArray'] = getAssetArrayFormatted($offerItem, 'photo', 3);
}

function setOfferSalePointsData(&$offerItem) {
    if(!isset($offerItem['sale_points'])) {
        return;
    }

    foreach ($offerItem['sale_points'] as $salePointItem) {
        $salePointItem['photoArray'] = getAssetArrayFormatted($salePointItem, 'photo', 3);
    }
}
