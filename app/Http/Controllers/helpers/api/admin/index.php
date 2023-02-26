<?php

use App\Models\Offer;

function DB_updateOfferApprovedStatus($id, $newStatus, $errorMessage = '') {
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

function updateOfferApproveStatus($id, $newStatus) {
    DB_updateOfferApprovedStatus($id, $newStatus);
}

function rejectOffer($id, $request) {
    $requestData = $request->all();
    $errorMessage = $requestData['error']['message'];

    DB_updateOfferApprovedStatus($id, 0, $errorMessage);
}
