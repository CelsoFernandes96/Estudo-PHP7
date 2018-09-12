<?php

$link = "https://www.google.com.br/logos/doodles/2018/caio-fernando-abreus-70th-birthday-5930185542074368.3-law.gif";

$content = file_get_contents($link);
$parse = parse_url($link);
$basename = basename($parse["path"]);

$file = fopen($basename, "w+");
fwrite($file, $content);
fclose($file);
?>

<img src="<?=$basename?>">