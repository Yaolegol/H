<?php

namespace App\Http\Controllers\controllers\map\mobileApp;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

require_once(app_path() . '/Http/Controllers/helpers/web/offers/index.php');

class MapMobileAppSinglePoint extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function saleOffer()
    {
        return view('pages.map.mobileApp.saleOffer.index', []);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function singlePoint()
    {
        return view('pages.map.mobileApp.singlePoint.index', []);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function viewAll()
    {
        return view('pages.map.mobileApp.viewAll.index', []);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function viewProduct(Request $request, $id)
    {
        $offer = getOfferFormatted($id);

        return view('pages.map.mobileApp.viewProduct.index', [
            'offer' => $offer,
        ]);
    }
}
