<?php
include "../ad_min_connect.php";
$id = $_GET['id'];
$sql = "DELETE FROM `team_members` WHERE id = $id";
$result = mysqli_query($conn, $sql);
if($result){
    header("Location: team_members_table.php?msg=Record Deleted Successfully");
} 
else {
    echo "Failed: " .mysqli_error($conn);
}
?>