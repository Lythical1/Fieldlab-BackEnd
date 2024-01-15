<?php

include_once "connect.php";

$query = file_get_contents("import.sql");
$pdo->exec($query);

$query = file_get_contents("customers.sql");
$pdo->exec($query);

$query = file_get_contents("bookings.sql");
$pdo->exec($query);

$query = file_get_contents("reviews.sql");
$pdo->exec($query);

$query = file_get_contents("properties.sql");
$pdo->exec($query);

$query = file_get_contents("reservations.sql");

echo "Seeder executed successfully.\n";

?>
