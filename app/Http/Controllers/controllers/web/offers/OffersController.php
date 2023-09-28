<?php

namespace App\Http\Controllers\controllers\web\offers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

require_once(app_path() . '/Http/Controllers/helpers/common/catalog/index.php');
require_once(app_path() . '/Http/Controllers/helpers/common/measure/index.php');
require_once(app_path() . '/Http/Controllers/helpers/web/breadcrumbs/index.php');
require_once(app_path() . '/Http/Controllers/helpers/web/offers/index.php');

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
        $searchLocationData = getSearchLocationData($request);

        $searchCountryId = $searchLocationData['searchCountryId'];
        $searchRegionId = $searchLocationData['searchRegionId'];
        $searchCityId = $searchLocationData['searchCityId'];

        $catalogFull = getCatalogFull();
        $catalogLevelOneItem = getCatalogLevelOneItem($catalogFull, $catalogLevelOneLink);
        $catalogLevelTwoItem = getCatalogLevelTwoItem($catalogLevelOneItem, $productLink);
        $offersPaginatedData = getOffersPaginatedData($catalogLevelTwoItem, $searchCountryId, $searchRegionId, $searchCityId);
        $breadcrumbs = getCatalogOffersBreadcrumbs($catalogLevelOneItem, $catalogLevelTwoItem);

        return view('pages.offers.index.index', [
            'breadcrumbs' => $breadcrumbs,
            'catalogHeader' => $catalogFull,
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
        $breadcrumbs = getOfferBreadcrumbs();
        $authUserRatingData = getAuthUserOfferRatingData($id);
        $offerCategoriesData = getOfferCategoriesData($offer);

        return view('pages.offers.show.index', [
            'authUserRatingData' => $authUserRatingData,
            'breadcrumbs' => $breadcrumbs,
            'catalogHeader' => $catalogFull,
            'offer' => $offer,
            'offerCategoriesData' => $offerCategoriesData,
        ]);
    }
}
