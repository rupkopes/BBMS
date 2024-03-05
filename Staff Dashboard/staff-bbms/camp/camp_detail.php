<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Camp</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp">
    <link rel="stylesheet" href="../style.css">
    <style>
       /* Style the form container */
.form {
  width: 300px;
  margin-left: 350px;
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


        .blood{
            margin-left: 350px;
        }

        #message {
            margin-left: 350px;
            color: green;
            font-size: large;
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
                <a href="../inventory/Inventory.html">
                    <span class="material-symbols-sharp">bloodtype</span>
                    <h3>Blood Inventory</h3>
                </a>
                <a href="../donor/Donor.html">
                    <span class="material-symbols-sharp">person</span>
                    <h3>Donor Records</h3>
                </a>
                <a href="../appointment/Appointment.html">
                    <span class="material-symbols-sharp">calendar_today</span>
                    <h3>Appointment</h3>
                </a>
                <a href="../camp/Camp.php" class="active">
                    <span class="material-symbols-sharp">campaign</span>
                    <h3>Camps</h3>
                </a>
                <a href="../request/Request.html">
                    <span class="material-symbols-sharp">local_hospital</span>
                    <h3>Blood Request</h3>
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
        </main>
    </div>
    <br>

<h2 class="blood">Blood Types - Total Blood Collected</h2>
<br>

<form method="post" class="form">
    <label for="blood_type_Aplus">A+:</label>
    <input type="number" id="blood_type_Aplus" name="blood_type_Aplus" min="0"><br><br>
    
    <label for="blood_type_Aminus">A-:</label>
    <input type="number" id="blood_type_Aminus" name="blood_type_Aminus" min="0"><br><br>
    
    <label for="blood_type_Bplus">B+:</label>
    <input type="number" id="blood_type_Bplus" name="blood_type_Bplus" min="0"><br><br>
    
    <label for="blood_type_Bminus">B-:</label>
    <input type="number" id="blood_type_Bminus" name="blood_type_Bminus" min="0"><br><br>
    
    <label for="blood_type_ABplus">AB+:</label>
    <input type="number" id="blood_type_ABplus" name="blood_type_ABplus" min="0"><br><br>
    
    <label for="blood_type_ABminus">AB-:</label>
    <input type="number" id="blood_type_ABminus" name="blood_type_ABminus" min="0"><br><br>
    
    <label for="blood_type_Oplus">O+:</label>
    <input type="number" id="blood_type_Oplus" name="blood_type_Oplus" min="0"><br><br>
    
    <label for="blood_type_Ominus">O-:</label>
    <input type="number" id="blood_type_Ominus" name="blood_type_Ominus" min="0"><br><br>

    <input type="submit" value="Submit">
</form>

<div id="message"></div> <!-- This div will display the success message -->

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
            echo "Units for blood type $type updated successfully.<br>";
        } else {
            echo "Error updating units for blood type $type: " . $conn->error . "<br>";
        }
        $update_stmt->close();
    }
    // Display success message
    echo '<script>document.getElementById("message").innerHTML = "Units are added successfully";</script>';
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
        // Insert data into blood_inventory table
        $insert_sql = "INSERT INTO camp_inventory (blood_type, available_units) VALUES (?, ?)";
        $insert_stmt = $conn->prepare($insert_sql);
        $insert_stmt->bind_param("si", $type, $units);
        if ($insert_stmt->execute()) {
            echo "Units for blood type $type inserted successfully.<br>";
        } else {
            echo "Error inserting units for blood type $type: " . $conn->error . "<br>";
        }
        $insert_stmt->close();
    }
    // Display success message
    echo '<script>document.getElementById("message").innerHTML = "Units are added successfully";</script>';
}


// Close connection
$conn->close();
?>
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
                    <img src="../person.png" alt="Profile">
                </div>
            </div>
        </div>
        <!-- End of Top -->
    </div>


    <script>
        // JavaScript code to remove the message after 3 seconds
        setTimeout(function(){
            var message = document.getElementById('message');
            if (message) {
                message.parentNode.removeChild(message);
            }
        }, 3000); // 3000 milliseconds = 3 seconds
    </script>

    <script src="../script.js"></script>
    </body>

</html>
