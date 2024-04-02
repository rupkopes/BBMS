<?php
    include_once("profile_name.php");        
?>    

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BBMS Staff</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp">
    <link rel="stylesheet" href="./style.css">
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
                    <img src="logo1.png" alt="person">
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
                <a href="./inventory/Inventory.php">
                    <span class="material-symbols-sharp">bloodtype</span>
                    <h3>Available Blood Inventory</h3>
                </a>
                <a href="./appointment/Appointment.php">
                    <span class="material-symbols-sharp">calendar_today</span>
                    <h3>Appointment</h3>
                </a>
                <a href="./donor/Donor.php">
                    <span class="material-symbols-sharp">person</span>
                    <h3>Donor Records</h3>
                </a>
                <a href="./camp/Camp.php">
                    <span class="material-symbols-sharp">campaign</span>
                    <h3>Camps</h3>
                </a>
                <a href="./request/Request.php">
                    <span class="material-symbols-sharp">local_hospital</span>
                    <h3>Blood Request by Hospital</h3>
                </a>
                <a href="./receiver/receiver.php">
                    <span class="material-symbols-sharp">local_hospital</span>
                    <h3>Blood Request by User</h3>
                </a>
                <a href="./request_inventory/request_inventory.php">
                    <span class="material-symbols-sharp">bloodtype</span>
                    <h3>Blood  Request Inventory</h3>
                </a>
                <a href="./request_inventory/all.php">
                    <span class="material-symbols-sharp">bloodtype</span>
                    <h3>Available And Request Blood Inventory</h3>
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
            <br><br>
            <h1>Dashboard</h1>
            <div class="insights">

                <?php             
                    // Enable error reporting
                    ini_set('display_errors', 1);
                    error_reporting(E_ALL);
                                        
                    // Database connection
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "blood_bank_management_system";

                    // Create Connection
                    $conn = mysqli_connect($servername, $username, $password, $database);

                    // Check Connection
                    if(!$conn) {
                                die("Connection Failed". mysqli_connect_error());
                    }
                    // echo "Connection Successfully";
                                        
                    // Retrieve blood inventory data and total requested units
                    $sql = "SELECT 
                                b.blood_type,
                                b.available_units,
                                COALESCE(SUM(r.bloodUnits), 0) AS total_requested_units
                            FROM blood_inventory b
                            LEFT JOIN (
                                SELECT bloodType, bloodUnits FROM request
                                UNION ALL
                                SELECT bloodType, bloodUnits FROM receiver
                            ) AS r ON b.blood_type = r.bloodType
                            Where b.blood_type = 'A+'
                            GROUP BY b.blood_type
                            ORDER BY
                                CASE 
                                    WHEN b.blood_type = 'A+' THEN 1
                                    WHEN b.blood_type = 'A-' THEN 2
                                    WHEN b.blood_type = 'B+' THEN 3
                                    WHEN b.blood_type = 'B-' THEN 4
                                    WHEN b.blood_type = 'AB+' THEN 5
                                    WHEN b.blood_type = 'AB-' THEN 6
                                    WHEN b.blood_type = 'O+' THEN 7
                                    WHEN b.blood_type = 'O-' THEN 8
                                END";
                            $result = $conn->query($sql);
                            if ($result === FALSE) {
                                echo "Error: " . $conn->error;
                            } 
                            elseif ($result->num_rows > 0) {
                                // echo '<div class="insights">';
                                while ($row = $result->fetch_assoc()) {
                                    $blood_type = $row["blood_type"];
                                    $totalAvailable = $row["available_units"];
                                    $totalRequested = $row["total_requested_units"];
                                    $availablePercentage = ($totalAvailable > 0) ? ($totalAvailable / ($totalAvailable + $totalRequested)) * 100 : 0;
                                    $requestPercentage = ($totalRequested > 0) ? ($totalRequested / ($totalAvailable + $totalRequested)) * 100 : 0;

                                    // Calculate the color based on availablePercentage
                                    $color = '';
                                    if ($availablePercentage > 70) {
                                        $color = 'green'; // Green for more than 70%
                                    } elseif ($availablePercentage >= 30 && $availablePercentage <= 70) {
                                        $color = 'yellow'; // Yellow for between 30% and 70%
                                    } else {
                                        $color = 'red'; // Red for less than 30%
                                    }
                                            
                                    // Display blood type with percentage
                                    echo '<div class="Aplus">
                                        <a href="#">
                                            <div class="middle">
                                                <div class="left">
                                                    <h1>A+</h1>
                                                </div>
                                                <div class="progress">
                                                    <svg>
                                                        <circle cx="38" cy="38" r="36" style="stroke-dasharray: ' . (2 * M_PI * 36) . '; stroke-dashoffset: ' . (2 * M_PI * 36 * (1 - $availablePercentage / 100)) . '; stroke: ' . $color . '"></circle>
                                                    </svg>
                                                    <div class="number">
                                                        <p>' . round($availablePercentage, 2) . '%</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <small class="text-muted">Last 24 Hours</small>
                                        </a>
                                    </div>';
                                }

                            }   else {
                                    echo "0 results";
                                }

                            // Close connection
                            $conn->close();
                ?>

                <?php             
                    // Enable error reporting
                    ini_set('display_errors', 1);
                    error_reporting(E_ALL);
                                        
                    // Database connection
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "blood_bank_management_system";

                    // Create Connection
                    $conn = mysqli_connect($servername, $username, $password, $database);

                    // Check Connection
                    if(!$conn) {
                                die("Connection Failed". mysqli_connect_error());
                    }
                    // echo "Connection Successfully";
                                        
                    // Retrieve blood inventory data and total requested units
                    $sql = "SELECT 
                                b.blood_type,
                                b.available_units,
                                COALESCE(SUM(r.bloodUnits), 0) AS total_requested_units
                            FROM blood_inventory b
                            LEFT JOIN (
                                SELECT bloodType, bloodUnits FROM request
                                UNION ALL
                                SELECT bloodType, bloodUnits FROM receiver
                            ) AS r ON b.blood_type = r.bloodType
                            Where b.blood_type = 'B+'
                            GROUP BY b.blood_type
                            ORDER BY
                                CASE 
                                    WHEN b.blood_type = 'A+' THEN 1
                                    WHEN b.blood_type = 'A-' THEN 2
                                    WHEN b.blood_type = 'B+' THEN 3
                                    WHEN b.blood_type = 'B-' THEN 4
                                    WHEN b.blood_type = 'AB+' THEN 5
                                    WHEN b.blood_type = 'AB-' THEN 6
                                    WHEN b.blood_type = 'O+' THEN 7
                                    WHEN b.blood_type = 'O-' THEN 8
                                END";
                            $result = $conn->query($sql);
                            if ($result === FALSE) {
                                echo "Error: " . $conn->error;
                            } 
                            elseif ($result->num_rows > 0) {
                                // echo '<div class="insights">';
                                while ($row = $result->fetch_assoc()) {
                                    $blood_type = $row["blood_type"];
                                    $totalAvailable = $row["available_units"];
                                    $totalRequested = $row["total_requested_units"];
                                    $availablePercentage = ($totalAvailable > 0) ? ($totalAvailable / ($totalAvailable + $totalRequested)) * 100 : 0;
                                    $requestPercentage = ($totalRequested > 0) ? ($totalRequested / ($totalAvailable + $totalRequested)) * 100 : 0;

                                    // Calculate the color based on availablePercentage
                                    $color = '';
                                    if ($availablePercentage > 70) {
                                        $color = 'green'; // Green for more than 70%
                                    } elseif ($availablePercentage >= 30 && $availablePercentage <= 70) {
                                        $color = 'yellow'; // Yellow for between 30% and 70%
                                    } else {
                                        $color = 'red'; // Red for less than 30%
                                    }
                                            
                                    // Display blood type with percentage
                                    echo '<div class="Bplus">
                                        <a href="#">
                                            <div class="middle">
                                                <div class="left">
                                                    <h1>B+</h1>
                                                </div>
                                                <div class="progress">
                                                    <svg>                                        
                                                        <circle cx="38" cy="38" r="36" style="stroke-dasharray: ' . (2 * M_PI * 36) . '; stroke-dashoffset: ' . (2 * M_PI * 36 * (1 - $availablePercentage / 100)) . '; stroke: ' . $color . '"></circle>
                                                    </svg>
                                                    <div class="number">
                                                        <p>' . round($availablePercentage, 2) . '%</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <small class="text-muted">Last 24 Hours</small>
                                        </a>
                                    </div>';
                                }

                            }   else {
                                    echo "0 results";
                                }

                            // Close connection
                            $conn->close();
                ?>

                <?php             
                    // Enable error reporting
                    ini_set('display_errors', 1);
                    error_reporting(E_ALL);
                                        
                    // Database connection
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "blood_bank_management_system";

                    // Create Connection
                    $conn = mysqli_connect($servername, $username, $password, $database);

                    // Check Connection
                    if(!$conn) {
                                die("Connection Failed". mysqli_connect_error());
                    }
                    // echo "Connection Successfully";
                                        
                    // Retrieve blood inventory data and total requested units
                    $sql = "SELECT 
                                b.blood_type,
                                b.available_units,
                                COALESCE(SUM(r.bloodUnits), 0) AS total_requested_units
                            FROM blood_inventory b
                            LEFT JOIN (
                                SELECT bloodType, bloodUnits FROM request
                                UNION ALL
                                SELECT bloodType, bloodUnits FROM receiver
                            ) AS r ON b.blood_type = r.bloodType
                            Where b.blood_type = 'AB+'
                            GROUP BY b.blood_type
                            ORDER BY
                                CASE 
                                    WHEN b.blood_type = 'A+' THEN 1
                                    WHEN b.blood_type = 'A-' THEN 2
                                    WHEN b.blood_type = 'B+' THEN 3
                                    WHEN b.blood_type = 'B-' THEN 4
                                    WHEN b.blood_type = 'AB+' THEN 5
                                    WHEN b.blood_type = 'AB-' THEN 6
                                    WHEN b.blood_type = 'O+' THEN 7
                                    WHEN b.blood_type = 'O-' THEN 8
                                END";
                            $result = $conn->query($sql);
                            if ($result === FALSE) {
                                echo "Error: " . $conn->error;
                            } 
                            elseif ($result->num_rows > 0) {
                                // echo '<div class="insights">';
                                while ($row = $result->fetch_assoc()) {
                                    $blood_type = $row["blood_type"];
                                    $totalAvailable = $row["available_units"];
                                    $totalRequested = $row["total_requested_units"];
                                    $availablePercentage = ($totalAvailable > 0) ? ($totalAvailable / ($totalAvailable + $totalRequested)) * 100 : 0;
                                    $requestPercentage = ($totalRequested > 0) ? ($totalRequested / ($totalAvailable + $totalRequested)) * 100 : 0;

                                    // Calculate the color based on availablePercentage
                                    $color = '';
                                    if ($availablePercentage > 70) {
                                        $color = 'green'; // Green for more than 70%
                                    } elseif ($availablePercentage >= 30 && $availablePercentage <= 70) {
                                        $color = 'yellow'; // Yellow for between 30% and 70%
                                    } else {
                                        $color = 'red'; // Red for less than 30%
                                    }
                                            
                                    // Display blood type with percentage
                                    echo '<div class="ABplus">
                                        <a href="#">
                                            <div class="middle">
                                                <div class="left">
                                                    <h1>AB+</h1>
                                                </div>
                                                <div class="progress">
                                                    <svg>                                        
                                                        <circle cx="38" cy="38" r="36" style="stroke-dasharray: ' . (2 * M_PI * 36) . '; stroke-dashoffset: ' . (2 * M_PI * 36 * (1 - $availablePercentage / 100)) . '; stroke: ' . $color . '"></circle>
                                                    </svg>
                                                    <div class="number">
                                                        <p>' . round($availablePercentage, 2) . '%</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <small class="text-muted">Last 24 Hours</small>
                                        </a>
                                    </div>';
                                }

                            }   else {
                                    echo "0 results";
                                }

                            // Close connection
                            $conn->close();
                ?>

                <?php             
                    // Enable error reporting
                    ini_set('display_errors', 1);
                    error_reporting(E_ALL);
                                        
                    // Database connection
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "blood_bank_management_system";

                    // Create Connection
                    $conn = mysqli_connect($servername, $username, $password, $database);

                    // Check Connection
                    if(!$conn) {
                                die("Connection Failed". mysqli_connect_error());
                    }
                    // echo "Connection Successfully";
                                        
                    // Retrieve blood inventory data and total requested units
                    $sql = "SELECT 
                                b.blood_type,
                                b.available_units,
                                COALESCE(SUM(r.bloodUnits), 0) AS total_requested_units
                            FROM blood_inventory b
                            LEFT JOIN (
                                SELECT bloodType, bloodUnits FROM request
                                UNION ALL
                                SELECT bloodType, bloodUnits FROM receiver
                            ) AS r ON b.blood_type = r.bloodType
                            Where b.blood_type = 'O+'
                            GROUP BY b.blood_type
                            ORDER BY
                                CASE 
                                    WHEN b.blood_type = 'A+' THEN 1
                                    WHEN b.blood_type = 'A-' THEN 2
                                    WHEN b.blood_type = 'B+' THEN 3
                                    WHEN b.blood_type = 'B-' THEN 4
                                    WHEN b.blood_type = 'AB+' THEN 5
                                    WHEN b.blood_type = 'AB-' THEN 6
                                    WHEN b.blood_type = 'O+' THEN 7
                                    WHEN b.blood_type = 'O-' THEN 8
                                END";
                            $result = $conn->query($sql);
                            if ($result === FALSE) {
                                echo "Error: " . $conn->error;
                            } 
                            elseif ($result->num_rows > 0) {
                                // echo '<div class="insights">';
                                while ($row = $result->fetch_assoc()) {
                                    $blood_type = $row["blood_type"];
                                    $totalAvailable = $row["available_units"];
                                    $totalRequested = $row["total_requested_units"];
                                    $availablePercentage = ($totalAvailable > 0) ? ($totalAvailable / ($totalAvailable + $totalRequested)) * 100 : 0;
                                    $requestPercentage = ($totalRequested > 0) ? ($totalRequested / ($totalAvailable + $totalRequested)) * 100 : 0;

                                    // Calculate the color based on availablePercentage
                                    $color = '';
                                    if ($availablePercentage > 70) {
                                        $color = 'green'; // Green for more than 70%
                                    } elseif ($availablePercentage >= 30 && $availablePercentage <= 70) {
                                        $color = 'yellow'; // Yellow for between 30% and 70%
                                    } else {
                                        $color = 'red'; // Red for less than 30%
                                    }
                                            
                                    // Display blood type with percentage
                                    echo '<div class="O+">
                                        <a href="#">
                                            <div class="middle">
                                                <div class="left">
                                                    <h1>O+</h1>
                                                </div>
                                                <div class="progress">
                                                    <svg>                                        
                                                        <circle cx="38" cy="38" r="36" style="stroke-dasharray: ' . (2 * M_PI * 36) . '; stroke-dashoffset: ' . (2 * M_PI * 36 * (1 - $availablePercentage / 100)) . '; stroke: ' . $color . '"></circle>
                                                    </svg>
                                                    <div class="number">
                                                        <p>' . round($availablePercentage, 2) . '%</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <small class="text-muted">Last 24 Hours</small>
                                        </a>
                                    </div>';
                                }

                            }   else {
                                    echo "0 results";
                                }

                            // Close connection
                            $conn->close();
                ?>

                <?php             
                    // Enable error reporting
                    ini_set('display_errors', 1);
                    error_reporting(E_ALL);
                                        
                    // Database connection
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "blood_bank_management_system";

                    // Create Connection
                    $conn = mysqli_connect($servername, $username, $password, $database);

                    // Check Connection
                    if(!$conn) {
                                die("Connection Failed". mysqli_connect_error());
                    }
                    // echo "Connection Successfully";
                                        
                    // Retrieve blood inventory data and total requested units
                    $sql = "SELECT 
                                b.blood_type,
                                b.available_units,
                                COALESCE(SUM(r.bloodUnits), 0) AS total_requested_units
                            FROM blood_inventory b
                            LEFT JOIN (
                                SELECT bloodType, bloodUnits FROM request
                                UNION ALL
                                SELECT bloodType, bloodUnits FROM receiver
                            ) AS r ON b.blood_type = r.bloodType
                            Where b.blood_type = 'A-'
                            GROUP BY b.blood_type
                            ORDER BY
                                CASE 
                                    WHEN b.blood_type = 'A+' THEN 1
                                    WHEN b.blood_type = 'A-' THEN 2
                                    WHEN b.blood_type = 'B+' THEN 3
                                    WHEN b.blood_type = 'B-' THEN 4
                                    WHEN b.blood_type = 'AB+' THEN 5
                                    WHEN b.blood_type = 'AB-' THEN 6
                                    WHEN b.blood_type = 'O+' THEN 7
                                    WHEN b.blood_type = 'O-' THEN 8
                                END";
                            $result = $conn->query($sql);
                            if ($result === FALSE) {
                                echo "Error: " . $conn->error;
                            } 
                            elseif ($result->num_rows > 0) {
                                // echo '<div class="insights">';
                                while ($row = $result->fetch_assoc()) {
                                    $blood_type = $row["blood_type"];
                                    $totalAvailable = $row["available_units"];
                                    $totalRequested = $row["total_requested_units"];
                                    $availablePercentage = ($totalAvailable > 0) ? ($totalAvailable / ($totalAvailable + $totalRequested)) * 100 : 0;
                                    $requestPercentage = ($totalRequested > 0) ? ($totalRequested / ($totalAvailable + $totalRequested)) * 100 : 0;

                                    // Calculate the color based on availablePercentage
                                    $color = '';
                                    if ($availablePercentage > 70) {
                                        $color = 'green'; // Green for more than 70%
                                    } elseif ($availablePercentage >= 30 && $availablePercentage <= 70) {
                                        $color = 'yellow'; // Yellow for between 30% and 70%
                                    } else {
                                        $color = 'red'; // Red for less than 30%
                                    }
                                            
                                    // Display blood type with percentage
                                    echo '<div class="Aminus">
                                        <a href="#">
                                            <div class="middle">
                                                <div class="left">
                                                    <h1>A-</h1>
                                                </div>
                                                <div class="progress">
                                                    <svg>                                        
                                                        <circle cx="38" cy="38" r="36" style="stroke-dasharray: ' . (2 * M_PI * 36) . '; stroke-dashoffset: ' . (2 * M_PI * 36 * (1 - $availablePercentage / 100)) . '; stroke: ' . $color . '"></circle>
                                                    </svg>
                                                    <div class="number">
                                                        <p>' . round($availablePercentage, 2) . '%</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <small class="text-muted">Last 24 Hours</small>
                                        </a>
                                    </div>';
                                }

                            }   else {
                                    echo "0 results";
                                }

                            // Close connection
                            $conn->close();
                ?>



                <?php             
                    // Enable error reporting
                    ini_set('display_errors', 1);
                    error_reporting(E_ALL);
                                        
                    // Database connection
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "blood_bank_management_system";

                    // Create Connection
                    $conn = mysqli_connect($servername, $username, $password, $database);

                    // Check Connection
                    if(!$conn) {
                                die("Connection Failed". mysqli_connect_error());
                    }
                    // echo "Connection Successfully";
                                        
                    // Retrieve blood inventory data and total requested units
                    $sql = "SELECT 
                                b.blood_type,
                                b.available_units,
                                COALESCE(SUM(r.bloodUnits), 0) AS total_requested_units
                            FROM blood_inventory b
                            LEFT JOIN (
                                SELECT bloodType, bloodUnits FROM request
                                UNION ALL
                                SELECT bloodType, bloodUnits FROM receiver
                            ) AS r ON b.blood_type = r.bloodType
                            Where b.blood_type = 'B-'
                            GROUP BY b.blood_type
                            ORDER BY
                                CASE 
                                    WHEN b.blood_type = 'A+' THEN 1
                                    WHEN b.blood_type = 'A-' THEN 2
                                    WHEN b.blood_type = 'B+' THEN 3
                                    WHEN b.blood_type = 'B-' THEN 4
                                    WHEN b.blood_type = 'AB+' THEN 5
                                    WHEN b.blood_type = 'AB-' THEN 6
                                    WHEN b.blood_type = 'O+' THEN 7
                                    WHEN b.blood_type = 'O-' THEN 8
                                END";
                            $result = $conn->query($sql);
                            if ($result === FALSE) {
                                echo "Error: " . $conn->error;
                            } 
                            elseif ($result->num_rows > 0) {
                                // echo '<div class="insights">';
                                while ($row = $result->fetch_assoc()) {
                                    $blood_type = $row["blood_type"];
                                    $totalAvailable = $row["available_units"];
                                    $totalRequested = $row["total_requested_units"];
                                    $availablePercentage = ($totalAvailable > 0) ? ($totalAvailable / ($totalAvailable + $totalRequested)) * 100 : 0;
                                    $requestPercentage = ($totalRequested > 0) ? ($totalRequested / ($totalAvailable + $totalRequested)) * 100 : 0;

                                    // Calculate the color based on availablePercentage
                                    $color = '';
                                    if ($availablePercentage > 70) {
                                        $color = 'green'; // Green for more than 70%
                                    } elseif ($availablePercentage >= 30 && $availablePercentage <= 70) {
                                        $color = 'yellow'; // Yellow for between 30% and 70%
                                    } else {
                                        $color = 'red'; // Red for less than 30%
                                    }
                                            
                                    // Display blood type with percentage
                                    echo '<div class="Bminus">
                                        <a href="#">
                                            <div class="middle">
                                                <div class="left">
                                                    <h1>B-</h1>
                                                </div>
                                                <div class="progress">
                                                    <svg>                                        
                                                        <circle cx="38" cy="38" r="36" style="stroke-dasharray: ' . (2 * M_PI * 36) . '; stroke-dashoffset: ' . (2 * M_PI * 36 * (1 - $availablePercentage / 100)) . '; stroke: ' . $color . '"></circle>
                                                    </svg>
                                                    <div class="number">
                                                        <p>' . round($availablePercentage, 2) . '%</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <small class="text-muted">Last 24 Hours</small>
                                        </a>
                                    </div>';
                                }

                            }   else {
                                    echo "0 results";
                                }

                            // Close connection
                            $conn->close();
                ?>


                <?php             
                    // Enable error reporting
                    ini_set('display_errors', 1);
                    error_reporting(E_ALL);
                                        
                    // Database connection
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "blood_bank_management_system";

                    // Create Connection
                    $conn = mysqli_connect($servername, $username, $password, $database);

                    // Check Connection
                    if(!$conn) {
                                die("Connection Failed". mysqli_connect_error());
                    }
                    // echo "Connection Successfully";
                                        
                    // Retrieve blood inventory data and total requested units
                    $sql = "SELECT 
                                b.blood_type,
                                b.available_units,
                                COALESCE(SUM(r.bloodUnits), 0) AS total_requested_units
                            FROM blood_inventory b
                            LEFT JOIN (
                                SELECT bloodType, bloodUnits FROM request
                                UNION ALL
                                SELECT bloodType, bloodUnits FROM receiver
                            ) AS r ON b.blood_type = r.bloodType
                            Where b.blood_type = 'AB-'
                            GROUP BY b.blood_type
                            ORDER BY
                                CASE 
                                    WHEN b.blood_type = 'A+' THEN 1
                                    WHEN b.blood_type = 'A-' THEN 2
                                    WHEN b.blood_type = 'B+' THEN 3
                                    WHEN b.blood_type = 'B-' THEN 4
                                    WHEN b.blood_type = 'AB+' THEN 5
                                    WHEN b.blood_type = 'AB-' THEN 6
                                    WHEN b.blood_type = 'O+' THEN 7
                                    WHEN b.blood_type = 'O-' THEN 8
                                END";
                            $result = $conn->query($sql);
                            if ($result === FALSE) {
                                echo "Error: " . $conn->error;
                            } 
                            elseif ($result->num_rows > 0) {
                                // echo '<div class="insights">';
                                while ($row = $result->fetch_assoc()) {
                                    $blood_type = $row["blood_type"];
                                    $totalAvailable = $row["available_units"];
                                    $totalRequested = $row["total_requested_units"];
                                    $availablePercentage = ($totalAvailable > 0) ? ($totalAvailable / ($totalAvailable + $totalRequested)) * 100 : 0;
                                    $requestPercentage = ($totalRequested > 0) ? ($totalRequested / ($totalAvailable + $totalRequested)) * 100 : 0;

                                    // Calculate the color based on availablePercentage
                                    $color = '';
                                    if ($availablePercentage > 70) {
                                        $color = 'green'; // Green for more than 70%
                                    } elseif ($availablePercentage >= 30 && $availablePercentage <= 70) {
                                        $color = 'yellow'; // Yellow for between 30% and 70%
                                    } else {
                                        $color = 'red'; // Red for less than 30%
                                    }
                                            
                                    // Display blood type with percentage
                                    echo '<div class="ABminus">
                                        <a href="#">
                                            <div class="middle">
                                                <div class="left">
                                                    <h1>AB-</h1>
                                                </div>
                                                <div class="progress">
                                                    <svg>                                        
                                                        <circle cx="38" cy="38" r="36" style="stroke-dasharray: ' . (2 * M_PI * 36) . '; stroke-dashoffset: ' . (2 * M_PI * 36 * (1 - $availablePercentage / 100)) . '; stroke: ' . $color . '"></circle>
                                                    </svg>
                                                    <div class="number">
                                                        <p>' . round($availablePercentage, 2) . '%</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <small class="text-muted">Last 24 Hours</small>
                                        </a>
                                    </div>';
                                }

                            }   else {
                                    echo "0 results";
                                }

                            // Close connection
                            $conn->close();
                ?>


                <?php             
                    // Enable error reporting
                    ini_set('display_errors', 1);
                    error_reporting(E_ALL);
                                        
                    // Database connection
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "blood_bank_management_system";

                    // Create Connection
                    $conn = mysqli_connect($servername, $username, $password, $database);

                    // Check Connection
                    if(!$conn) {
                                die("Connection Failed". mysqli_connect_error());
                    }
                    // echo "Connection Successfully";
                                        
                    // Retrieve blood inventory data and total requested units
                    $sql = "SELECT 
                                b.blood_type,
                                b.available_units,
                                COALESCE(SUM(r.bloodUnits), 0) AS total_requested_units
                            FROM blood_inventory b
                            LEFT JOIN (
                                SELECT bloodType, bloodUnits FROM request
                                UNION ALL
                                SELECT bloodType, bloodUnits FROM receiver
                            ) AS r ON b.blood_type = r.bloodType
                            Where b.blood_type = 'O-'
                            GROUP BY b.blood_type
                            ORDER BY
                                CASE 
                                    WHEN b.blood_type = 'A+' THEN 1
                                    WHEN b.blood_type = 'A-' THEN 2
                                    WHEN b.blood_type = 'B+' THEN 3
                                    WHEN b.blood_type = 'B-' THEN 4
                                    WHEN b.blood_type = 'AB+' THEN 5
                                    WHEN b.blood_type = 'AB-' THEN 6
                                    WHEN b.blood_type = 'O+' THEN 7
                                    WHEN b.blood_type = 'O-' THEN 8
                                END";
                            $result = $conn->query($sql);
                            if ($result === FALSE) {
                                echo "Error: " . $conn->error;
                            } 
                            elseif ($result->num_rows > 0) {
                                // echo '<div class="insights">';
                                while ($row = $result->fetch_assoc()) {
                                    $blood_type = $row["blood_type"];
                                    $totalAvailable = $row["available_units"];
                                    $totalRequested = $row["total_requested_units"];
                                    $availablePercentage = ($totalAvailable > 0) ? ($totalAvailable / ($totalAvailable + $totalRequested)) * 100 : 0;
                                    $requestPercentage = ($totalRequested > 0) ? ($totalRequested / ($totalAvailable + $totalRequested)) * 100 : 0;

                                    // Calculate the color based on availablePercentage
                                    $color = '';
                                    if ($availablePercentage > 70) {
                                        $color = 'green'; // Green for more than 70%
                                    } elseif ($availablePercentage >= 30 && $availablePercentage <= 70) {
                                        $color = 'yellow'; // Yellow for between 30% and 70%
                                    } else {
                                        $color = 'red'; // Red for less than 30%
                                    }
                                            
                                    // Display blood type with percentage
                                    echo '<div class="Ominus">
                                        <a href="#">
                                            <div class="middle">
                                                <div class="left">
                                                    <h1>O-</h1>
                                                </div>
                                                <div class="progress">
                                                    <svg>                                        
                                                        <circle cx="38" cy="38" r="36" style="stroke-dasharray: ' . (2 * M_PI * 36) . '; stroke-dashoffset: ' . (2 * M_PI * 36 * (1 - $availablePercentage / 100)) . '; stroke: ' . $color . '"></circle>
                                                    </svg>
                                                    <div class="number">
                                                        <p>' . round($availablePercentage, 2) . '%</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <small class="text-muted">Last 24 Hours</small>
                                        </a>
                                    </div>';
                                }

                            }   else {
                                    echo "0 results";
                                }

                            // Close connection
                            $conn->close();
                ?>
            </div>
            <!------------------------------ End of Insights ---------------------->


            <!-- --------------Table Content------------------------>
            <div class="recent-orders">
                <h2>Blood Requests-Hospital</h2>
                <table id="bloodRequestsTable">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Hospital Name</th>
                            <th>Blood Type</th>
                            <th>Blood Units</th>
                            <th>Status</th>
                        </tr>
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

                                // Get the latest 5 requests
                                const latestRequests = data.slice(-5);

                                latestRequests.forEach(request => {
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



                    <a href="./request/Request.php">Show All</a>

                    <h2>Blood Requests-User</h2>
                    <table id="bloodRequestsTables">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>User Name</th>
                                <th>Blood Type</th>
                                <th>Blood Units</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody id="bloodRequestsTableBodys">
                            <!-- Table rows will be dynamically added here -->
                        </tbody>
                    </table>
                    <script>
                        // Function to display blood requests
                        function displayBloodRequests() {
                            fetch('./receiver/get_blood_request.php')
                                .then(response => response.json())
                                .then(data => {
                                    const bloodRequestsTableBody = document.getElementById('bloodRequestsTableBodys');
                                    bloodRequestsTableBody.innerHTML = '';

                                    // Get the latest 5 requests
                    const latestRequests = data.slice(-5);

                    latestRequests.forEach(request => {
                                        const row = bloodRequestsTableBodys.insertRow();
                                        row.innerHTML = `
                                                <td>${request.id}</td>
                                                <td>${request.name}</td>
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


                    <a href="./receiver/receiver.php">Show All</a>
                    <br>
                    <h2>Available And Requested Blood Inventory Table</h2>

                    <br>
                    <div class="reports">
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

                        // Retrieve blood inventory data and total requested units
                        $sql = "SELECT 
                                    b.blood_type,
                                    b.available_units,
                                    COALESCE(SUM(r.bloodUnits), 0) AS total_requested_units
                                FROM blood_inventory b
                                LEFT JOIN (
                                    SELECT bloodType, bloodUnits FROM request
                                    UNION ALL
                                    SELECT bloodType, bloodUnits FROM receiver
                                ) AS r ON b.blood_type = r.bloodType
                                GROUP BY b.blood_type
                                ORDER BY
                                    CASE 
                                        WHEN b.blood_type = 'A+' THEN 1
                                        WHEN b.blood_type = 'A-' THEN 2
                                        WHEN b.blood_type = 'B+' THEN 3
                                        WHEN b.blood_type = 'B-' THEN 4
                                        WHEN b.blood_type = 'AB+' THEN 5
                                        WHEN b.blood_type = 'AB-' THEN 6
                                        WHEN b.blood_type = 'O+' THEN 7
                                        WHEN b.blood_type = 'O-' THEN 8
                                    END";
                        $result = $conn->query($sql);

                        if ($result === FALSE) {
                            echo "Error: " . $conn->error;
                        } elseif ($result->num_rows > 0) {
                            echo "<!DOCTYPE html>
                            <html>
                            <head>
                            <title>Blood Inventory</title>
                        
                            </head>
                            <body>";

                            echo "<table>
                                <thead>
                                    <tr>
                                        <th>Blood Type</th>
                                        <th>Total Available Units</th>
                                        <th>Total Requested Units</th>
                                        <th>Total Available %</th>
                                        <th>Total Request %</th>
                                    </tr>
                                </thead>
                                <tbody>";
                            while ($row = $result->fetch_assoc()) {
                                $totalAvailable = $row["available_units"];
                                $totalRequested = $row["total_requested_units"];
                                $availablePercentage = ($totalAvailable > 0) ? ($totalAvailable / ($totalAvailable + $totalRequested)) * 100 : 0;
                                $requestPercentage = ($totalRequested > 0) ? ($totalRequested / ($totalAvailable + $totalRequested)) * 100 : 0;
                                echo "<tr>
                                    <td>" . $row["blood_type"] . "</td>
                                    <td>" . $totalAvailable . "</td>
                                    <td>" . $totalRequested . "</td>
                                    <td>" . round($availablePercentage, 2) . "%</td>
                                    <td>" . round($requestPercentage, 2) . "%</td>
                                </tr>";
                            }
                            echo "</tbody>
                            </table>";

                            echo "</body>
                            </html>";
                        } else {
                            echo "0 results";
                        }

                        // Close connection
                        $conn->close();
                    ?>
                    </div>

                    <br>
                    <br>
                    <h1>Blood Request Inventory</h1>
                    <br>

                    <div class="reports">
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

                            // SQL query to retrieve total blood units requested by blood type
                            $sql = "SELECT bloodType, SUM(bloodUnits) AS totalRequestedUnits
                                    FROM (
                                        SELECT bloodType, bloodUnits FROM receiver
                                        UNION ALL
                                        SELECT bloodType, bloodUnits FROM request
                                    ) AS combined_requests
                                    GROUP BY bloodType";

                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // Output table header
                                echo "<table border='1'>
                                        <tr>
                                            <th>Blood Type</th>
                                            <th>Total Requested Units</th>
                                        </tr>";

                                // Output data of each row
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr>
                                            <td>".$row["bloodType"]."</td>
                                            <td>".$row["totalRequestedUnits"]."</td>
                                        </tr>";
                                }
                                echo "</table>";
                            } else {
                                echo "0 results";
                            }

                            $conn->close();
                        ?>
                        <br><br>
                        <?php
                            // Database configuration
                            $servername = "localhost";
                            $username = "root"; 
                            $password = ""; 
                            $dbname = "blood_bank_management_system"; 

                            // Create connection
                            $conn = new mysqli($servername, $username, $password, $dbname);

                            // Function to generate table for blood request inventory
                            function generateBloodRequestInventoryTable() {
                                global $conn;
                                
                                // Query to fetch blood request inventory for hospitals
                                $hospital_query = "SELECT bloodType, 
                                                        SUM(bloodUnits) AS totalRequestedUnits,
                                                        SUM(CASE WHEN status = 'Approved' THEN bloodUnits ELSE 0 END) AS approvedUnits,
                                                        SUM(CASE WHEN status = 'Not Approved' THEN bloodUnits ELSE 0 END) AS notApprovedUnits,
                                                        SUM(CASE WHEN status = 'Pending' THEN bloodUnits ELSE 0 END) AS pendingUnits
                                                FROM request
                                                GROUP BY bloodType";

                                // Query to fetch blood request inventory for users
                                $user_query = "SELECT bloodType, 
                                                    SUM(bloodUnits) AS totalRequestedUnits,
                                                    SUM(CASE WHEN status = 'Approved' THEN bloodUnits ELSE 0 END) AS approvedUnits,
                                                    SUM(CASE WHEN status = 'Not Approved' THEN bloodUnits ELSE 0 END) AS notApprovedUnits,
                                                    SUM(CASE WHEN status = 'Pending' THEN bloodUnits ELSE 0 END) AS pendingUnits
                                            FROM receiver
                                            GROUP BY bloodType";
                                
                                echo "<h2>Blood Request Inventory for Hospitals</h2> <br>";
                                echo "<table border='1'>
                                        <tr>
                                            <th>Blood Type</th>
                                            <th>Total Requested Units</th>
                                            <th>Approved Units</th>
                                            <th>Not Approved Units</th>
                                            <th>Pending Units</th>
                                        </tr>";
                                if ($result = $conn->query($hospital_query)) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>
                                                <td>".$row['bloodType']."</td>
                                                <td>".$row['totalRequestedUnits']."</td>
                                                <td>".$row['approvedUnits']."</td>
                                                <td>".$row['notApprovedUnits']."</td>
                                                <td>".$row['pendingUnits']."</td>
                                            </tr>";
                                    }
                                    $result->free();
                                }
                                echo "</table>";
                                
                                echo "<h2>Blood Request Inventory for Users</h2> <br>";
                                echo "<table border='1'>
                                        <tr>
                                            <th>Blood Type</th>
                                            <th>Total Requested Units</th>
                                            <th>Approved Units</th>
                                            <th>Not Approved Units</th>
                                            <th>Pending Units</th>
                                        </tr>";
                                if ($result = $conn->query($user_query)) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>
                                                <td>".$row['bloodType']."</td>
                                                <td>".$row['totalRequestedUnits']."</td>
                                                <td>".$row['approvedUnits']."</td>
                                                <td>".$row['notApprovedUnits']."</td>
                                                <td>".$row['pendingUnits']."</td>
                                            </tr>";
                                    }
                                    $result->free();
                                }
                                echo "</table>";
                            }

                            // Call the function to generate the table
                            generateBloodRequestInventoryTable();

                            // Close connection
                            $conn->close();
                        ?>
                    </div>
            </div>
            <br>
            
        </main>
        <!------------------------------------- End of Main ----------------------------------->


        <!-- End of Main -->

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
                                    echo '<img src="./images/staff/' . $photo . '" alt="Profile" style="border: 1px solid red;">';
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
    <!-- End of bbms -->
    <!-- <script src="order.js"></script> -->
    <script src="script.js"></script>


</body>

</html>