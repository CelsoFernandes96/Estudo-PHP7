<?php

require_once("config.php");

# CARREA S� 1 USU�RIO
// $root = new Usuario();
// $root->loadById(1);
// echo $root;

# LISTA DE USU�RIOS
// $lista  = Usuario::getList();
// echo json_encode($lista);

# CARREGA UMA LISTA DE USUARIOS BUSCANDO PELO O LOGIN
// $search = Usuario::search("Celso");
// echo json_encode($search);

# CARREGA UM USU�RIO USANDO O LOGIN E A SENHA
// $usuario = new Usuario();
// $usuario->login("root", "123456");

// echo json_encode($usuario);

# INSERT USUARIO
// $aluno = new Usuario("Celso José", "123456");
// $aluno->insert();
// echo $aluno;

# ATUALIZANDO USUARIO
// $usuario = new Usuario();
// $usuario->loadById(1);
// $usuario->update("Professor Celso", "123456");
// echo $usuario;

# DELETANDO USUARIO
$usuario = new Usuario();
$usuario->loadById(1);
$usuario->delete();
echo $usuario;

?>