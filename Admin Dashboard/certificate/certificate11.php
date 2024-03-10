<?php
    $con=mysqli_connect("localhost","root","","blood_bank_management_system");
    $res=mysqli_query($con, "SELECT * FROM donors WHERE status=1 LIMIT 1");
    if(mysqli_num_rows($res)>0) {

        header ('content-type:image/png');
        $font="ChopinScript.ttf";
        $image=imagecreatefrompng("certificate.png");
        $color=imagecolorallocate($image,19,21,22);
        while($row=mysqli_fetch_assoc($res)) {
            
            $name=$row['name'];
            imagettftext($image,100,0,400,640,$color,$font,$name);

            $date=$row['created_at'];
            imagettftext($image,30,0,150,910,$color,"times.ttf",$date);

      
            $file=$row['id'];
            // $path="certificate/".$file.".pdf";
            imagepng($image,"certificate/".$file.".jpg");
            imagedestroy($image);

            // require('fpdf.php');
            // $pdf=new FPDF();
            // $pdf->AddPage();
            // $pdf->Image("certificate/".$file.".jpg",0,0,210,150);
            // $pdf->Output($path,"F");


            mysqli_query($con,"UPDATE donors SET status=0 WHERE id='".$row['id']."'");
        }
    }
?>