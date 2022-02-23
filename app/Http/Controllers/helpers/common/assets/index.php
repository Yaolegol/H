<?php

function formatAssetPath($path) {
    return str_replace('public/', '/storage/', $path);
}
