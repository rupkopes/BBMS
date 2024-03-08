<?php
// Database configuration
$servername = "localhost";
$username = "root"; // default username for XAMPP
$password = ""; // default password for XAMPP
$database = "comments"; // the name of your database

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if(!$conn) {
    die("Connection Failed". mysqli_connect_error());
}
?>
