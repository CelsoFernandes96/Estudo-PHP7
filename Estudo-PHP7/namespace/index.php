<?php

require_once("config.php");
use Cliente\Cadastro;

$cad = new Cadastro();
$cad->setNome("Celso Fernandes");
$cad->setEmail("celso@gmail.com");
$cad->setSenha("123456");

$cad->registrarVenda();
?>