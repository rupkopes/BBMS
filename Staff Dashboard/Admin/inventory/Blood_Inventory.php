<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listing</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp">
    <link rel="stylesheet" href="../../staff-bbms/style.css">
    <title>Blood Inventory Management</title>
    <style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: left;
    }
    th {
        background-color: #2c3e50;
        color: white;
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
                <a href="Blood_Inventory.php" class="active">
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
        <h1>
            Available Blood Inventory
        </h1>
    </header>
    <br><br>
    <div class="bloodtable">
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

        // Retrieve blood inventory data and sort by blood type
        $sql = "SELECT blood_type, available_units FROM blood_inventory ORDER BY
    CASE 
        WHEN blood_type = 'A+' THEN 1
        WHEN blood_type = 'A-' THEN 2
        WHEN blood_type = 'B+' THEN 3
        WHEN blood_type = 'B-' THEN 4
        WHEN blood_type = 'AB+' THEN 5
        WHEN blood_type = 'AB-' THEN 6
        WHEN blood_type = 'O+' THEN 7
        WHEN blood_type = 'O-' THEN 8
    END";
        $result = $conn->query($sql);

        if ($result === FALSE) {
            echo "Error: " . $conn->error;
        } elseif ($result->num_rows > 0) {
            echo "<table>
            <thead>
                <tr>
                    <th>Blood Type</th>
                    <th>Available Units</th>
                </tr>
            </thead>
            <tbody>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                <td>" . $row["blood_type"] . "</td>
                <td>" . $row["available_units"] . "</td>
                
                <tr>
              </tr>";
            }
            echo "</tbody>
        </table>";
        } else {
            echo "0 results";
        }

        // Close connection
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
                    <p>Yo, <b>Admin</b></p>
                </div>
                <div class="profile-photo">
                    <img src="../logo1.jpg" alt="Profile">
                </div>
            </div>
        </div>
        <!-- End of Top -->
    </div>
    </div>
    <script src="../../staff-bbms/script.js"></script>

</body>

</html>