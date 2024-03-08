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
                <h2>Blood Requests</h2>
                <!-- <a class="button" href="blood_request_form.php" role="button">Make New Request</a> -->
                <a href="blood_request_form.php"><div class="mnr"><button type="submit" name="submit">Make New Request</button></div></a>
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
                            
                            include ("../connect.php");

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




        <?php
            include_once("../right.php");        
        ?> 
    </div>    
    <script src="../order.js"></script> 
    <script src="../script.js"></script> 
</body>
</html>