<?php 

define("DS", DIRECTORY_SEPARATOR);

$image = imagecreatefromjpeg("certificado.jpg");

$tileColor = imagecolorallocate($image, 0, 0, 0);
$gray = imagecolorallocate($image, 100, 100, 100);

imagettftext($image, 36, 0, 320, 250, $tileColor, "fonts".DS."Bevan".DS."Bevan-Regular.ttf", "CERTIFICADO");
imagettftext($image, 32, 0, 375, 350, $tileColor, "fonts".DS."Playball".DS."Playball-Regular.ttf", "Divanei Aparecido");
imagestring($image, 3, 440, 370, utf8_decode("Concluído em: ").date("d/m/Y"), $tileColor);

header("Content-Type: image/jpeg");

imagejpeg($image);
//imagejpeg($image, "certificado-".date("Y-m-d").".jpg", 10);

imagedestroy($image);

 ?>