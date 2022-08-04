<?php

namespace App\Http\Controllers\controllers\web\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

require_once('app/Http/Controllers/helpers/web/admin/index.php');
require_once('app/Http/Controllers/helpers/common/catalog/index.php');
require_once('app/Http/Controllers/helpers/web/offers/index.php');

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!Auth::user()->is_admin) {
            abort(403);
        }

        $offersNotApprovedList = getOffersNotApproved();

        return view('pages.admin.index.index', [
            'offersNotApprovedList' => $offersNotApprovedList,
        ]);
    }
}
