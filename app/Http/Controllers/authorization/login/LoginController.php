<?php

namespace App\Http\Controllers\authorization\login;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

require_once('app/Http/Controllers/helpers/catalog/index.php');

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

        return view('pages.auth.login.index', [
            'catalogHeader' => $catalogFull,
            'locationList' => $locationList,
        ]);
    }

    /**
     * @return Response
     */
    public function login(Request $request)
    {
        $email = $request->input('registration_email');
        $password = $request->input('password');

        $validator = Validator::make(
            $request->all(),
            [
                'registration_email' => ['required', 'email', 'max:25'],
                'password' => ['required', 'min:6'],
            ],
            [
                'email' => 'Поле должно содержать email',
                'max' => 'Поле должно содержать максимум :max символов',
                'min' => 'Поле должно содержать минимум :min символов',
                'required' => 'Поле обязательно для заполнения',
            ]
        );

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        if (Auth::attempt(
            [
                'registration_email' => $email,
                'password' => $password,
            ]
        )) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->with(['commonError' => 'Не верный email или пароль. Попробуйте снова']);
    }
}
