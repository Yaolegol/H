<?php

namespace App\Http\Controllers\controllers\api\favorites\product;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

require_once(app_path() . '/Http/Controllers/helpers/api/favorites/product/index.php');
require_once(app_path() . '/Http/Controllers/helpers/common/catalog/index.php');
require_once(app_path() . '/Http/Controllers/helpers/web/favorites/index.php');

class ApiFavoritesProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $userFavoritesProductsList = getUserFavoritesOffersFormatted();

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
    public function add(Request $request, $id)
    {
        $result = apiAddOfferToUserFavorites($id);

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
    public function remove(Request $request, $id)
    {
        $result = apiRemoveOfferFromUserFavorites($id);

        $data = [
            'data' => [
                'success' => $result,
            ],
            'errors' => '',
        ];

        return json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }
}
