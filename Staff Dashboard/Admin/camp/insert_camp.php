<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $campName = $_POST['campName'];
    $campDate = $_POST['campDate'];
    $campTimeHour = $_POST['campTimeHour'];
    $campTimeMinute = $_POST['campTimeMinute'];
    $campTimePeriod = $_POST['campTimePeriod'];
    $campConductedBy = $_POST['campConductedBy'];
    
    // Concatenate the time components
    $campTime = $campTimeHour . ':' . $campTimeMinute . ' ' . $campTimePeriod;

    $campLocation = $_POST['campLocation'];
    $campContact = $_POST['campContact'];

    // Check if the camp detail is already registered
    $check_sql = "SELECT * FROM camps WHERE name = '$campName' AND date = '$campDate' AND time = '$campTime' AND location = '$campLocation' AND contact = '$campContact' AND campConductedBy = '$campConductedBy' AND registered = 1";
    $check_result = $conn->query($check_sql);

    if ($check_result->num_rows > 0) {
        echo "This camp detail is already registered.";
    } else {
        // Insert the camp detail into the database
        $insert_sql = "INSERT INTO camps (name, date, time, location, contact, campConductedBy, registered) VALUES ('$campName', '$campDate', '$campTime', '$campLocation', '$campContact', '$campConductedBy', 1)";
        
        if ($conn->query($insert_sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $insert_sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>
