<?php

use App\Models\Offer;

function DB_getOffersNotApproved() {
    try {
        return Offer::where([
            ['is_approved', 0],
            ['approved_error_message', '=', null],
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

function DB_updateOfferApprovedStatus($id, $newStatus, $errorMessage = null) {
    try {
        return Offer::where([
            ['id', $id],
        ])->update([
            'is_approved' => $newStatus,
            'approved_error_message' => $errorMessage,
        ]);
    } catch(\Exception $err) {
        return abort(500);
    }
}

function getOffersNotApproved() {
     $offers = DB_getOffersNotApproved();

     return formatOffers($offers);
}

function updateOfferApproveStatus($id, $newStatus) {
    DB_updateOfferApprovedStatus($id, $newStatus);
}

function rejectOffer($id, $request) {
    $requestData = $request->all();
    $errorMessage = $requestData['error']['message'];

    DB_updateOfferApprovedStatus($id, 0, $errorMessage);
}
