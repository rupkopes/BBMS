<?php
// Get the request data
$requestData = json_decode(file_get_contents('php://input'), true);

// Database configuration
$servername = "localhost";
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "blood_bank_management_system"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the request ID and new status
$id = $requestData['id'];
$status = $requestData['status'];

// Prepare and execute SQL query to update the status
$stmt = $conn->prepare("UPDATE receiver SET status = ? WHERE id = ?");
$stmt->bind_param("si", $status, $id);

if ($stmt->execute()) {
    // Check if the status is Approved
    if ($status === 'Approved') {
        // Get the blood type and units for the approved request
        $approved_request_sql = "SELECT bloodType, bloodUnits FROM receiver WHERE id = ?";
        $approved_request_stmt = $conn->prepare($approved_request_sql);
        $approved_request_stmt->bind_param("i", $id);
        $approved_request_stmt->execute();
        $approved_request_result = $approved_request_stmt->get_result();
        
        if ($approved_request_result->num_rows > 0) {
            $approved_request_row = $approved_request_result->fetch_assoc();
            $bloodType = $approved_request_row['bloodType'];
            $bloodUnits = $approved_request_row['bloodUnits'];

            // Check if there are enough available units in the inventory
            $check_inventory_sql = "SELECT available_units FROM blood_inventory WHERE blood_type = ?";
            $check_inventory_stmt = $conn->prepare($check_inventory_sql);
            $check_inventory_stmt->bind_param("s", $bloodType);
            $check_inventory_stmt->execute();
            $check_inventory_result = $check_inventory_stmt->get_result();

            if ($check_inventory_result->num_rows > 0) {
                $inventory_row = $check_inventory_result->fetch_assoc();
                $available_units = $inventory_row['available_units'];

                if ($available_units >= $bloodUnits) {
                    // Decrease available units in the inventory
                    $update_inventory_sql = "UPDATE blood_inventory SET available_units = available_units - ? WHERE blood_type = ?";
                    $update_inventory_stmt = $conn->prepare($update_inventory_sql);
                    $update_inventory_stmt->bind_param("is", $bloodUnits, $bloodType);
                    $update_inventory_stmt->execute();
                    $update_inventory_stmt->close();
                } else {
                    // If there are not enough available units, set status to Pending
                    $status = 'Pending';
                    $stmt->close();
                    $stmt = $conn->prepare("UPDATE receiver SET status = ? WHERE id = ?");
                    $stmt->bind_param("si", $status, $id);
                    $stmt->execute();
                    $stmt->close();
                    $conn->close();
                    echo json_encode(array('success' => false, 'message' => 'Not enough blood units available in inventory'));
                    exit;
                }
            } else {
                // If the blood type is not found in inventory, return an error message
                echo json_encode(array('success' => false, 'message' => 'Blood type not found in inventory'));
                exit;
            }
        } else {
            // If the request is not found, return an error message
            echo json_encode(array('success' => false, 'message' => 'Request not found'));
            exit;
        }
    }

    // Success
    $stmt->close();
    $conn->close();
    echo json_encode(array('success' => true, 'message' => 'Status updated successfully'));
} else {
    // Error
    $stmt->close();
    $conn->close();
    echo json_encode(array('success' => false, 'message' => 'Error updating status: ' . $conn->error));
}
?>
