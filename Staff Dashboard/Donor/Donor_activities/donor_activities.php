<?php
session_start();
$username = $_SESSION['username'];

// Database connection
$servername = "localhost"; // Change this to your MySQL server hostname
$db_username = "root"; // Change this to your MySQL username
$db_password = ""; // Change this to your MySQL password
$database = "blood_bank_management_system"; // Change this to your MySQL database name

// Create connection
$conn = new mysqli($servername, $db_username, $db_password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve user data from the database
$stmt = $conn->prepare("SELECT * FROM donor_register_data WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$userData = $result->fetch_assoc();

// Close the statement
$stmt->close();

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BBMS Donor</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp">
    <link rel="stylesheet" href="../../staff-bbms/style.css">
    <style>

        .body1 {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .bbmss {
            max-width: 800px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            font-size: 16px;
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

    <div class="bbms">
        <aside>
            <div class="top">
                <div class="logo">
                    <img src="../../staff-bbms/logo1.png" alt="person">
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

<br>
<br>
<br>
    <div class="bbmss">
    <?php
  // Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blood_bank_management_system";

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
        echo "<br>";
        echo "<div class='donor-details'>";
        echo "<h3>Donor Details</h3>";
        echo "<br>";
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
        </main>

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
                    if (isset($userData['first_name'])) {
                        echo "<p>Yo, <b>" . $userData['first_name'] . "</b></p>";
                        echo "<button class=\"button\" onclick=\"location.href='edit_profile.php';\">Edit Profile</button>";
                    } else {
                        echo "<p>You are not logged in</p>";
                        // Add some debugging information to see if session variables are set
                        var_dump($_SESSION);
                    }
                    ?>
                </div>
                <div class="profile-photo">
    <a href="../edit_profile/edit_profile_page.php?Donor_id=<?php echo $_SESSION['Donor_id']; ?>">
        <img src="person.png" alt="Profile">
    </a>
</div>
            </div>
        </div>
        <!-- End of Top -->
    </div>
    </div>

    <script src="../../staff-bbms/script.js"></script>
    </body>
</html>
