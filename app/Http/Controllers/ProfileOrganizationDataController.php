<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

require_once('app/Http/Controllers/helpers/catalog/index.php');

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
        $organizationData = getOrganizationDataFormatted();

        return view('pages.profile.organization-info.index', [
            'catalogHeader' => $catalogFull,
            'locationList' => $locationList,
            'organizationData' => $organizationData,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(Request $request)
    {
        $catalogFull = getCatalogFull();
        $locationList = getLocationListFormatted();

        $isSaved = tryChangeOrganizationDataInDB($request);

        if($isSaved) {
            $organizationData = getOrganizationDataFormatted();

            return view('pages.profile.organization-info.index', [
                'catalogHeader' => $catalogFull,
                'locationList' => $locationList,
                'organizationData' => $organizationData,
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
        //
    }
}
