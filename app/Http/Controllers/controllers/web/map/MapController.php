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
        $searchLocationData = getSearchLocationData($request);
        $catalogLevelOneId = $request->query('catalogLevelOneId');
        $catalogLevelTwoId = $request->query('catalogLevelTwoId');

        $searchCountryId = $searchLocationData['searchCountryId'];
        $searchRegionId = $searchLocationData['searchRegionId'];
        $searchCityId = $searchLocationData['searchCityId'];

        $catalogFull = getCatalogFull();
        $locationList = getLocationListFormatted();
        $locationSearchData = getLocationSearchDataFormatted($locationList, $searchCountryId, $searchRegionId, $searchCityId);
        $productFilterData = getProductFilterDataFormatted($catalogFull, $catalogLevelOneId, $catalogLevelTwoId);

        return view('pages.map.web.index.index', [
            'catalogHeader' => $catalogFull,
            'catalogPage' => $catalogFull,
            'locationList' => $locationList,
            'locationSearchData' => $locationSearchData,
            'productFilterData' => $productFilterData,
        ]);
    }
}
