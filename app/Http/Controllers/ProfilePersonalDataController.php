<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

require_once('app/Http/Controllers/helpers/catalog/index.php');

class ProfilePersonalDataController extends Controller
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
        $userData = getUserDataFormatted();
        $section = 'personal-info';

        return view('pages.profile.personal-info.index', [
            'catalogHeader' => $catalogFull,
            'locationList' => $locationList,
            'section' => $section,
            'userData' => $userData
        ]);
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
        $section = 'personal-info';
        $formSection = $request->input('form-section');

        if($formSection === 'change-personal-data') {
            $isSaved = tryChangeUserPersonalDataInDB($request);

            if($isSaved) {
                $userData = getUserDataFormatted();

                return view('pages.profile.personal-info.index', [
                    'catalogHeader' => $catalogFull,
                    'locationList' => $locationList,
                    'section' => $section,
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
                        'section' => $section,
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
                        'section' => $section,
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
