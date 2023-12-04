<?php

// users.php

// Define a simple array of users for demonstration purposes
$users = [
    ['id' => 1, 'name' => 'John Doe'],
    ['id' => 2, 'name' => 'Jane Doe'],
];

// Function to get all users
function getUsers()
{
    global $users;

    // Send a JSON response
    header('Content-Type: application/json');
    echo json_encode($users);
}
