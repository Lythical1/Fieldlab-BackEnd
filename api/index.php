<?php

// require all the files for the endpoints
require_once 'properties.php';
require_once 'customers.php';
require_once 'reservationget.php';
require_once 'reviews.php';

// Define a simple router
$request_method = $_SERVER['REQUEST_METHOD'];
$request_uri = $_SERVER['REQUEST_URI'];

// properties endpoint
echo $request_method . ' ' . $request_uri . PHP_EOL;
if ($request_method === 'GET' && $request_uri === '/api/properties') {
    getProperties();
} elseif ($request_method === 'GET' && $request_uri === '/api/customers') {
    getCustomers();
} elseif ($request_method === 'GET' && $request_uri === '/api/reservations') {
    getReservations();
} elseif ($request_method === 'GET' && $request_uri === '/api/managers') {
    getManagers();
} else {
    // Handle invalid endpoint
    http_response_code(404);
    echo json_encode(['error' => 'Endpoint not found']);
}
