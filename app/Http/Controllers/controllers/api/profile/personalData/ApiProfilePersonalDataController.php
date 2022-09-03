<?php

namespace App\Http\Controllers\controllers\api\profile\personalData;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

require_once('app/Http/Controllers/helpers/api/profile/personalData/index.php');
require_once('app/Http/Controllers/helpers/common/assets/index.php');
require_once('app/Http/Controllers/helpers/common/errors/index.php');
require_once('app/Http/Controllers/helpers/common/user/index.php');
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
        $validator = ApiGetProfileAvatarValidator($request);

        if($validator->fails()) {
            $data = [
                'data' => '',
                'errors' => getValidatorErrorsList($validator),
            ];

            return json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
        }

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
        $validator = getPersonalDataValidator($request);

        if($validator->fails()) {
            $data = [
                'data' => '',
                'errors' => getValidatorErrorsList($validator),
            ];

            return json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
        }

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
        $validator = getEmailValidator($request);

        if($validator->fails()) {
            $data = [
                'data' => '',
                'errors' => getValidatorErrorsList($validator),
            ];

            return json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);

        }

        $isAuth = checkAuthUserPassword($currentPassword);

        if($isAuth) {
            $isSaved = DB_tryChangeUserEmail($request);

            if($isSaved) {
                $data = [
                    'data' => '',
                    'errors' => '',
                ];

                return json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);

            }
        }

        $data = [
            'data' => '',
            'errors' => ['Что-то пошло не так. Попробуйте снова'],
        ];

        return json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function updatePersonalPassword(Request $request) {
        $currentPassword = $request->input('current_password');
        $validator = getPasswordValidator($request);

        if($validator->fails()) {
            $data = [
                'data' => '',
                'errors' => getValidatorErrorsList($validator),
            ];

            return json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
        }

        $isAuth = checkAuthUserPassword($currentPassword);

        if($isAuth) {
            $isSaved = DB_tryChangeUserPassword($request);

            if($isSaved) {
                $data = [
                    'data' => '',
                    'errors' => '',
                ];

                return json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
            }
        }

        $data = [
            'data' => '',
            'errors' => ['Что-то пошло не так. Попробуйте снова'],
        ];

        return json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }
}
