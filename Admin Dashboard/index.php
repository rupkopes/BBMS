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
    <?php
        include_once("middle.php");        
    ?>
    <?php
        include_once("right.php");        
    ?>

        
        
    </div>
    <!---------------------- order.js must be before script.js -------------->
    <script src="order.js"></script> 
    <script src="script.js"></script> 
</body>
</html>