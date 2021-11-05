<?php

namespace App\Http\Controllers\controllers\api\profile\organizationData;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

require_once('app/Http/Controllers/helpers/profile/organizationData/index.php');

class ApiProfileOrganizationDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $organizationList = getOrganizationDataFormatted();

        $data = [
            'data' => $organizationList,
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

        return view('pages.profile.organization-info.create.index', [
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
        $isSaved = tryStoreOrganizationDataDataInDB($request);

        if($isSaved) {
            $data = [
                'data' => '',
                'errors' => '',
            ];

            return json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
        } else {
            $data = [
                'data' => '',
                'errors' => [
                    'common' => 'Что-то пошло не так. Попробуйте снова',
                ],
            ];

            return json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
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
        $organizationItemData = getOrganizationItemDataFormatted($id);

        return view('pages.profile.organization-info.edit.index', [
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
            $data = [
                'data' => '',
                'errors' => '',
            ];

            return json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
        } else {
            $data = [
                'data' => '',
                'errors' => [
                    'common' => 'Что-то пошло не так. Попробуйте снова',
                ],
            ];

            return json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request, $id)
    {
        $isDestroyed = tryDestroyOrganizationDataInDB($id);

        if($isDestroyed) {
            $data = [
                'data' => '',
                'errors' => '',
            ];

            return json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
        } else {
            $data = [
                'data' => '',
                'errors' => [
                    'common' => 'Что-то пошло не так. Попробуйте снова',
                ],
            ];

            return json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
        }
    }
}
