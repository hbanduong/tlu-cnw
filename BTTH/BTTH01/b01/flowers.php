<?php
define('FLOWERS_JSON_FILE', 'flowers.json');

function loadFlowers()
{
    if (file_exists(FLOWERS_JSON_FILE)) {
        $jsonData = file_get_contents(FLOWERS_JSON_FILE);
        return json_decode($jsonData, true);
    }
    return [];
}

function saveFlowers($flowers)
{
    $jsonData = json_encode($flowers, JSON_PRETTY_PRINT);
    file_put_contents(FLOWERS_JSON_FILE, $jsonData);
}

$flowers = loadFlowers();
