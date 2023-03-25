<?php

namespace App\Http\Controllers\controllers\web\catalog;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

require_once(app_path() . '/Http/Controllers/helpers/common/catalog/index.php');
require_once(app_path() . '/Http/Controllers/helpers/web/breadcrumbs/index.php');

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
        $breadcrumbs = [
            [
                'isLink' => false,
                'title' => 'Каталог',
            ],
        ];

        return view('pages.catalog.firstLevel.index.index', [
            'breadcrumbs' => $breadcrumbs,
            'catalogHeader' => $catalogFull,
            'catalogPage' => $catalogFull,
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
        $catalogLevelOneItem = getCatalogLevelOneItem($catalogFull, $catalogLevelOneLink);
        $catalogLevelOneItemSubcategoriesList = getCatalogLevelOneItemSubcategoriesList($catalogLevelOneItem);
        $breadcrumbs = getCatalogLevelTwoBreadcrumbs($catalogLevelOneItem);

        return view('pages.catalog.secondLevel.index.index', [
            'breadcrumbs' => $breadcrumbs,
            'catalogHeader' => $catalogFull,
            'catalogPage' => $catalogLevelOneItemSubcategoriesList,
        ]);
    }
}
