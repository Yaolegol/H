<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class TestController extends Controller
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

        if($req->has('cartProductsCount')) {
            $req->session()->put('cartProductsCount', $req->get('cartProductsCount'));
        }
        // dd(session('cartProductsCount'));

        $cartProductsCount = session('cartProductsCount');
        return view('test.index', compact('sessionId', 'cartProductsCount'));
    }
}
