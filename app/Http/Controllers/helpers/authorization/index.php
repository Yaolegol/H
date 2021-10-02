<?php

use App\Models\CatalogLevelOne;
use App\Models\City;
use App\Models\Offer;
use App\Models\Organization;
use App\Models\SalePoint;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Request;

function trySaveUserInDB($request)
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

        return true;
    } catch (\Exception $error) {
        return false;
    }
}
