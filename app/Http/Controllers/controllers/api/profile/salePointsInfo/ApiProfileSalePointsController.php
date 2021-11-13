<?php

namespace App\Http\Controllers\controllers\api\profile\salePointsInfo;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

require_once('app/Http/Controllers/helpers/web/profile/salePointsInfo/index.php');

class ApiProfileSalePointsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $salePointsList = getSalePointsDataFormatted();

        $data = [
            'data' => $salePointsList,
            'errors' => '',
        ];

        return json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
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
        $isSaved = tryStoreSalePointDataInDB($request);

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
    public function edit(Request $request, $id)
    {
        $catalogFull = getCatalogFull();
        $locationList = getLocationListFormatted();
        $salePointItemData = getSalePointItemDataFormatted($id);

        return view('pages.profile.sale-points-info.edit.index', [
            'catalogHeader' => $catalogFull,
            'locationList' => $locationList,
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
        $isSaved = tryUpdateSalePointDataInDB($request, $id);

        if($isSaved) {
            return redirect('/profile/sale-points-info');
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
