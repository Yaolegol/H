<?php

use App\Models\Offer;

require_once('app/Http/Controllers/helpers/web/location/index.php');

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

function getOffersPaginatedData($catalogFull, $catalogLevelOneLink, $productLink, $searchRegion)
{
    $searchLocationData = getSearchLocationData($searchRegion);
    $catalogLevelTwoItem = getCatalogLevelTwoItem($catalogFull, $catalogLevelOneLink, $productLink);

    $searchRegionArray = [];

    foreach($searchLocationData as $searchLocationItem) {
        $id = $searchLocationItem['id'];

        if($id !== '') {
            $name = $searchLocationItem['name'] . '_id';

            array_push($searchRegionArray, [
                $name => $id,
            ]);
        }
    }

    $filters = array_merge(['catalog_level_two_id' => $catalogLevelTwoItem['id']], ...$searchRegionArray);

    $offersPaginatedData = Offer::where($filters)->with([
        'catalogLevelTwo',
        'measure',
        'user',
    ])->paginate(1)->toArray();

    $offersPaginatedData['data'] = formatOffers($offersPaginatedData['data']);

    return $offersPaginatedData;
}
