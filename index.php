<?php
include 'ApiHandler.php';

header('Content-Type: application/json');

$api = new ApiHandler();

$paramUrl = isset($_GET['location']) ? $_GET['location'] : null;

if ($paramUrl === 'bordeaux') {
    $api->getAllDataByCity('bordeaux');
}

else $api->getClosestParking('bordeaux', 44.888999, -0.517678);

