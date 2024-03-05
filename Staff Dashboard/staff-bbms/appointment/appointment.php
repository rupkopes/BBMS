<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$database = "Blood_Bank_Management_System";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $donor_name = $_POST["donor_name"];
    $appointment_date = $_POST["appointment_date"];

    // Prepare data for insertion (sanitize)
    $donor_name = $conn->real_escape_string($donor_name);
    $appointment_date = $conn->real_escape_string($appointment_date);

    // Insert data into appointments table
    $sql = "INSERT INTO appointments (donor_name, appointment_date) VALUES ('$donor_name', '$appointment_date')";

    if ($conn->query($sql) === TRUE) {
        echo "New appointment created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Form not submitted.";
}

// Close database connection
$conn->close();
?>