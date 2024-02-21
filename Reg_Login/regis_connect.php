<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "d_reg_db";
    // $dbname = "admin";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if(!$conn) {
                    die("Connection Failed". mysqli_connect_error());
    }
    // echo "Connection Successfully";
?>                