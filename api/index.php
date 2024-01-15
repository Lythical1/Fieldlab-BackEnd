<?php

// require all the files for the endpoints
require_once 'properties.php';
require_once 'customers.php';

// Define a simple router
$request_method = $_SERVER['REQUEST_METHOD'];
$request_uri = $_SERVER['REQUEST_URI'];

// properties endpoint
if ($request_method === 'GET' && $request_uri === '/api/properties') {
    getProperties();
} elseif ($request_method === 'GET' && $request_uri === '/api/customers') {
    getCustomers();
} else {
    // Handle invalid endpoint
    http_response_code(404);
    echo json_encode(['error' => 'Endpoint not found']);
}
