<?php

namespace App\Http\Controllers\controllers\web\authorization\logout;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

require_once(app_path() . '/Http/Controllers/helpers/web/authorization/index.php');

class LogoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $isLogout = DB_tryLogoutUser($request);

        if($isLogout) {
            return redirect('/');
        }

        return abort(500);
    }
}
