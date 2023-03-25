<?php

namespace App\Http\Controllers\controllers\api\catalog;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

require_once(app_path() . '/Http/Controllers/helpers/common/catalog/index.php');
require_once(app_path() . '/Http/Controllers/helpers/web/location/index.php');

class ApiCatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $catalogLevelOne = getCatalogLevelOneFormatted();

        $data = [
            'data' => $catalogLevelOne,
            'errors' => '',
        ];

        return json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
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

        $data = [
            'data' => $catalogLevelOneItemSubcategoriesList,
            'errors' => '',
        ];

        return json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }
}
