<?php

namespace App\Http\Controllers\controllers\web\profile\organizationData;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

require_once('app/Http/Controllers/helpers/common/assets/index.php');
require_once('app/Http/Controllers/helpers/common/catalog/index.php');
require_once('app/Http/Controllers/helpers/common/request/index.php');
require_once('app/Http/Controllers/helpers/web/location/index.php');
require_once('app/Http/Controllers/helpers/web/profile/organizationData/index.php');

class ProfileOrganizationDataController extends Controller
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
        $organizationList = getOrganizationDataFormatted();

        return view('pages.profile.organization-info.index.index', [
            'catalogHeader' => $catalogFull,
            'locationList' => $locationList,
            'organizationList' => $organizationList,
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

        return view('pages.profile.organization-info.create.index', [
            'catalogHeader' => $catalogFull,
            'locationList' => $locationList,
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
        $isSaved = tryStoreOrganizationData($request);

        if($isSaved) {
            return redirect('/profile/organization-info');
        }
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
        $organizationItemData = getOrganizationItemDataFormatted($id);

        return view('pages.profile.organization-info.edit.index', [
            'catalogHeader' => $catalogFull,
            'locationList' => $locationList,
            'organizationItemData' => $organizationItemData,
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
        $isSaved = tryUpdateOrganizationDataInDB($request, $id);

        if($isSaved) {
            return redirect('/profile/organization-info');
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
        $isDestroyed = tryDestroyOrganizationDataInDB($id);

        if($isDestroyed) {
            return redirect('/profile/organization-info');
        } else {
            return back()->with(
                ['commonError' => 'Что-то пошло не так. Попробуйте снова']
            );
        }
    }
}
