<?php
include 'ApiHandler.php';

header('Content-Type: application/json');

$api = new ApiHandler();

$api->getDataForCity('bordeaux');
