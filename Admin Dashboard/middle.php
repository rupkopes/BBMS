<main>
    <h1>Dashboard</h1>
    <div class="date">
        <input type="date">
    </div>
    <div class="insights">

        <?php             
            // Enable error reporting
            ini_set('display_errors', 1);
            error_reporting(E_ALL);
                                
            // Database connection
            include ("connect.php");
                                
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
                                <a href="/BBMS/Admin Dashboard/progress_bar/A+.php">
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
            include ("connect.php");
                                
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
                                <a href="/BBMS/Admin Dashboard/progress_bar/B+.php">
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
            include ("connect.php");
                                
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
                                <a href="/BBMS/Admin Dashboard/progress_bar/AB+.php">
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
            include ("connect.php");
                                
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
                                <a href="/BBMS/Admin Dashboard/progress_bar/O+.php">
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
            include ("connect.php");
                                
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
                                <a href="/BBMS/Admin Dashboard/progress_bar/A-.php">
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
            include ("connect.php");
                                
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
                                <a href="/BBMS/Admin Dashboard/progress_bar/B-.php">
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
            include ("connect.php");
                                
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
                                <a href="/BBMS/Admin Dashboard/progress_bar/AB-.php">
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
            include ("connect.php");
                                
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
                                <a href="/BBMS/Admin Dashboard/progress_bar/O-.php">
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
            <?php
                if(isset($_GET['msg'])) {
                    $msg = $_GET['msg'];
                    echo'<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    '.$msg.'
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                }
            ?>

            <div class="recent-orders">
                <h2>Blood Requests</h2>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Organization Name</th>
                            <th>Blood Type</th>
                            <th>Quantity(Pints)</th>
                            <th>Date Requested</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php
                            
                            include ("connect.php");

                            $sql = "SELECT * FROM `request`";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td><?php echo $row['id'] ?></td>
                                <td><?php echo $row['hospital'] ?></td>
                                <td><?php echo $row['bloodType'] ?></td>
                                <td><?php echo $row['bloodUnits'] ?></td>
                                <td><?php echo $row['date_requests'] ?></td>
                                <td><?php echo $row['status'] ?></td>
                                <td>
                                    <a href="edit_blood_request.php?id=<?php echo $row['id'] ?>"><div class="modify1"><span class="material-symbols-sharp">edit_square</span></div></a>
                                </td>
                                <td>
                                    <a href="delete_blood_request.php?id=<?php echo $row['id'] ?>"><div class="modify2"><span class="material-symbols-sharp">delete</span></div></a>
                                </td>
                            </tr>

                        <?php
                            }
                        ?>


                    </tbody>
                </table>
                <a href="#">Show All</a>
            </div>
        </main>
        <!------------------------------------- End of Main ----------------------------------->
