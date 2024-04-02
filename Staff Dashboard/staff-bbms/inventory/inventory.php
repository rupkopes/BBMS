<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "blood_bank_management_system";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from form
    $blood_type = $_POST["blood_type"];
    $available_units = $_POST["available_units"];

    // Check if blood type already exists in inventory
    $check_sql = "SELECT * FROM blood_inventory WHERE blood_type = ?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param("s", $blood_type);
    $check_stmt->execute();
    $result = $check_stmt->get_result();

    if ($result->num_rows > 0) {
        // Blood type already exists, update available units
        $update_sql = "UPDATE blood_inventory SET available_units = available_units + ? WHERE blood_type = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("is", $available_units, $blood_type);
        if ($update_stmt->execute()) {
            echo "<script>alert('Units added successfully: $available_units units of $blood_type');</script>";
            echo "<script>window.location.href = 'Inventory.php';</script>";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        // Blood type doesn't exist, insert new record
        $insert_sql = "INSERT INTO blood_inventory (blood_type, available_units) VALUES (?, ?)";
        $insert_stmt = $conn->prepare($insert_sql);
        $insert_stmt->bind_param("si", $blood_type, $available_units);
        if ($insert_stmt->execute()) {
            echo "<script>alert('New record created successfully: $available_units units of $blood_type');</script>";
            echo "<script>window.location.href = 'Inventory.php';</script>";
        } else {
            echo "Error: " . $insert_sql . "<br>" . $conn->error;
        }
    }

    // Close statements
    $check_stmt->close();
    $update_stmt->close();
    $insert_stmt->close();
}

// Delete units of blood
if(isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['blood_type'])) {
    $blood_type = $_GET['blood_type'];

    // Delete entire record from inventory
    $delete_sql = "DELETE FROM blood_inventory WHERE blood_type = ?";
    $delete_stmt = $conn->prepare($delete_sql);
    $delete_stmt->bind_param("s", $blood_type);
    if ($delete_stmt->execute()) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $delete_stmt->close();
}

// Check if any blood type has 0 units and delete it
$zero_units_sql = "SELECT blood_type FROM blood_inventory WHERE available_units = 0";
$zero_units_result = $conn->query($zero_units_sql);
if ($zero_units_result->num_rows > 0) {
    while ($row = $zero_units_result->fetch_assoc()) {
        $blood_type = $row["blood_type"];
        $delete_sql = "DELETE FROM blood_inventory WHERE blood_type = ?";
        $delete_stmt = $conn->prepare($delete_sql);
        $delete_stmt->bind_param("s", $blood_type);
        if ($delete_stmt->execute()) {
            echo "Record for blood type '$blood_type' deleted successfully due to zero units";
        } else {
            echo "Error deleting record for blood type '$blood_type': " . $conn->error;
        }
        $delete_stmt->close();
    }
}

// Close connection
$conn->close();
?>
