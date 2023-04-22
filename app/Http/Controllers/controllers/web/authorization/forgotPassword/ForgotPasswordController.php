<?php

namespace App\Http\Controllers\controllers\web\authorization\forgotPassword;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

require_once(app_path() . '/Http/Controllers/helpers/common/catalog/index.php');
require_once(app_path() . '/Http/Controllers/helpers/web/authorization/index.php');

class ForgotPasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $catalogFull = getCatalogFull();

        return view('pages.auth.forgotPassword.index.index', [
            'catalogHeader' => $catalogFull,
        ]);
    }
}
