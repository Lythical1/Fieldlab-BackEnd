<?php

// Function to get all managers
function getManagers()
{
    include '../database/connect.php';
    // get all managers using the query
    $query = "SELECT * FROM managers";
    $statement = $pdo->prepare($query);
    $statement->execute();
    $properties = $statement->fetchAll();

    // Send a JSON response
    header('Content-Type: application/json');
    echo json_encode($properties);
}
