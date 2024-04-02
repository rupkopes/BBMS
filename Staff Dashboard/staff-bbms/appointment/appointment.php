<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $age = $_POST["age"];
    $blood_group = $_POST["blood_group"];
    $email = $_POST["email"];
    $contact_number = $_POST["contact_number"];
    $location = $_POST["location"];
    $appointment_date = $_POST["appointment_date"];

    // Prepare data for insertion (sanitize)
    $name = $conn->real_escape_string($name);
    $age = $conn->real_escape_string($age);
    $blood_group = $conn->real_escape_string($blood_group);
    $email = $conn->real_escape_string($email);
    $contact_number = $conn->real_escape_string($contact_number);
    $location = $conn->real_escape_string($location);
    $appointment_date = $conn->real_escape_string($appointment_date);

    // Check if email already exists
    $stmt_email_check = $conn->prepare("SELECT * FROM appointments WHERE email = ?");
    $stmt_email_check->bind_param("s", $email);
    $stmt_email_check->execute();
    $result_email_check = $stmt_email_check->get_result();

    // Check if contact number already exists
    $stmt_contact_check = $conn->prepare("SELECT * FROM appointments WHERE contact_number = ?");
    $stmt_contact_check->bind_param("s", $contact_number);
    $stmt_contact_check->execute();
    $result_contact_check = $stmt_contact_check->get_result();

    if ($result_email_check->num_rows > 0 && $result_contact_check->num_rows > 0) {
        // Both email and contact number already exist, display error message
        echo "<script>alert('Email and phone number already exist. Please use different credentials.'); window.location.href = 'Appointment.php';</script>";
        exit();
    } elseif ($result_email_check->num_rows > 0) {
        // Email already exists, display error message
        echo "<script>alert('This Email is already registered. Please use different Email.'); window.location.href = 'Appointment.php';</script>";
        exit();
    } elseif ($result_contact_check->num_rows > 0) {
        // Contact number already exists, display error message
        echo "<script>alert('This Contact Number is already registered. Please use different Contact Number.'); window.location.href = 'Appointment.php';</script>";
        exit();
    }

    // Close the statements
    $stmt_email_check->close();
    $stmt_contact_check->close();

    // Insert data into appointments table
    $sql = "INSERT INTO appointments (name, age, blood_group, email, contact_number, location, appointment_date) VALUES ('$name', '$age', '$blood_group', '$email', '$contact_number', '$location', '$appointment_date')";

    if ($conn->query($sql) === TRUE) {
        // Redirect back to Appointment.php with appointment date as query parameter
        header("Location: Appointment.php?appointment_date=$appointment_date");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Form not submitted.";
}

// Close database connection
$conn->close();
?>
