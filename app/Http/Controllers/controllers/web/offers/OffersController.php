<?php

namespace App\Http\Controllers\controllers\web\offers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

require_once('app/Http/Controllers/helpers/web/breadcrumbs/index.php');
require_once('app/Http/Controllers/helpers/web/catalog/index.php');
require_once('app/Http/Controllers/helpers/web/location/index.php');
require_once('app/Http/Controllers/helpers/web/offers/index.php');

class OffersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  string  $catalogLevelOneLink
     * @param  string  $productLink
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $catalogLevelOneLink, $productLink)
    {
        $searchCountryId = $request->query('search-country-id');
        $searchRegionId = $request->query('search-region-id');
        $searchCityId = $request->query('search-city-id');

        $catalogFull = getCatalogFull();
        $offersPaginatedData = getOffersPaginatedData($catalogFull, $catalogLevelOneLink, $productLink, $searchCountryId, $searchRegionId, $searchCityId);
        $breadcrumbs = getCatalogOffersBreadcrumbs($catalogFull, $catalogLevelOneLink, $productLink);
        $locationList = getLocationListFormatted();
        $locationSearch = getLocationSearchFormatted($locationList, $searchCountryId, $searchRegionId, $searchCityId);

        return view('pages.offers.index.index', [
            'breadcrumbs' => $breadcrumbs,
            'catalogHeader' => $catalogFull,
            'locationList' => $locationList,
            'locationSearch' => $locationSearch,
            'offersPaginatedData' => $offersPaginatedData,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $catalogFull = getCatalogFull();
        $offer = getOfferFormatted($id);
        $breadcrumbs = getOfferBreadcrumbs($catalogFull, $offer);
        $locationList = getLocationListFormatted();

        return view('pages.offers.show.index', [
            'breadcrumbs' => $breadcrumbs,
            'catalogHeader' => $catalogFull,
            'locationList' => $locationList,
            'offer' => $offer,
        ]);
    }
}
