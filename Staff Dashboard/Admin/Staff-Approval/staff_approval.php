<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin BBMS</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp">
    <link rel="stylesheet" href="../style.css">
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

        .not-approved {
            color: red;
        }

        .reject {
            background-color: #FF5733;
            color: white;
            padding: 5px;
            margin-left: 10px;
            cursor: pointer;
        }

        .approved {
            background-color: #8BC34A;
            color: white;
            padding: 5px;
            margin-left: 10px;
            cursor: pointer;
        }
    </style>
</head>

<body>
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
                <a href="staff_approval.php" class="active">
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
            <h1>Management Of Staff</h1>
            <br>
            <br>

            <?php
            // Establish database connection
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "Blood_Bank_Management_System";

            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Retrieve pending and not approved staff records
            $sql = "SELECT * FROM Staff WHERE approval_status = 'pending' OR approval_status = 'not approved'";
            $result = $conn->query($sql);

          // Check if there are records
if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Name</th><th>Position</th><th>Email</th><th>Phone</th><th>Status</th><th>Action</th></tr>";
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["staff_id"] . "</td>"; // Displaying ID
        echo "<td>" . $row["first_name"] . " " . $row["last_name"] . "</td>";
        echo "<td>" . $row["position"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["phone"] . "</td>";
        echo "<td>";
        if ($row["approval_status"] == "pending") {
            echo "<span class='pending'>Pending</span>";
        } elseif ($row["approval_status"] == "not approved") {
            echo "<span class='not-approved'>Not Approved</span>";
        } elseif ($row["approval_status"] == "approved") {
            echo "<span class='approved'>Approved</span>";
        }
        echo "</td>";
        echo "<td>";
        if ($row["approval_status"] == "pending") {
            echo "<button onclick='approveStaff(" . $row["staff_id"] . ")' class='approved'>Approve</button>";
            echo "<button onclick='rejectStaff(" . $row["staff_id"] . ")' class='reject'>Not Approve</button>";
        }
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Please Register Staff";
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
    <!-- End of Container -->
    <!-- <script src="order.js"></script> -->
    <script src="../../staff-bbms/script.js"></script>


    <script>
        function approveStaff(staffId) {
            updateStatus(staffId, 'approved');
        }

        function rejectStaff(staffId) {
            updateStatus(staffId, 'not_approved');
        }

        function updateStatus(staffId, status) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "update_status.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Refresh the page or update the row in the table without refreshing
                    // depending on your preference
                    location.reload(); // Refreshing the page for simplicity
                }
            };
            xhr.send("staff_id=" + staffId + "&status=" + status);
        }
    </script>


</body>

</html>