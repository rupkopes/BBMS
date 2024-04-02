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
        .body1 {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        /* header {
            background-color: #2c3e50;
            color: #ecf0f1;
            text-align: center;
            padding: 10px;
            margin-bottom: 10px;
        } */

        h1 {
            margin: 5x;
        }

        section {
            font-size:15px;
            max-width: 800px;
            padding: 20px;
            box-shadow: 0 0 2px rgba(0, 0, 0, 0.2);
            background-color: var(--color-white); /* Change section background color using CSS variables */
            border-radius: var(--card-border-radius); /* Utilize CSS variable for border radius */
            box-shadow: var(--box-shadow); /* Utilize CSS variable for box shadow */
        }
       
        .camp input,
        .camp select {
            background-color: #fff;
            border: 1px solid #ccc;
            color: #2c3e50;
        }

        .camp button {
            background-color: #2c3e50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .camp .reset {
            background-color: #2c3e50;
            color: white;
        }

        .camp a {
            color: white;
        }

        input[type="text"] {
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 20px;
            font-family:'Courier New', Courier, monospace;
        }

        button[type="submit"],
        button[type="reset"] {
            margin: 10px;
        }
        input[type="date"] {
            font-size: large;
            margin-right: 100px;
        }

        .time {
            font-size: large;
            display: inline-block;
        }   

        label {
            font-weight: bold;
            font-size: 14px;
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
                <a href="../appointment/Appointment.php">
                    <span class="material-symbols-sharp">calendar_today</span>
                    <h3>Appointment</h3>
                </a>
                <a href="../donor/Donor.php">
                    <span class="material-symbols-sharp">person</span>
                    <h3>Donor Records</h3>
                </a>
                <a href="../camp/Camp.php" class="active">
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
        <h1>Blood Donation Camps Form</h1>
    </header>
<br>
        <!-- Form for adding new camp details -->
        <section class="bbmss">
        <div class="camp">
            <h2 class="add">Add New Camp</h2>
            <br><br>
            <form id="campForm" method="post" action="insert_camp.php">
                <label for="campName">Camp Name:</label>
                <input type="text" id="campName" name="campName" required><br><br>
                <label for="campConductedBy">Camp Conducted By:</label>
                <input type="text" id="campConductedBy" name="campConductedBy" required><br><br>


                <label for="campDate">Date:</label>
                <input type="date" id="campDate" name="campDate" required>

                <label for="campTime" class="time">Time:</label>
                <select id="campTimeHour" name="campTimeHour" required class="time">
                    <option value="00">00</option>
                    <option value="01">01</option>
                    <option value="02">02</option>
                    <option value="03">03</option>
                    <option value="04">04</option>
                    <option value="05">05</option>
                    <option value="06">06</option>
                    <option value="07">07</option>
                    <option value="08">08</option>
                    <option value="09">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>

                </select>
                :
                <select id="campTimeMinute" name="campTimeMinute" required class="time">
                    <option value="00">00</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="30">30</option>
                    <option value="40">40</option>
                    <option value="50">50</option>
                    <option value="55">55</option>
                </select>
                <select id="campTimePeriod" name="campTimePeriod" required class="time">
                    <option value="AM">AM</option>
                    <option value="PM">PM</option>
                </select>
                <br><br>


                <label for="campLocation">Location:</label>
                <input type="text" id="campLocation" name="campLocation" required><br><br>

                <label for="campContact">Contact:</label>
                <input type="text" id="campContact" name="campContact" required oninput="validateContact(this)">
<br><br>
                <button type="submit">Add Camp</button>
                <button type="reset" class="reset">Reset Data</button>
                <button><a href="retrieve_camps.php">View Camps</a></button>
            </form>
        </div>
        </section>

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
                          
                            if (isset($userData['first_name'])) {
                                echo "<p>Hi, <b>" . $userData['first_name'] . "</b></p>";
                                // Add Edit Profile button
                                echo "<button class=\"button\" onclick=\"location.href='edit_profile.php';\">Edit Profile</button>";
                            } else {
                                echo "<p>You are not logged in</p>";
                            }
                        ?>
                    </div>

                    <div class="profile-photo">
                        <a href="./edit_profile/edit_profile_page.php?staff_id=<?php echo $_SESSION['staff_id']; ?>">
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

                                // Query to fetch the photo filename for the logged-in staff member
                                $staff_id = $_SESSION['staff_id'];
                                $sql = "SELECT photo FROM staff WHERE staff_id = $staff_id";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    // Output the photo if it exists
                                    $row = $result->fetch_assoc();
                                    $photo = $row["photo"];
                                    echo '<img src="../images/staff/' . $photo . '" alt="Profile" style="border: 1px solid red;">';
                                } else {
                                    // Output a placeholder image if no photo is found
                                    echo '<img src="./images/staff/person.png" alt="Profile" style="border: 1px solid red;">';
                                }

                                // Close connection
                                $conn->close();
                            ?>
                        </a>
                    </div>

                </div>
                <!-- End of Top -->
            </div>
        </div>
    </div>

    <script src="../script.js"></script>

    <script>
        function validateContact(input) {
            // Remove any non-numeric characters
            input.value = input.value.replace(/\D/g, '');
        
            // Limit the input to 10 characters
            if (input.value.length > 10) {
                input.value = input.value.slice(0, 10);
            }
        }
        </script>
        
    </body>

</html>
