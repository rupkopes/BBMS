<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp">
    <link rel="stylesheet" href="../styless.css">
    <style>

<?php
        // Check if user is logged in and show appropriate greeting
        session_start();
        if (isset($_SESSION['username'])) {
            echo "<p>Yo, <b>" . $_SESSION['username'] . "</b></p>";
            // Add Edit Profile button
            // echo "<button class=\"button\" onclick=\"location.href='edit_profile.php';\">Edit Profile</button>";
        } else {
            echo "<p>You are not logged in</p>";
        }
        ?>
        .body1 {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .containers {
            max-width: 800px;
            margin: 20px auto;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-left: 340px;
        }

        /* h2 {
            color: #333;
            margin-bottom: 20px;
        }

        h3 {
            color: #666;
            margin-bottom: 10px;
        } */

        .donor-details {
            border-top: 1px solid #ccc;
            padding-top: 20px;
            margin-top: 20px;
        }

        .donor-details p {
            margin-bottom: 10px;
        }
    </style>
    
</head>
    <body1>

    <div class="container">
        <aside>
            <div class="top">
                <div class="logo">
                    <img src="../../staff-bbms/logo1.jpg" alt="person">
                    <h2>BB<span class="danger">MS</span></h2>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-symbols-sharp">close</span>
                </div>
            </div>

            <div class="sidebar">
                <a href="../index.php">
                    <span class="material-symbols-sharp">grid_view</span>
                    <h3>Dashboard</h3>
                </a>
                <a href="../appointment/appointment.php">
                    <span class="material-symbols-sharp">calendar_today</span>
                    <h3>Schedule an Appointment</h3>
                </a>
                <a href="donor_activities.php" class="active">
                    <span class="material-symbols-sharp">calendar_today</span>
                    <h3>Donation Tracking</h3>
                </a>
                <a href="../logout/logout.php" id="logout-btn">
                    <span class="material-symbols-sharp">logout</span>
                    <h3>Logout</h3>
                </a>

            </div>
        </aside>

        <main>
            <div class="date">
                <div class="current-time" id="current-time"></div>

                <div class="current-date" id="current-date"></div>

                <script src="../../home page bbms/time.js"></script>
            </div>
        </main>
    </div>


    <div class="containers">
    <?php
  // Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Blood_Bank_Management_System";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_SESSION['username'];

// Fetch donor details from donor_register_data table
$sql = "SELECT * FROM donor_register_data WHERE username = '$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Retrieve donor details
    $donor = $result->fetch_assoc();

    // Fetch donor details from donors table based on email or phone number
    $email = $donor['email'];
    $phone = $donor['phone'];

    $sql = "SELECT * FROM donors WHERE email = '$email' OR contact = '$phone'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Retrieve donor details from donors table
        $donorDetails = $result->fetch_assoc();

        // Calculate days remaining from the donation date
        $donationDate = strtotime($donorDetails['created_at']);
        $currentDate = strtotime(date('Y-m-d'));
        $ninetyDaysAgo = strtotime('-89 days', $currentDate);
        $daysRemaining = floor(($ninetyDaysAgo - $donationDate) / (60 * 60 * 24));

        // Display donor details and days remaining
        echo "<h2>Donation Tracking</h2>";
        echo "<div class='donor-details'>";
        echo "<h3>Donor Details</h3>";
        echo "<p><strong>Name:</strong> " . $donorDetails['name'] . "</p>";
        echo "<p><strong>Email:</strong> " . $donorDetails['email'] . "</p>";
        echo "<p><strong>Contact:</strong> " . $donorDetails['contact'] . "</p>";
        echo "<p><strong>Location:</strong> " . $donorDetails['location'] . "</p>";
        echo "<p><strong>Donation Date:</strong> " . date('Y-m-d', $donationDate) . "</p>";
        echo "<p><strong>Days Remaining:</strong> $daysRemaining</p>";
        echo "</div>";
    } else {
        echo "<p>Donor details not found.</p>";
    }
} else {
    echo "<p>Donor details not found.</p>";
}

$conn->close();
?>


</div>
<div class="right">
        <div class="top">
            <button id="menu-btn">
                <span class="material-symbols-sharp">menu</span>
            </button>
            <div class="theme-toggler">
                <span class="material-symbols-sharp active">light_mode</span>
                <span class="material-symbols-sharp">dark_mode</span>
            </div>
            <div class="profile">
                <div class="info">
                    <br>
                    <?php
                    // Check if user is logged in and show appropriate greeting
                    session_start();
                    if (isset($_SESSION['username'])) {
                        echo "<p>Yo, <b>" . $_SESSION['username'] . "</b></p>";
                        echo "<button class=\"button\" onclick=\"location.href='edit_profile.php';\">Edit Profile</button>";
                    } else {
                        echo "<p>You are not logged in</p>";
                        // Add some debugging information to see if session variables are set
                        var_dump($_SESSION);
                    }
                    ?>
                </div>
                <div class="profile-photo">
                    <img src="../person.png" alt="Profile">
                </div>
            </div>
        </div>
        <!-- End of Top -->
    </div>

    <script src="../../staff-bbms/script.js"></script>
    </body>
</html>
