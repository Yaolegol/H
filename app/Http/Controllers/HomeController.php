<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

require_once('app/Http/Controllers/helpers/catalog/index.php');

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $catalogFull = getCatalogFull();
        dd($catalogFull);

        return view('pages.home.index', [
            'catalogHeaderList' => [],
            'catalogList' => $catalogLevel1,
        ]);
    }
}
