<?php

use App\Models\Offer;

function formatOfferItem($offerItem) {
    $photoArray = [];

    $iteration = 1;
    while ($iteration <= 3) {
        $currentPhotoName = 'photo_' . $iteration;
        $currentPhotoValue = $offerItem[$currentPhotoName];

        if($currentPhotoValue) {
            array_push($photoArray, $currentPhotoValue);
        }

        $iteration++;
    }

    $offerItem['photoArray'] = $photoArray;

//    dd($offerItem);

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
