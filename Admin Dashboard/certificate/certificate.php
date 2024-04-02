<?php
    $con=mysqli_connect("localhost","root","","blood_bank_management_system");
    $res=mysqli_query($con, "SELECT * FROM donors WHERE status=0 LIMIT 10");
    if(mysqli_num_rows($res)>0) {

        header ('content-type:image/png');
        $font="ChopinScript.ttf";
        while($row=mysqli_fetch_assoc($res)) {
            $image=imagecreatefrompng("certificate.png"); // Recreate image for each donor
            $color=imagecolorallocate($image,19,21,22);

            $name=$row['name'];
            imagettftext($image,100,0,400,640,$color,$font,$name);

            $date=$row['created_at'];
            // Format the date to show in the format "3^rd March 2024"
            $formatted_date = date('jS F Y', strtotime($date));
            imagettftext($image,30,0,150,910,$color,"times.ttf",$formatted_date);

            $file = $row['name'] . '_' . $row['id'];
            imagepng($image,"certificate/".$file.".jpg");
            imagedestroy($image); // Destroy image after each certificate is created
            mysqli_query($con,"UPDATE donors SET status=1 WHERE id='".$row['id']."'");
        }
    }
?>
