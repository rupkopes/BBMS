<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BBMS Staff</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp">
    <link rel="stylesheet" href="../../staff-bbms/style.css">

    <style>
        table {
            width: 100%;
            margin-bottom: 20px;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
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
                <a href="../donor/view_donors.php">
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
                <a href="request_inventory.php">
                    <span class="material-symbols-sharp">bloodtype</span>
                    <h3>Blood Request Inventory</h3>
                </a>
                <a href="all.php" class="active">
                    <span class="material-symbols-sharp">bloodtype</span>
                    <h3>Available And Request Blood Inventory</h3>
                </a>
                <a href="../logout/logout.php" id="logout-btn">
                    <span class="material-symbols-sharp">logout</span>
                    <h3>Logout</h3>
                </a>

            </div>
        </aside>
        <!-- End of Aside -->

        <main>
            <div class="date">
                <div class="current-time" id="current-time"></div>

                <div class="current-date" id="current-date"></div>

                <script src="../../home page bbms/time.js"></script>
            </div>
            <br><br>

    <h1>
        Available And Requested Blood Inventory Table
    </h1>

<br>
            <?php
// Enable error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "blood_bank_management_system";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve blood inventory data and total requested units
$sql = "SELECT 
            b.blood_type,
            b.available_units,
            COALESCE(SUM(r.bloodUnits), 0) AS total_requested_units
        FROM blood_inventory b
        LEFT JOIN (
            SELECT bloodType, bloodUnits FROM request
            UNION ALL
            SELECT bloodType, bloodUnits FROM receiver
        ) AS r ON b.blood_type = r.bloodType
        GROUP BY b.blood_type
        ORDER BY
            CASE 
                WHEN b.blood_type = 'A+' THEN 1
                WHEN b.blood_type = 'A-' THEN 2
                WHEN b.blood_type = 'B+' THEN 3
                WHEN b.blood_type = 'B-' THEN 4
                WHEN b.blood_type = 'AB+' THEN 5
                WHEN b.blood_type = 'AB-' THEN 6
                WHEN b.blood_type = 'O+' THEN 7
                WHEN b.blood_type = 'O-' THEN 8
            END";
$result = $conn->query($sql);

if ($result === FALSE) {
    echo "Error: " . $conn->error;
} elseif ($result->num_rows > 0) {
    echo "<!DOCTYPE html>
    <html>
    <head>
    <title>Blood Inventory</title>
   
    </head>
    <body>";

    echo "<table>
        <thead>
            <tr>
                <th>Blood Type</th>
                <th>Total Available Units</th>
                <th>Total Requested Units</th>
                <th>Total Available %</th>
                <th>Total Request %</th>
            </tr>
        </thead>
        <tbody>";
    while ($row = $result->fetch_assoc()) {
        $totalAvailable = $row["available_units"];
        $totalRequested = $row["total_requested_units"];
        $availablePercentage = ($totalAvailable > 0) ? ($totalAvailable / ($totalAvailable + $totalRequested)) * 100 : 0;
        $requestPercentage = ($totalRequested > 0) ? ($totalRequested / ($totalAvailable + $totalRequested)) * 100 : 0;
        echo "<tr>
            <td>" . $row["blood_type"] . "</td>
            <td>" . $totalAvailable . "</td>
            <td>" . $totalRequested . "</td>
            <td>" . round($availablePercentage, 2) . "%</td>
            <td>" . round($requestPercentage, 2) . "%</td>
          </tr>";
    }
    echo "</tbody>
    </table>";

    echo "</body>
    </html>";
} else {
    echo "0 results";
}

// Close connection
$conn->close();
?>

</main>
        <!------------------------------------- End of Main ----------------------------------->


        <!-- End of Main -->

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
                        <p>Yo, <b>Admin</b></p>
                    </div>
                    <div class="profile-photo">
                        <img src="../logo1.jpg" alt="Profile">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../../staff-bbms/script.js"></script>



</body>

</html>