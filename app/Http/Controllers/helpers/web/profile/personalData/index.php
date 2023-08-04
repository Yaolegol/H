<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Offer;
use App\Models\Organization;
use App\Models\SalePoint;

function DB_tryChangeUserEmail($request)
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

function DB_tryChangeUserPassword($request)
{
    try {
        $newPassword = $request->input('password');

        $authUser = Auth::user();
        $authUser->password = Hash::make($newPassword);
        $authUser->save();

        return true;
    } catch (\Exception $error) {
        return abort(500);
    }
}

function DB_tryDestroyProfile()
{
    try {
        $authUser = Auth::user();
        $authUserId = $authUser->id;

        $filter = [
            ['user_id', $authUserId]
        ];

        $newData = [
            'is_removed' => true,
        ];

        $userOffers = Offer::where($filter);
        $userOrganizations = Organization::where($filter);
        $userSalePoints = SalePoint::where($filter);

        $userOffers->update($newData);
        $userOrganizations->update($newData);
        $userSalePoints->update($newData);

        $authUser->phone_before_removed = $authUser->phone;
        $authUser->phone = null;
        $authUser->is_removed = true;
        $authUser->save();

        S3_STORAGE_destroyUser($authUserId);

        return true;
    } catch (\Exception $error) {
        return abort(500);
    }
}

function DB_tryChangeUserPersonalDataInDB($request)
{
    try {
        $name = $request->input('name');
        $description = $request->input('description');

        $authUser = Auth::user();
        $authUser->name = $name;
        $authUser->description = $description;
        $authUser->is_approved = false;
        $authUser->is_changed = true;
        $authUser->approved_error_message = null;

        updateUserAvatar($authUser, $request);

        $authUser->save();

        return true;
    } catch (\Exception $error) {
        dd($error);

        return false;
    }
}

function S3_STORAGE_destroyUser($userId) {
    try {
        $s3 = S3_STORAGE_getS3Client();
        $s3->deleteMatchingObjects(env('AWS_S3_STORAGE__BUCKET__USERS'), $userId);
    } catch(\Exception $err) {
        abort(500);
    }
}

function getEmailValidator($request) {
    return Validator::make(
        $request->all(),
        [
            'registration_email' => ['required', 'email', 'max:25', 'unique:users'],
            'password' => ['required', 'max:50', 'min:6'],
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

function getPasswordValidator($request) {
    return Validator::make(
        $request->all(),
        [
            'current_password' => ['required', 'max:50', 'min:6'],
            'password' => ['required', 'max:50', 'min:6'],
            'password_confirmation' => ['required', 'same:password'],
        ],
        [
            'max' => 'Поле должно содержать максимум :max символов',
            'min' => 'Поле должно содержать минимум :min символов',
            'required' => 'Поле обязательно для заполнения',
            'same' => 'Поля Password и Confirm Password не совпадают',
        ]
    );
}

function getPersonalDataValidator($request) {
    return Validator::make(
        $request->all(),
        [
            'avatar' => ['image', 'max:10240'],
            'name' => ['max:100'],
            'description' => ['max:1000'],
        ],
        [
            'image' => 'Поле должно содержать картинку, размером не более 10Мб',
            'max' => 'Поле должно содержать максимум :max символов',
            'required' => 'Поле обязательно для заполнения',
            'size' => 'Поле должно содержать картинку, размером не более 10Мб',
        ]
    );
}

function getPersonalDataValidator_api($request) {
    return Validator::make(
        $request->all(),
        [
            'name' => ['max:100'],
            'description' => ['max:1000'],
        ],
        [
            'max' => 'Поле должно содержать максимум :max символов',
            'size' => 'Поле должно содержать картинку, размером не более 10Мб',
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
            || $key === 'is_approved'
            || $key === 'is_changed'
            || $key === 'approved_error_message'
            || $key === 'phone'
            || $key === 'id';
    }, ARRAY_FILTER_USE_KEY);
}

function setUserAvatar(&$userData) {
    if ($userData['avatar'] !== '') {
        $userData['avatar'] = formatAssetPath($userData['avatar']);
    }
}

function S3_STORAGE_removeUserAvatar($userId)
{
    try {
        $s3 = S3_STORAGE_getS3Client();
        $s3->deleteMatchingObjects(env('AWS_S3_STORAGE__BUCKET__USERS'), $userId . '/' . 'personalData/avatar');
    } catch(\Exception $err) {
        abort(500);
    }
}

function S3_STORAGE_saveAuthUserAvatar($authUserId, $avatar)
{
    try {
        $s3 = S3_STORAGE_getS3Client();
        $data = $s3->upload(env('AWS_S3_STORAGE__BUCKET__USERS'), $authUserId . '/' . 'personalData/avatar_' . time() . '.'  . $avatar->extension(),  file_get_contents($avatar));

        return $data->get('ObjectURL');
    } catch(\Exception $err) {
        return abort(500);
    }
}

function updateUserAvatar($authUser, $request)
{
    $authUserId = $authUser->id;
    $avatar = $request->file('avatar');

    if ($avatar) {
        S3_STORAGE_removeUserAvatar($authUserId);

        $avatarPath = S3_STORAGE_saveAuthUserAvatar($authUserId, $avatar);
        $authUser->avatar = $avatarPath;
    } else {
        $isRemoveAvatar = $request->has('remove_avatar');

        if ($isRemoveAvatar) {
            S3_STORAGE_removeUserAvatar($authUserId);
            $authUser->avatar = '';
        }
    }
}
