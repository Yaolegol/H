<?php

namespace App\Http\Controllers\controllers\web\sellers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

require_once('app/Http/Controllers/helpers/web/catalog/index.php');
require_once('app/Http/Controllers/helpers/web/location/index.php');
require_once('app/Http/Controllers/helpers/web/offers/index.php');
require_once('app/Http/Controllers/helpers/web/sellers/index.php');

class SellersController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $catalogFull = getCatalogFull();
        $locationList = getLocationListFormatted();
        $sellerData = getSellerDataFormatted($id);

        return view('pages.sellers.show.index', [
            'catalogHeader' => $catalogFull,
            'locationList' => $locationList,
            'sellerData' => $sellerData,
        ]);
    }
}
