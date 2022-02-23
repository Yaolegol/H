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
        $searchCountryId = $request->query('search-country-id');
        $searchRegionId = $request->query('search-region-id');
        $searchCityId = $request->query('search-city-id');

        $catalogFull = getCatalogFull();
        $locationList = getLocationListFormatted();
        $locationSearch = getLocationSearchFormatted($locationList, $searchCountryId, $searchRegionId, $searchCityId);

        return view('pages.map.web.index.index', [
            'catalogHeader' => $catalogFull,
            'catalogPage' => $catalogFull,
            'locationList' => $locationList,
            'locationSearch' => $locationSearch,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $catalogLevelOneLink
     * @return Response
     */
    public function show($catalogLevelOneLink)
    {
        $catalogFull = getCatalogFull();
        $catalogLevelOneItemSubcategoriesList = getCatalogLevelOneItemSubcategoriesList($catalogFull, $catalogLevelOneLink);
        $breadcrumbs = getCatalogLevelTwoBreadcrumbs($catalogFull, $catalogLevelOneLink);
        $locationList = getLocationListFormatted();

        return view('pages.catalog.secondLevel.index', [
            'breadcrumbs' => $breadcrumbs,
            'catalogHeader' => $catalogFull,
            'catalogPage' => $catalogLevelOneItemSubcategoriesList,
            'locationList' => $locationList,
        ]);
    }
}
