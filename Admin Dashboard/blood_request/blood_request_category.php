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
        
        
            <!-- --------------Table Content------------------------>
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
                <h2>Blood Category</h2>

                    <tbody>

                    <?php  
                            include ("../connect.php");

                            include ("category.php");
                            ?>
                            <br><br>
                            <?php
include ("../connect.php");
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
                                
                                echo "<br><h2>Blood Request Inventory for Hospitals</h2>";
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
                                
                                echo "<h2><br><br>Blood Request Inventory for Users</h2>";
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

                    </tbody>
                </table>
            </div>
        </main>

        <?php
            include_once("../right.php");        
        ?> 
    </div>    
    <script src="../order.js"></script> 
    <script src="../script.js"></script> 
</body>
</html>