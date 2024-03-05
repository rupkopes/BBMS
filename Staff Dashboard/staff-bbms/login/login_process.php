<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = ""; // Enter your MySQL password here
$database = "Blood_Bank_Management_System"; // Change this to your database name

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Form data
$username = $_POST['username'];
$password = $_POST['password'];

// SQL injection prevention
$username = mysqli_real_escape_string($conn, $username);
$password = mysqli_real_escape_string($conn, $password);

// Query
$query = "SELECT * FROM staff WHERE username='$username' AND password='$password'";
$result = $conn->query($query);

if ($result->num_rows == 1) {
    // Successful login
    session_start();
    $_SESSION['username'] = $username;
    header("Location: ../index.php"); // Redirect to dashboard page
} else {
    // Failed login
    echo "Invalid username or password";
}

$conn->close();
?>
