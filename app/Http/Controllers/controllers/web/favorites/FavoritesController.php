<?php

namespace App\Http\Controllers\controllers\web\favorites;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

require_once('app/Http/Controllers/helpers/common/catalog/index.php');
require_once('app/Http/Controllers/helpers/web/favorites/index.php');
require_once('app/Http/Controllers/helpers/web/location/index.php');
require_once('app/Http/Controllers/helpers/web/offers/index.php');

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
        $locationList = getLocationListFormatted();
        $favoritesList = getUserFavoritesFormatted();

        return view('pages.favorites.index.index', [
            'catalogHeader' => $catalogFull,
            'locationList' => $locationList,
            'cardDataList' => $favoritesList,
        ]);
    }
}
