<?php

header("Content-Type: image/jpeg");

$image = imagecreatefromjpeg("certificado.jpg");
$titleColor = imagecolorallocate($image, 0, 0, 0);
$gray = imagecolorallocate($image, 100, 100, 100);

imagestring($image, 5, 450, 150, "CERTIFICADO", $titleColor);
imagestring($image, 5, 440, 350, "Celso Fernandes", $titleColor);
imagestring($image, 3, 440, 370, "Concluido em: ".date('d/m/Y'), $titleColor);

imagejpeg($image, "certificado-".date("Y-m-d").".jpg", 10);
imagedestroy($image);
?>