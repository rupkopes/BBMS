<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establish database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "blood_bank_management_system";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve username and password from form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and execute SQL statement
    $stmt = $conn->prepare("SELECT * FROM Staff WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Password is correct, check approval status
            if ($row['approval_status'] == 'approved') {
                // Set session variables including staff_id
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                $_SESSION['staff_id'] = $row['staff_id']; // Add staff_id to session
                $redirect_url = "../index.php"; // Set the redirection URL
            } else {
                echo "<script>alert('Your account is pending approval or not approved by the admin');</script>";
                $redirect_url = "login.html"; // Set the redirection URL
            }
        } else {
            echo "<script>alert('Incorrect password');</script>";
            $redirect_url = "login.html"; // Set the redirection URL
        }
    } else {
        echo "<script>alert('User not found');</script>";
        $redirect_url = "login.html"; // Set the redirection URL
    }

    // Close prepared statement
    $stmt->close();
    $conn->close();

    // Redirect user after script execution
    header("Location: $redirect_url");
    exit();
}
?>
