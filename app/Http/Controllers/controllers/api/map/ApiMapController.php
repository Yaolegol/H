<?php

namespace App\Http\Controllers\controllers\api\map;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

require_once(app_path() . '/Http/Controllers/helpers/api/map/index.php');
require_once(app_path() . '/Http/Controllers/helpers/web/offers/index.php');
require_once(app_path() . '/Http/Controllers/helpers/web/profile/saleOffers/index.php');

class ApiMapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $offersMapMarkersDataList = apiGetAllOffersMapMarkersDataFormatted($request);

        $data = [
            'data' => $offersMapMarkersDataList,
            'errors' => '',
        ];

        return json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $offerId
     * @return Response
     */
    public function show($offerId)
    {
        $offerData = apiGetOfferMapMarkersDataFormatted($offerId);

        $data = [
            'data' => $offerData,
            'errors' => '',
        ];

        return json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }
}
