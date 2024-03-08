<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to the login page or display an error message
    header("Location: login.php");
    exit(); // Stop further execution
}

// Get the logged-in username
$username = $_SESSION['username'];

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Blood_Bank_Management_System";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve donor data for the logged-in user
$sql = "SELECT * FROM donors WHERE username = '$username'";
$result = $conn->query($sql);

// Check if there are any donor records
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        // Display donor record information here
    }
} else {
    echo "<tr><td colspan='8'>No donors found for the logged-in user</td></tr>";
}

// Close connection
$conn->close();
?>
