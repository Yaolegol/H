<?php

function getValidatorErrorsList($validator) {
    $errors = $validator->errors()->toArray();

    $errorsList = [];

    foreach($errors as $key => $value) {
        array_push($errorsList, [
            'name' => $key,
            'value' => $value,
        ]);
    }

    return $errorsList;
}
