<?php 

header("Content-Type: image/png");

$altura = 256;
$largura = 256;

$image = imagecreate($altura, $largura);
$black = imagecolorallocate($image, 0, 0, 0);
$red = imagecolorallocate($image, 255, 0, 0);

imagestring($image, 5, 60, 120, "Curso de PHP 7", $red);

imagepng($image);

imagedestroy($image);

 ?>