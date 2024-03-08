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
    $name = $_POST["name"];
    $age = $_POST["age"];
    $blood_group = $_POST["blood_group"];
    $email = $_POST["email"];
    $contact_number = $_POST["contact"];
    $location = $_POST["location"];

    // Prepare data for insertion (sanitize)
    $name = $conn->real_escape_string($name);
    $age = $conn->real_escape_string($age);
    $blood_group = $conn->real_escape_string($blood_group);
    $email = $conn->real_escape_string($email);
    $contact_number = $conn->real_escape_string($contact_number);
    $location = $conn->real_escape_string($location);

    // Insert data into donors table
    $sql = "INSERT INTO donors (name, age, blood_group, email, contact, location) VALUES ('$name', '$age', '$blood_group', '$email', '$contact_number', '$location')";

    if ($conn->query($sql) === TRUE) {
        // Update the status of the appointment to "Completed"
        $updateSql = "UPDATE appointments SET status='Completed' WHERE name='$name' AND age='$age' AND blood_group='$blood_group' AND email='$email' AND contact_number='$contact_number' AND location='$location'";
        if ($conn->query($updateSql) === TRUE) {
            // Redirect to another page
            header("Location: appointment_list.php");
            exit(); // Make sure to exit after redirection
        } else {
            echo "Error updating appointment status: " . $conn->error;
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Form not submitted.";
}

// Close database connection
$conn->close();
?>
