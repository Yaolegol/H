<?php

use App\Models\User;

function DB_getUsersNotApproved() {
    try {
        return User::where([
            ['is_approved', 0],
            ['approved_error_message', null],
        ])->get()->toArray();
    } catch(\Exception $err) {
        return abort(500);
    }
}

function DB_updateUserApprovedStatus($id, $newStatus, $errorMessage = null) {
    try {
        return User::where([
            ['id', $id],
        ])->update([
            'is_approved' => $newStatus,
            'approved_error_message' => $errorMessage
        ]);
    } catch(\Exception $err) {
        return abort(500);
    }
}

function _formatUser(&$userItem) {
    _setUserAvatar($userItem);
}

function formatUsersDataList($usersList) {
    return array_map(function ($userItem) {
        _formatUser($userItem);

        return $userItem;
    }, $usersList);
}

function getUsersNotApproved() {
    $usersList = DB_getUsersNotApproved();

    return formatUsersDataList($usersList);
}

function _setUserAvatar(&$userItem) {
    $url = formatAssetPath($userItem['avatar']);

    $userItem['avatar_photo'] = $url;
}

function updateUserApproveStatus($id, $newStatus) {
    DB_updateUserApprovedStatus($id, $newStatus);
}

function rejectUser($id, $request) {
    $requestData = $request->all();
    $errorMessage = $requestData['error']['message'];

    DB_updateUserApprovedStatus($id, 0, $errorMessage);
}
