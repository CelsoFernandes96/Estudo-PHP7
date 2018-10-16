<?php

$id = (isset($_GET["id"])) ? $_GET["id"] : 1;

if (!is_numeric($id) || strlen($id) > 5) {
    exit("Pegamos Voce !");
}

$conn = mysqli_connect("localhost", "root", "", "dbphp7");
$sql = "SELECT * FROM usuarios WHERE ID_USUARIO_USU = $id";
$exec = mysqli_query($conn, $sql);

while ($resultado = mysqli_fetch_object($exec)) {
    echo $resultado->ST_DESLOGIN_USU . '<br>';
}
?>