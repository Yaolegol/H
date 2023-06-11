<?php

namespace App\Http\Controllers\controllers\web\copyright;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

require_once(app_path() . '/Http/Controllers/helpers/common/catalog/index.php');
require_once(app_path() . '/Http/Controllers/helpers/web/copyright/index.php');

class CopyrightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function images()
    {
        $catalogFull = getCatalogFull();
        $copyrightImages = getCopyrightImages();

        return view('pages.copyright.images.index', [
            'catalogHeader' => $catalogFull,
            'copyrightImages' => $copyrightImages,
        ]);
    }
}
