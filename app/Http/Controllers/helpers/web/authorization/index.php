<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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

function tryAuthUser($request) {
    $email = $request->input('registration_email');
    $password = $request->input('password');

    return Auth::attempt(
        [
            'registration_email' => $email,
            'password' => $password,
        ]
    );
}

function trySaveUserInDB($request, $isApi = false)
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

        return false;
    }
}
