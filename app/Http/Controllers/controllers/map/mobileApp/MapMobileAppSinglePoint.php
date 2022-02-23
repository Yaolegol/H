<?php

namespace App\Http\Controllers\controllers\map\mobileApp;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

require_once('app/Http/Controllers/helpers/common/catalog/index.php');

class MapMobileAppSinglePoint extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function singlePoint()
    {
        return view('pages.map.mobileApp.singlePoint.index', []);
    }
}
