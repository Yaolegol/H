<?php

namespace App\Http\Controllers\controllers\web\help;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

require_once(app_path() . '/Http/Controllers/helpers/common/catalog/index.php');

class HelpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $catalogFull = getCatalogFull();

        return view('pages.help.index.index', [
            'catalogHeader' => $catalogFull,
        ]);
    }
}
