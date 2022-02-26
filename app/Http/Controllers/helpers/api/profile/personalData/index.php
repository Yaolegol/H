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

function apiTryChangeUserPersonalDataInDB($request)
{
    try {
        $name = $request->input('name');
        $phone = $request->input('phone');
        $visible_email = $request->input('visible_email');

        $authUser = Auth::user();
        $authUser->name = $name;
        $authUser->phone = $phone;
        $authUser->visible_email = $visible_email;

        $authUser->save();

        return true;
    } catch (\Exception $error) {
        return false;
    }
}

function apiTryDeleteUserAvatarInDB() {
    try {
        $authUser = Auth::user();
        $authUserId = $authUser->id;

        STORAGE_removeUserAvatar($authUserId);

        $authUser->avatar = '';
        $authUser->save();

        return true;
    } catch(\Exception $err) {
        return false;
    }
}

function apiUpdateUserAvatar($request)
{
    $authUser = Auth::user();
    $authUserId = $authUser->id;
    $avatar = $request->file('avatar');

    if ($avatar) {
        STORAGE_removeUserAvatar($authUserId);
        $avatarPath = STORAGE_saveAuthUserAvatar($avatar);

        return str_replace('public/', '/storage/', $avatarPath);
    } else {
        return '';
    }
}
