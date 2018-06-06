<?php 

$image = imagecreatefromjpeg("certificado.jpg");

$tileColor = imagecolorallocate($image, 0, 0, 0);
$gray = imagecolorallocate($image, 100, 100, 100);

imagestring($image, 5, 450, 150, "CERTIFICADO", $tileColor);
imagestring($image, 5, 420, 350, "Satanas", $tileColor);
imagestring($image, 3, 415, 370, utf8_decode("Concluído em: ").date("d/m/Y"), $tileColor);

header("Content-Type: image/jpeg");

imagejpeg($image);
//imagejpeg($image, "certificado-".date("Y-m-d").".jpg", 10);

imagedestroy($image);

 ?>