<?php
header ('content-type:image/png');
$font="ChopinScript.ttf";
$image=imagecreatefrompng("certificate.png");
$color=imagecolorallocate($image,19,21,22);
$name="Rupesh Choudhary";
imagettftext($image,100,0,400,640,$color,$font,$name);
$date="3rd march 2024";
imagettftext($image,30,0,150,910,$color,"times.ttf",$date);
imagepng($image);
imagedestroy($image);
?>