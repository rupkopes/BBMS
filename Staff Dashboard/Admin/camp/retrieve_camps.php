<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Camp List</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp">
    <link rel="stylesheet" href="../../staff-bbms/style.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');



        .body1 {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .camp {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
            width: 100%;
            /* margin-left: 340px; */
        }

        .camp h2 {
            color: #333;
            margin-top: 0;
        }

        .camp p {
            margin: 5px 0;
            color: #333;
        }

        /* Styling for upcoming camps */
        .upcoming {
            background-color: #ffcccc;
            /* Red */
        }

        /* Styling for past camps */
        .past {
            background-color: #ccffcc;
            /* Green */
        }

        button {
            padding: 10px 10px;
            background-color: #2c3e50;
            color: #fff;
            cursor: pointer;
        }


        .delete {
            background-color: #e74c3c;
            /* Red */

        }
    </style>
</head>
<body1>
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
                <a href="retrieve_camps.php"  class="active">
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
                <h1>List Of Camps</h1>
            </header>
            <br>

            <form method="get" action="" class="search">
                <label for="search-date">Search by Date:</label>
                <input type="date" id="search-date" name="search_date">
                <button type="submit">Search</button>
            </form>
            <br>
            <br>

            <?php
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

            // Retrieve search date if submitted
            $search_date = isset($_GET['search_date']) ? $_GET['search_date'] : '';

            // Retrieve camps from the database
            if (!empty($search_date)) {
                $sql = "SELECT * FROM camps WHERE date = '$search_date'";
            } else {
                $sql = "SELECT * FROM camps";
            }
            $result = $conn->query($sql);

            // Display camps
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $camp_date = strtotime($row["date"]);
                    $today_date = strtotime(date("Y-m-d"));

                    // Check if the camp date has passed
                    $class = ($camp_date < $today_date) ? 'past' : 'upcoming';

                    echo "<div class='camp $class'>";
                    echo "<h2>" . $row["name"] . "</h2>";
                    echo "<p>Date: " . $row["date"] . "</p>";
                    echo "<p>Time: " . $row["time"] . "</p>";
                    echo "<p>Location: " . $row["location"] . "</p>";
                    echo "<p>Contact: " . $row["contact"] . "</p>";
                    // Display Camp Conducted By
                    echo "<p>Camp Conducted By: " . $row["campConductedBy"] . "</p>";
                    // Add a delete button for each camp with a confirmation dialog
                    echo "<form style='display: inline-block; margin-right: 10px;' method='post' action='delete_camp.php' onsubmit='return confirm(\"Are you sure you want to delete this camp?\");'>";
                    echo "<input type='hidden' name='camp_id' value='" . $row["id"] . "'>";
                    echo "<button type='submit' class='delete'>Delete</button>";
                    echo "</form>";

                    // Only show detail button if the camp is green (past)
                    if ($class === 'past') {
                        // Add a detail button for each camp
                        echo "<form style='display: inline-block;' method='get' action='camp_detail.php'>";
                        echo "<input type='hidden' name='camp_id' value='" . $row["id"] . "'>"; // Assuming "id" is the camp identifier
                        echo "<button type='submit'>Add Camp Detail</button>";
                        echo "</form>";
                    }

                    if ($class === 'past') {
                        // Add a detail button for each camp
                        echo "<form style='display: inline-block;' method='get' action='view_detail.php'>";
                        echo "<input type='hidden' name='camp_id' value='" . $row["id"] . "'>"; // Assuming "id" is the camp identifier
                        echo "<button type='submit' style='margin-left:10px'>View Camp Details</button>"; // Changed "Detail" to "View Details"
                        echo "</form>";
                    }

                    echo "</div>";
                }
            } else {
                // Display message if no camps are found
                echo "<div class='camp'>";
                echo "<p>No camps found</p>";
                echo "</div>";
            }

            // Close connection
            $conn->close();
            ?>
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