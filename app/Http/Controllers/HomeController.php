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
        $catalogList = [
            [
                'title' => 'Мясная продукция',
                'content' => [
                    'title' => 'Мясная продукция',
                    'categoriesList' => [
                        [
                            'link' => '/catalog/meat/beef',
                            'title' => 'Говядина'
                        ],
                        [
                            'link' => '/catalog/meat/pork',
                            'title' => 'Свинина'
                        ],
                        [
                            'link' => '/catalog/meat/fish',
                            'title' => 'Рыба'
                        ],
                    ]
                ]
            ],
            [
                'title' => 'Молочная продукция',
                'content' => [
                    'title' => 'Молочная продукция',
                    'categoriesList' => [
                        [
                            'link' => '/catalog/milk/curd',
                            'title' => 'Творог'
                        ],
                        [
                            'link' => '/catalog/milk/cream',
                            'title' => 'Сметана'
                        ],
                        [
                            'link' => '/catalog/milk/kefir',
                            'title' => 'Кефир'
                        ],
                        [
                            'link' => '/catalog/milk/cheese',
                            'title' => 'Сыр'
                        ],
                    ]
                ]
            ],
            [
                'title' => 'Яйца',
                'content' => [
                    'title' => 'Яйца',
                    'categoriesList' => [
                        [
                            'link' => '/catalog/eggs/chicken',
                            'title' => 'Куриные яйца'
                        ],
                        [
                            'link' => '/catalog/eggs/quail',
                            'title' => 'Перепелинные яйца'
                        ]
                    ]
                ]
            ]
        ];

        return view('pages.home.index', compact('catalogList'));
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
