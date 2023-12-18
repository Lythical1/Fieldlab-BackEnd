<?php

// Function to get all custemors
function getCustomers()
{
    include '../database/connect.php';
    // get all customers using the query
    $query = "SELECT * FROM customers";
    $statement = $pdo->prepare($query);
    $statement->execute();
    $customers = $statement->fetchAll(PDO::FETCH_ASSOC);

    // Send a JSON response
    header('Content-Type: application/json');
    echo json_encode($customers);
}
