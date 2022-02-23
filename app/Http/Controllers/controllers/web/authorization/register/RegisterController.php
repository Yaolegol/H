<?php

namespace App\Http\Controllers\controllers\web\authorization\register;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

require_once('app/Http/Controllers/helpers/web/authorization/index.php');
require_once('app/Http/Controllers/helpers/web/catalog/index.php');
require_once('app/Http/Controllers/helpers/web/location/index.php');

class RegisterController extends Controller
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

        return view('pages.auth.register.index.index', [
            'catalogHeader' => $catalogFull,
            'locationList' => $locationList,
        ]);
    }

    /**
     * @return Response
     */
    public function register(Request $request)
    {
        $validator = getRegistrationValidator($request);

        if($validator->fails()) {
            return redirect('/register')
                ->withErrors($validator)
                ->withInput();
        }

        $isSaved = trySaveUserInDB($request);

        if($isSaved) {
            return redirect('/');
        }

        return back()->with(['commonError' => 'Что-то пошло не так. Попробуйте снова']);
    }
}
