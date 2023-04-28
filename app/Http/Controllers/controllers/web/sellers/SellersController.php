<?php

namespace App\Http\Controllers\controllers\web\sellers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

require_once(app_path() . '/Http/Controllers/helpers/common/assets/index.php');
require_once(app_path() . '/Http/Controllers/helpers/common/catalog/index.php');
require_once(app_path() . '/Http/Controllers/helpers/web/offers/index.php');
require_once(app_path() . '/Http/Controllers/helpers/web/sellers/index.php');

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
        $sellerData = getSellerDataFormatted($id);
        $offersCount = count($sellerData['offers_all_active']);

        if($offersCount <= 0) {
            abort(404);
        }

        return view('pages.sellers.show.index', [
            'catalogHeader' => $catalogFull,
            'sellerData' => $sellerData,
        ]);
    }
}
