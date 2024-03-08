<?php
include "../connect.php";
$id = $_GET['id'];
$sql = "DELETE FROM `request` WHERE id = $id";
$result = mysqli_query($conn, $sql);
if($result){
    header("Location: blood_request_table.php?msg=Record Deleted Successfully");
} 
else {
    echo "Failed: " .mysqli_error($conn);
}
?>