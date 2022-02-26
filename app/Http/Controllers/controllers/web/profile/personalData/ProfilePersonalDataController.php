<?php

namespace App\Http\Controllers\controllers\web\profile\personalData;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

require_once('app/Http/Controllers/helpers/common/assets/index.php');
require_once('app/Http/Controllers/helpers/common/catalog/index.php');
require_once('app/Http/Controllers/helpers/common/user/index.php');
require_once('app/Http/Controllers/helpers/web/location/index.php');
require_once('app/Http/Controllers/helpers/web/profile/personalData/index.php');

class ProfilePersonalDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $catalogFull = getCatalogFull();
        $locationList = getLocationListFormatted();
        $userData = getUserDataFormatted();

        return view('pages.profile.personal-info.index.index', [
            'catalogHeader' => $catalogFull,
            'locationList' => $locationList,
            'userData' => $userData
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return Response
     */
    public function editPersonalData(Request $request)
    {
        $isSaved = tryChangeUserPersonalDataInDB($request);

        if($isSaved) {
            return back();
        }

        return back()->with(
            ['commonError' => 'Что-то пошло не так. Попробуйте снова']
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return Response
     */
    public function editEmail(Request $request)
    {
        $currentPassword = $request->input('password');
        $validator = getEmailValidator($request);

        if($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $isAuth = checkAuthUserPassword($currentPassword);

        if($isAuth) {
            $isSaved = tryChangeUserEmailInDB($request);

            if($isSaved) {
                return back();
            }
        }

        return back()->with(
            ['commonChangeEmailError' => 'Неверный пароль']
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return Response
     */
    public function editPassword(Request $request)
    {
        $catalogFull = getCatalogFull();
        $locationList = getLocationListFormatted();
        $currentPassword = $request->input('current_password');

        $validator = Validator::make(
            $request->all(),
            [
                'current_password' => ['required', 'min:6'],
                'password' => ['required', 'min:6'],
                'password_confirmation' => ['required', 'same:password'],
            ],
            [
                'min' => 'Поле должно содержать минимум :min символов',
                'required' => 'Поле обязательно для заполнения',
                'same' => 'Поля Password и Confirm Password не совпадают',
            ]
        );

        if($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        if(Hash::check($currentPassword, Auth::user()->password)) {
            $isSaved = tryChangeUserPasswordInDB($request);

            if($isSaved) {
                $userData = getUserDataFormatted();

                return view('pages.profile.personal-info.index.index', [
                    'catalogHeader' => $catalogFull,
                    'locationList' => $locationList,
                    'userData' => $userData
                ]);
            } else {
                return back()->with(
                    ['commonChangePasswordError' => 'Что-то пошло не так. Попробуйте снова']
                );
            }
        } else {
            return back()->with(
                ['commonChangePasswordError' => 'Неверный пароль']
            );
        }
    }
}
