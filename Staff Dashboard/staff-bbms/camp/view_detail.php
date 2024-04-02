<?php
            include_once("../profile_name.php");        
        ?>    

<?php

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "blood_bank_management_system";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Retrieve the camp ID from the URL parameter
$camp_id = isset($_GET['camp_id']) ? $_GET['camp_id'] : '';

// Fetch the camp name from the database for the given camp ID
$sql = "SELECT name FROM camps WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $camp_id);
$stmt->execute();
$result = $stmt->get_result();

// Check if the camp exists and fetch its name
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $camp_name = $row["name"];
} else {
    $camp_name = "Unknown Camp"; // Set a default value if the camp doesn't exist
}

// Close statement and connection
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BBMS Staff</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp">
    <link rel="stylesheet" href="../style.css">
    <style>
       
      
        table {
            width: 100%;
            border-collapse: collapse;
            /* margin: 20px 0; */
            
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #2c3e50;
            color: #ccc;
        }

    </style>
</head>

<body>
    <div class="bbms">
        <aside>
            <div class="top">
                <div class="logo">
                    <img src="../logo1.png" alt="person">
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
                <a href="../inventory/Inventory.php">
                    <span class="material-symbols-sharp">bloodtype</span>
                    <h3>Available Blood Inventory</h3>
                </a>
                <a href="../appointment/Appointment.php">
                    <span class="material-symbols-sharp">calendar_today</span>
                    <h3>Appointment</h3>
                </a>
                <a href="../donor/Donor.php">
                    <span class="material-symbols-sharp">person</span>
                    <h3>Donor Records</h3>
                </a>
                <a href="../camp/Camp.php" class="active">
                    <span class="material-symbols-sharp">campaign</span>
                    <h3>Camps</h3>
                </a>
                <a href="../request/Request.php">
                    <span class="material-symbols-sharp">local_hospital</span>
                    <h3>Blood Request by Hospital</h3>
                </a>
                <a href="../receiver/receiver.php">
                    <span class="material-symbols-sharp">local_hospital</span>
                    <h3>Blood Request by User</h3>
                </a>
                <a href="../request_inventory/request_inventory.php">
                    <span class="material-symbols-sharp">bloodtype</span>
                    <h3>Blood Request Inventory</h3>
                </a>
                <a href="../request_inventory/all.php">
                    <span class="material-symbols-sharp">bloodtype</span>
                    <h3>Available And Request Blood Inventory</h3>
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
    <header>
    <h1>Total Blood Collected In :-  <?php echo htmlspecialchars($camp_name); ?></h1>
</header>

        
    <?php
    // Process form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Set the form submission flag in session
        $_SESSION['form_submitted'] = true;

        // Database connection
        $conn = new mysqli($servername, $username, $password, $database);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Rest of the form submission code
        // ...

        // Close connection
        $conn->close();
    }
    ?>
    <br>
    <br>
   <!-- Table to display camp inventory data -->

   <table>
    <tr>
        <th>Number of Attendees</th>
    </tr>
    <?php
        // Database connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "blood_bank_management_system";

        $conn = new mysqli($servername, $username, $password, $database);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Retrieve camp_id from the URL parameter
        $camp_id = isset($_GET['camp_id']) ? $_GET['camp_id'] : '';

        // Fetch data from camp_inventory table for the specified camp_id
        $sql = "SELECT * FROM camp_inventory WHERE camp_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $camp_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Output data of the first (and only) row
            $row = $result->fetch_assoc();
            echo "<tr><td>" . $row["attendees"] . "</td></tr>";
        } else {
            echo "<tr><td colspan='1'>The Details Of This Camp Is Not Submitted.</td></tr>";
        }

        // Close statement and connection
        $stmt->close();
        $conn->close();
    ?>
</table>
<br>
<br>


<table>
    <tr>
        <th>Blood Type</th>
        <th>Available Units</th>
    </tr>
    <?php
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "blood_bank_management_system";

    $conn = new mysqli($servername, $username, $password, $database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve camp_id from the URL parameter
    $camp_id = isset($_GET['camp_id']) ? $_GET['camp_id'] : '';

    // Fetch data from camp_inventory table for the specified camp_id
    $sql = "SELECT * FROM camp_inventory WHERE camp_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $camp_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $row_count = 0; // Counter variable for rows

    if ($result->num_rows > 0) {
        // Output data of each row, limiting to 8 rows
        while ($row = $result->fetch_assoc()) {
            if ($row_count < 8) {
                echo "<tr><td>" . $row["blood_type"] . "</td><td>" . $row["available_units"] . "</td></tr>";
                $row_count++;
            } else {
                break; // Exit loop after 8 rows
            }
        }
    } else {
        echo "<tr><td colspan='2'>The Details Of This Camp Is Not Submitted.</td></tr>";
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
    ?>
</table>
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
                    if (isset($_SESSION['username'])) {
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
    <a href="../edit_profile/edit_profile_page.php?staff_id=<?php echo $_SESSION['staff_id']; ?>">
        <img src="../person.png" alt="Profile">
    </a>
</div>
            </div>
        </div>
        <!-- End of Top -->
    </div>
    </div>

    <script>
        // JavaScript code to remove the message after 3 seconds
        setTimeout(function() {
            
            var successMessage = document.getElementById('success-message');
        if (successMessage) {
            successMessage.parentNode.removeChild(successMessage);
        }

        var errorMessage = document.getElementById('error-message');
        if (errorMessage) {
            errorMessage.parentNode.removeChild(errorMessage);
        }
    
            
            var message = document.getElementById('message');
            if (message) {
                message.parentNode.removeChild(message);
            }
        }, 3000); // 3000 milliseconds = 3 seconds
    </script>

    <script src="../script.js"></script>
</body>

</html>