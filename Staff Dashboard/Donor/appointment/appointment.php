<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp">
    <link rel="stylesheet" href="../styless.css">
    <style>
        <?php
        session_start();
        if (isset($_SESSION['username'])) {
            echo "<p>Yo, <b>" . $_SESSION['username'] . "</b></p>";
            echo "<button class=\"button\" onclick=\"location.href='edit_profile.php';\">Edit Profile</button>";
        } else {
            echo "<p>You are not logged in</p>";
            // Add some debugging information to see if session variables are set
            var_dump($_SESSION);
        }
        $username = $_SESSION['username'];
        ?>.body1 {
            font-family: Arial, sans-serif;
        }

        /* header {
            background-color: #2c3e50;
            color: #ecf0f1;
            text-align: center;
            padding: 10px;
            margin-bottom: 10px;
        } */

        header {
            margin-left: 340px;
        }

        h1 {
            margin: 0;
        }

        /* .containers {
            max-width: 1000px;
            margin: 0 auto;
            margin-left: 340px;
        } */
        .form-group {
            margin: 10px 0;

        }

        .form-group label {
            display: block;

        }

        .form-group input[type="text"],
        .form-group input[type="date"] {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            font-family: 'Courier New', Courier, monospace;
        }

        .form-group button {
            background-color: #007BFF;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }

        .appointment-list {
            margin-top: 30px;
        }

        .appointment-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            border: 1px solid #ccc;
            margin: 10px 0;
        }

        .completed {
            background-color: #8BC34A;
            /* Green color for completed tasks */
            color: white;
        }

        .Not-completed {
            background-color: #ff0000;
            /* Red color for not completed tasks */
            color: white;
        }

        .list {
            background-color: #2c3e50;
            color: white;
            padding: 8px 10px;
            font-size: 16px;
            text-align: center;
        }

        input[type="text"],
        input[type="number"],
        input[type="email"],
        input[type="tel"],
        input[type="date"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 12px;
            font-family: 'Courier New', Courier, monospace;
        }

        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 12px;
            font-family: 'Courier New', Courier, monospace;
        }

        section {
            margin: 20px;
            margin-left: 340px;
            background-color: var(--color-white);
            /* Change section background color using CSS variables */
            border-radius: var(--card-border-radius);
            /* Utilize CSS variable for border radius */
            box-shadow: var(--box-shadow);
            /* Utilize CSS variable for box shadow */
            width: 45%;
        }

        form {
            display: grid;
            grid-template-columns: 1fr;
            grid-gap: 10px;
            max-width: 800px;
            margin: 0 auto;
            margin-left: 15px;
        }
    </style>
</head>
<body1>

    <div class="container">
        <aside>
            <div class="top">
                <div class="logo">
                    <img src="../../staff-bbms/logo1.jpg" alt="person">
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
                <a href="appointment.php" class="active">
                    <span class="material-symbols-sharp">calendar_today</span>
                    <h3>Schedule an Appointment</h3>
                </a>
                <a href="../Donor_activities/donor_activities.php">
                    <span class="material-symbols-sharp">calendar_today</span>
                    <h3>Donation Tracking</h3>
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

    <header>
        <h1>Donor Appointment</h1>
    </header>

    <div class="containers">
        <section>
            <form action="../../staff-bbms/appointment/appointment.php" method="post">
                <div class="form-group">
                    <label for="donor_name">Donor Name:</label>
                    <input type="text" id="name" name="name" value="<?php echo $username; ?>" required>
                </div>
                <div class="form-group">
                    <label for="age">Age:</label>
                    <input type="number" id="age" name="age" required>
                </div>
                <div class="form-group">
                    <label for="blood-group">Blood Group:</label>
                    <select id="blood-group" name="blood_group" required>
                        <option value="" disabled selected>Please select Blood Type</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="contact_number">Contact Number:</label>
                    <input type="tel" id="contact_number" name="contact_number" required>
                </div>
                <div class="form-group">
                    <label for="location">Location:</label>
                    <input type="text" id="location" name="location" required>
                </div>
                <div class="form-group">
                    <label for="appointment_date">Appointment Date:</label>
                    <input type="date" id="appointment_date" name="appointment_date" required>
                </div><br>
                <div class="form-group">
                    <button type="submit">Schedule Appointment</button>
                </div>

            </form>
        </section>

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
                    <?php
                    // Check if user is logged in and show appropriate greeting
                    session_start();
                    if (isset($_SESSION['username'])) {
                        echo "<p>Yo, <b>" . $_SESSION['username'] . "</b></p>";
                        echo "<button class=\"button\" onclick=\"location.href='edit_profile.php';\">Edit Profile</button>";
                    } else {
                        echo "<p>You are not logged in</p>";
                        // Add some debugging information to see if session variables are set
                        var_dump($_SESSION);
                    }
                    ?>
                </div>
                <div class="profile-photo">
                    <img src="../person.png" alt="Profile">
                </div>
            </div>
        </div>
        <!-- End of Top -->
    </div>

    <script src="../../staff-bbms/script.js"></script>
    <script>
        document.getElementById('appointmentForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the form from submitting normally
            // Perform any processing here (if needed)
            setTimeout(function() {
                location.reload(); // Reload the page after a short delay (you can adjust the delay as needed)
            }, 1000); // 1000 milliseconds = 1 second
        });
    </script>
    </body>

</html>