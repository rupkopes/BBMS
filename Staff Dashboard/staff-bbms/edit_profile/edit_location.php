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
    $current_address = $_POST['current_address'];
    $permanent_address = $_POST['permanent_address'];

    // Prepare and execute SQL statement
    $stmt = $conn->prepare("UPDATE Staff SET current_address=?, permanent_address=? WHERE staff_id=?");
    $stmt->bind_param("ssi", $current_address, $permanent_address, $staff_id);

    if ($stmt->execute() === TRUE) {
        // Update successful
        echo "<script>alert('Addresses updated successfully.'); window.location.href = '../index.php';</script>";
        // Redirect to edit profile page after update
        exit(); // Ensure script execution stops after redirection
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
