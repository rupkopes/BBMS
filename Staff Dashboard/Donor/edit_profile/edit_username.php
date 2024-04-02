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
    $Donor_id = $_POST['Donor_id']; // Assuming you have staff_id as a hidden field in your form
    $username = $_POST['username'];

    // Prepare and execute SQL statement
    $stmt = $conn->prepare("UPDATE donor_register_data SET username=? WHERE Donor_id=?");
    $stmt->bind_param("si", $username, $Donor_id);

    if ($stmt->execute() === TRUE) {
        // Update successful
        echo "<script>alert('Username updated successfully.'); window.location.href = '../index.php';</script>";
        // Redirect to edit profile page after update
        exit(); // Ensure script execution stops after redirection
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
