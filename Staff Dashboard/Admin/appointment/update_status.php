<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$database = "blood_bank_management_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted and mark_completed button is clicked
if(isset($_POST['mark_completed']) && isset($_POST['appointment_id'])) {
    $appointment_id = $_POST['appointment_id'];

    // Update appointment status to "Completed"
    $updateSql = "UPDATE appointments SET status='Completed' WHERE id=" . $appointment_id;
    
    if ($conn->query($updateSql) === TRUE) {
        // Appointment marked as completed successfully
        header("Location: Appointment.html"); // Redirect to appointment page after updating status
        exit();
    } else {
        // Error updating appointment status
        echo "Error updating appointment status: " . $conn->error;
    }
}

// Close database connection
$conn->close();
?>
