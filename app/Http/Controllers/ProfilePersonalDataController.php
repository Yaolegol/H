<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

require_once('app/Http/Controllers/helpers/catalog/index.php');

class ProfilePersonalDataController extends Controller
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
        $userData = getUserDataFormatted();
        $section = 'personal-info';

        return view('pages.profile.personal-info.index', [
            'catalogHeader' => $catalogFull,
            'locationList' => $locationList,
            'section' => $section,
            'userData' => $userData
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
        $section = 'personal-info';
        $formSection = $request->input('form-section');

        if($formSection === 'personal-data') {
            $isSaved = tryChangeUserPersonalDataInDB($request);

            if($isSaved) {
                $userData = getUserDataFormatted();

                return view('pages.profile.personal-info.index', [
                    'catalogHeader' => $catalogFull,
                    'locationList' => $locationList,
                    'section' => $section,
                    'userData' => $userData
                ]);
            } else {
                return back()->with(
                    ['commonError' => 'Что-то пошло не так. Попробуйте снова']
                );
            }
        }

        if($formSection === 'registration-data') {

        }

        abort(404);
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
