<?php

function getFilesArray($request, $name, $count) {
    $filesArray = [];

    $iteration = 1;
    while ($iteration <= $count) {
        $currentName = $name . '_' . $iteration;
        $currentFile = $request->file($currentName);

        if ($currentFile) {
            $filesArray[$currentName] = $currentFile;
        }

        $iteration++;
    }

    return $filesArray;
}

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
