<?php

namespace App\Http\Controllers\controllers\web\catalog;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

require_once('app/Http/Controllers/helpers/web/breadcrumbs/index.php');
require_once('app/Http/Controllers/helpers/web/catalog/index.php');
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
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
