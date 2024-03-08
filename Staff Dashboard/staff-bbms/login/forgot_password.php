<?php

session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Load PHPMailer library
require "../../../BBMS/home page bbms/vendor/autoload.php";

// Load username and password from config.php 
require "../../../BBMS/home page bbms/config.php";

// Import necessary classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

// Function to send an email for password reset
function sendPasswordResetEmail($email, $reset_token) {
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
    global $config;
    $mail->Username = $config['email'];
    $mail->Password = $config['password']; 

    // Set the "From" address
    $mail->setFrom($config['email'], "Blood Bank Management System");

    // Add recipient
    $mail->addAddress($email);

    // Email subject and body
    $mail->Subject = "Password Reset Request";
    $mail->Body = "Please click the following link to reset your password: http://localhost:81/BBMS/staff-bbms/login/password_reset_confirmation.php?token=$reset_token";

    try {
        // Attempt to send the email
        if ($mail->send()) {
            // Email sent successfully
            return true;
        } else {
            // Failed to send email
            return false;
        }
    } catch (Exception $e) {
        // Exception occurred
        return false;
    }
}

// Function to generate a random token
function generateToken() {
    return bin2hex(random_bytes(32));
}

// Handle forget password form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve email from form
    $email = $_POST["email"];

    // Check if email exists in database and generate/reset token
    // For demonstration, assuming the email exists and generate/reset token
    $token = generateToken(); // Generate token
    // Store the token in the database with the user's email address

    // Send password reset email
    if (sendPasswordResetEmail($email, $token)) {
        // Password reset email sent successfully
        $_SESSION["reset_success"] = true;
        header("Location: forgot_password.php");
        exit();
    } else {
        // Failed to send password reset email
        $_SESSION["reset_error"] = "Failed to send password reset email.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="login-container">
        <h2>Forgot Password</h2>
        <?php if(isset($_SESSION["reset_error"])): ?>
            <div class="error"><?php echo $_SESSION["reset_error"]; ?></div>
            <?php unset($_SESSION["reset_error"]); ?>
        <?php endif; ?>
        <?php if(isset($_SESSION["reset_success"])): ?>
            <div class="success">Password reset email sent successfully.</div>
            <?php unset($_SESSION["reset_success"]); ?>
        <?php endif; ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <button type="submit">Reset Password</button>
        </form>
    </div>
</body>
</html>
