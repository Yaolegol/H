<?php

use App\Models\Callback;
use Illuminate\Support\Facades\Validator;

function DB_trySaveCallbackText($request)
{
    try {
        $data = [
            'text' => $request->input('text'),
        ];

        return Callback::create($data);
    } catch(\Exception $error) {
        return abort(500);
    }
}

function getCallbackValidator($request) {
    return Validator::make(
        $request->all(),
        [
            'text' => ['required', 'max:500'],
        ],
        [
            'max' => 'Поле должно содержать максимум :max символов',
            'required' => 'Поле обязательно для заполнения',
        ]
    );
}
