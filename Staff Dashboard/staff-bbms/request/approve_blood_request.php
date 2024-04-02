<?php
// Get the request data
$requestData = json_decode(file_get_contents('php://input'), true);

// Database configuration
$servername = "localhost";
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "blood_bank_management_system"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the request is approved or not
$id = $requestData['id'];
$approved = $requestData['approved'];

// Update the status based on approval
if ($approved) {
    $status = 'Approved';
} else {
    $status = 'Not Approved';
}

// Prepare and execute SQL query to update the status
$stmt = $conn->prepare("UPDATE request SET status = ? WHERE id = ?");
$stmt->bind_param("si", $status, $id);

if ($stmt->execute()) {
    // Success
    $stmt->close();
    $conn->close();
    echo json_encode(array('success' => true, 'message' => 'Status updated successfully'));
} else {
    // Error
    $stmt->close();
    $conn->close();
    echo json_encode(array('success' => false, 'message' => 'Error updating status: ' . $conn->error));
}
?>
