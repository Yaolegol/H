<?php

use App\Models\Measure;

function DB_getMeasures()
{
    return Measure::all()->toArray();
}

function formatMeasures($measuresList, $activeId) {
    return array_map(function($measureItem) use($activeId) {
        $measureId = $measureItem['id'];

        return [
            'id' => $measureId,
            'isChecked' => $measureId === $activeId,
            'title' => $measureItem['title'],
            'value' => $measureId,
        ];
    }, $measuresList);
}

function getMeasureById($id) {
    $measuresList = DB_getMeasures();

    $key = array_search(function($measure) use($id) {
        return $measure['id'] === (int)$id;
    }, $measuresList);

    return $measuresList[$key]['title'];
}

function getMeasures($activeId = null) {
    $measuresList = DB_getMeasures();

    return formatMeasures($measuresList, $activeId);
}
