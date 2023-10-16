<?php

namespace App\Http\Controllers\controllers\web\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!Auth::check() || !Auth::user()->is_admin) {
            abort(403);
        }

        return view('pages.admin.index.index');
    }
}
