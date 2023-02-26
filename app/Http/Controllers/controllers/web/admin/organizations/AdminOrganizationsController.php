<?php

namespace App\Http\Controllers\controllers\web\admin\organizations;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

require_once('app/Http/Controllers/helpers/web/admin/organizations/index.php');
require_once('app/Http/Controllers/helpers/web/profile/organizationData/index.php');
require_once('app/Http/Controllers/helpers/common/assets/index.php');
require_once('app/Http/Controllers/helpers/common/catalog/index.php');
require_once('app/Http/Controllers/helpers/web/offers/index.php');
require_once('app/Http/Controllers/helpers/api/admin/index.php');

class AdminOrganizationsController extends Controller
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

        $notApprovedList = getOrganizationsNotApproved();

        return view('pages.admin.organizations.index', [
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

        $newStatus = $request->input('approve');

        updateOrganizationApproveStatus($id, $newStatus);

        $data = [
            'success' => true,
            'errors' => [],
        ];

        return json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }
}
