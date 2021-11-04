<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

function apiTryChangeUserAvatarInDB($request)
{
    try {
        $authUser = Auth::user();

        $avatarPath = apiUpdateUserAvatar($request);

        $authUser->save();

        return $avatarPath;
    } catch (\Exception $error) {
        return '';
    }
}

function apiUpdateUserAvatar($request)
{
    $authUser = Auth::user();
    $authUserId = $authUser->id;
    $avatar = $request->file('avatar');

    if ($avatar) {
        removeUserAvatarFromStorage($authUserId);
        $avatarPath = saveAuthUserAvatarInDB($avatar);

        return str_replace('public/', '/storage/', $avatarPath);
    } else {
        return '';
    }
}
