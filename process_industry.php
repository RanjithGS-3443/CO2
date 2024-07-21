<?php
session_start();
require_once 'db_connection.php'; // Ensure this file contains your database connection logic

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $industry_name = $_POST['industry_name'];
    $owner_name = $_POST['owner_name'];
    $address = $_POST['address'];
    $established_on = $_POST['established_on'];

    // Prepare SQL statement
    $stmt = $pdo->prepare("INSERT INTO industries (industry_name,owner_name, address, established_on) VALUES (?, ?, ?, ?)");

    if ($stmt->execute([$industry_name,$owner_name, $address, $established_on])) {
        // Redirect to submit_emissions.php after successful submission
        header('Location: success1.html');
        exit();
    } else {
        echo "Error adding industry: " . $stmt->errorInfo()[2];
    }
}
?>
