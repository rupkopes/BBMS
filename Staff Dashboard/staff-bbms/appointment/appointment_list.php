<?php
            include_once("../profile_name.php");        
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
       
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');

        .body {
            font-family: Arial, sans-serif;
        }


        .bbmss {
            max-width: 100%;
            margin: 20px auto;
            padding: 20px;
            background-color: var(--color-white);
            border-radius: 5px;
            box-shadow: var(--box-shadow);
            /* margin-left: 340px; */
        }

        .filter-form {
            margin-bottom: 20px;
        }

        .filter-form label {
            font-weight: bold;
        }

        .filter-form input[type="radio"] {
            margin-top: 10px;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            width: 20px;
            height: 20px;
            border: 0.5px solid black;
            border-radius: 50%;
            outline: none;
            transition: 0.3s;
        }

        .filter-form input[type="radio"]:checked {
            background-color: #2c3e50;
        }

        .filter-form input[type="radio"]+label {
            color: #333;
        }

        .appointment-list {
            border-top: 2px solid #ddd;
            padding-top: 20px;
        }

        .appointment-item {
            margin-bottom: 20px;
            padding: 10px;
            background-color: #f9f9f9;
            border-radius: 5px;
            box-shadow: 0 2px 2px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: #333;
            /* Text color for light mode */
        }

        .donor-name {
            font-weight: bold;
            margin-right: 10px;
        }

        .status {
            font-size: 0.9em;
            padding: 5px 10px;
            border-radius: 5px;
            color: #fff;
            text-transform: uppercase;
            margin-right: 10px;
        }

        .completed {
            background-color: #28a745;
            color: white;
        }

        .not-completed {
            background-color: #dc3545;
            color: white;
        }

        .action-buttons a {
            text-decoration: none;
            color: #333;
            background-color: #ddd;
            padding: 5px 10px;
            border-radius: 3px;
            transition: background-color 0.3s;
        }

        .action-buttons a+a {
            margin-left: 10px;
        }

        .action-buttons a:hover {
            background-color: #ccc;
        }


        section.dark-mode {
            background-color: var(--color-dark);
            color: #ecf0f1;
        }

        .delete-button.dark-mode {
            background-color: #e74c3c;
            color: white;
        }

        #delete-success-message {
            color: #e74c3c;
        }

        .delete-button.dark-mode:hover {
            background-color: #c0392b;
        }

        .message.dark-mode {
            background-color: #27ae60;
            color: white;
        }

        .appointment-item.dark-mode {
            background-color: #2c3e50;
            /* Change to desired background color */
            color: #ecf0f1;
            /* Change to desired text color */
        }

        .mark {
            color: #28a745;
            background-color: transparent;
            cursor: pointer;
        }

        .del {
            color: #dc3545;
        }

        .app {
            margin-left: 20px;
            background-color: transparent;
            color: blue;
            font-size: 14px;
            cursor: pointer;
        }

     /* Style for the table */
table {
  width: 100%;
  border-collapse: collapse;
  border: 2px solid #ddd; /* Border color for the entire table */
}

/* Style for table headers */
th {
  /* background-color: #f2f2f2; Background color for headers */
  border: 1px solid #ddd; /* Border color for headers */
  padding: 8px; /* Padding within headers */
}

