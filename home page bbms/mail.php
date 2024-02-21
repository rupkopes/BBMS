<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and sanitize form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Create mail headers
    $mailheader = "From: $name <$email>\r\n";

    // Recipient email address
    $recipient = "bbms2080@gmail.com";

    // Send email and handle errors
    // if (mail($recipient, $subject, $message, $mailheader)) {
    //     $successMessage = 'Thank you for contacting us. We will get back to you as soon as possible!!';
    // } else {
    //     $errorMessage = 'Error sending email. Please try again later.';
    // }
}
echo'
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Bank Management System</title>
</head>
<body>
    <h1>Thank you for contacting us. We will get back to you as soon as possible!!</h1>
    <p class="back">Go back to the <a href="index.html">HomePage</a>.</p>
</body>
</html>
';
?>