<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor-List</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp">
    <link rel="stylesheet" href="../style.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');

        .body1 {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: var(--color-background); /* Change background color using CSS variables */
            color: var(--color-dark); /* Change text color using CSS variables */
        }

        header {
            margin-left: 340px;
        }

        h1 {
            margin: 0;
        }

        section {
            width: 60%;
            margin: 20px;
            background-color: var(--color-white); /* Change section background color using CSS variables */
            border-radius: 5px;
            padding: 20px;
            box-shadow: var(--box-shadow); /* Utilize CSS variable for box shadow */
            margin-left: 340px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-right: 350px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #2c3e50;
            color: white;
        }

        tr:hover {
            background-color: #2c3e50;
            color: #ecf0f1;
            cursor: pointer;
        }

        .add-donor-button {
            margin-bottom: 20px;
           
        }

        .add-donor-button a {
            text-decoration: none;
            background-color: #2c3e50;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .add-donor-button a:hover {
            background-color: #34495e;
        }

        .delete-button {
            background-color: #e74c3c;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 3px;
            cursor: pointer;
        }

        .delete-button:hover {
            background-color: #c0392b;
        }

        .message {
            background-color: var(--color-white);
            color: red;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
            text-align: center;
            display: none; /* Corrected property */
        }
        
        /* Dark Mode Styles */
        body.dark-mode {
            background-color: var(--color-background-dark);
            color: #ecf0f1;
        }

        header.dark-mode {
            background-color: var(--color-info-dark);
            color: #ecf0f1;
        }

        section.dark-mode {
            background-color: var(--color-dark);
            color: #ecf0f1;
        }

        .delete-button.dark-mode {
            background-color: #e74c3c;
            color: white;
        }

        .delete-button.dark-mode:hover {
            background-color: #c0392b;
        }

        .message.dark-mode {
            background-color: #27ae60;
            color: white;
        }
    </style>
    <title>Donor Listing</title>
</head>
<body1>
<div class="container">
        <aside>
            <div class="top">
                <div class="logo">
                    <img src="../logo1.jpg" alt="person">
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
                <a href="../Staff-Approval/staff_approval.php">
                    <span class="material-symbols-sharp">manage_accounts</span>
                    <h3>Manage Staff</h3>
                </a>
                <a href="../Staff-list/staff_list.php">
                    <span class="material-symbols-sharp">list_alt</span>
                    <h3>Staff list</h3>
                </a>
                <a href="../inventory/Blood_Inventory.php">
                    <span class="material-symbols-sharp">bloodtype</span>
                    <h3>Available Blood Inventory</h3>
                </a>
                <a href="../appointment/appointment_list.php">
                    <span class="material-symbols-sharp">calendar_today</span>
                    <h3>Appointment</h3>
                </a>
                <a href="view_donors.php" class="active">
                    <span class="material-symbols-sharp">person</span>
                    <h3>Donor Records</h3>
                </a>
                <a href="../camp/retrieve_camps.php">
                    <span class="material-symbols-sharp">campaign</span>
                    <h3>Camps</h3>
                </a>
                <a href="../request/Request.html">
                    <span class="material-symbols-sharp">local_hospital</span>
                    <h3>Blood Request by Hospital</h3>
                </a>
                <a href="../receiver/receiver.html">
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
    </div>

    <main>
        <div class="date">
            <div class="current-time" id="current-time"></div>

            <div class="current-date" id="current-date"></div>

            <script src="../../home page bbms/time.js"></script>
        </div>
    </main>
    <br>

    <header>
        <h1>Donor Listing</h1>
    </header>
    <br>
    <section>
        <div class="message" id="message"></div>
            <br>
            <div class="add-donor-button">
            <a href="view_donors.php">View Not Elligible Donor</a>
        </div>
        <br>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Blood Group</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Location</th>
                    <th>Donation Date</th>
                    <th>Days Remaining</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "Blood_Bank_Management_System";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle delete request
if(isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $sql = "DELETE FROM donors WHERE id = $delete_id";
    if ($conn->query($sql) === TRUE) {
        $deletion_success = true; // Set deletion success flag
    } else {
        $deletion_success = false; // Set deletion failure flag
        $deletion_error_message = $conn->error; // Store deletion error message
    }
}

// Retrieve donor data from the database
$sql = "SELECT * FROM donors";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        // Check if the donation is within 90 days
        $donation_date = strtotime($row['created_at']);
        $current_date = strtotime(date('Y-m-d'));
        $ninety_days_ago = strtotime('-89 days', $current_date);
        $remaining_days = floor(($ninety_days_ago - $donation_date) / (60 * 60 * 24));

        if ($remaining_days >= 0) { // Include records with 0 or more remaining days
            echo "<tr>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["age"] . "</td>";
            echo "<td>" . $row["blood_group"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["contact"] . "</td>";
            echo "<td>" . $row["location"] . "</td>";
            echo "<td>" . date('Y-m-d', $donation_date) . "</td>"; // Format the donation date
            // echo "<td>" . $remaining_days . "</td>";
            echo "<td>" ."Is Elligible To Donate Blood ". "</td>";
            echo "<td><button class='delete-button' onclick=\"window.location.href='?delete_id=".$row['id']."'\">Delete</button></td>";
            echo "</tr>";
        }
    }
} else {
    echo "<tr><td colspan='8'>No donors found</td></tr>";
}

// Close connection
$conn->close();
?>

            </tbody>
        </table>
    </section>

    <script>
        function showMessage(message) {
            var msgElement = document.getElementById("message");
            msgElement.innerText = message;
            msgElement.style.display = "block";
            setTimeout(function(){
                msgElement.style.display = "none";
            }, 5000); // 5 seconds
        }
    </script>
    
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
                    <br><p>Yo, <b>Admin</b></p>
                </div>
                <div class="profile-photo">
                    <img src="../logo1.jpg" alt="Profile">
                </div>
            </div>
        </div>
        <!-- End of Top -->
    </div>
    <script src="../../staff-bbms/script.js"></script>

</body>

</html>
