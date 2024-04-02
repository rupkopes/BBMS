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


<?php
// Retrieve the appointment date from the query parameter
$appointment_date = isset($_GET['appointment_date']) ? $_GET['appointment_date'] : '';

// Display the appointment date
if (!empty($appointment_date)) {
    echo "<p><script>alert('New appointment created successfully on $appointment_date');</script></p>";
}
?>

<?php
// Function to calculate age from date of birth
function calculateAge($dob) {
    $dobObj = new DateTime($dob);
    $now = new DateTime();
    $age = $now->diff($dobObj)->y;
    return $age;
}
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
        
        .body {
            font-family: Arial, sans-serif;
        }

        label {
            font-weight: bold;
            font-size: 14px;
        }


        h1 {
            margin: 0;
        }

        /* .bbmss {
            max-width: 1000px;
            margin: 0 auto;
            margin-left: 340px;
        } */


        .form-group {
            margin: 10px 0;

        }

        .form-group label {
            display: block;

        }

        .form-group input[type="date"] {
            width: 650px;
            padding: 10px;
            font-size: 14px;
            font-family: 'Courier New', Courier, monospace;
        }

        .form-group button {
            background-color: #007BFF;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }

        .appointment-list {
            margin-top: 30px;
            /* margin-left: 340px; */
        }

        .appointment-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            border: 1px solid #ccc;
            margin: 10px 0;
        }

        .completed {
            background-color: #8BC34A;
            /* Green color for completed tasks */
            color: white;
        }

        .Not-completed {
            background-color: #ff0000;
            /* Red color for not completed tasks */
            color: white;
        }

        .list {
            background-color: #2c3e50;
            color: white;
            padding: 8px 10px;
            font-size: 16px;
            text-align: center;
        }

        #blood-group {
            width: 650px;
        }

        input[type="text"],
        input[type="number"],
        input[type="email"],
        input[type="tel"],
        input[type="date"] {
            width: 650px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 18px;
            font-family: 'Courier New', Courier, monospace;
        }

        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 14px;
            font-family: 'Courier New', Courier, monospace;
        }

        section {
            margin: 20px;
            margin-left: 0px;
            background-color: var(--color-white);
            /* Change section background color using CSS variables */
            border-radius: var(--card-border-radius);
            /* Utilize CSS variable for border radius */
            box-shadow: var(--box-shadow);
            /* Utilize CSS variable for box shadow */
            width: 65%;
        }

        form {
            display: grid;
            grid-template-columns: 1fr;
            grid-gap: 10px;
            max-width: 800px;
            margin: 0 auto;
            margin-left: 15px;
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
                <a href="appointment.php" class="active">
                    <span class="material-symbols-sharp">calendar_today</span>
                    <h3>Schedule an Appointment</h3>
                </a>
                <a href="../Donor_activities/donor_activities.php">
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
    <header>
        <h1>Donor Appointment</h1>
    </header>

    <div class="bbmss">
        <section>
            <form action="save_appointment.php" method="post">
                <div class="form-group">
                    <label for="donor_name">Donor Name:</label>
                    <input type="text" id="name" name="name" value="<?php echo $userData['first_name'] . ' ' . $userData['last_name']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="age">Age:</label>
                    <input type="number" id="age" name="age" value="<?php echo calculateAge($userData['dob']); ?>" required min="18" max="60">
                </div>
                <div class="form-group">
                    <label for="blood-group">Blood Group:</label>
                    <select id="blood-group" name="blood_group" required>
        <option value="" disabled>Please select Blood Type</option>
        <option value="A+" <?php if ($userData['blood_type'] == 'A+') echo 'selected'; ?>>A+</option>
        <option value="A-" <?php if ($userData['blood_type'] == 'A-') echo 'selected'; ?>>A-</option>
        <option value="B+" <?php if ($userData['blood_type'] == 'B+') echo 'selected'; ?>>B+</option>
        <option value="B-" <?php if ($userData['blood_type'] == 'B-') echo 'selected'; ?>>B-</option>
        <option value="AB+" <?php if ($userData['blood_type'] == 'AB+') echo 'selected'; ?>>AB+</option>
        <option value="AB-" <?php if ($userData['blood_type'] == 'AB-') echo 'selected'; ?>>AB-</option>
        <option value="O+" <?php if ($userData['blood_type'] == 'O+') echo 'selected'; ?>>O+</option>
        <option value="O-" <?php if ($userData['blood_type'] == 'O-') echo 'selected'; ?>>O-</option>
    </select>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo $userData['email']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="contact_number">Contact Number:</label>
                    <input type="tel" id="contact_number" name="contact_number" value="<?php echo $userData['phone']; ?>" required maxlength="10" pattern="[0-9]{10}">
                </div>
                <div class="form-group">
                    <label for="location">Location:</label>
                    <input type="text" id="location" name="location" value="<?php echo $userData['current_address']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="appointment_date">Appointment Date:</label>
                    <input type="date" id="appointment_date" name="appointment_date" required>
                </div><br>
                <div class="form-group">
                    <button type="submit">Schedule Appointment</button>
                </div>

            </form>
        </section>
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
    <script>
        document.getElementById('appointmentForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the form from submitting normally
            // Perform any processing here (if needed)
            setTimeout(function() {
                location.reload(); // Reload the page after a short delay (you can adjust the delay as needed)
            }, 1000); // 1000 milliseconds = 1 second
        });
    </script>

    </body>

</html>