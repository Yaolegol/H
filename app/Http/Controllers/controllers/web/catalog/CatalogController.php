<?php

namespace App\Http\Controllers\controllers\web\catalog;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

require_once('app/Http/Controllers/helpers/common/catalog/index.php');
require_once('app/Http/Controllers/helpers/web/breadcrumbs/index.php');
require_once('app/Http/Controllers/helpers/web/location/index.php');

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $catalogFull = getCatalogFull();
        $locationList = getLocationListFormatted();

        return view('pages.catalog.firstLevel.index.index', [
            'catalogHeader' => $catalogFull,
            'catalogPage' => $catalogFull,
            'locationList' => $locationList,
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

        return view('pages.catalog.secondLevel.index.index', [
            'breadcrumbs' => $breadcrumbs,
            'catalogHeader' => $catalogFull,
            'catalogPage' => $catalogLevelOneItemSubcategoriesList,
            'locationList' => $locationList,
        ]);
    }
}
