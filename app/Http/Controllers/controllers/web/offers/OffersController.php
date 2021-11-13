<?php

namespace App\Http\Controllers\controllers\web\offers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

require_once('app/Http/Controllers/helpers/breadcrumbs/index.php');
require_once('app/Http/Controllers/helpers/catalog/index.php');
require_once('app/Http/Controllers/helpers/location/index.php');
require_once('app/Http/Controllers/helpers/offers/index.php');

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
        $searchCountryId = $request->cookie('search-country-id');
        $searchRegionId = $request->cookie('search-region-id');
        $searchCityId = $request->cookie('search-city-id');

        $catalogFull = getCatalogFull();
        $offersList = getOffers($catalogFull, $catalogLevelOneLink, $productLink, $searchCountryId, $searchRegionId, $searchCityId);
        $breadcrumbs = getCatalogOffersBreadcrumbs($catalogFull, $catalogLevelOneLink, $productLink);
        $locationList = getLocationListFormatted();

        return view('pages.offers.index', [
            'breadcrumbs' => $breadcrumbs,
            'catalogHeader' => $catalogFull,
            'offersList' => $offersList,
            'locationList' => $locationList,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $catalogFull = getCatalogFull();
        $offer = getOffer($id);
        $breadcrumbs = getOfferBreadcrumbs();
        $locationList = getLocationListFormatted();

        return view('pages.offers.item.index', [
            'breadcrumbs' => $breadcrumbs,
            'catalogHeader' => $catalogFull,
            'locationList' => $locationList,
            'offer' => $offer,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