/* Style for table cells */
td {
  border: 1px solid #ddd; /* Border color for cells */
  padding: 8px; /* Padding within cells */
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
                <a href="Appointment.php" class="active">
                    <span class="material-symbols-sharp">calendar_today</span>
                    <h3>Appointment</h3>
                </a>
                <a href="../donor/Donor.php">
                    <span class="material-symbols-sharp">person</span>
                    <h3>Donor Records</h3>
                </a>
                <a href="../camp/Camp.php">
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
        <h1>Appointment List</h1>
    </header>
   
    <div class="bbmss">
        <form class="filter-form" method="GET" action="">
            <label for="status">Filter by Status:</label><br>
            <input type="radio" id="status" name="status" value="all" checked> All
            <input type="radio" id="status" name="status" value="completed"> Completed
            <input type="radio" id="status" name="status" value="notcompleted"> Not Completed
            <input type="submit" value="Apply" class="app">
        </form>
        <?php
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
        // Database configuration
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "blood_bank_management_system";

        // Enable error reporting
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        // Create connection
        $conn = new mysqli($servername, $username, $password, $database);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Check if appointment completion is requested
        if (isset($_GET['complete']) && $_GET['complete'] == 'true' && isset($_GET['id'])) {
            // Update appointment status to "Completed"
            $updateSql = "UPDATE appointments SET status='Completed' WHERE id=" . $_GET['id'];
            if ($conn->query($updateSql) === TRUE) {
                echo "<div id='success-message'>Appointment marked as Completed successfully</div>";
                echo "<script>setTimeout(function(){document.getElementById('success-message').style.display='none';}, 3000);</script>";
            } else {
                echo "Error updating appointment status: " . $conn->error;
            }
        }

        // Check if appointment deletion is requested
        if (isset($_GET['delete']) && $_GET['delete'] == 'true' && isset($_GET['id'])) {
            // Delete appointment
            $deleteSql = "DELETE FROM appointments WHERE id=" . $_GET['id'];
            if ($conn->query($deleteSql) === TRUE) {
                echo "<div id='delete-success-message'>Appointment deleted successfully</div>";
                echo "<script>setTimeout(function(){document.getElementById('delete-success-message').style.display='none';}, 3000);</script>";
            } else {
                echo "Error deleting appointment: " . $conn->error;
            }
        }

        // Fetch appointments from the database
        $sql = "SELECT * FROM appointments";

        // Check if filter is applied
        if (isset($_GET['status']) && ($_GET['status'] == 'completed' || $_GET['status'] == 'notcompleted')) {
            $sql .= " WHERE status='" . ($_GET['status'] == 'completed' ? 'Completed' : 'Not Completed') . "'";
        }

        $result = $conn->query($sql);

        // Check if appointments exist
        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Blood Group</th>
                    <th>Email</th>
                    <th>Contact Number</th>
                    <th>Location</th>
                    <th>Appointment Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>";
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["age"] . "</td>";
                echo "<td>" . $row["blood_group"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["contact_number"] . "</td>";
                echo "<td>" . $row["location"] . "</td>";
                echo "<td>" . $row["appointment_date"] . "</td>";
                echo "<td class='" . ($row["status"] == "Completed" ? "completed" : "not-completed") . "'>" . $row["status"] . "</td>";
                echo "<td>
                        <form action='donors.php' method='POST' id='markAsCompletedForm'>
                            <input type='hidden' name='name' value='" . $row['name'] . "'>
                            <input type='hidden' name='age' value='" . $row['age'] . "'>
                            <input type='hidden' name='email' value='" . $row['email'] . "'>
                            <input type='hidden' name='contact' value='" . $row['contact_number'] . "'>
                            <input type='hidden' name='location' value='" . $row['location'] . "'>
                            <input type='hidden' name='blood_group' value='" . $row['blood_group'] . "'>
                            <button type='submit' class='mark'>Mark as Completed</button>
                        </form>
                      </td>";
                echo "<td>
    <a href='?delete=true&id=" . $row['id'] . "' onclick='return confirm(\"Are you sure you want to delete this appointment?\")'><span class='material-symbols-sharp del'>delete</span></a>

          </td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No appointments found";
        }

        // Close database connection
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
                    if (isset($_SESSION['username'])) {
                        echo "<p>Yo, <b>" .$userData['first_name'] . "</b></p>";
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
    <script src="../script.js"></script>
    <script>
    document.querySelectorAll(".mark").forEach(button => {
        button.addEventListener("click", function(event) {
            event.preventDefault(); // Prevent the default form submission
            // Display an alert message
            alert("Appointment marked as completed!");
            // Submit the form
            this.closest("form").submit();
        });
    });
</script>

    </body>

</html>