<?php
include "../admin_connect.php";
$org_id = $_GET['org_id'];
$sql = "DELETE FROM `blood_requests` WHERE org_id = $org_id";
$result = mysqli_query($conn, $sql);
if($result){
    header("Location: blood_request_table.php?msg=Record Deleted Successfully");
} 
else {
    echo "Failed: " .mysqli_error($conn);
}
?>