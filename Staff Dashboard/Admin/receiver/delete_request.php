<?php
// Get the request data
$requestData = json_decode(file_get_contents('php://input'), true);

// Database configuration
$servername = "localhost";
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "Blood_Bank_Management_System"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the request ID
$id = $requestData['id'];

// Prepare and execute SQL query to delete the request
$stmt = $conn->prepare("DELETE FROM receiver WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    // Success
    $stmt->close();
    $conn->close();
    echo json_encode(array('success' => true, 'message' => 'Request deleted successfully'));
} else {
    // Error
    $stmt->close();
    $conn->close();
    echo json_encode(array('success' => false, 'message' => 'Error deleting request: ' . $conn->error));
}
?>
