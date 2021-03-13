<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $catalog = [
            [
                'title' => 'catalog_0',
                'content' => [
                    'title' => 'content_0',
                    'categoriesList' => [
                        [
                            'link' => '/content_0/category_0',
                            'title' => 'content_0 category_0'
                        ],
                        [
                            'link' => '/content_0/category_1',
                            'title' => 'content_0 category_1'
                        ],
                        [
                            'link' => '/content_0/category_2',
                            'title' => 'content_0 category_2'
                        ],
                    ]
                ]
            ],
            [
                'title' => 'catalog_1',
                'content' => [
                    'title' => 'content_1',
                    'categoriesList' => [
                        [
                            'link' => '/content_1/category_0',
                            'title' => 'content_1 category_0'
                        ],
                        [
                            'link' => '/content_1/category_1',
                            'title' => 'content_1 category_1'
                        ],
                        [
                            'link' => '/content_1/category_2',
                            'title' => 'content_1 category_2'
                        ],
                        [
                            'link' => '/content_1/category_3',
                            'title' => 'content_1 category_3'
                        ],
                    ]
                ]
            ],
            [
                'title' => 'catalog_2',
                'content' => [
                    'title' => 'content_2',
                    'categoriesList' => [
                        [
                            'link' => '/content_2/category_0',
                            'title' => 'content_2 category_0'
                        ],
                        [
                            'link' => '/content_2/category_1',
                            'title' => 'content_2 category_1'
                        ],
                        [
                            'link' => '/content_2/category_2',
                            'title' => 'content_2 category_2'
                        ],
                        [
                            'link' => '/content_2/category_3',
                            'title' => 'content_2 category_3'
                        ],
                        [
                            'link' => '/content_2/category_4',
                            'title' => 'content_2 category_4'
                        ],
                    ]
                ]
            ]
        ];

        return view('pages.home.index', compact('catalog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(): Response
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request): Response
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id): Response
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
    public function update(Request $request, $id): Response
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id): Response
    {
        //
    }
}
