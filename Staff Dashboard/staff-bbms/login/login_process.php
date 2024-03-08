<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establish database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Blood_Bank_Management_System";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve username and password from form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and execute SQL statement
    $stmt = $conn->prepare("SELECT * FROM Staff WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Password is correct, set session variables
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            echo "Login successful";
        } else {
            echo "Incorrect password";
        }
    } else {
        echo "User not found";
    }

    // Check if the user is logged in
if(isset($_SESSION['username'])) {
    // Redirect to another page
    header("Location: ../index.php");
    exit(); // Make sure that code below doesn't get executed after redirect
} else {
    // Redirect to login page if not logged in
    header("Location: login.html");
    exit();
}

    $stmt->close();
    $conn->close();
}
