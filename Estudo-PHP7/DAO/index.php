<?php

require_once("config.php");

# CARREA SÓ 1 USUÁRIO
// $root = new Usuario();
// $root->loadById(1);
// echo $root;

# LISTA DE USUÁRIOS
// $lista  = Usuario::getList();
// echo json_encode($lista);

# CARREGA UMA LISTA DE USUARIOS BUSCANDO PELO O LOGIN
// $search = Usuario::search("Celso");
// echo json_encode($search);

# CARREGA UM USUÁRIO USANDO O LOGIN E A SENHA
$usuario = new Usuario();
$usuario->login("root", "123456");

echo json_encode($usuario);


?>