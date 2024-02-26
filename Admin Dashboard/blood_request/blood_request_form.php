<?php
    include ("../admin_connect.php");

    if (isset($_POST["submit"])) {
        $org_name = $_POST['org_name'];
        $blood_type = $_POST['blood_type'];
        $quantity = $_POST['quantity'];
  

        $sql = "INSERT INTO `blood_requests`(`org_id`, `org_name`, `blood_type`, `quantity`) VALUES (NULL,'$org_name','$blood_type','$quantity')";

        $result = mysqli_query($conn, $sql);

        if($result) {
            header("Location: blood_request_table.php?msg=New record created successfully");
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
    <link rel="stylesheet" href="blood_request_form.css">
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
                    <input type="text" name="org_name" placeholder="Organization Name" required>
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
                <a href="blood_request_table.php"><button type="submit" name="submit">Request</button></a>
                <a href="blood_request_table.php"><div class="cancel">Cancel</div></a>
            </form>
        </div>
    </div>
</body>
</html>