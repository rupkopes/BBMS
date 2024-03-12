<?php
include 'config.php';

$name = $_POST['name'];
$age = $_POST['age'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$location = $_POST['location'];
$blood_group = $_POST['blood_group']; // Add blood group field

// Add the current timestamp to the SQL query
$sql = "INSERT INTO donors (name, age, email, contact, location, blood_group, created_at) VALUES ('$name', $age, '$email', '$contact', '$location', '$blood_group', NOW())";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
