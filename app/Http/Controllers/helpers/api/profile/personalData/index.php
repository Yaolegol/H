<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

function ApiGetProfileAvatarValidator($request) {
    return Validator::make(
        $request->all(),
        [
            'avatar' => ['required', 'image', 'max:10240'],
        ],
        [
            'image' => 'Поле должно содержать картинку, размером не более 10Мб',
            'size' => 'Поле должно содержать картинку, размером не более 10Мб',
        ]
    );
}

function apiTryChangeUserAvatarInDB($request)
{
    try {
        $authUser = Auth::user();

        updateUserAvatar($authUser, $request);

        $authUser->save();

        return formatAssetPath($authUser->avatar);
    } catch (\Exception $error) {
        return false;
    }
}

function apiTryChangeUserPersonalDataInDB($request)
{
    try {
        $description = $request->input('description');
        $name = $request->input('name');

        $authUser = Auth::user();
        $authUser->name = $name;
        $authUser->description = $description;

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
