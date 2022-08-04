<?php

use App\Models\Offer;

function DB_updateOfferApprovedStatus($id, $newStatus) {
    try {
        return Offer::where([
            ['id', $id],
        ])->update([
            'is_approved' => $newStatus
        ]);
    } catch(\Exception $err) {
        return abort(500);
    }
}

function updateOfferApproveStatus($id, $newStatus) {
    DB_updateOfferApprovedStatus($id, $newStatus);
}
