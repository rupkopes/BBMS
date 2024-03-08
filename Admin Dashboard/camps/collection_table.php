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
                <h2>Blood Collection</h2>
                <!-- <a class="button" href="blood_request_form.php" role="button">Make New Request</a> -->
                <?php
                            
                    include ("../connect.php");

                    // Retrieve blood inventory data and sort by blood type
                    $sql = "SELECT blood_type, available_units FROM blood_inventory ORDER BY
                    CASE 
                        WHEN blood_type = 'A+' THEN 1
                        WHEN blood_type = 'B+' THEN 2
                        WHEN blood_type = 'O+' THEN 3
                        WHEN blood_type = 'AB+' THEN 4
                        WHEN blood_type = 'A-' THEN 5
                        WHEN blood_type = 'B-' THEN 6
                        WHEN blood_type = 'O-' THEN 7
                        WHEN blood_type = 'AB-' THEN 8
                    END";
                    $result = $conn->query($sql);

                    if ($result === FALSE) {
                        echo "Error: " . $conn->error;
                    } elseif ($result->num_rows > 0) {
                        echo "<table>
                            <thead>
                                <tr>
                                    <th>Blood Type</th>
                                    <th>Available Units</th>
                                </tr>
                            </thead>
                            <tbody>";
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                <td>" . $row["blood_type"] . "</td>
                                <td>" . $row["available_units"] . "</td>
                            </tr>";
                        }
                        echo "</tbody>
                        </table>";
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
    <script src="../order.js"></script> 
    <script src="../script.js"></script> 
</body>
</html>