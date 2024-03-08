<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BBMS Staff</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp">
    <link rel="stylesheet" href="../../Admin Dashboard/style.css">
    <style>
        .approved {
            color: green;
        }

        .not-approved {
            color: red;
        }

        .pending {
            color: blue;
        }

        .progress {
            position: relative;
            width: 80px;
            height: 80px;
            margin: 0 auto;
        }
        .progress svg {
            position: absolute;
            width: 100%;
            height: 100%;
          
        }
      
       
    </style>
</head>

<body>
    <div class="bbms">
        <aside>
            <div class="top">
                <div class="logo">
                    <img src="logo1.jpg" alt="person">
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
                <a href="./inventory/Inventory.html">
                    <span class="material-symbols-sharp">bloodtype</span>
                    <h3>Blood Inventory</h3>
                </a>
                <a href="./appointment/Appointment.html">
                    <span class="material-symbols-sharp">calendar_today</span>
                    <h3>Appointment</h3>
                </a>
                <a href="./donor/Donor.html">
                    <span class="material-symbols-sharp">person</span>
                    <h3>Donor Records</h3>
                </a>
                <a href="./camp/Camp.html">
                    <span class="material-symbols-sharp">campaign</span>
                    <h3>Camps</h3>
                </a>
                <a href="./request/Request.html">
                    <span class="material-symbols-sharp">local_hospital</span>
                    <h3>Blood Request by Hospital</h3>
                </a>
                <a href="./receiver/receiver.html">
                    <span class="material-symbols-sharp">local_hospital</span>
                    <h3>Blood Request by User</h3>
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

            <h1>Dashboard</h1>


            <?php
                // Enable error reporting
                ini_set('display_errors', 1);
                error_reporting(E_ALL);

                // Database connection
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "Blood_Bank_Management_System";

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

                // Calculate total available units
                $total_units = 0;
                while ($row = $result->fetch_assoc()) {
                    $total_units += $row["available_units"];
                }

                // Reset result set to beginning
                $result->data_seek(0);

                if ($result->num_rows > 0) {
                    echo '<div class="insights">';

                    while ($row = $result->fetch_assoc()) {
                        $blood_type = $row["blood_type"];
                        $available_units = $row["available_units"];

                        // Calculate blood percentage
                        $percentage = ($available_units / $total_units) * 100;

                        // Display blood type with percentage
                        echo '<div class="' . $blood_type . '">
                                <div class="middle">
                                    <div class="left">
                                        <h1>' . $blood_type . '</h1>
                                    </div>
                                    <div class="progress">
                                        <svg>
                                            <circle cx="38" cy="38" r="36" style="stroke-dasharray: ' . (2 * M_PI * 36) . '; stroke-dashoffset: ' . (2 * M_PI * 36 * (1 - $percentage / 100)) . ';"></circle>
                                        </svg>
                                        <div class="number">
                                            <p>' . round($percentage, 2) . '%</p>
                                        </div>
                                    </div>
                                </div>
                            <br>
                        </div>';
                    }

                    echo '</div>'; // Close insights div
                } else {
                    echo "0 results";
                }

                // Close connection
                $conn->close();
            ?>


            <!------------------------------ End of Insights ---------------------->
            <!-- --------------Table Content------------------------>
            <div class="recent-orders">
                <h2>Blood Requests</h2>
                <table id="bloodRequestsTable">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Hospital</th>
                            <th>Blood Type</th>
                            <th>Blood Units</th>
                            <th>Status</th>
                        </tr>
                        <br>
                    </thead>
                    <tbody id="bloodRequestsTableBody">
                        <!-- Table rows will be dynamically added here -->
                    </tbody>
                </table>

                <script>
                    // Function to display blood requests
                    function displayBloodRequests() {
                        fetch('./request/get_blood_request.php')
                            .then(response => response.json())
                            .then(data => {
                                const bloodRequestsTableBody = document.getElementById('bloodRequestsTableBody');
                                bloodRequestsTableBody.innerHTML = '';

                                data.forEach(request => {
                                    const row = bloodRequestsTableBody.insertRow();
                                    row.innerHTML = `
                                            <td>${request.id}</td>
                                            <td>${request.hospital}</td>
                                            <td>${request.bloodType}</td>
                                            <td>${request.bloodUnits}</td>
                                            <td class="${getStatusClass(request.status)}">${request.status}</td>
                                        `;
                                });
                            })
                            .catch(error => {
                                console.error('Error:', error);
                            });
                    }

                    // Function to get CSS class based on status
                    function getStatusClass(status) {
                        switch (status) {
                            case 'Approved':
                                return 'approved';
                            case 'Not Approved':
                                return 'not-approved';
                            case 'Pending':
                                return 'pending';
                            default:
                                return '';
                        }
                    }

                    // Initial display of blood requests
                    displayBloodRequests();
                </script>


                <a href="./request/Request.html">Show All</a>
            </div>
        </main>
        <!------------------------------------- End of Main ----------------------------------->


        <!-- End of Main -->

        <?php
            include_once("../../Admin Dashboard/right.php");        
        ?>

    </div>
    <!-- End of Container -->
    <!-- <script src="order.js"></script> -->
    <script src="script.js"></script>


</body>

</html>