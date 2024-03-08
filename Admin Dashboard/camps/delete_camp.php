<?php
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

// Check if camp_id is set and not empty
if(isset($_POST['camp_id']) && !empty($_POST['camp_id'])) {
    $camp_id = $_POST['camp_id'];
    
    // SQL to delete the camp
    $sql = "DELETE FROM camps WHERE id=$camp_id";

    if ($conn->query($sql) === TRUE) {
        // Redirect back to the camp page with a success message
        header("Location: campschedule.php?message=Camp%20deleted%20successfully");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "Camp ID not set or empty";
}

// Close connection
$conn->close();
?>
