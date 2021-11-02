<?php

namespace App\Http\Controllers\controllers\api\authorization\register;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

require_once('app/Http/Controllers/helpers/authorization/index.php');

class ApiRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
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
            $data = [
                'data' => '',
                'errors' => $validator->errors(),
            ];

            return json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
        }

        $newUser = trySaveUserInDB($request, true);

        if($newUser != null) {
            $data = [
                'data' => [
                    'token' => $newUser->createToken($request->input('registration_email'))->plainTextToken,
                ],
                'errors' => '',
            ];

            return json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
        } else {
            $data = [
                'data' => '',
                'errors' => [
                    'common' => 'Что-то пошло не так. Попробуйте снова',
                ],
            ];

            return json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
        }
    }
}
