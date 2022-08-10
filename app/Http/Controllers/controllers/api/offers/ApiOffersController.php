<?php

namespace App\Http\Controllers\controllers\api\offers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

require_once('app/Http/Controllers/helpers/api/offers/index.php');
require_once('app/Http/Controllers/helpers/common/catalog/index.php');
require_once('app/Http/Controllers/helpers/web/location/index.php');
require_once('app/Http/Controllers/helpers/web/offers/index.php');

class ApiOffersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  string  $id
     * @return Response
     */
    public function index(Request $request, $id)
    {
        $searchLocationData = getSearchLocationData($request);

        $searchCountryId = $searchLocationData['searchCountryId'];
        $searchRegionId = $searchLocationData['searchRegionId'];
        $searchCityId = $searchLocationData['searchCityId'];

        $offers = api_getOffers($id, $searchCountryId, $searchRegionId, $searchCityId);

        $data = [
            'data' => $offers,
            'errors' => '',
        ];

        return json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }

    /**
     * Display the specified resource.
     *
     * @param  string $id
     * @return Response
     */
    public function show($id)
    {
        $offerData = getOfferFormatted($id);

        $data = [
            'data' => $offerData,
            'errors' => '',
        ];

        return json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }
}
