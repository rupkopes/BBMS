<?php
    // Database configuration
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "ad_min";

    // Create Connection
    $conn = mysqli_connect($servername, $username, $password, $database);

    // Check Connection
    if(!$conn) {
                die("Connection Failed". mysqli_connect_error());
    }
    // echo "Connection Successfully";
?>                