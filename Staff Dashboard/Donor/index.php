<?php
session_start();
$username = $_SESSION['username'];

// Database connection
$servername = "localhost"; // Change this to your MySQL server hostname
$db_username = "root"; // Change this to your MySQL username
$db_password = ""; // Change this to your MySQL password
$database = "blood_bank_management_system"; // Change this to your MySQL database name

// Create connection
$conn = new mysqli($servername, $db_username, $db_password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve user data from the database
$stmt = $conn->prepare("SELECT * FROM donor_register_data WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$userData = $result->fetch_assoc();

// Close the statement
$stmt->close();

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BBMS Donor</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp">
    <link rel="stylesheet" href="../staff-bbms/style.css">
    <style>
       

        /* Add CSS for the Edit Profile button */
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-left: 10px;
            /* Adjust as needed */
        }

        .button:hover {
            background-color: #45a049;
        }

        .image-carousel {
            display: flex;
            /* align-items: center;
            justify-content: center; */
            max-height: 400px;
            overflow: hidden;
        }

        .image-carousel img {
            max-width: 100%;
            height: 400px;
            width: 1000px;
            display: none;
        }

        .image-carousel img.active {
            display: block;
        }

        

        .bbmss {
            
          
            font-size: 14px;
        }

        #reasons ul {
            list-style-type: none;
            padding: 0;
        }


        #cta {
            margin-top: 40px;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            header {
                padding: 15px 0;
            }

            .bbms {
                padding: 10px;
            }
        }
        
        .rights {
    position: fixed;
    top: -10px;
    right: 310px; 
    padding: 20px; 
    z-index: 1000; 
}


        /* Add additional styling as needed */
    </style>
</head>

<body>
    <div class="bbms">
        <aside>
            <div class="top">
                <div class="logo">
                    <img src="../staff-bbms/logo1.png" alt="person">
                    <h2>BB<span class="danger">MS</span></h2>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-symbols-sharp">close</span>
                </div>
            </div>

            <div class="sidebar">
                <a href="index.php" class="active">
                    <span class="material-symbols-sharp">grid_view</span>
                    <h3>Dashboard</h3>
                </a>
                <a href="./appointment/appointment.php">
                    <span class="material-symbols-sharp">calendar_today</span>
                    <h3>Schedule an Appointment</h3>
                </a>
                <a href="./Donor_activities/donor_activities.php">
                    <span class="material-symbols-sharp">calendar_today</span>
                    <h3>Donation Tracking</h3>
                </a>
                <a href="./logout/logout.php" id="logout-btn">
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

                <script src="../home page bbms/time.js"></script>
            </div>
            <br>
            <br>
            <h1>Dashboard</h1>
<br>
    <div class="rights">
        <div class="button-bbms">
            <button class="button" onclick="location.href='./Donor_activities/donor_activities.php';">
        <?php

        // Check if user is logged in
        if (isset($_SESSION['username'])) {
            // Database connection
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

            // Fetch donor details from donor_register_data table
            $username = $_SESSION['username'];
            $sql = "SELECT * FROM donor_register_data WHERE username = '$username'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Retrieve donor details
                $donor = $result->fetch_assoc();

                // Fetch donor details from donors table based on email or phone number
                $email = $donor['email'];
                $phone = $donor['phone'];

                $sql = "SELECT * FROM donors WHERE email = '$email' OR contact = '$phone'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Retrieve donor details from donors table
                    $donorDetails = $result->fetch_assoc();

                    // Calculate days remaining from the donation date
                    $donationDate = strtotime($donorDetails['created_at']);
                    $currentDate = strtotime(date('Y-m-d'));
                    $ninetyDaysAgo = strtotime('-89 days', $currentDate);
                    $daysRemaining = floor(($ninetyDaysAgo - $donationDate) / (60 * 60 * 24));

                    // Display days remaining
                    echo "Days Remaining: $daysRemaining";
                } else {
                    echo "Donor details not found.";
                }
            } else {
                echo "Donor details not found.";
            }

            $conn->close();
        } else {
            echo "You are not logged in";
        }
        ?>
    </button>
