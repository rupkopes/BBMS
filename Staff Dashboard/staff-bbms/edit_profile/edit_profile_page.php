<?php
session_start();

// Check if staff_id is passed in the URL
if(isset($_GET['staff_id'])) {
    $staff_id = $_GET['staff_id'];

    // Connect to your database
    // Replace 'localhost', 'username', 'password', and 'database_name' with your actual database credentials
    $conn = new mysqli('localhost', 'root', '', 'blood_bank_management_system');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute SQL statement to fetch staff details
    $sql = "SELECT * FROM Staff WHERE staff_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $staff_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if staff exists
    if ($result->num_rows > 0) {
        // Fetch staff data
        $row = $result->fetch_assoc();
        $first_name = $row['first_name'];
        $middle_name = $row['middle_name'];
        $last_name = $row['last_name'];
        $email = $row['email'];
        $phone = $row['phone'];
        $current_address = $row['current_address'];
        $permanent_address = $row['permanent_address'];
        $username = $row['username'];
        $dob = $row['dob']; // Assuming dob is stored in database

    } else {
        // Staff with the provided ID not found
        echo "Staff not found";
        exit;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    // Handle case when staff_id is not provided in the URL
    echo "Staff ID not provided";
    exit; // You might want to handle this differently based on your application logic
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BBMS Staff</title>
    <link rel="stylesheet" href="edit.css">
    <script>
        function validateAge() {
            var dobInput = document.getElementById('dob').value;
            var dob = new Date(dobInput);
            var today = new Date();
            var age = today.getFullYear() - dob.getFullYear();
            var monthDiff = today.getMonth() - dob.getMonth();
            if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < dob.getDate())) {
                age--;
            }
            if (age < 18 || age > 60) {
                alert("You must be between 18 and 60 years old to register.");
                return false;
            }
            return true;
        }
    </script>
</head>

<body>
<h2 class="edit-profile">Edit Staff Profile</h2>
    <div class="bbms">
        <h2>Edit Staff Name</h2>
            <form action="edit_name.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="staff_id" value="<?php echo $staff_id; ?>">
                <div class="form-group">
                    <label for="first_name">First Name:</label>
                    <input type="text" id="first_name" name="first_name" value="<?php echo $first_name; ?>" required>
                </div>
                <div class="form-group">
                    <label for="middle_name">Middle Name:</label>
                    <input type="text" id="middle_name" name="middle_name" value="<?php echo $middle_name; ?>">
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name:</label>
                    <input type="text" id="last_name" name="last_name" value="<?php echo $last_name; ?>" required>
                </div>
                <div class="form-group">
                    <button type="submit">Update Name</button>
                </div>
            </form>
        </div>
        <div class="bbms">
        <h2>Edit Staff Date-Of-Birth</h2>
            <form action="edit_dob.php" method="post" enctype="multipart/form-data" onsubmit="return validateAge()">
                <input type="hidden" name="staff_id" value="<?php echo $staff_id; ?>">
                <div class="form-group">
                    <label for="dob">Date of Birth:</label>
                    <input type="date" id="dob" name="dob" value="<?php echo $dob; ?>" required>
                </div>
                <div class="form-group">
                    <button type="submit">Update Date-Of-Birth</button>
                </div>
            </form>
        </div>
        <div class="bbms">
        <h2>Edit Staff Email</h2>
            <form action="edit_email.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="staff_id" value="<?php echo $staff_id; ?>">
                <div class="form-group">
                    <label for="email">Email Address:</label>
                    <input type="email" id="email" name="email" value="<?php echo $email; ?>" required>
                </div>
                <div class="form-group">
                    <button type="submit">Update Email</button>
                </div>
            </form>
        </div>
        <div class="bbms">
        <h2>Edit Staff Phone Number</h2>
            <form action="edit_number.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="staff_id" value="<?php echo $staff_id; ?>">
                <div class="form-group">
                    <label for="phone">Phone Number:</label>
                    <input type="text" id="phone" name="phone" value="<?php echo $phone; ?>" required maxlength="10" pattern="[0-9]{10}">
                </div>
                <div class="form-group">
                    <button type="submit">Update Phone-Number</button>
                </div>
            </form>
        </div>
        <div class="bbms">
        <h2>Edit Staff Location</h2>
            <form action="edit_location.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="staff_id" value="<?php echo $staff_id; ?>">
                <div class="form-group">
                    <label for="current_address">Current Address:</label>
                    <textarea id="current_address" name="current_address" required><?php echo $current_address; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="permanent_address">Permanent Address:</label>
                    <textarea id="permanent_address" name="permanent_address" required><?php echo $permanent_address; ?></textarea>
                </div>
                <div class="form-group">
                    <button type="submit">Update Location</button>
                </div>
            </form>
        </div>
        <div class="bbms">
        <h2>Edit Staff Username</h2>
            <form action="edit_username.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="staff_id" value="<?php echo $staff_id; ?>">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" value="<?php echo $username; ?>" required>
                </div>
                <div class="form-group">
                    <button type="submit">Update Username</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>

