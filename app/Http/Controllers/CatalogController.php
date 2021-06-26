<?php

namespace App\Http\Controllers;

use App\Models\CatalogSecondLevel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

require_once('app/Http/Controllers/helpers/catalog/index.php');

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return redirect('/');
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
     * @param  string  $name
     * @return Response
     */
    public function show($name)
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
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
