<?php 

$file = fopen("logo.txt", "w+");
fwrite($file, date("Y-m-d H:i:s"). "\n");
fclose($file);

echo "Arquivo criado com sucesso!";


?>