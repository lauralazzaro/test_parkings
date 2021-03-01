<?php
include 'ApiHandler.php';

header('Content-Type: application/json');

$api = new ApiHandler();

$paramUrl = isset($_GET['location']) ? $_GET['location'] : null;

if ($paramUrl === 'bordeaux') {
    $api->getAllDataByCity('bordeaux');
} else if (isset($_GET['status'])) {
    $api->getParkingByStatus('bordeaux', 44.823910, -0.555150, $_GET['status']);
} else $api->getClosestParking('bordeaux', 44.888999, -0.517678);

