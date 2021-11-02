<?php

namespace App\Http\Controllers\controllers\api\authorization\login;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class ApiLoginController extends Controller
{
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
            $data = [
                'data' => '',
                'errors' => $validator->errors(),
            ];

            return json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
        }

        if (Auth::attempt(
            [
                'registration_email' => $email,
                'password' => $password,
            ]
        )) {
            $data = [
                'data' => [
                    'token' => $request->user()->createToken($request->input('registration_email'))->plainTextToken,
                ],
                'errors' => '',
            ];

            return json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
        }

        $data = [
            'data' => '',
            'errors' => [
                'common' => 'Не верный email или пароль. Попробуйте снова'
            ],
        ];

        return json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }
}
