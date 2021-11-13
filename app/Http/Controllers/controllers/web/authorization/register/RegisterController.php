<?php

namespace App\Http\Controllers\controllers\web\authorization\register;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

require_once('app/Http/Controllers/helpers/web/catalog/index.php');
require_once('app/Http/Controllers/helpers/web/location/index.php');
require_once('app/Http/Controllers/helpers/web/authorization/index.php');

class RegisterController extends Controller
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

        return view('pages.auth.register.index', [
            'catalogHeader' => $catalogFull,
            'locationList' => $locationList,
        ]);
    }

    /**
     * @return Response
     */
    public function register(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'registration_email' => ['required', 'email', 'max:25', 'unique:users'],
                'password' => ['required', 'min:6'],
                'password_confirmation' => ['required', 'same:password'],
            ],
            [
                'email' => 'Поле должно содержать email',
                'max' => 'Поле должно содержать максимум :max символов',
                'min' => 'Поле должно содержать минимум :min символов',
                'required' => 'Поле обязательно для заполнения',
                'same' => 'Поля Password и Confirm Password не совпадают',
                'unique' => 'Пользователь с таким Email уже зарегистрирован',
            ]
        );

        if($validator->fails()) {
            return redirect('/register')
                ->withErrors($validator)
                ->withInput();
        }

        $isSaved = trySaveUserInDB($request);

        if($isSaved) {
            return redirect('/');
        } else {
            return redirect('/register')->with(
                ['commonError' => 'Что-то пошло не так. Попробуйте снова']
            );
        }
    }
}
