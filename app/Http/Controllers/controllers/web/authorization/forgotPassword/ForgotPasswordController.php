<?php

namespace App\Http\Controllers\controllers\web\authorization\forgotPassword;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

require_once(app_path() . '/Http/Controllers/helpers/common/catalog/index.php');
require_once(app_path() . '/Http/Controllers/helpers/common/errors/index.php');
require_once(app_path() . '/Http/Controllers/helpers/web/authorization/index.php');

class ForgotPasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $catalogFull = getCatalogFull();

        return view('pages.auth.forgotPassword.index.index', [
            'catalogHeader' => $catalogFull,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function confirmCode(Request $request)
    {
        $validator = getForgotPasswordConfirmCodeValidator($request);

        if($validator->fails()) {
            $data = [
                'data' => '',
                'errors' => getValidatorErrorsList($validator),
            ];

            return json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
        }

        $checkSmsCodeData = forgotPasswordCheckSmsCode($request);

        if($checkSmsCodeData['error'] !== '') {
            $data = [
                'data' => '',
                'errors' => [$checkSmsCodeData['error']],
            ];

            return json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
        }

        $newUser = DB_trySaveUserInDB($request, true);

        if($newUser != null) {
            $phone = $request->input('phone');
            $password = $request->input('password');

            $isUserAuth = DB_tryAuthUser($phone, $password);

            if ($isUserAuth) {
                $request->session()->regenerate();

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

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function sendSms(Request $request)
    {
        $validator = getForgotPasswordSendSmsValidator($request);

        if($validator->fails()) {
            $data = [
                'data' => '',
                'errors' => getValidatorErrorsList($validator),
            ];

            return json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
        }

        $smsData = forgotPasswordSendSMS($request);

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
