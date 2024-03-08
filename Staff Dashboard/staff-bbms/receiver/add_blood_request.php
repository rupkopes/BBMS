<?php
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

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
$name = $_POST['name'];
$age = $_POST['age'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$location = $_POST['location'];
$bloodType = $_POST['bloodType'];
$bloodUnits = $_POST['bloodUnits'];

// Validate form data (you can add more validation if needed)
if (empty($name) || empty($age) || empty($email) || empty($phone) || empty($location) || empty($bloodType) || empty($bloodUnits)) {
    echo json_encode(array('success' => false, 'message' => 'All fields are required'));
    exit;
}

// Prepare and execute SQL query to insert new blood request with status as "Pending"
$stmt = $conn->prepare("INSERT INTO receiver (name, age, email, phone, location, bloodType, bloodUnits, status) VALUES (?, ?, ?, ?, ?, ?, ?, 'Pending')");
$stmt->bind_param("sissssi", $name, $age, $email, $phone, $location, $bloodType, $bloodUnits);

    
    if ($stmt->execute()) {
        // Success
        $stmt->close();
        $conn->close();
        echo json_encode(array('success' => true, 'message' => 'Blood request added successfully'));
    } else {
        // Error
        $stmt->close();
        $conn->close();
        echo json_encode(array('success' => false, 'message' => 'Error adding blood request: ' . $conn->error)); // Include error message
    }
    
    exit;
} else {
    echo json_encode(array('success' => false, 'message' => 'Invalid request method'));
}
?>
