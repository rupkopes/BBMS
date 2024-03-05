<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Camp</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp">
    <link rel="stylesheet" href="../style.css">
    <style>
        .body1 {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #2c3e50;
            color: #ecf0f1;
            text-align: center;
            padding: 10px;
            margin-bottom: 10px;
        }

        h1 {
            margin: 5x;
        }

        .containers {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            margin-left: 350px;
            transition: background-color 0.3s ease-in-out;
        }


        .camp {
            color: #2c3e50;
        }

        .camp h2 {
            color: #2c3e50;
        }

        .camp label {
            color: #2c3e50;
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
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 14px;
            font-family:'Courier New', Courier, monospace;
        }

        button[type="submit"],
        button[type="reset"] {
            margin: 10px;
        }
    </style>
</head>

<body1>
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

    <header>
        <h1>Upcoming Blood Donation Camps</h1>
    </header>

    <div class="containers">
        <!-- Form for adding new camp details -->
        <div class="camp">
            <h2 class="add">Add New Camp</h2>
            <br><br>
            <form id="campForm" method="post" action="insert_camp.php">
                <label for="campName">Camp Name:</label>
                <input type="text" id="campName" name="campName" required><br><br>
                <label for="campConductedBy">Camp Conducted By:</label>
                <input type="text" id="campConductedBy" name="campConductedBy" required><br><br>


                <label for="campDate">Date:</label>
                <input type="date" id="campDate" name="campDate" required><br><br>

                <label for="campTime">Time:</label>
                <select id="campTimeHour" name="campTimeHour" required>
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
                <select id="campTimeMinute" name="campTimeMinute" required>
                    <option value="00">00</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="30">30</option>
                    <option value="40">40</option>
                    <option value="50">50</option>
                    <option value="55">55</option>
                    <!-- Add more options for minutes if needed -->
                </select>
                <select id="campTimePeriod" name="campTimePeriod" required>
                    <option value="AM">AM</option>
                    <option value="PM">PM</option>
                </select>
                <br><br>


                <label for="campLocation">Location:</label>
                <input type="text" id="campLocation" name="campLocation" required><br><br>

                <label for="campContact">Contact:</label>
                <input type="text" id="campContact" name="campContact" required><br><br>

                <button type="submit">Add Camp</button>
                <button type="reset" class="reset">Reset Data</button>
                <button><a href="retrieve_camps.php">View Camps</a></button>
            </form>
        </div>

        <!-- Display retrieved camps -->
        <?php include 'retrieve_camps.php'; ?>
    </div>

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

    <script src="../script.js"></script>
    </body>

</html>