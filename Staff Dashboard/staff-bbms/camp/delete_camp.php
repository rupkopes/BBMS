<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: ../login.php");
        exit();
    }

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "blood_bank_management_system";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST['camp_id'])) {
            $camp_id = $_POST['camp_id'];
            // Prepare a delete statement
            $sql = "DELETE FROM camps WHERE id = ?";

            if($stmt = $conn->prepare($sql)){
                // Bind variables to the prepared statement as parameters
                $stmt->bind_param("i", $param_id);
                
                // Set parameters
                $param_id = $camp_id;
                
                // Attempt to execute the prepared statement
                if($stmt->execute()){
                    // Camp deleted successfully, redirect to camp list page
                    header("location: retrieve_camps.php");
                    exit();
                } else{
                    echo "Oops! Something went wrong. Please try again later.";
                }

                // Close statement
                $stmt->close();
            }
        }
    }

    // Close connection
    $conn->close();
?>
