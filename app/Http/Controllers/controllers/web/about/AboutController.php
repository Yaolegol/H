<?php

namespace App\Http\Controllers\controllers\web\about;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

require_once(app_path() . '/Http/Controllers/helpers/common/catalog/index.php');

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $catalogFull = getCatalogFull();

        return view('pages.about.index.index', [
            'catalogHeader' => $catalogFull,
        ]);
    }
}
