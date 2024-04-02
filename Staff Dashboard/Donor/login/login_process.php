<?php
// Database connection
$servername = "localhost";
$username_db = "root";
$password_db = ""; // Enter your MySQL password here
$database = "blood_bank_management_system"; // Change this to your database name

$conn = new mysqli($servername, $username_db, $password_db, $database);

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
            $_SESSION['Donor_id'] = $row['Donor_id'];
            echo "Login successful";
            header("Location: ../index.php"); // Redirect to dashboard page
            exit(); // Make sure to exit after redirection
        } else {
            // Incorrect password, generate alert
            echo '<script>alert("Incorrect password"); window.location.href = "login.html";</script>';
        }
    } else {
        // No user found, generate alert
        echo '<script>alert("Incorrect password"); window.location.href = "login.html";</script>';
    }
} else {
    // SQL query execution error, generate alert
    echo '<script>alert("Error executing query: ' . $conn->error . '");</script>';
}

$conn->close();
?>
