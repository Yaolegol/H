<?php

namespace App\Http\Controllers\controllers\api\search\common;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

require_once('app/Http/Controllers/helpers/api/search/common/index.php');

class ApiSearchCommonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $searchResult = apiGetSearchCommonResultFormatted($request);

        $data = [
            'data' => $searchResult,
            'errors' => '',
        ];

        return json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }
}
