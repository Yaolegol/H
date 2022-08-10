<?php

namespace App\Http\Controllers\controllers\api\sellers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

require_once('app/Http/Controllers/helpers/common/assets/index.php');
require_once('app/Http/Controllers/helpers/common/catalog/index.php');
require_once('app/Http/Controllers/helpers/web/location/index.php');
require_once('app/Http/Controllers/helpers/web/offers/index.php');
require_once('app/Http/Controllers/helpers/web/sellers/index.php');

class ApiSellersController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sellerData = getSellerDataFormatted($id);

        $data = [
            'data' => $sellerData,
            'errors' => '',
        ];

        return json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);

    }
}
