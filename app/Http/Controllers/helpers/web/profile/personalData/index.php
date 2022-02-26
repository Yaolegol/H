<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

function getEmailValidator($request) {
    return Validator::make(
        $request->all(),
        [
            'registration_email' => ['required', 'email', 'max:25', 'unique:users'],
            'password' => ['required', 'min:6'],
        ],
        [
            'email' => 'Поле должно содержать email',
            'max' => 'Поле должно содержать максимум :max символов',
            'min' => 'Поле должно содержать минимум :min символов',
            'required' => 'Поле обязательно для заполнения',
            'unique' => 'Пользователь с таким email уже зарегистрирован',
        ]
    );
}

function getUserDataFormatted()
{
    $userData = Auth::user()->getAttributes();
    $userDataFiltered = filterUserData($userData);

    setUserAvatar($userDataFiltered);

    return $userDataFiltered;
}

function filterUserData($userData) {
    return array_filter($userData, function ($key) {
        return $key === 'avatar'
            || $key === 'name'
            || $key === 'description'
            || $key === 'visible_email'
            || $key === 'registration_email'
            || $key === 'phone';
    }, ARRAY_FILTER_USE_KEY);
}

function setUserAvatar(&$userData) {
    if ($userData['avatar'] !== '') {
        $userData['avatar'] = formatAssetPath($userData['avatar']);
    }
}

function STORAGE_removeUserAvatar($userId)
{
    try {
        File::deleteDirectory(storage_path() . '/app/public/users/' . $userId . '/avatar');
    } catch(\Exception $err) {
        abort(500);
    }
}

function STORAGE_saveAuthUserAvatar($authUserId, $avatar)
{
    try {
        $date = new DateTime();
        $avatarName = $authUserId . '_' . $date->getTimestamp() . '.' . $avatar->extension();

        return $avatar->storeAs(
            '/public/users/'. $authUserId . '/avatar', $avatarName
        );
    } catch(\Exception $err) {
        return abort(500);
    }
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
        return abort(500);
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

        updateUserAvatar($authUser, $request);

        $authUser->save();

        return true;
    } catch (\Exception $error) {
        return false;
    }
}

function updateUserAvatar($authUser, $request)
{
    $authUserId = $authUser->id;
    $avatar = $request->file('avatar');

    if ($avatar) {
        STORAGE_removeUserAvatar($authUserId);
        $avatarPath = STORAGE_saveAuthUserAvatar($authUserId, $avatar);

        $authUser->avatar = $avatarPath;
    } else {
        $isRemoveAvatar = $request->has('remove_avatar');

        if ($isRemoveAvatar) {
            STORAGE_removeUserAvatar($authUserId);

            $authUser->avatar = '';
        }
    }
}
