<?php

namespace App\Http\Controllers\controllers\web\admin\offersRating;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

require_once(app_path() . '/Http/Controllers/helpers/web/admin/offersRating/index.php');
require_once(app_path() . '/Http/Controllers/helpers/common/catalog/index.php');
require_once(app_path() . '/Http/Controllers/helpers/web/offers/index.php');

class AdminOffersRatingController extends Controller
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

        $notApprovedList = getOffersRatingNotApproved();

        return view('pages.admin.offersRating.index', [
            'notApprovedList' => $notApprovedList,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function approve(Request $request, $id)
    {
        if(!Auth::check() || !Auth::user()->is_admin) {
            $data = [
                'success' => false,
                'errors' => ['Not auth'],
            ];

            return json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
        }

        updateOfferRatingApproveStatus($id, 1);

        $data = [
            'success' => true,
            'errors' => [],
        ];

        return json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function reject(Request $request, $id)
    {
        if(!Auth::check() || !Auth::user()->is_admin) {
            $data = [
                'success' => false,
                'errors' => ['Not auth'],
            ];

            return json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
        }

        rejectOfferRating($id, $request);

        $data = [
            'success' => true,
            'errors' => [],
        ];

        return json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }
}
