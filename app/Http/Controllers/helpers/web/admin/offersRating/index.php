<?php

use App\Models\OfferRating;

function DB_getOffersRatingNotApproved() {
    try {
        return OfferRating::where([
            ['is_removed', false],
            ['is_comment_approved', 0],
            ['approved_comment_error_message', '=', null],
        ])->get()->toArray();
    } catch(\Exception $err) {
        return abort(500);
    }
}

function DB_updateOfferRatingApprovedStatus($id, $newStatus, $errorMessage = null) {
    try {
        return OfferRating::where([
            ['id', $id],
        ])->update([
            'is_comment_approved' => $newStatus,
            'approved_comment_error_message' => $errorMessage,
        ]);
    } catch(\Exception $err) {
        return abort(500);
    }
}

function getOffersRatingNotApproved() {
    return DB_getOffersRatingNotApproved();
}

function updateOfferRatingApproveStatus($id, $newStatus) {
    DB_updateOfferRatingApprovedStatus($id, $newStatus);
}

function rejectOfferRating($id, $request) {
    $requestData = $request->all();
    $errorMessage = $requestData['error']['message'];

    DB_updateOfferRatingApprovedStatus($id, 0, $errorMessage);
}
