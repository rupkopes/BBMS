<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin BBMS</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp">
    <link rel="stylesheet" href="../../staff-bbms/style.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .pending {
            color: blue;
        }

        .approved {
            color: green;
        }

        .not_approved {
            color: red;
        }

        .delete {
            background-color: red;
            color: white;
            cursor: pointer;
            padding: 8px;
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
                <a href="staff_list.php" class="active">
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
        <!-- End of Aside -->

        <main>
            <div class="date">
                <div class="current-time" id="current-time"></div>

                <div class="current-date" id="current-date"></div>

                <script src="../../home page bbms/time.js"></script>
            </div>
            <br><br>
            <h1>Staff-List</h1>
            <br>
            <br>
            <?php
            // Establish database connection
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "blood_bank_management_system";

            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Retrieve all staff records
            $sql = "SELECT * FROM Staff";
            $result = $conn->query($sql);

            // Check if there are records
            if ($result->num_rows > 0) {
                echo "<table>";
                echo "<tr><th>ID</th><th>Name</th><th>Position</th><th>Email</th><th>Phone</th><th>Status</th></tr>";
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["staff_id"] . "</td>"; // Displaying ID
                    echo "<td>" . $row["first_name"] . " " . $row["last_name"] . "</td>";
                    echo "<td>" . $row["position"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["phone"] . "</td>";

                    // Check approval status and set color accordingly
                    $approval_status = $row["approval_status"];
                    $status_class = '';
                    switch ($approval_status) {
                        case 'approved':
                            $status_class = 'approved';
                            break;
                        case 'not_approved':
                            $status_class = 'not_approved'; // Corrected class name from 'not-approved' to 'not_approved'
                            break;
                        case 'pending':
                            $status_class = 'pending';
                            break;
                        default:
                            $status_class = ''; // No specific class for other cases
                            break;
                    }

                    // Outputting status with appropriate class
                    echo "<td class='$status_class'>" . $approval_status . "</td>";
                    
                    // Add delete button
                    echo "<td><form method='post' action='delete_staff.php'><input type='hidden' name='staff_id' value='" . $row["staff_id"] . "'><button type='submit' class='delete'>Delete</button></form></td>";
                    
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "No staff records found";
            }

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
            <!-- End of Top -->
        </div>
    </div>
    <!-- End of bbms -->
    <!-- <script src="order.js"></script> -->
    <script src="../../staff-bbms/script.js"></script>

</body>

</html>