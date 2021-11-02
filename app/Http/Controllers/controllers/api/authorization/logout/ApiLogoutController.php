<?php

namespace App\Http\Controllers\controllers\api\authorization\logout;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class ApiLogoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function logout(Request $request)
    {
        try {
            $request->user()->currentAccessToken()->delete();

            $data = [
                'data' => '',
                'errors' => '',
            ];

            return json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
        } catch(\Exception $err) {
            $data = [
                'data' => '',
                'errors' => [
                    'common' => $err->getMessage(),
                ],
            ];

            return json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
        }
    }
}