</div>
            </div>

        <div>
            <div class="bbmss">
                <div class="image-carousel">
                    <img src="image10.png" alt="Image 1" class="active">
                    <img src="image1.jpg" alt="Image 2">
                    <img src="image2.webp" alt="Image 3">
                    <img src="image3.jpg" alt="Image 4">
                    <img src="image4.jpg" alt="Image 5">
                    <img src="image5.png" alt="Image 6">
                    <img src="image6.jpg" alt="Image 7">
                    <img src="Frame 3.svg" alt="Image 8">
                </div>
                <br>
                <br>
                <div class="text">
                <section id="reasons">
                    <h1>Reasons to Donate Blood</h1>
                    <ul>
                        <li>Save Lives</li>
                        <li>Emergency Situations</li>
                        <li>Medical Conditions</li>
                        <li>Improving Health</li>
                        <li>Community Support</li>
                        <li>Personal Satisfaction</li>
                    </ul>
                </section>
                <br><br>
                <section id="cta">
                    <h2>Ready to Donate?</h2>
                    <p>Contact your local blood donation center or Click On schedule an appointment.</p>
                </section>
                <br><br>

                <h1>The Role and Importance of Blood Donors</h1>
                <p>Blood donation is a vital aspect of modern healthcare systems, with its importance unparalleled in saving lives and improving health outcomes. The role of blood donors cannot be overstated, as they are the lifeblood of medical facilities, providing a constant supply of blood for transfusions and treatments.</p>
                <p>First and foremost, blood donors serve as lifesavers. Their voluntary contributions ensure that patients in need of blood transfusions due to surgeries, accidents, or medical conditions have access to this life-sustaining resource. Without the selfless act of blood donation, many individuals would face dire consequences, including the risk of death.</p>
                <p>Blood donors also play a crucial role in maintaining a stable blood supply. Since blood cannot be manufactured or synthesized, it relies entirely on the generosity of donors. By regularly donating blood, individuals help prevent shortages and ensure that healthcare providers have an adequate inventory to meet patient needs.</p>
                <p>Furthermore, blood donors contribute to medical advancements and research. Blood donations are not only used for transfusions but also for scientific studies, including the development of new treatments, medications, and diagnostic tests. Through their donations, individuals support ongoing efforts to improve healthcare and save lives.</p>
                <p>Aside from the tangible benefits, blood donation fosters a sense of community and altruism. It brings together people from all walks of life, united by a common goal of helping others in need. The act of giving blood instills a profound sense of satisfaction and fulfillment, knowing that one has made a tangible difference in someone else's life.</p>
                <p>In conclusion, blood donors are indispensable contributors to the healthcare ecosystem. Their willingness to donate blood not only saves lives but also strengthens the fabric of society. It is imperative that we recognize and appreciate the invaluable role of blood donors and encourage others to join this noble cause.</p>
            </div>
            </div>
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
                            session_start();
                            if (isset($userData['first_name'])) {
                                echo "<p>Yo, <b>" .$userData['first_name'] . "</b></p>";
                                // Add Edit Profile button
                                echo "<button class=\"button\" onclick=\"location.href='edit_profile.php';\">Edit Profile</button>";
                            } else {
                                echo "<p>You are not logged in</p>";
                            }
                            ?>
                        </div>  
                    </div>

                    <div class="profile-photo">
    <a href="./edit_profile/edit_profile_page.php?Donor_id=<?php echo $_SESSION['Donor_id']; ?>">
        <img src="person.png" alt="Profile">
    </a>
</div>
                </div>
            </div>
        </div>


        <!-- End of bbms -->
        <!-- <script src="order.js"></script> -->
        <script src="../staff-bbms/script.js"></script>
        <script>
            const images = document.querySelectorAll('.image-carousel img');
            let currentImageIndex = 0;

            function changeImage() {
                images[currentImageIndex].classList.remove('active');
                currentImageIndex = (currentImageIndex + 1) % images.length;
                images[currentImageIndex].classList.add('active');
            }

            // Change image every 5 seconds
            setInterval(changeImage, 5000);
        </script>

</body>

</html>