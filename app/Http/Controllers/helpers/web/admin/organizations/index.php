<?php

use App\Models\Organization;

function DB_getOrganizationsNotApproved() {
    try {
        return Organization::where([
            ['is_approved', 0],
            ['approved_error_message', '=', null],
        ])->get()->toArray();
    } catch(\Exception $err) {
        return abort(500);
    }
}

function DB_updateOrganizationApprovedStatus($id, $newStatus, $errorMessage = null) {
    try {
        return Organization::where([
            ['id', $id],
        ])->update([
            'is_approved' => $newStatus,
            'approved_error_message' => $errorMessage,
        ]);
    } catch(\Exception $err) {
        return abort(500);
    }
}

function _formatOrganization(&$organizationItem) {
    _setOrganizationImages($organizationItem);
}

function formatOrganizationsDataList($organizationsList) {
    return array_map(function ($organizationItem) {
        _formatOrganization($organizationItem);

        return $organizationItem;
    }, $organizationsList);
}

function getOrganizationsNotApproved() {
    $organizationsList = DB_getOrganizationsNotApproved();

    return formatOrganizationsDataList($organizationsList);
}

function _setOrganizationImages(&$organizationItem) {
    $organizationItem['certificateArray'] = getAssetArrayFormatted($organizationItem, 'certificate', 5);
    $organizationItem['photoArray'] = getAssetArrayFormatted($organizationItem, 'photo', 3);
}

function updateOrganizationApproveStatus($id, $newStatus) {
    DB_updateOrganizationApprovedStatus($id, $newStatus);
}

function rejectOrganization($id, $request) {
    $requestData = $request->all();
    $errorMessage = $requestData['error']['message'];

    DB_updateOrganizationApprovedStatus($id, 0, $errorMessage);
}
