<?php

namespace App\Http\Controllers\controllers\profile\saleOffers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

require_once('app/Http/Controllers/helpers/catalog/index.php');
require_once('app/Http/Controllers/helpers/location/index.php');
require_once('app/Http/Controllers/helpers/profile/saleOffers/index.php');

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
        $salePointsList = getUserSalePointsList();
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
        } else {
            return back()->with(
                ['commonError' => 'Что-то пошло не так. Попробуйте снова']
            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @return Response
     */
    public function show($section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return Response
     */
    public function edit(Request $request, $id)
    {
        $catalogFull = getCatalogFull();
        $locationList = getLocationListFormatted();
        $saleOfferItemData = getSaleOfferItemDataFormatted($id);
        $salePointsList = getSaleOfferSalePointsListFormatted($saleOfferItemData);

        return view('pages.profile.sale-offers.edit.index', [
            'catalogFull' => $catalogFull,
            'catalogHeader' => $catalogFull,
            'locationList' => $locationList,
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
        } else {
            return back()->with(
                ['commonError' => 'Что-то пошло не так. Попробуйте снова']
            );
        }
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
        } else {
            return back()->with(
                ['commonError' => 'Что-то пошло не так. Попробуйте снова']
            );
        }
    }
}
