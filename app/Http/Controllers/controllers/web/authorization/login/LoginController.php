<?php

namespace App\Http\Controllers\controllers\web\authorization\login;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

require_once(app_path() . '/Http/Controllers/helpers/common/catalog/index.php');
require_once(app_path() . '/Http/Controllers/helpers/web/authorization/index.php');

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

        return view('pages.auth.login.index.index', [
            'catalogHeader' => $catalogFull,
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

        $phone = $request->input('phone');
        $password = $request->input('password');

        $isUserAuth = DB_tryAuthUser($phone, $password);

        if ($isUserAuth) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->with(['commonError' => 'Не верный телефон или пароль. Попробуйте снова']);
    }
}
