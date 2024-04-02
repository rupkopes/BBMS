<?php
// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blood_bank_management_system";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Update status
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $staffId = $_POST["staff_id"];
    $status = $_POST["status"];

    $sql = "UPDATE Staff SET approval_status = '$status' WHERE staff_id = $staffId";

    if ($conn->query($sql) === TRUE) {
        echo "Status updated successfully";
    } else {
        echo "Error updating status: " . $conn->error;
    }
}

$conn->close();
?>
