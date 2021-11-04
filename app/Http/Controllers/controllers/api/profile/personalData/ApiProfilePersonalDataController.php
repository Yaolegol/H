<?php

namespace App\Http\Controllers\controllers\api\profile\personalData;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

require_once('app/Http/Controllers/helpers/api/profile/personalData/index.php');
require_once('app/Http/Controllers/helpers/profile/personalData/index.php');

class ApiProfilePersonalDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $userData = getUserDataFormatted();

        $data = [
            'data' => $userData,
            'errors' => '',
        ];

        return json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }

    /**
     * @return Response
     */
    public function addAvatar(Request $request)
    {
        $avatarPath = apiTryChangeUserAvatarInDB($request);

        if($avatarPath != '') {
            $data = [
                'data' => [
                    'avatar' => $avatarPath,
                ],
                'errors' => '',
            ];

            return json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
        } else {
            $data = [
                'data' => '',
                'errors' => [
                    'common' => 'Что-то пошло не так. Попробуйте снова.',
                ],
            ];

            return json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
        }
    }

    /**
     * @return Response
     */
    public function removeAvatar()
    {
        $isRemoved = apiTryDeleteUserAvatarInDB();

        if($isRemoved) {
            $data = [
                'data' => [
                    'avatar' => '',
                ],
                'errors' => '',
            ];

            return json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
        } else {
            $data = [
                'data' => '',
                'errors' => [
                    'common' => 'Что-то пошло не так. Попробуйте снова.',
                ],
            ];

            return json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
        }
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function update(Request $request)
    {
        $isSaved = apiTryChangeUserPersonalDataInDB($request);

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
                    'common' => 'Что-то пошло не так. Попробуйте снова.',
                ],
            ];

            return json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
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
        //
    }
}
