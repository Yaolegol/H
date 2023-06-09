<?php

namespace App\Http\Controllers\controllers\web\legal;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

require_once(app_path() . '/Http/Controllers/helpers/common/catalog/index.php');

class LegalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function cookie()
    {
        $catalogFull = getCatalogFull();

        return view('pages.legal.cookie.index', [
            'catalogHeader' => $catalogFull,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function termsOfUse()
    {
        $catalogFull = getCatalogFull();

        return view('pages.legal.termsOfUse.index', [
            'catalogHeader' => $catalogFull,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function privacyPolicy()
    {
        $catalogFull = getCatalogFull();

        return view('pages.legal.privacyPolicy.index', [
            'catalogHeader' => $catalogFull,
        ]);
    }
}
