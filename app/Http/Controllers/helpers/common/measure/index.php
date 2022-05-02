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

function getMeasures($activeId = null) {
    $measuresList = DB_getMeasures();

    return formatMeasures($measuresList, $activeId);
}
