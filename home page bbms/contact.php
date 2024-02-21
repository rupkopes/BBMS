<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);


$servername = "localhost:81";
$username = "your_username";
$password = "your_password";
$dbname = "Blood Bank Management System";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Email parameters
$to = "bbms2080@gmail.com";
$subject = "Contact Form Submission";
$headers = "From: $email";

$headers = "From: your_valid_email@example.com";
if (mail($to, $email_body, $headers)) {
    echo "Message sent successfully!";
} else {
    echo "Error sending the message. Please check your email configuration.";
}


// Email body
$email_body = "Name: $name\n";
$email_body .= "Email: $email\n";
$email_body .= "Message:\n$message";

// Send email
if (mail($to, $email_body, $headers)) {
    echo "Message sent successfully!";
} else {
    echo "Error sending the message. Please try again later.";
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    $sql = "INSERT INTO ContactMessage (name, email, message) VALUES ('$name', '$email', '$message')"; // Update the table name

    if ($conn->query($sql) === TRUE) {
        echo "Message sent successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
