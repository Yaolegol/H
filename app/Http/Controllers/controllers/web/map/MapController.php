<?php

namespace App\Http\Controllers\controllers\web\map;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

require_once('app/Http/Controllers/helpers/common/catalog/index.php');
require_once('app/Http/Controllers/helpers/web/breadcrumbs/index.php');
require_once('app/Http/Controllers/helpers/web/location/index.php');

class MapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $catalogLevelOneId = $request->query('catalogLevelOneId');
        $catalogLevelTwoId = $request->query('catalogLevelTwoId');

        $catalogFull = getCatalogFull();
        $productFilterData = getProductFilterDataFormatted($catalogFull, $catalogLevelOneId, $catalogLevelTwoId);

        return view('pages.map.web.index.index', [
            'catalogHeader' => $catalogFull,
            'catalogPage' => $catalogFull,
            'productFilterData' => $productFilterData,
        ]);
    }
}
