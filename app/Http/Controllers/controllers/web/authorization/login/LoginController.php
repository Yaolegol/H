<?php

namespace App\Http\Controllers\controllers\web\authorization\login;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

require_once('app/Http/Controllers/helpers/web/catalog/index.php');
require_once('app/Http/Controllers/helpers/web/location/index.php');

class LoginController extends Controller
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

        return view('pages.auth.login.index.index', [
            'catalogHeader' => $catalogFull,
            'locationList' => $locationList,
        ]);
    }

    /**
     * @return Response
     */
    public function login(Request $request)
    {
        $validator = getLoginValidator($request);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $isUserAuth = tryAuthUser($request);

        if ($isUserAuth) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->with(['commonError' => 'Не верный email или пароль. Попробуйте снова']);
    }
}
