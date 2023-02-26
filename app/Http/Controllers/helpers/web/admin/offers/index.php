<?php

use App\Models\Offer;

function DB_getOffersNotApproved() {
    try {
        return Offer::where([
            ['is_approved', 0],
        ])->with([
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

function getOffersNotApproved() {
     $offers = DB_getOffersNotApproved();

     return formatOffers($offers);
}
