<?php

use App\Models\User;
use App\Rules\StartWith;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

function DB_tryAuthUser($request) {
    $password = $request->input('password');
    $phone = $request->input('phone');

    return Auth::attempt(
        [
            'password' => $password,
            'phone' => $phone,
        ]
    );
}

function DB_tryLogoutUser($request) {
    try {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return true;
    } catch(\Exception $error) {
        return abort(500);
    }
}

function DB_trySaveUserInDB($request, $isApi = false)
{
    try {
        $phone = $request->input('phone');
        $password = $request->input('password');

        $newUser = new User([
            'password' => Hash::make($password),
            'phone' => $phone,
        ]);
        $newUser->save();

        if($isApi) {
            return $newUser;
        }

        return true;
    } catch (\Exception $error) {
        if($isApi) {
            return null;
        }

        return abort(500);
    }
}

function getLoginValidator($request) {
    return Validator::make(
        $request->all(),
        [
            'password' => ['required', 'min:6'],
            'phone' => ['required', 'digits:11', new StartWith('7')],
        ],
        [
            'digits' => 'Номер теефона должен содержать 11 цифр',
            'max' => 'Поле должно содержать максимум :max символов',
            'min' => 'Поле должно содержать минимум :min символов',
            'required' => 'Поле обязательно для заполнения',
        ]
    );
}

function getRegistrationValidator($request) {
    return Validator::make(
        $request->all(),
        [
            'password' => ['required', 'max:25', 'min:6'],
            'password_confirmation' => ['required', 'same:password'],
            'phone' => ['required', 'digits:11', new StartWith('7'), 'unique:users'],
        ],
        [
            'digits' => 'Номер теефона должен содержать 11 цифр',
            'max' => 'Поле должно содержать максимум :max символов',
            'min' => 'Поле должно содержать минимум :min символов',
            'required' => 'Поле обязательно для заполнения',
            'same' => 'Поле должно совпадать с паролем',
            'unique' => 'Пользователь с таким телефоном уже зарегистрирован',
        ]
    );
}
