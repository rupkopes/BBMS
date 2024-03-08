<?php
// Connect to your database
$servername = "localhost";
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "Blood_Bank_Management_System"; // Replace with your database name
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and execute SQL query to fetch blood requests
$sql = "SELECT * FROM receiver";
$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    // Fetch results and store in an array
    $bloodRequests = array();
    while ($row = $result->fetch_assoc()) {
        $bloodRequests[] = $row;
    }
    echo json_encode($bloodRequests); // Output JSON
} else {
    echo json_encode(array()); // Output an empty array if no results
}

$conn->close();
?>
