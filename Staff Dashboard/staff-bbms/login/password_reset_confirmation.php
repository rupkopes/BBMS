<?php
session_start();

// Check if the token is provided in the URL
if (!isset($_GET['token'])) {
    // Redirect to the forgot password page if the token is missing
    header("Location: forgot_password.php");
    exit();
}

// Retrieve the token from the URL
$token = $_GET['token'];

// Function to establish a database connection
function connectToDatabase() {
    // Replace 'username' and 'password' with your actual database credentials
    $dsn = 'mysql:host=localhost;dbname=Blood_Bank_Management_System';
    $username = 'root'; // Replace with your actual username
    $password = ''; // Replace with your actual password

    // Connection options
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_PERSISTENT => true // Enable persistent connection
    ];

    try {
        // Create a new PDO instance
        $pdo = new PDO($dsn, $username, $password, $options);
        return $pdo;
    } catch (PDOException $e) {
        // Handle connection errors
        echo "Database Error: " . $e->getMessage();
        die();
    }
}

// Handle password reset form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve new password from the form
    $new_password = trim($_POST["new_password"]);
    $confirm_password = trim($_POST["confirm_password"]);

    // Debug output to check password values
    var_dump($new_password, $confirm_password);

    // Check if passwords match
    if ($new_password === $confirm_password) {
        // Hash the new password
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        // Establish database connection
        $pdo = connectToDatabase();

        // Update password in the database
        try {
            $stmt = $pdo->prepare("UPDATE Staff SET password = :password WHERE reset_token = :token");
            $stmt->bindParam(':password', $hashed_password);
            $stmt->bindParam(':token', $token);
            $stmt->execute();

            // Redirect to login page after password reset
            header("Location: login.html");
            exit();
        } catch (PDOException $e) {
            // Handle database errors
            echo "Database Error: " . $e->getMessage();
            die();
        }
    } else {
        // Passwords don't match
        $error_message = "Passwords don't match.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset Confirmation</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="login-container">
        <h2>Password Reset</h2>
        <?php if(isset($error_message)): ?>
            <div class="error"><?php echo $error_message; ?></div>
        <?php endif; ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?token=" . $token; ?>" method="POST">
            <div class="form-group">
                <label for="new_password">New Password</label>
                <input type="password" id="new_password" name="new_password" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>
            <button type="submit">Reset Password</button>
        </form>
    </div>
</body>
</html>
