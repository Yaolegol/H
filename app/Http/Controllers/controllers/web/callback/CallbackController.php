<?php

namespace App\Http\Controllers\controllers\web\callback;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

require_once(app_path() . '/Http/Controllers/helpers/common/errors/index.php');
require_once(app_path() . '/Http/Controllers/helpers/web/callback/index.php');

class CallbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $validator = getCallbackValidator($request);

        if($validator->fails()) {
            $data = [
                'data' => '',
                'errors' => getValidatorErrorsList($validator),
            ];

            return json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
        }

        $isSaved = DB_trySaveCallbackText($request);

        if($isSaved) {
            $data = [
                'data' => '',
                'errors' => '',
            ];

            return json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
        }

        $data = [
            'data' => '',
            'errors' => ['commonError' => 'Что-то пошло не так. Попробуйте снова'],
        ];

        return json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }
}
