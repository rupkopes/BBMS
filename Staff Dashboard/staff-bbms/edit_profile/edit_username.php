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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from form
    $staff_id = $_POST['staff_id']; // Assuming you have staff_id as a hidden field in your form
    $username = $_POST['username'];

    // Prepare and execute SQL statement
    $stmt = $conn->prepare("UPDATE Staff SET username=? WHERE staff_id=?");
    $stmt->bind_param("si", $username, $staff_id);

    if ($stmt->execute() === TRUE) {
        // Update successful
        echo "<script>alert('Username updated successfully. Please Login Again'); window.location.href = '../index.php';</script>";

        // Redirect to edit profile page after update
        exit(); // Ensure script execution stops after redirection
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
