<?php
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

    // Handle photo upload
    $photo = $_FILES["photo"]["name"];
    $target_dir = __DIR__ . "/../../images/staff/"; // The target directory as needed
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true); // Change permissions as needed
    }
    $target_file = $target_dir . basename($photo);
    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
        // Photo upload successful
    } else {
        echo "Failed to upload photo.";
    }

    // Check if email already exists
    $stmt_check_email = $conn->prepare("SELECT COUNT(*) FROM Staff WHERE email = ?");
    $stmt_check_email->bind_param("s", $email);
    $stmt_check_email->execute();
    $stmt_check_email->bind_result($email_count);
    $stmt_check_email->fetch();
    $stmt_check_email->close();

    // Check if phone number already exists
    $stmt_check_phone = $conn->prepare("SELECT COUNT(*) FROM Staff WHERE phone = ?");
    $stmt_check_phone->bind_param("s", $phone);
    $stmt_check_phone->execute();
    $stmt_check_phone->bind_result($phone_count);
    $stmt_check_phone->fetch();
    $stmt_check_phone->close();

    if ($email_count > 0 && $phone_count > 0) {
        // Both email and phone number already exist
        echo "<script>alert('Email and phone number already exist. Please use different credentials.'); window.location.href = 'register_staff.html';</script>";
        exit(); // Ensure script execution stops after redirection
    } elseif ($email_count > 0) {
        // Email already exists
        echo "<script>alert('Email already exists. Please use a different email address.'); window.location.href = 'register_staff.html';</script>";
        exit(); // Ensure script execution stops after redirection
    } elseif ($phone_count > 0) {
        // Phone number already exists
        echo "<script>alert('Phone number already exists. Please use a different phone number.'); window.location.href = 'register_staff.html';</script>";
        exit(); // Ensure script execution stops after redirection
    }

    $token = bin2hex(random_bytes(16));

    // Prepare and execute SQL statement
    $stmt = $conn->prepare("INSERT INTO Staff (photo, position, first_name, middle_name, last_name, dob, gender, email, phone, current_address, permanent_address, username, password, reset_token) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssssssss", $photo, $position, $first_name, $middle_name, $last_name, $dob, $gender, $email, $phone, $current_address, $permanent_address, $username, $password, $token);

    if ($stmt->execute() === TRUE) {
        // Registration successful
        echo "<script>alert('Registration successful. Please wait for admin approval.'); window.location.href = '../../../index.html';</script>";
        // Redirect to next page after registration
        exit(); // Ensure script execution stops after redirection
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
