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
