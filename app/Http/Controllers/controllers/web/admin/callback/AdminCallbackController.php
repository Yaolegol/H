<?php

namespace App\Http\Controllers\controllers\web\admin\callback;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

require_once(app_path() . '/Http/Controllers/helpers/web/admin/users/index.php');
require_once(app_path() . '/Http/Controllers/helpers/web/callback/index.php');

class AdminCallbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!Auth::check() || !Auth::user()->is_admin) {
            abort(403);
        }

        $callbackList = getCallbackInfo($request);

        return view('pages.admin.callback.index', [
            'callbackList' => $callbackList,
        ]);
    }
}
