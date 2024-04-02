<?php
include_once("comment_connect.php");

if (isset($_POST["submit"])) {
    // Get the uploaded file name
    $photo = $_FILES["photo"]["name"];

    // Get other form data
    $name = $_POST["name"];
    $message = $_POST["message"];

    // Define the folder path to save the uploaded file
    $target_dir =  __DIR__ . "/../../images/comments/";

    // Create the folder if it doesn't exist
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true); // Change permissions as needed
    }

    $target_file = $target_dir . basename($photo);

    // Move the uploaded file to the target directory
    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
        // Prepare the SQL statement with parameterized query
        $sql = "INSERT INTO `comments`(`id`, `photo`, `name`, `message`) VALUES (NULL, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);

        // Bind parameters
        mysqli_stmt_bind_param($stmt, "sss", $photo, $name, $message);

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            header("Location: comments.php?msg=New Comments Added Successfully");
            exit(); // Terminate the script after redirection
        } else {
            echo "Failed: " . mysqli_stmt_error($stmt);
        }

        // Close statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Failed to upload file.";
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
    <link rel="stylesheet" type="text/css" href="../style.css">
    <style>

        .comment-photo {
            width: 11rem;
            height: 11rem;
            background-color: silver;
            cursor: pointer;
            border-radius: 10%;
            overflow: hidden;
            position: relative;
            display: inline-block;
        }

        #photo-upload {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }

        #preview-image {
            width: 100%;
            height: 100%;
        }

        .comment {
            color: var(--color-dark);
            font-size: 17px;
        }

        .button {
            color: var(--color-dark);
            background-color:  var(--color-background);
            background-color: blue;
            font-size: 17px;
            border-radius: 10%;
        }

    </style>
</head>
<body>
    <div class="bbms">
        <?php include_once("../left.php"); ?>    
        <main>
            <br><br><h2><marquee bgcolor="green">*******<em>Blood Bank Management System</em>*******</marquee></h2><br>
            <h1><i>Recent Updates:</i></h1><br>
            <form action="" method="post" enctype="multipart/form-data"> <!-- Add enctype attribute -->
                <div class="comment-photo">
                    <label for="photo-upload">
                        <img id="preview-image" src="/BBMS/images/camera.jpg" alt="Your Photo">
                    </label>
                    <input type="file" id="photo-upload" name="photo" accept="image/*" onchange="previewFile()">
                </div>
                <table>
                    <tr><br>
                        <td><label class="comment" for="name">Name:</label></td><br>
                        <td><input class="comment" type="text" name="name" placeholder="Your Name"></td>
                    </tr>
                </table>
                <p class="comment">Message:<br><textarea class="comment" id="message" placeholder="Your Thoughts Will Be Appreciated!" name="message" cols="30" rows="3"></textarea></p>
                <p><input class="button" type="Submit" name="submit" value="Submit">&nbsp&nbsp&nbsp&nbsp<input class="button" type="Reset" name="reset" value="Reset"></p>
            </form>
        </main>
        <?php include_once("../right.php"); ?>
    </div>
    <script>
        document.getElementById("message").addEventListener("input", function() {
            var message = this.value;
            if (message.length > 50) {
                this.value = message.substring(0, 50);
            }
        });
    </script>

<!-- limit message so that user cannot type more than 50 characters in textarea. -->
    <script src="../order.js"></script> 
    <script src="../script.js"></script> 
</body>
</html>
