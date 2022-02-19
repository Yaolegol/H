<?php

namespace App\Http\Controllers\controllers\api\profile\personalData;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

require_once('app/Http/Controllers/helpers/api/profile/personalData/index.php');
require_once('app/Http/Controllers/helpers/web/profile/personalData/index.php');

class ApiProfilePersonalDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $userData = getUserDataFormatted();

        $data = [
            'data' => $userData,
            'errors' => '',
        ];

        return json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    }

    /**
     * @return Response
     */
    public function addAvatar(Request $request)
    {
        $avatarPath = apiTryChangeUserAvatarInDB($request);

        if ($avatarPath != '') {
            $data = [
                'data' => [
                    'avatar' => $avatarPath,
                ],
                'errors' => '',
            ];

            return json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
        } else {
            $data = [
                'data' => '',
                'errors' => [
                    'common' => 'Что-то пошло не так. Попробуйте снова.',
                ],
            ];

            return json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
        }
    }

    /**
     * @return Response
     */
    public function removeAvatar()
    {
        $isRemoved = apiTryDeleteUserAvatarInDB();

        if ($isRemoved) {
            $data = [
                'data' => [
                    'avatar' => '',
                ],
                'errors' => '',
            ];

            return json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
        } else {
            $data = [
                'data' => '',
                'errors' => [
                    'common' => 'Что-то пошло не так. Попробуйте снова.',
                ],
            ];

            return json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function updatePersonalData(Request $request)
    {
        $isSaved = apiTryChangeUserPersonalDataInDB($request);

        if ($isSaved) {
            $data = [
                'data' => '',
                'errors' => '',
            ];

            return json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
        } else {
            $data = [
                'data' => '',
                'errors' => [
                    'common' => 'Что-то пошло не так. Попробуйте снова.',
                ],
            ];

            return json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function updatePersonalEmail(Request $request)
    {
        $currentPassword = $request->input('password');

        $validator = Validator::make(
            $request->all(),
            [
                'registration_email' => ['required', 'email', 'max:25', 'unique:users'],
                'password' => ['required', 'min:6'],
            ],
            [
                'email' => 'Поле должно содержать email',
                'max' => 'Поле должно содержать максимум :max символов',
                'min' => 'Поле должно содержать минимум :min символов',
                'required' => 'Поле обязательно для заполнения',
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

        if(Hash::check($currentPassword, Auth::user()->password)) {
            $isSaved = tryChangeUserEmailInDB($request);

            if($isSaved) {
                $data = [
                    'data' => '',
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
        } else {
            $data = [
                'data' => '',
                'errors' => [
                    'common' => 'Неверный пароль',
                ],
            ];

            return json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function updatePersonalPassword(Request $request) {
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
            $data = [
                'data' => '',
                'errors' => $validator->errors(),
            ];

            return json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
        }

        if(Hash::check($currentPassword, Auth::user()->password)) {
            $isSaved = tryChangeUserPasswordInDB($request);

            if($isSaved) {
                $data = [
                    'data' => '',
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
        } else {
            $data = [
                'data' => '',
                'errors' => [
                    'common' => 'Неверный пароль',
                ],
            ];

            return json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
        }
    }
}
