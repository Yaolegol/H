<?php

namespace App\Http\Controllers\controllers\api\authorization\login;

use App\Rules\StartWith;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

require_once(app_path() . '/Http/Controllers/helpers/common/errors/index.php');

class ApiLoginController extends Controller
{
    /**
     * @return Response
     */
    public function login(Request $request)
    {
        $email = $request->input('phone');
        $password = $request->input('password');

        $validator = Validator::make(
            $request->all(),
            [
                'password' => ['required', 'max:50', 'min:6'],
                'phone' => ['required', 'digits:11', new StartWith('7')],
            ],
            [
                'digits' => 'Поле должно содержать :digits цифр',
                'max' => 'Поле должно содержать максимум :max символов',
                'min' => 'Поле должно содержать минимум :min символов',
                'required' => 'Поле обязательно для заполнения',
            ]
        );

        if ($validator->fails()) {
            $data = [
                'data' => '',
                'errors' => getValidatorErrorsList($validator),
            ];

            return json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
        }

        if (Auth::attempt(
            [
                'phone' => $email,
                'password' => $password,
            ]
        )) {
            $data = [
                'data' => [
                    'token' => $request->user()->createToken($request->input('phone'))->plainTextToken,
                ],
                'errors' => '',
            ];

            return json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
        }

        $data = [
            'data' => '',
            'errors' => ['Неверный номер телефона или пароль. Попробуйте снова'],
        ];

        return json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }
}
