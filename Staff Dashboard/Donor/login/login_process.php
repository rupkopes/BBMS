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
$query = "SELECT * FROM donor_register_data WHERE username='$username'";
$result = $conn->query($query);

if ($result) {
    if ($result->num_rows == 1) {
        // Fetch the user data
        $row = $result->fetch_assoc();
        // Verify the password
        if (password_verify($password, $row['password'])) {
            // Successful login
            session_start();
            $_SESSION['username'] = $username;
            header("Location: ../index.php"); // Redirect to dashboard page
            exit(); // Make sure to exit after redirection
        } else {
            // Incorrect password
            echo "Invalid password";
        }
    } else {
        // No user found
        echo "User not found";
    }
} else {
    // SQL query execution error
    echo "Error executing query: " . $conn->error;
}

$conn->close();
?>
