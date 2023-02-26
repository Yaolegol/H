<?php

use App\Models\SalePoint;

function DB_getSalePointsNotApproved() {
    try {
        return SalePoint::where([
            ['is_approved', 0],
            ['approved_error_message', '=', null],
        ])->get()->toArray();
    } catch(\Exception $err) {
        return abort(500);
    }
}

function DB_updateSalePointsApprovedStatus($id, $newStatus, $errorMessage = null) {
    try {
        return SalePoint::where([
            ['id', $id],
        ])->update([
            'is_approved' => $newStatus,
            'approved_error_message' => $errorMessage,
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

function rejectSalePoint($id, $request) {
    $requestData = $request->all();
    $errorMessage = $requestData['error']['message'];

    DB_updateSalePointsApprovedStatus($id, 0, $errorMessage);
}
