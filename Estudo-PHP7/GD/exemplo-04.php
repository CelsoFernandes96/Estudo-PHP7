<?php

header("Content-type: image/png");

$file = "wallpaper.jpg";

$new_width = 256;
$new_height = 256;

list($old_width, $old_height) = getimagesize($file);;

$newImage = imagecreatetruecolor($new_width, $new_height);
$oldImage = imagecreatefromjpeg($file);

imagecopyresampled($newImage, $oldImage, 0, 0, 0, 0, $new_width, $new_height, $old_width, $old_height);

imagejpeg($newImage);
imagedestroy($newImage);
imagedestroy($oldImage);
?>