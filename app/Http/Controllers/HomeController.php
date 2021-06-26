<?php

namespace App\Http\Controllers;

use App\Models\CatalogSecondLevel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

require_once('app/Http/Controllers/helpers/catalog/index.php');

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $breadcrumbs = [
            [
                'link' => '/catalog/meat',
                'title' => 'Мясная продукция',
            ],
            [
                'active' => true,
                'link' => '/catalog/meat/beef',
                'title' => 'Говядина',
            ]
        ];

        $catalogSecondLevel = CatalogSecondLevel::with('catalogFirstLevel')->get()->toArray();
        $catalog = getCatalog($catalogSecondLevel);

        return view('pages.home.index', [
            'breadcrumbs' => $breadcrumbs,
            'catalogList' => $catalog,
        ]);
    }
}
