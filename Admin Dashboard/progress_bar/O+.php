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
                <h2>Blood Percent</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Blood Type</th>
                            <th>Requests(pints)</th>
                            <th>Available(Pints)</th>
                            <th>Requests(%)</th>
                            <th>Available(%)</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php
                            
                            include ("progress_bar_connect.php");

                            $sql = "SELECT * FROM `blood_percent` WHERE blood_type = 'O+'";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td><?php echo $row['blood_type'] ?></td>
                                <td><?php echo $row['request'] ?></td>
                                <td><?php echo $row['available'] ?></td>
                                <td><?php echo $row['r_percent'] ?></td>
                                <td><?php echo $row['a_percent'] ?></td>
                            </tr>

                        <?php
                            }
                        ?>

                    </tbody>
                </table>
            </div>
        </main>


        <?php
            include_once("../right.php");        
        ?> 
    </div>    
    <script src="../script.js"></script> 
</body>
</html>