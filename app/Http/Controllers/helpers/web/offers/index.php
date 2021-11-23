<?php

use App\Models\Offer;

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

function formatOffers($offers) {
    return array_map(function ($item) {
        $item['offerLink'] = '/' . 'offers' . '/' . $item['id'];

        $photoIteration = 1;
        while ($photoIteration <= 3) {
            $currentPhotoName = 'photo_' . $photoIteration;
            $currentPhotoValue = $item[$currentPhotoName];

            if ($currentPhotoValue) {
                $path = str_replace('public/', '', $currentPhotoValue);
                $item[$currentPhotoName] = '/storage/' . $path;
            }

            $photoIteration++;
        }

        return $item;
    }, $offers);
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

function getOffers($catalogFull, $catalogLevelOneLink, $productLink, $searchCountry, $searchRegion, $searchCity)
{
    $catalogLevelTwoItem = getCatalogLevelTwoItem($catalogFull, $catalogLevelOneLink, $productLink);
    $offers = Offer::where([
        'catalog_level_two_id' => $catalogLevelTwoItem['id'],
        'country_id' => $searchCountry,
        'region_id' => $searchRegion,
        'city_id' => $searchCity
    ])->with([
        'catalogLevelTwo',
        'measure',
        'user',
    ])->get()->toArray();

    return formatOffers($offers);
}
