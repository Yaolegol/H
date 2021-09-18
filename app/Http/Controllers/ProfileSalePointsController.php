<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

require_once('app/Http/Controllers/helpers/catalog/index.php');

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
        $locationList = getLocationListFormatted();
        $salePointsList = getSalePointsDataFormatted();

        return view('pages.profile.sale-points-info.index.index', [
            'catalogHeader' => $catalogFull,
            'locationList' => $locationList,
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
        $locationList = getLocationListFormatted();
        $salePointsList = getSalePointsDataFormatted();

        return view('pages.profile.sale-points-info.create.index', [
            'catalogHeader' => $catalogFull,
            'locationList' => $locationList,
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
        $isSaved = tryChangeSalePointDataInDB($request);

        if($isSaved) {
            return redirect('/profile/sale-points-info');
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
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return Response
     */
    public function edit(Request $request)
    {
        $catalogFull = getCatalogFull();
        $locationList = getLocationListFormatted();

        $isSaved = tryChangeSalePointDataInDB($request);

        if($isSaved) {
            $salePointsList = getSalePointsDataFormatted();

            return view('pages.profile.sale-points-info.index.index', [
                'catalogHeader' => $catalogFull,
                'locationList' => $locationList,
                'salePointsList' => $salePointsList,
            ]);
        } else {
            return back()->with(
                ['commonError' => 'Что-то пошло не так. Попробуйте снова']
            );
        }
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
        //
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
        } else {
            return back()->with(
                ['commonError' => 'Что-то пошло не так. Попробуйте снова']
            );
        }
    }
}
