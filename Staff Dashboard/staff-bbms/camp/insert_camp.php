<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blood_bank_management_system";

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

    $sql = "INSERT INTO camps (name, date, time, location, contact, campConductedBy) VALUES ('$campName', '$campDate', '$campTime', '$campLocation', '$campContact', ' $campConductedBy')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Successfully Added Camp:  $campName Conducted By $campConductedBy In the location: $campLocation on $campDate.');</script>";
        echo "<script>window.location.href = 'Camp.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
