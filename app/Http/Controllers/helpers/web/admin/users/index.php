<?php

use App\Models\User;

function DB_getUsersNotApproved() {
    try {
        return User::where([
            ['is_approved', 0],
        ])->get()->toArray();
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
