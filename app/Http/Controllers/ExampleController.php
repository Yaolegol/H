<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class ExampleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index(Request $req): Renderable
    {
        $sessionId = $req->session()->getId();
        $cartProductsCount = session('cartProductsCount');
        return view('home.index', compact('sessionId', 'cartProductsCount'));
    }
}
