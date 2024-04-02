<?php

// Database connection
$servername = "localhost";
$username = "root";
$password = ""; // Enter your MySQL password here
$database = "blood_bank_management_system"; // Change this to your database name

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Form data
$token = $_POST['token']; // Added token field
$password = $_POST['password'];

// SQL injection prevention
$token = mysqli_real_escape_string($conn, $token); // Added token field
$password = mysqli_real_escape_string($conn, $password);

// Query to update password based on token
$stmt = $conn->prepare("UPDATE Staff SET password = ?, reset_token = NULL WHERE reset_token = ?");
$stmt->bind_param("ss", password_hash($password, PASSWORD_DEFAULT), $token);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo "Password updated successfully";
    echo "<br>";
    echo "<a href= login.html>Go to login page</a>";
} else {
    echo "Invalid token or password update failed";
}

$conn->close();
?>
