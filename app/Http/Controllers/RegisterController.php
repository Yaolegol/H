<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

require_once('app/Http/Controllers/helpers/catalog/index.php');

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
                'email' => ['required', 'email', 'max:25'],
                'password' => ['required', 'min:6'],
                'password_confirmation' => ['required', 'same:password'],
            ],
            [
                'email' => 'Поле должно содержать email',
                'max' => 'Поле должно содержать максимум :max символов',
                'min' => 'Поле должно содержать минимум :min символов',
                'same' => 'Поля Password и Confirm Password не совпадают',
                'required' => 'Поле обязательно для заполнения',
                'unique' => 'Пользователь с таким Email уже зарегистрирован',
            ]
        );

        if($validator->fails()) {
            return redirect('/register')
                ->withErrors($validator)
                ->withInput();
        }

        $email = $request->input('email');
        $password = $request->input('password');

        $isSaved = trySaveUserInDB($email, $password);

        if($isSaved) {
            return redirect('/');
        } else {
            return redirect('/register')->with(
                ['commonError' => 'Что-то пошло не так. Попробуйте снова']
            );
        }
    }
}
