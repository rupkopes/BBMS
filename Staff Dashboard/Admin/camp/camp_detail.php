<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Camp</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp">
    <link rel="stylesheet" href="../../staff-bbms/style.css">
    <style>
       
        /* Style the form bbms */
        .form {
            width: 300px;
            /* margin-left: 350px; */
        }


        /* Style labels */
        .form label {
            display: inline-block;
            width: 80px;
            font-weight: bold;
        }

        /* Style input fields */
        .form input[type="number"] {
            width: 150px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
            margin-bottom: 10px;
        }

        /* Style submit button */
        .form input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #2c3e50;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        /* Style submit button on hover */
        .form input[type="submit"]:hover {
            background-color: #45a049;
        }


        .blood {
            margin-left: 350px;
        }

        #message {
            color: green;
            font-size: large;
        }

        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px 0;
            margin-left: 340px;
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

        #success-message {
    color: green; /* Green color for success message */
    font-weight: bold; /* Bold text for emphasis */
    display: inline-block; /* Ensure the message stays on the same line */
}

#error-message {
    color: red; /* Red color for error message */
    font-weight: bold; /* Bold text for emphasis */
    display: inline-block; /* Ensure the message stays on the same line */
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
                <a href="../camp/retrieve_camps.php" class="active">
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
    <h1>Total Blood Collected In :-  <?php echo htmlspecialchars($camp_name); ?></h1>
</header>
    <br>

        
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
    <form method="post" class="form">
        <input type="hidden" name="camp_id" value="<?php echo $_GET['camp_id']; ?>">
        <input type="hidden" name="camp_name" value="<?php echo $_GET['camp_name']; ?>">

        <label for="attendees">Number of Attendees:</label>
        <input type="number" id="attendees" name="attendees" min="1"><br><br>

        <?php
        // Blood types
        $blood_types = ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'];

        // Generate input fields for each blood type
        foreach ($blood_types as $type) {
            echo "<label for='blood_type_" . str_replace('+', 'plus', str_replace('-', 'minus', $type)) . "'>$type:</label>";
            echo "<input type='number' id='blood_type_" . str_replace('+', 'plus', str_replace('-', 'minus', $type)) . "' name='blood_type_" . str_replace('+', 'plus', str_replace('-', 'minus', $type)) . "' min='0'><br><br>";
        }
        ?>

        <input type="submit" value="Submit">
    </form>

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

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $blood_types = [
            'A+' => $_POST['blood_type_Aplus'],
            'A-' => $_POST['blood_type_Aminus'],
            'B+' => $_POST['blood_type_Bplus'],
            'B-' => $_POST['blood_type_Bminus'],
            'AB+' => $_POST['blood_type_ABplus'],
            'AB-' => $_POST['blood_type_ABminus'],
            'O+' => $_POST['blood_type_Oplus'],
            'O-' => $_POST['blood_type_Ominus']
        ];

        foreach ($blood_types as $type => $units) {
            // Update blood inventory for each blood type
            $update_sql = "UPDATE blood_inventory SET available_units = available_units + ? WHERE blood_type = ?";
            $update_stmt = $conn->prepare($update_sql);
            $update_stmt->bind_param("is", $units, $type);
            if ($update_stmt->execute()) {
                // echo "<span id='success-message'>Units for blood type $type updated successfully.</span><br>";
            } else {
                echo "<span id='error-message'>Error updating units for blood type $type: " . $conn->error . "</span><br>";
            }
            $update_stmt->close();
        }            
        // Display success message
        echo '<script>document.getElementById("message").innerHTML = "Units are added successfully";</script>';
    }
    

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the camp_id from the form
        $camp_id = $_POST['camp_id'];
        $camp_name = $_POST['camp_name'];

        // Get the number of attendees from the form
        $attendees = $_POST['attendees'];

        // Blood types array
        $blood_types = [
            'A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'
        ];

        // Insert data into camp_inventory table
        $insert_sql = "INSERT INTO camp_inventory (camp_id, camp_name, blood_type, available_units, attendees) VALUES (?, ?, ?, ?, ?)";
        $insert_stmt = $conn->prepare($insert_sql);

        foreach ($blood_types as $type) {
            $units = $_POST['blood_type_' . str_replace('+', 'plus', str_replace('-', 'minus', $type))];
            $insert_stmt->bind_param("issii", $camp_id, $camp_name, $type, $units, $attendees);
            if ($insert_stmt->execute()) {
                // echo "<span id='success-message'>Units for blood type $type updated successfully.</span><br>";
            } else {
                echo "<span id='error-message'>Error updating units for blood type $type: " . $conn->error . "</span><br>";
            }
        }
        $insert_stmt->close();

        // Display success message
        echo '<div id="message">Units and attendees are added successfully</div>';
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

    <script>
        // JavaScript code to remove the message after 3 seconds
        setTimeout(function() {
            var message = document.getElementById('message');
            if (message) {
                message.parentNode.removeChild(message);
            }
        }, 3000); // 3000 milliseconds = 3 seconds
    </script>

<script src="../../staff-bbms/script.js"></script>
</body>

</html>