<?php

function getInputsValuesArray($request, $name, $count) {
    $valuesArray = [];

    $iteration = 0;
    while ($iteration <= $count) {
        $currentName = $name . '_' . $iteration;
        $currentInputValue = $request->input($currentName);

        if ($currentInputValue) {
            array_push($valuesArray, $currentInputValue);
        }

        $iteration++;
    }

    return $valuesArray;
}
