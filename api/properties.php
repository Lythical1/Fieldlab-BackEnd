<?php

// Function to get all properties
function getProperties()
{
    include '../database/connect.php';
    // get all properties using the query
    $query = "SELECT * FROM properties";
    $statement = $pdo->prepare($query);
    $statement->execute();
    $properties = $statement->fetchAll(PDO::FETCH_ASSOC);

    // Send a JSON response
    header('Content-Type: application/json');
    echo json_encode($properties);
}