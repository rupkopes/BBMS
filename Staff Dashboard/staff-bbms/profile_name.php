<?php
session_start();
$username = $_SESSION['username'];

// Database connection
$servername = "localhost"; // Change this to your MySQL server hostname
$db_username = "root"; // Change this to your MySQL username
$db_password = ""; // Change this to your MySQL password
$database = "blood_bank_management_system"; // Change this to your MySQL database name

// Create connection
$conn = new mysqli($servername, $db_username, $db_password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve user data from the database
$stmt = $conn->prepare("SELECT * FROM Staff WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$userData = $result->fetch_assoc();

// Close the statement
$stmt->close();

// Close the database connection
$conn->close();
?>