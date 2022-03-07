<?php

namespace App\Http\Controllers\controllers\web\profile\saleOffers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

require_once('app/Http/Controllers/helpers/common/assets/index.php');
require_once('app/Http/Controllers/helpers/common/catalog/index.php');
require_once('app/Http/Controllers/helpers/common/request/index.php');
require_once('app/Http/Controllers/helpers/web/location/index.php');
require_once('app/Http/Controllers/helpers/web/profile/organizationData/index.php');
require_once('app/Http/Controllers/helpers/web/profile/saleOffers/index.php');
require_once('app/Http/Controllers/helpers/web/profile/salePointsInfo/index.php');

class ProfileSaleOffersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $catalogFull = getCatalogFull();
        $locationList = getLocationListFormatted();
        $saleOffersList = getSaleOffersDataFormatted();

        return view('pages.profile.sale-offers.index.index', [
            'catalogHeader' => $catalogFull,
            'locationList' => $locationList,
            'saleOffersList' => $saleOffersList,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $catalogFull = getCatalogFull();
        $locationList = getLocationListFormatted();
        $organizationsList = getUserOrganizationsListFormatted();
        $salePointsList = DB_getUserSalePoints();
        $catalogCategoriesList = getCatalogCategoriesList($catalogFull);
        $catalogSubCategoriesList = getCatalogSubCategoriesList($catalogFull);
        $regionList = getRegionList($locationList);
        $citiesList = getCitiesList($locationList);

        return view('pages.profile.sale-offers.create.index', [
            'catalogCategoriesList' => $catalogCategoriesList,
            'catalogSubCategoriesList' => $catalogSubCategoriesList,
            'catalogFull' => $catalogFull,
            'catalogHeader' => $catalogFull,
            'citiesList' => $citiesList,
            'locationList' => $locationList,
            'organizationsList' => $organizationsList,
            'regionList' => $regionList,
            'salePointsList' => $salePointsList,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $isSaved = trySaveSaleOfferInDB($request);

        if($isSaved) {
            return redirect('/profile/sale-offers');
        }

        return abort(500);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return Response
     */
    public function edit(Request $request, $saleOfferId)
    {
        $catalogFull = getCatalogFull();
        $locationList = getLocationListFormatted();
        $saleOfferItemData = getSaleOfferItemDataFormatted($saleOfferId);
        $organizationsList = getUserOrganizationsWithSelectedList($saleOfferItemData);
        $salePointsList = getSaleOfferSalePointsListFormatted($saleOfferItemData);
        $catalogCategoriesList = getCatalogCategoriesWithSelectedList($catalogFull, $saleOfferItemData);
        $catalogSubCategoriesList = getCatalogSubCategoriesWithSelectedList($catalogFull, $saleOfferItemData);
        $regionList = getRegionWithSelectedList($locationList, $saleOfferItemData);
        $citiesList = getCitiesWithSelectedList($locationList, $saleOfferItemData);

        return view('pages.profile.sale-offers.edit.index', [
            'catalogCategoriesList' => $catalogCategoriesList,
            'catalogSubCategoriesList' => $catalogSubCategoriesList,
            'catalogFull' => $catalogFull,
            'catalogHeader' => $catalogFull,
            'citiesList' => $citiesList,
            'locationList' => $locationList,
            'organizationsList' => $organizationsList,
            'regionList' => $regionList,
            'saleOfferItemData' => $saleOfferItemData,
            'salePointsList' => $salePointsList,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $isSaved = tryUpdateSaleOfferInDB($request, $id);

        if($isSaved) {
            return redirect('/profile/sale-offers');
        }

        return abort(500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $isDestroyed = tryDestroySaleOfferDataInDB($id);

        if($isDestroyed) {
            return redirect('/profile/sale-offers');
        }

        return abort(500);
    }
}
