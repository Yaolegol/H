<?php

namespace App\Http\Controllers\controllers\web\profile\salePointsInfo;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

require_once('app/Http/Controllers/helpers/common/assets/index.php');
require_once('app/Http/Controllers/helpers/common/catalog/index.php');
require_once('app/Http/Controllers/helpers/common/request/index.php');
require_once('app/Http/Controllers/helpers/web/profile/salePointsInfo/index.php');

class ProfileSalePointsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $catalogFull = getCatalogFull();
        $salePointsList = getSalePointsDataFormatted();

        return view('pages.profile.sale-points-info.index.index', [
            'catalogHeader' => $catalogFull,
            'salePointsList' => $salePointsList,
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

        return view('pages.profile.sale-points-info.create.index', [
            'catalogHeader' => $catalogFull,
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
        $validator = getProfileSalePointsValidator($request);

        if($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $isSaved = tryStoreSalePointDataInDB($request);

        if($isSaved) {
            return redirect('/profile/sale-points-info');
        }

        return abort(500);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return Response
     */
    public function edit(Request $request, $id)
    {
        $catalogFull = getCatalogFull();
        $salePointItemData = getSalePointItemDataFormatted($id);

        return view('pages.profile.sale-points-info.edit.index', [
            'catalogHeader' => $catalogFull,
            'salePointItemData' => $salePointItemData,
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
        $validator = getProfileSalePointsValidator($request);

        if($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $isSaved = tryUpdateSalePointDataInDB($request, $id);

        if($isSaved) {
            return redirect('/profile/sale-points-info');
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
        $isDestroyed = tryDestroySalePointDataInDB($id);

        if($isDestroyed) {
            return redirect('/profile/sale-points-info');
        }

        return abort(500);
    }
}
