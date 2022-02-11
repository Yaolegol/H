<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

function clearAuthUserAvatarInDB()
{
    $authUser = Auth::user();

    $authUser->avatar = '';
}

function getUserDataFormatted()
{
    $userData = Auth::user()->getAttributes();
    $userDataFiltered = array_filter($userData, function ($key) {
        return $key === 'avatar'
            || $key === 'name'
            || $key === 'description'
            || $key === 'visible_email'
            || $key === 'registration_email'
            || $key === 'phone';
    }, ARRAY_FILTER_USE_KEY);

    if ($userDataFiltered['avatar'] !== '') {
        $path = str_replace('public/', '', $userDataFiltered['avatar']);

        $userDataFiltered['avatar'] = '/storage/' . $path;
    }

    return $userDataFiltered;
}

function removeUserAvatarFromStorage($userId)
{
    File::deleteDirectory(storage_path() . '/app/public/users/' . $userId . '/avatar');
}

function saveAuthUserAvatarInDB($avatar)
{
    $authUser = Auth::user();
    $authUserId = $authUser->id;
    $date = new DateTime();

    $avatarName = $authUserId . '_' . $date->getTimestamp() . '.' . $avatar->extension();
    $avatarPath = $avatar->storeAs(
        '/public/users/'. $authUserId . '/avatar', $avatarName
    );
    $authUser->avatar = $avatarPath;

    return $avatarPath;
}

function tryChangeUserEmailInDB($request)
{
    try {
        $newRegistrationEmail = $request->input('registration_email');

        $authUser = Auth::user();
        $authUser->registration_email = $newRegistrationEmail;
        $authUser->save();

        return true;
    } catch (\Exception $error) {
        return false;
    }
}

function tryChangeUserPasswordInDB($request)
{
    try {
        $newPassword = $request->input('password');

        $authUser = Auth::user();
        $authUser->password = Hash::make($newPassword);
        $authUser->save();

        return true;
    } catch (\Exception $error) {
        return false;
    }
}

function tryChangeUserPersonalDataInDB($request)
{
    try {
        $name = $request->input('name');
        $description = $request->input('description');
        $phone = $request->input('phone');
        $visible_email = $request->input('visible_email');

        $authUser = Auth::user();
        $authUser->name = $name;
        $authUser->description = $description;
        $authUser->phone = $phone;
        $authUser->visible_email = $visible_email;

        updateUserAvatar($request);

        $authUser->save();

        return true;
    } catch (\Exception $error) {
        return false;
    }
}

function updateUserAvatar($request)
{
    $authUser = Auth::user();
    $authUserId = $authUser->id;
    $avatar = $request->file('avatar');

    if ($avatar) {
        removeUserAvatarFromStorage($authUserId);
        saveAuthUserAvatarInDB($avatar);
    } else {
        $isRemoveAvatar = $request->has('remove_avatar');

        if ($isRemoveAvatar) {
            removeUserAvatarFromStorage($authUserId);
            clearAuthUserAvatarInDB();
        }
    }
}
