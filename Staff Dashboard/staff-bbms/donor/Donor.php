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

        .body1 {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: var(--color-background); /* Change background color using CSS variables */
            color: var(--color-dark); /* Change text color using CSS variables */
        }

        h1 {
            margin: 0;
        }

        section {
            background-color: var(--color-white); /* Change section background color using CSS variables */
            border-radius: var(--card-border-radius); /* Utilize CSS variable for border radius */
            box-shadow: var(--box-shadow); /* Utilize CSS variable for box shadow */
            width: 65%;
        }

        form {
            display: grid;
            grid-template-columns: 1fr;
            grid-gap: 10px;
            max-width: 650px;
            margin: 0 auto;
            margin-left: 15px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
            font-size: 14px;
        }

        input[type="text"],
        input[type="number"],
        input[type="email"],
        input[type="tel"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 18px;
            font-family:'Courier New', Courier, monospace;
        }

        select{
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 12px;
            font-family:'Courier New', Courier, monospace;
        }

        button[type="submit"],
        button[type="button"] {
            background-color: #2c3e50; /* Change button background color using CSS variables */
            color: #ecf0f1; /* Change button text color using CSS variables */
            padding: 8px 16px;
            border: none;
            border-radius: var(--border-radius-1); /* Utilize CSS variable for border radius */
            cursor: pointer;
            font-size: 14px;
        }

        button[type="submit"]:hover,
        button[type="button"]:hover {
            background-color: var(--color-primary-variant); /* Change button background color on hover using CSS variables */
        }

         /* Styling for success message */
         #message p.success {
            color: green;
            font-weight: bold;
        }

        /* Styling for error message */
        #message p.error {
            color: red;
            font-weight: bold;
        }

        /* Dark Mode Styles */
        body.dark-mode {
            background-color: var(--color-background-dark);
            color: #ecf0f1;
        }

        header.dark-mode {
            background-color: var(--color-info-dark);
            color: #ecf0f1;
        }

        section.dark-mode {
            background-color: var(--color-dark);
            color: #ecf0f1;
        }

        button[type="submit"].dark-mode,
        button[type="button"].dark-mode {
            background-color: var(--color-primary-dark);
            color: #ecf0f1;
        }

        button[type="submit"].dark-mode:hover,
        button[type="button"].dark-mode:hover {
            background-color: var(--color-primary-variant-dark);
        }

          /* Styling for success message */
          #message p.success.dark-mode {
            color: green;
            font-weight: bold;
        }

        /* Styling for error message */
        #message p.error.dark-mode {
            color: red;
            font-weight: bold;
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
                <a href="../inventory/Inventory.php">
                    <span class="material-symbols-sharp">bloodtype</span>
                    <h3>Available Blood Inventory</h3>
                </a>
                <a href="../appointment/Appointment.php">
                    <span class="material-symbols-sharp">calendar_today</span>
                    <h3>Appointment</h3>
                </a>
                <a href="./Donor.php" class="active">
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
        <h1>Donor Management System</h1>
    </header>
    <br>

    <section id="donor-list">
        <!-- Donor list table -->
    </section>
    <section id="donor-form">
      <br>
        <form id="add-donor-form" action="add_donor.php" method="post" class="form-group">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="age">Age:</label>
                <input type="number" id="age" name="age" required onforminput="validateAge">
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
                <label for="contact">Contact Number:</label>
                <input type="tel" id="contact" name="contact" required onforminput="validateContact">
            </div>
            <div class="form-group">
                <label for="location">Location:</label>
                <input type="text" id="location" name="location" required>
            </div>
            <div class="form-group">
                <button type="submit">Add Donor</button>
                <button type="button" id="view-listing">View Listing</button> <!-- New button for viewing listing -->
            </div>
            <!-- Success/Error message div -->
            <div id="message"></div>
        </form>
        <br>
        <br>
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
       document.addEventListener("DOMContentLoaded", function () {
    const addDonorForm = document.querySelector("#add-donor-form");
    const messageDiv = document.querySelector("#message");

    addDonorForm.addEventListener("submit", function (event) {
        event.preventDefault();

        // Collect form data
        const formData = new FormData(addDonorForm);

        // Custom validation for contact number
        const contactNumber = formData.get("contact");
        if (!validateContact(contactNumber)) {
            showMessage("Error: Please enter a valid 10-digit contact number.", "error");
            return;
        }

        // Custom validation for age
        const age = formData.get("age");
        if (!validateAge(age)) {
            showMessage("Error: Age must be between 18 and 60.", "error");
            return;
        }

        // Send form data using Fetch API
        fetch(addDonorForm.getAttribute("action"), {
            method: "POST",
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            console.log(data); // Log response from PHP script

            // Display success or error message
            if (data.includes("successfully")) {
                showMessage("Donor added successfully!", "success");
            } else {
                showMessage("Error: Donor could not be added.The Email or Contact Number is already exists", "error");
            }

            // Clear form fields after submission
            addDonorForm.reset();
        })
        .catch(error => {
            console.error("Error:", error);
            // Handle errors, e.g., show an error message
            showMessage("Error: An unexpected error occurred.", "error");
        });
    });
    

    // Function to display message for a specified duration
    function showMessage(message, type) {
        messageDiv.innerHTML = `<p class="${type}">${message}</p>`;
        // Clear message after 5 seconds
        setTimeout(() => {
            messageDiv.innerHTML = '';
        }, 5000);
    }

    // Custom validation function for contact number
    function validateContact(contact) {
        return /^\d{10}$/.test(contact);
    }

    // Custom validation function for age
    function validateAge(age) {
        return age >= 18 && age <= 60;
    }

    // Event listener for the "View Listing" button
    const viewListingButton = document.getElementById("view-listing");
    viewListingButton.addEventListener("click", function () {
        window.location.href = "view_donors.php"; // Redirect to the view_donors.php page
    });
});

    </script>


</body>

</html>
