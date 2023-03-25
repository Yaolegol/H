<?php

namespace App\Http\Controllers\controllers\api\authorization\register;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

require_once(app_path() . '/Http/Controllers/helpers/common/errors/index.php');
require_once(app_path() . '/Http/Controllers/helpers/web/authorization/index.php');

class ApiRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function confirmCode(Request $request)
    {
        $validator = getRegistrationConfirmCodeValidator($request);

        if($validator->fails()) {
            $data = [
                'data' => '',
                'errors' => getValidatorErrorsList($validator),
            ];

            return json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
        }

        $checkSmsCodeData = registrationCheckSmsCode($request);

        if($checkSmsCodeData['error'] !== '') {
            $data = [
                'data' => '',
                'errors' => [$checkSmsCodeData['error']],
            ];

            return json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
        }

        $newUser = DB_trySaveUserInDB($request, true);

        if($newUser != null) {
            $data = [
                'data' => [
                    'token' => $newUser->createToken($request->input('phone'))->plainTextToken,
                ],
                'errors' => '',
            ];

            return json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
        }

        $data = [
            'data' => '',
            'errors' => ['Что-то пошло не так. Попробуйте снова'],
        ];

        return json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function sendSms(Request $request)
    {
        $validator = getRegistrationSendSmsValidator($request);

        if($validator->fails()) {
            $data = [
                'data' => '',
                'errors' => getValidatorErrorsList($validator),
            ];

            return json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
        }

        $smsData = registrationSendSMS($request);

        if($smsData['error'] != '') {
            $data = [
                'data' => '',
                'errors' => [$smsData['error']],
            ];

            return json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
        }

        $data = [
            'data' => '',
            'errors' => '',
        ];

        return json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }
}
