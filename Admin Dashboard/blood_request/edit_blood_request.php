<?php
    include ("../connect.php");
    $id = $_GET['id'];

    if (isset($_POST["submit"])) {
        $hospital = $_POST['hospital'];
        $bloodType = $_POST['bloodType'];
        $bloodUnits = $_POST['bloodUnits'];
  

        $sql = "UPDATE `request` SET `hospital`='$hospital',`bloodType`='$bloodType',`bloodUnits`='$bloodUnits' WHERE id=$id";

        $result = mysqli_query($conn, $sql);

        if($result) {
            header("Location: blood_request_table.php?msg=Record updated successfully");
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
        <?php
            $sql = "SELECT * FROM `request` WHERE id = $id LIMIT 1";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
        ?>
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
                    <input type="text" name="hospital" value = "<?php echo $row['hospital']?>">
                </div>

                <div class="column">
                    <div class="select_box">
                        <select name="bloodType">
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
                        <input type="number" name="bloodUnits" value = "<?php echo $row['bloodUnits']?>">
                    </div>
                </div>
                <a href="blood_request_table.php"><button type="submit" name="submit">Update</button></a>
                <a href="blood_request_table.php"><div class="cancel">Cancel</div></a>
            </form>
        </div>
    </div>
</body>
</html>