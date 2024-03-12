<?php
// Check if staff ID is provided via POST method
if(isset($_POST['staff_id'])) {
    // Get the staff ID from the POST data
    $staff_id = $_POST['staff_id'];

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

    // Prepare SQL statement to delete staff record
    $sql = "DELETE FROM Staff WHERE staff_id = ?";

    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $staff_id);

    // Execute the statement
    if ($stmt->execute() === TRUE) {
        // Redirect back to the same page
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    } else {
        echo "Error deleting staff record: " . $conn->error;
    }

    // Close prepared statement and database connection
    $stmt->close();
    $conn->close();
} else {
    // If staff ID is not provided, redirect to an error page or handle the situation accordingly
    echo "Error: Staff ID not provided";
}
?>
