<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

function checkAuthUserPassword($password) {
    return Hash::check($password, Auth::user()->password);
}
