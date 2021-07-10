<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

require_once('app/Http/Controllers/helpers/catalog/index.php');

class OffersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  string  $catalogLevel2Link
     * @param  string  $productLink
     * @return \Illuminate\Http\Response
     */
    public function index($catalogLevel2Link, $productLink)
    {
        $catalogFull = getCatalogFull();
        $offersList = getOffers($productLink);
        $breadcrumbs = getCatalogOffersBreadcrumbs($catalogFull, $catalogLevel2Link, $productLink);

        return view('pages.offers.index', [
            'breadcrumbs' => $breadcrumbs,
            'catalogHeader' => $catalogFull,
            'offersList' => $offersList,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $catalogFull = getCatalogFull();
        $offer = getOffer($id);
        $breadcrumbs = getOfferBreadcrumbs();

        return view('pages.offers.item.index', [
            'breadcrumbs' => $breadcrumbs,
            'catalogHeader' => $catalogFull,
            'offer' => $offer,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
