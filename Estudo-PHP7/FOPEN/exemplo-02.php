<?php 

require_once("config.php");

$sql = new Sql();
$usuarios = $sql->select("SELECT * FROM USUARIOS ORDER BY ST_DESLOGIN_USU");

$headers = array();

foreach ($usuarios[0] as $key => $value) {
    array_push($headers, ucfirst($key));
}

$file = fopen("usuarios.csv", "w+");

fwrite($file, implode(",", $headers) . "\n");

foreach ($usuarios as $row) {

    $data = array();

    foreach ($row as $key => $value) {
        array_push($data, $value);
    }
    
    fwrite($file, implode(",", $data) . "\n");
}

fclose($file);
?>