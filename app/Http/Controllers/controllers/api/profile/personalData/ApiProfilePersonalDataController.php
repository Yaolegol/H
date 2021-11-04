<?php

namespace App\Http\Controllers\controllers\api\profile\personalData;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

require_once('app/Http/Controllers/helpers/api/profile/personalData/index.php');
require_once('app/Http/Controllers/helpers/profile/personalData/index.php');

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

        return json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }

    /**
     * @return Response
     */
    public function addAvatar(Request $request)
    {
        $avatarPath = apiTryChangeUserAvatarInDB($request);

        if($avatarPath != '') {
            $data = [
                'data' => [
                    'avatar' => $avatarPath,
                ],
                'errors' => '',
            ];

            return json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
        } else {
            $data = [
                'data' => '',
                'errors' => [
                    'common' => 'Что-то пошло не так. Попробуйте снова.',
                ],
            ];

            return json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
        }
    }

    /**
     * @return Response
     */
    public function removeAvatar()
    {
        $isRemoved = apiTryDeleteUserAvatarInDB();

        if($isRemoved) {
            $data = [
                'data' => [
                    'avatar' => '',
                ],
                'errors' => '',
            ];

            return json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
        } else {
            $data = [
                'data' => '',
                'errors' => [
                    'common' => 'Что-то пошло не так. Попробуйте снова.',
                ],
            ];

            return json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @return Response
     */
    public function show($section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return Response
     */
    public function edit(Request $request)
    {
        $catalogFull = getCatalogFull();
        $locationList = getLocationListFormatted();
        $formSection = $request->input('form-section');

        if($formSection === 'change-personal-data') {
            $isSaved = tryChangeUserPersonalDataInDB($request);

            if($isSaved) {
                $userData = getUserDataFormatted();

                return view('pages.profile.personal-info.index', [
                    'catalogHeader' => $catalogFull,
                    'locationList' => $locationList,
                    'userData' => $userData
                ]);
            } else {
                return back()->with(
                    ['commonError' => 'Что-то пошло не так. Попробуйте снова']
                );
            }
        }

        if($formSection === 'change-email') {
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
                return back()
                    ->withErrors($validator)
                    ->withInput();
            }

            if(Hash::check($currentPassword, Auth::user()->password)) {
                $isSaved = tryChangeUserEmailInDB($request);

                if($isSaved) {
                    $userData = getUserDataFormatted();

                    return view('pages.profile.personal-info.index', [
                        'catalogHeader' => $catalogFull,
                        'locationList' => $locationList,
                        'userData' => $userData
                    ]);
                } else {
                    return back()->with(
                        ['commonChangeEmailError' => 'Что-то пошло не так. Попробуйте снова']
                    );
                }
            } else {
                return back()->with(
                    ['commonChangeEmailError' => 'Неверный пароль']
                );
            }
        }

        if($formSection === 'change-password') {
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
                return back()
                    ->withErrors($validator)
                    ->withInput();
            }

            if(Hash::check($currentPassword, Auth::user()->password)) {
                $isSaved = tryChangeUserPasswordInDB($request);

                if($isSaved) {
                    $userData = getUserDataFormatted();

                    return view('pages.profile.personal-info.index', [
                        'catalogHeader' => $catalogFull,
                        'locationList' => $locationList,
                        'userData' => $userData
                    ]);
                } else {
                    return back()->with(
                        ['commonChangePasswordError' => 'Что-то пошло не так. Попробуйте снова']
                    );
                }
            } else {
                return back()->with(
                    ['commonChangePasswordError' => 'Неверный пароль']
                );
            }
        }

        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
