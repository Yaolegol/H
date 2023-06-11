<?php

namespace App\Http\Controllers\controllers\web\copyright;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

require_once(app_path() . '/Http/Controllers/helpers/common/catalog/index.php');

class CopyrightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function images()
    {
        $catalogFull = getCatalogFull();

        return view('pages.copyright.images.index', [
            'catalogHeader' => $catalogFull,
        ]);
    }
}
