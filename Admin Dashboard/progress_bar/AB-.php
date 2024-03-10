<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BBMS</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp"/>
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
    <div class="bbms">
        <?php
            include_once("../left.php");        
        ?>    
        
        
            <!-- ---------------------------Table Content----------------------------->
        <main>
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
                <h2>Blood Percent</h2>
                    <?php
                            
                        // Enable error reporting
                        ini_set('display_errors', 1);
                        error_reporting(E_ALL);
                        
                        // Database connection
                        include ("../connect.php");
                        
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
                                WHERE b.blood_type = 'AB-'
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
                            <title>Blood Percent</title>
                        
                            </head>
                            <body>";
                        
                            echo "<table>
                                <thead>
                                    <tr>
                                        <th>Blood Type</th>
                                        <th>Available(Pints)</th>
                                        <th>Requests(Pints)</th>
                                        <th>Available(%)</th>
                                        <th>Requests(%)</th>
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
        </main>


        <?php
            include_once("../right.php");        
        ?> 
    </div>    
    <script src="/BBMS/Admin Dashboard/script.js"></script> 
</body>
</html>