<?php
// Database connection
$servername = "localhost"; // Change this to your MySQL server hostname
$username = "root"; // Change this to your MySQL username
$password = ""; // Change this to your MySQL password
$database = "Blood_Bank_Management_System"; // Change this to your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $blood_type = $_POST['blood_type'];
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
    $password = $_POST['password'];

    // Hash the password before storing
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Generate a unique token for the user
    $token = bin2hex(random_bytes(16));

    // Prepare SQL statement to insert data into the database
    $stmt = $conn->prepare("INSERT INTO donor_register_data (blood_type, first_name, middle_name, last_name, dob, gender, email, phone, current_address, permanent_address, username, password, reset_token) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssssssss", $blood_type, $first_name, $middle_name, $last_name, $dob, $gender, $email, $phone, $current_address, $permanent_address, $username, $hashed_password, $token);

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect to login page or wherever you want
        header("Location: donor.html");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
