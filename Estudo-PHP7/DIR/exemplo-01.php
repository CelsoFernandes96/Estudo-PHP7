<?php

$name = "images";

if (!issdir($name)) {
    mkdir($name);
    echo "Diretório $name criado com sucesso!";
} else {
    rmdir($name);
    echo "Já existe o diretório: $name foi removido";
}

?>