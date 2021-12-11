<?php

namespace App\Http\Controllers\controllers\api\favorites\product;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

require_once('app/Http/Controllers/helpers/api/favorites/product/index.php');

class ApiFavoritesProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $userFavoritesProductsList = apiGetAllUserFavoritesProductsFormatted();

        $data = [
            'data' => $userFavoritesProductsList,
            'errors' => '',
        ];

        return json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }

    /**
     * Add
     *
     * @return Response
     */
    public function add(Request $request)
    {
        $result = apiAddOfferToUserFavorites($request);

        $data = [
            'data' => [
                'success' => $result,
            ],
            'errors' => '',
        ];

        return json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }

    /**
     * Remove
     *
     * @return Response
     */
    public function remove(Request $request)
    {
        $result = apiRemoveOfferFromUserFavorites($request);

        $data = [
            'data' => [
                'success' => $result,
            ],
            'errors' => '',
        ];

        return json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }
}
