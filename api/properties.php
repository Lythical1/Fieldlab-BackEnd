<?php

// use connect.php to connect to the database
include 'database/connect.php';

// Function to get all users
function getProperties()
{
    // get all properties using the query
    $query = "SELECT * FROM properties";
    $statement = $db->prepare($query);
    $statement->execute();
    $properties = $statement->fetchAll();
    $statement->closeCursor();

    // Send a JSON response
    header('Content-Type: application/json');
    echo json_encode($properties);
}
