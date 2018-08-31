<?php

$conn = new mysqli("localhost", "root", "", "dbphp7");

if ($conn->connect_error) {
    echo "Error: " . $conn->connect_error;
}

$stmt = $conn->prepare("INSERT INTO USUARIOS ( ST_DESLOGIN_USU, ST_DESENHA_USU ) VALUES (?,?)");
$stmt->bind_param("ss", $login, $senha);

$login = "Celso";
$senha = "123456";
$stmt->execute();

?>
