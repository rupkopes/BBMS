<?php
// Start session if not already started
session_start();

// Destroy all session data
session_destroy();

// Redirect the user to a login page or any other desired page
header("Location: ../login/login.html"); // Replace "login.php" with the desired destination
exit;
?>
