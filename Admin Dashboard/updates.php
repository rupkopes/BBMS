<?php
    include_once("comment_connect.php");

    if (isset($_POST["submit"])) {
        $photo = $_POST["photo"];
        $name = $_POST["name"];
        $message = $_POST["message"];
  
        $sql = "INSERT INTO `comments`(`id`, `photo`, `name`, `message`) VALUES (NULL,'$photo','$name','$message')";

        $result = mysqli_query($conn, $sql);

        if($result) {
            header("Location: updates.php?msg=New Comments Added Successfully");
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
    <title>BBMS</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp"/>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="bbms">

    <?php
        include_once("left.php");        
    ?>    

    <main>

        <br><br><h2><marquee bgcolor="green">*******<em>Blood Bank Management System</em>*******</marquee></h2><br><br>
        <h1><i>Comments:</i></h1><br>
        <form action="" method="post">
        <!-- <div class="profile-photo">
            <img src="/BBMS/images/rupkopes.jpg" alt="Profile">
        </div> -->

        <div class="comment-photo">
            <img src="/BBMS/images/camera.jpg" alt="Profile">
            <!-- <label for="photo">Profile Photo:</label>
            <input type="file" name="photo" accept="image/*"> -->
        </div>
        <table>
        <tr>
        <td><label for="name">Name:</label></td>
        <td><input type="text" name="name" placeholder="Your Name"></td>
        </tr>
        </table>

        <p>Message:<br><textarea placeholder="Your Thoughts Will Be Appreciated!" name="message" cols=30 rows=3></textarea></p>
        <p><input type="Submit" name="submit" value="Submit">&nbsp&nbsp&nbsp&nbsp<input type="Reset" name="reset" value="Reset"></p>
        </form>
        
    </main>

    <?php
        include_once("right.php");        
    ?>
        
    </div>
    <script src="script.js"></script> 
</body>
</html>
