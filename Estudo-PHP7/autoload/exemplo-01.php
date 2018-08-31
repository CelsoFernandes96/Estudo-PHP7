<?php   

function __autoload($nomeClasse) {
    // print_r($nomeClasse);die("..");
    require_once("$nomeClasse.php");
}

$carro = new Dellrey();
$carro->acelerar(80);

?>