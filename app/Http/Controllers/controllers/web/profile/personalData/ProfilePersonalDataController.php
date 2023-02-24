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
        $userData = getUserDataFormatted();

        return view('pages.profile.personal-info.index.index', [
            'catalogHeader' => $catalogFull,
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
        $validator = getPersonalDataValidator($request);

        if($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $isSaved = DB_tryChangeUserPersonalDataInDB($request);

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
    public function editPassword(Request $request)
    {
        $currentPassword = $request->input('current_password');
        $validator = getPasswordValidator($request);

        if($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $isAuth = checkAuthUserPassword($currentPassword);

        if($isAuth) {
            $isSaved = DB_tryChangeUserPassword($request);

            if($isSaved) {
                return back();
            }
        }

        return back()->with(
            ['commonChangePasswordError' => 'Неверный пароль']
        );
    }
}
