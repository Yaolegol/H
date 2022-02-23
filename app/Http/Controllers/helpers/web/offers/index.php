<?php

use App\Models\Offer;

require_once('app/Http/Controllers/helpers/common/assets/index.php');

function formatOfferItem($offerItem) {
    $offerPhotoArray = [];

    $offerPhotoIteration = 1;
    while ($offerPhotoIteration <= 3) {
        $currentPhotoName = 'photo_' . $offerPhotoIteration;
        $currentPhotoValue = $offerItem[$currentPhotoName];

        if($currentPhotoValue) {
            $path = str_replace('public/', '', $currentPhotoValue);
            $url = '/storage/' . $path;

            array_push($offerPhotoArray, $url);
        }

        $offerPhotoIteration++;
    }

    $offerItem['photoArray'] = $offerPhotoArray;

    if($offerItem['organization']) {
        $organizationCertificateArray = [];
        $organizationPhotoArray = [];

        $offerOrganizationCertificateIteration = 1;
        while ($offerOrganizationCertificateIteration <= 5) {
            $currentCertificateName = 'certificate_' . $offerOrganizationCertificateIteration;
            $currentCertificateValue = $offerItem['organization'][$currentCertificateName];

            if($currentCertificateValue) {
                $path = str_replace('public/', '', $currentCertificateValue);
                $url = '/storage/' . $path;

                array_push($organizationCertificateArray, $url);
            }

            $offerOrganizationCertificateIteration++;
        }

        $offerOrganizationPhotoIteration = 1;
        while ($offerOrganizationPhotoIteration <= 3) {
            $currentPhotoName = 'photo_' . $offerOrganizationPhotoIteration;
            $currentPhotoValue = $offerItem['organization'][$currentPhotoName];

            if($currentPhotoValue) {
                $path = str_replace('public/', '', $currentPhotoValue);
                $url = '/storage/' . $path;

                array_push($organizationPhotoArray, $url);
            }

            $offerOrganizationPhotoIteration++;
        }

        $offerItem['organization']['certificateArray'] = $organizationCertificateArray;
        $offerItem['organization']['photoArray'] = $organizationPhotoArray;
    }

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

function formatOfferPhotoPath(&$offerItem) {
    $photoIteration = 1;
    while ($photoIteration < 4) {
        $currentPhotoName = 'photo_' . $photoIteration;
        $currentPhotoValue = $offerItem[$currentPhotoName];

        if ($currentPhotoValue) {
            $offerItem[$currentPhotoName] = formatAssetPath($currentPhotoValue);
        }

        $photoIteration++;
    }
}

function formatOffers($offers) {
    return array_map(function ($offerItem) {
        $offerItem['offerLink'] = getOfferLink($offerItem['id']);
        formatOfferPhotoPath($offerItem);

        return $offerItem;
    }, $offers);
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

function getOffer($id)
{
    return Offer::where('id', $id)->with([
        'catalogLevelTwo',
        'catalogLevelTwo.catalogLevelOne',
        'measure',
        'organization',
        'salePoints',
        'user',
    ])->get()->toArray();
}

function getOfferFormatted($id)
{
    $offer = getOffer($id);
    $offerItem = array_merge(...$offer);

    return formatOfferItem($offerItem);
}

function getOfferLink($id) {
    return '/' . 'offers' . '/' . $id;
}

function getOffersPaginatedData($catalogFull, $catalogLevelOneLink, $productLink, $searchCountry, $searchRegion, $searchCity)
{
    $catalogLevelTwoItem = getCatalogLevelTwoItem($catalogFull, $catalogLevelOneLink, $productLink);
    $filters = [
        'catalog_level_two_id' => $catalogLevelTwoItem['id'],
    ];
    $locationFilters = getLocationFilters($searchCountry, $searchRegion, $searchCity);
    $resultFilters = array_merge($filters, ...$locationFilters);

    $offersPaginatedData = Offer::where($resultFilters)->with([
        'catalogLevelTwo',
        'measure',
        'user',
    ])->paginate(1)->toArray();

    $offersPaginatedData['data'] = formatOffers($offersPaginatedData['data']);

    return $offersPaginatedData;
}
