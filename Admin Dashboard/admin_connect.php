<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "admin";
    // $dbname = "admin";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if(!$conn) {
                    die("Connection Failed". mysqli_connect_error());
    }
    // echo "Connection Successfully";
?>                