<?php

use App\Models\Offer;

function getOffer($id)
{
    $offer = array_merge(...Offer::where('id', $id)->get()->toArray());

    return setupOffer($offer);
}

function getOffers($catalogFull, $catalogLevelOneLink, $productLink, $searchCountry, $searchRegion, $searchCity)
{
    $catalogLevelTwoItem = getCatalogLevelTwoItem($catalogFull, $catalogLevelOneLink, $productLink);
    $offers = Offer::where(['catalog_level_two_id' => $catalogLevelTwoItem['id'], 'country_id' => $searchCountry, 'region_id' => $searchRegion, 'city_id' => $searchCity],)->with('catalogLevelTwo', 'user', 'measure')->get()->toArray();

    return setOffersLink($offers);
}

function setupOffer($offer)
{
    return [
        'id' => $offer['id'],
        "title" => $offer['title'],
        "description" => $offer['description'],
        "image" => $offer['image'],
        "price" => $offer['price'],
        "is_active" => $offer['is_active'],
    ];
}

function setOffersLink($offers)
{
    return array_map(function ($item) {
        $item['offerLink'] = '/' . 'offers' . '/' . $item['id'];
        return $item;
    }, $offers);
}
