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
                <a href="request_inventory.php" class="active">
                    <span class="material-symbols-sharp">bloodtype</span>
                    <h3>Blood Request Inventory</h3>
                </a>
                <a href="all.php">
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

            <h1>Blood Request Inventory</h1>
        <br>
        <br>
        <?php
// Database configuration
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

// SQL query to retrieve total blood units requested by blood type
$sql = "SELECT bloodType, SUM(bloodUnits) AS totalRequestedUnits
        FROM (
            SELECT bloodType, bloodUnits FROM receiver
            UNION ALL
            SELECT bloodType, bloodUnits FROM request
        ) AS combined_requests
        GROUP BY bloodType";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output table header
    echo "<table border='1'>
            <tr>
                <th>Blood Type</th>
                <th>Total Requested Units</th>
            </tr>";

    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row["bloodType"]."</td>
                <td>".$row["totalRequestedUnits"]."</td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>
<br><br>
        <?php
// Database configuration
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "blood_bank_management_system"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Function to generate table for blood request inventory
function generateBloodRequestInventoryTable() {
    global $conn;
    
    // Query to fetch blood request inventory for hospitals
    $hospital_query = "SELECT bloodType, 
                             SUM(bloodUnits) AS totalRequestedUnits,
                             SUM(CASE WHEN status = 'Approved' THEN bloodUnits ELSE 0 END) AS approvedUnits,
                             SUM(CASE WHEN status = 'Not Approved' THEN bloodUnits ELSE 0 END) AS notApprovedUnits,
                             SUM(CASE WHEN status = 'Pending' THEN bloodUnits ELSE 0 END) AS pendingUnits
                      FROM request
                      GROUP BY bloodType";

    // Query to fetch blood request inventory for users
    $user_query = "SELECT bloodType, 
                         SUM(bloodUnits) AS totalRequestedUnits,
                         SUM(CASE WHEN status = 'Approved' THEN bloodUnits ELSE 0 END) AS approvedUnits,
                         SUM(CASE WHEN status = 'Not Approved' THEN bloodUnits ELSE 0 END) AS notApprovedUnits,
                         SUM(CASE WHEN status = 'Pending' THEN bloodUnits ELSE 0 END) AS pendingUnits
                  FROM receiver
                  GROUP BY bloodType";
    
    echo "<h2>Blood Request Inventory for Hospitals</h2> <br>";
    echo "<table border='1'>
            <tr>
                <th>Blood Type</th>
                <th>Total Requested Units</th>
                <th>Approved Units</th>
                <th>Not Approved Units</th>
                <th>Pending Units</th>
            </tr>";
    if ($result = $conn->query($hospital_query)) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>".$row['bloodType']."</td>
                    <td>".$row['totalRequestedUnits']."</td>
                    <td>".$row['approvedUnits']."</td>
                    <td>".$row['notApprovedUnits']."</td>
                    <td>".$row['pendingUnits']."</td>
                  </tr>";
        }
        $result->free();
    }
    echo "</table>";
    
    echo "<h2>Blood Request Inventory for Users</h2> <br>";
    echo "<table border='1'>
            <tr>
                <th>Blood Type</th>
                <th>Total Requested Units</th>
                <th>Approved Units</th>
                <th>Not Approved Units</th>
                <th>Pending Units</th>
            </tr>";
    if ($result = $conn->query($user_query)) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>".$row['bloodType']."</td>
                    <td>".$row['totalRequestedUnits']."</td>
                    <td>".$row['approvedUnits']."</td>
                    <td>".$row['notApprovedUnits']."</td>
                    <td>".$row['pendingUnits']."</td>
                  </tr>";
        }
        $result->free();
    }
    echo "</table>";
}

// Call the function to generate the table
generateBloodRequestInventoryTable();

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