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
    <title>BBMS Staff</title>
    <style>
        
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');

         /* Light Mode */
         :root {
            --color-primary: #7380ec;
            --color-danger: #ff0000;
            --color-success: #41f1b6;
            --color-warning: #ffbb55;
            --color-white: #fff;
            --color-info-dark: #7d8da1;
            --color-info-light: #dce1eb;
            --color-dark: #363949;
            --color-light: rgba(132, 139, 200, 0.18);
            --color-primary-variant: #111e88;
            --color-dark-variant: #677483;
            --color-background: #f6f6f9;
            --color-background1: #7e7e7e;
            --color-info: #f0f0f0;
            --card-border-radius: 2rem;
            --border-radius-1: 0.4rem;
            --border-radius-2: 0.8rem;
            --border-radius-3: 1.2rem;
            --card-padding: 1.8rem;
            --padding-1: 1.2;
            --box-shadow: 0 2rem 3rem var(--color-light);
        }

        .bbms {
            font-family: 'Poppins', sans-serif;
            color: var(--color-dark);
        }

        /* header {
            background-color: #2c3e50;
            color: #ecf0f1;
            text-align: center;
            padding: 5px;
            margin-bottom: 10px;
        } */

        h1 {
            font-size: 28px ;
            margin-left: 350px;
        }

        /* Dark Mode */
        .dark-theme-variables {
            --color-primary: #0000ff;
            --color-background: #181a1e;
            --color-white: #202528;
            --color-dark: #edeffd;
            --color-dark-variant: #a3bdcc;
            --color-light: rgba(0, 0, 0, 0.4);
            --box-shadow: 0 2rem 3rem var(--color-light);
            --color-info: #181a1e;
        }

        body.dark-mode {
            --color-primary: #0000ff;
            --color-background: #181a1e;
            --color-white: #202528;
            --color-dark: #edeffd;
            --color-dark-variant: #a3bdcc;
            --color-light: rgba(0, 0, 0, 0.4);
            --box-shadow: 0 2rem 3rem var(--color-light);
            --color-info: #181a1e;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: var(--color-background);
            color: var(--color-dark);
        }


        h1 {
            margin: 5px;
        }

        table {
            width: 100%;
            margin: 20px auto;
            border-collapse: collapse;
            margin-left: -100px;
        }

        th,
        td {
            border: 2px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        td{
            font-size: larger;
        }
        

        button {
            display: block;
            margin: 20px auto;
            background-color: #2c3e50;
            color: #ddd;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            padding: 12px 24px;
            font-size: 16px;
            text-decoration: none;
            transition: background-color 0.3s;
            margin-left: 0px;
        }

        .button{
            color: white;
        }
       
      
        .bloodtable{
            margin-left: 100px;
        }
        thead{
            font-size: larger;
            background-color: #2c3e49;
            color: #ecf0f1;
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
            <a href="./Inventory.php"  class="active">
                <span class="material-symbols-sharp">bloodtype</span>
                <h3>Available Blood Inventory</h3>
            </a>
            <a href="../appointment/Appointment.php">
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
 

<br><br>
    <header>
        <h1>Listing
        </h1>
        </header>
        <br>
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

    <button><a href="Inventory.php" class="button">New Listing</a></button>

    

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
                        echo "<p>Yo, <b>" . $userData['first_name'] . "</b></p>";
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
</body>

</html>
