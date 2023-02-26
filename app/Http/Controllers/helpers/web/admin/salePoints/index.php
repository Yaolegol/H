<?php

use App\Models\SalePoint;

function DB_getSalePointsNotApproved() {
    try {
        return SalePoint::where([
            ['is_approved', 0],
        ])->get()->toArray();
    } catch(\Exception $err) {
        return abort(500);
    }
}

function DB_updateSalePointsApprovedStatus($id, $newStatus) {
    try {
        return SalePoint::where([
            ['id', $id],
        ])->update([
            'is_approved' => $newStatus
        ]);
    } catch(\Exception $err) {
        return abort(500);
    }
}

function _formatSalePoints(&$salePointItem) {
    _setSalePointsImages($salePointItem);
}

function formatSalePointsDataList($salePointsList) {
    return array_map(function ($salePointItem) {
        _formatSalePoints($salePointItem);

        return $salePointItem;
    }, $salePointsList);
}

function getSalePointsNotApproved() {
    $salePointsList = DB_getSalePointsNotApproved();

    return formatSalePointsDataList($salePointsList);
}

function _setSalePointsImages(&$salePointItem) {
    $salePointItem['photoArray'] = getAssetArrayFormatted($salePointItem, 'photo', 3);
}

function updateSalePointsApproveStatus($id, $newStatus) {
    DB_updateSalePointsApprovedStatus($id, $newStatus);
}
