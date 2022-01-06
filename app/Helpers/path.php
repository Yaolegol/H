<?php

function custom_getBuildFilePath($id, $ext)
{
    $path = '/build/' . $id;
    $cssPagePath = glob(public_path() . $path . '*' . '.' . $ext)[0];
    $name = explode($id, $cssPagePath)[1];

    return $path . $name;
}
