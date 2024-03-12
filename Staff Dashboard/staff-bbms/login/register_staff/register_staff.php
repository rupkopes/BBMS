<?php
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from form
    $position = $_POST['position'];
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $current_address = $_POST['current_address'];
    $permanent_address = $_POST['permanent_address'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $token = bin2hex(random_bytes(16));

    // Prepare and execute SQL statement
    $stmt = $conn->prepare("INSERT INTO Staff (position, first_name, middle_name, last_name, dob, gender, email, phone, current_address, permanent_address, username, password, reset_token) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssssssss", $position, $first_name, $middle_name, $last_name, $dob, $gender, $email, $phone, $current_address, $permanent_address, $username, $password, $token);

    if ($stmt->execute() === TRUE) {
        echo "Registration successful";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
