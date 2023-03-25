<?php

namespace App\Http\Controllers\controllers\web\favorites;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

require_once(app_path() . '/Http/Controllers/helpers/api/favorites/product/index.php');
require_once(app_path() . '/Http/Controllers/helpers/common/catalog/index.php');
require_once(app_path() . '/Http/Controllers/helpers/web/favorites/index.php');

class FavoritesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $catalogFull = getCatalogFull();
        $favoritesList = getUserFavoritesOffersFormatted();

        return view('pages.favorites.index.index', [
            'catalogHeader' => $catalogFull,
            'cardDataList' => $favoritesList,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function products(Request $request)
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
    public function productsAdd(Request $request, $id)
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
    public function productsRemove(Request $request, $id)
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
