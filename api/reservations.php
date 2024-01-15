<?php

// Function to get all reservations
function getReservations()
{
    include '../database/connect.php';
    // get all rservations using the query
    $query = "SELECT * FROM rservations";
    $statement = $pdo->prepare($query);
    $statement->execute();
    $reservations = $statement->fetchAll();

    // Send a JSON response
    header('Content-Type: application/json');
    echo json_encode($reservations);
}
