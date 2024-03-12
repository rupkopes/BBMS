<?php
session_start();

// Database configuration
$servername = "localhost"; // Change this if your database is hosted elsewhere
$username = "root"; // Change this to your MySQL username
$password = ""; // Change this to your MySQL password
$database = "Blood_Bank_Management_System"; // Change this to the name of your MySQL database

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to validate user credentials
function validateUser($conn, $username, $password) {
    $sql = "SELECT * FROM Admins WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->num_rows === 1;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Validate user credentials
    if (validateUser($conn, $username, $password)) {
        // Authentication successful
        $_SESSION["admin_logged_in"] = true;
        header("Location: ../index.php");
        exit();
    } else {
        // Authentication failed
        echo "Invalid username or password!";
    }
}

// Close connection
$conn->close();
?>
