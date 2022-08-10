<?php

use App\Models\Offer;

function API_DB_getOffer($id)
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

function API_DB_getOffers($filters = []) {
    try {
        $filter = [
            'is_approved' => 1,
        ];
        $filtersData = array_merge($filter, $filters);

        return Offer::where($filtersData)->with([
            'catalogLevelTwo',
            'catalogLevelTwo.catalogLevelOne',
            'measure',
            'organization',
            'salePoints',
            'user',
        ])->paginate(25)->toArray();
    } catch(\Exception $err) {
        return abort(500);
    }
}

function api_getOffers($id, $searchCountryId = null, $searchRegionId = null, $searchCityId = null) {
    $filters = getOffersFilters($id, $searchCountryId, $searchRegionId, $searchCityId);

    $offers = API_DB_getOffers($filters);

    return formatOffersPaginatedData($offers);
}
