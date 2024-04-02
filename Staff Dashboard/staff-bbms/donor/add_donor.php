<?php
include 'config.php';

$name = $_POST['name'];
$age = $_POST['age'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$location = $_POST['location'];
$blood_group = $_POST['blood_group']; // Add blood group field

// Check if email already exists
$sql_check_email = "SELECT * FROM donors WHERE email = '$email'";
$result_email = $conn->query($sql_check_email);

// Check if contact number already exists
$sql_check_contact = "SELECT * FROM donors WHERE contact = '$contact'";
$result_contact = $conn->query($sql_check_contact);

if ($result_email->num_rows > 0 && $result_contact->num_rows > 0) {
    // Both email and contact number already exist, display an error message
    echo "<script>alert('Email and phone number already exist. Please use different credentials.'); window.location.href = 'Donor.php';</script>";
    exit();
} elseif ($result_email->num_rows > 0) {
    // Email already exists, display an error message
    echo "<script>alert('This Email is already registered. Please use different Email.'); window.location.href = 'Donor.php';</script>";
    exit();
} elseif ($result_contact->num_rows > 0) {
    // Contact number already exists, display an error message
    echo "<script>alert('This Contact Number is already registered. Please use different Contact Number.'); window.location.href = 'Donor.php';</script>";

    exit();
} else {
    // Add the current timestamp to the SQL query
    $sql = "INSERT INTO donors (name, age, email, contact, location, blood_group, created_at) VALUES ('$name', $age, '$email', '$contact', '$location', '$blood_group', NOW())";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
