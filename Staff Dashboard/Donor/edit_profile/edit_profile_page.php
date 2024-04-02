<?php
session_start();

// Check if staff_id is passed in the URL
if(isset($_GET['Donor_id'])) {
    $Donor_id = $_GET['Donor_id'];
    // You can use this $staff_id to fetch data from the database and populate the form for editing
} else {
    // Handle case when staff_id is not provided in the URL
    echo "Donor ID not provided";
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
<h2 class="edit-profile">Edit Donor Profile</h2>
    <div class="bbms">
        <h2>Edit Donor Name</h2>
            <form action="edit_name.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="Donor_id" value="<?php echo $Donor_id; ?>">
                <div class="form-group">
                    <label for="first_name">First Name:</label>
                    <input type="text" id="first_name" name="first_name" required>
                </div>
                <div class="form-group">
                    <label for="middle_name">Middle Name:</label>
                    <input type="text" id="middle_name" name="middle_name">
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name:</label>
                    <input type="text" id="last_name" name="last_name" required>
                </div>
                <div class="form-group">
                    <button type="submit">Update Name</button>
                </div>
            </form>
        </div>
        <div class="bbms">
        <h2>Edit Donor Date-Of-Birth</h2>
            <form action="edit_dob.php" method="post" enctype="multipart/form-data" onsubmit="return validateAge()">
            <input type="hidden" name="Donor_id" value="<?php echo $Donor_id; ?>">
                <div class="form-group">
                    <label for="dob">Date of Birth:</label>
                    <input type="date" id="dob" name="dob" required>
                </div>
                <div class="form-group">
                    <button type="submit">Update Date-Of-Birth</button>
                </div>
            </form>
        </div>
        <div class="bbms">
        <h2>Edit Donor Email</h2>
            <form action="edit_email.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="Donor_id" value="<?php echo $Donor_id; ?>">
                <div class="form-group">
                    <label for="email">Email Address:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <button type="submit">Update Email</button>
                </div>
            </form>
        </div>
        <div class="bbms">
        <h2>Edit Donor Phone Number</h2>
            <form action="edit_number.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="Donor_id" value="<?php echo $Donor_id; ?>">
                <div class="form-group">
                    <label for="phone">Phone Number:</label>
                    <input type="text" id="phone" name="phone" required maxlength="10" pattern="[0-9]{10}">
                </div>
                <div class="form-group">
                    <button type="submit">Update Phone-Number</button>
                </div>
            </form>
        </div>
        <div class="bbms">
        <h2>Edit Donor Location</h2>
            <form action="edit_location.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="Donor_id" value="<?php echo $Donor_id; ?>">
                <div class="form-group">
                    <label for="current_address">Current Address:</label>
                    <textarea id="current_address" name="current_address" required></textarea>
                </div>
                <div class="form-group">
                    <label for="permanent_address">Permanent Address:</label>
                    <textarea id="permanent_address" name="permanent_address" required></textarea>
                </div>
                <div class="form-group">
                    <button type="submit">Update Location</button>
                </div>
            </form>
        </div>
        <div class="bbms">
        <h2>Edit Donor Username</h2>
            <form action="edit_username.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="Donor_id" value="<?php echo $Donor_id; ?>">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <button type="submit">Update Username</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>