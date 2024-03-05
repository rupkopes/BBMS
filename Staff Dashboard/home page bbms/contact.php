<?php

// Retrieve form data
$name = $_POST["name"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$message = $_POST["message"];

// Load PHPMailer library
require "vendor/autoload.php";

// Load username and password from config.php 
require "config.php";

// Import necessary classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

// Create a new PHPMailer instance
$mail = new PHPMailer(true);

// Enable SMTP debugging
$mail->SMTPDebug = SMTP::DEBUG_SERVER;

// Set mailer to use SMTP
$mail->isSMTP();
$mail->SMTPAuth = true;

// SMTP configuration for Gmail
$mail->Host = "smtp.gmail.com";
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
$mail->Port = 465;

// Gmail account credentials
$mail->Username = $config['email'];
$mail->Password = $config['password']; 

// Set the "From" address
$mail->setFrom($email, $name);

// Set the "Reply-To" address
$mail->addReplyTo($email, $name);

// Add recipient
$mail->addAddress("bbms2080@gmail.com", "Blood Bank Management System");

// Email subject and body
$mail->Subject = $subject;
$mail->Body = $message;

try {
    // Attempt to send the email
    if ($mail->send()) {
        // Redirect to a thank you page upon successful sending
        header("Location: thankyou.html");
        exit;
    } else {
        // Display an error message if sending fails
        echo "Error: " . $mail->ErrorInfo;
    }
} catch (Exception $e) {
    // Handle exceptions, if any
    echo "Error: " . $e->getMessage();
}
