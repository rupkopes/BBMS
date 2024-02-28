<?php
    include ("../ad_min_connect.php");

    if (isset($_POST["submit"])) {
        $camp_name = $_POST['camp_name'];
        $blood_type = $_POST['blood_type'];
        $quantity = $_POST['quantity'];
  

        $sql = "INSERT INTO `blood_collect`(`camp_id`, `camp_name`, `blood_type`, `quantity`) VALUES (NULL,'$camp_name','$blood_type','$quantity')";

        $result = mysqli_query($conn, $sql);

        if($result) {
            header("Location: collection_table.php?msg=New record created successfully");
        }
        else {
            echo "Failed: " .mysqli_error($conn);
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Request Form</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp"/>
    <link rel="stylesheet" href="/BBMS/Admin Dashboard/blood_request/blood_request_form.css">
</head>
<body>

    <div class="bbms blood_request_form">
        <div class="login_box">
            <form action="" method="post">
                <div class="arrow1">
                    <span class="material-symbols-sharp">keyboard_double_arrow_left</span>
                </div>
                <div class="arrow2">
                    <span class="material-symbols-sharp">keyboard_double_arrow_right</span>
                </div>

                <h1>Blood Request</h1>
                <div class="input_box">
                    <input type="text" name="Camp_name" placeholder="Camp Name" required>
                </div>

                <div class="column">
                    <div class="select_box">
                        <select name="blood_type">
                            <option hidden>Blood Type</option>
                            <option>A+</option>
                            <option>B+</option>
                            <option>AB+</option>
                            <option>O+</option>
                            <option>A-</option>
                            <option>B-</option>
                            <option>AB-</option>
                            <option>O-</option>
                        </select>
                    </div>
                    <div class="input_quantity">
                        <input type="number" name="quantity" placeholder="Quantity" required>
                    </div>
                </div>
                <a href=""><button type="submit" name="submit">Done</button></a>
                <a href="collection_table.php"><div class="cancel">Cancel</div></a>
            </form>
        </div>
    </div>
</body>
</html>