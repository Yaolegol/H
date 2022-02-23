<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

function DB_tryAuthUser($request) {
    $email = $request->input('registration_email');
    $password = $request->input('password');

    return Auth::attempt(
        [
            'registration_email' => $email,
            'password' => $password,
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
        $registration_email = $request->input('registration_email');
        $password = $request->input('password');

        $newUser = new User([
            'visible_email' => $registration_email,
            'registration_email' => $registration_email,
            'password' => Hash::make($password),
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
            'registration_email' => ['required', 'email', 'max:25'],
        ],
        [
            'email' => 'Поле должно содержать email',
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
            'registration_email' => ['required', 'email', 'max:25', 'unique:users'],
            'password' => ['required', 'min:6'],
            'password_confirmation' => ['required', 'same:password'],
        ],
        [
            'email' => 'Поле должно содержать Email',
            'max' => 'Поле должно содержать максимум :max символов',
            'min' => 'Поле должно содержать минимум :min символов',
            'required' => 'Поле обязательно для заполнения',
            'same' => 'Поле должно совпадать с паролем',
            'unique' => 'Пользователь с таким Email уже зарегистрирован',
        ]
    );
}
