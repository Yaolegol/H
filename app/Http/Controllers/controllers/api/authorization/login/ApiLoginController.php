<?php

namespace App\Http\Controllers\controllers\api\authorization\login;

use App\Rules\StartWith;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

require_once(app_path() . '/Http/Controllers/helpers/common/errors/index.php');
require_once(app_path() . '/Http/Controllers/helpers/web/authorization/index.php');

class ApiLoginController extends Controller
{
    /**
     * @return Response
     */
    public function login(Request $request)
    {
        $phone = $request->input('phone');
        $password = $request->input('password');

        $validator = getLoginValidator($request);

        if ($validator->fails()) {
            $data = [
                'data' => '',
                'errors' => getValidatorErrorsList($validator),
            ];

            return json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
        }

        $isUserAuth = DB_tryAuthUser($phone, $password);

        if ($isUserAuth) {
            $data = [
                'data' => [
                    'token' => $request->user()->createToken($phone)->plainTextToken,
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
