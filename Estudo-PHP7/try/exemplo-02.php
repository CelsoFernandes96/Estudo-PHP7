<?php

function tratarNome($name) {
    if (!$name) {
        throw new Exception("Nenhum nome informado.", 1);
    }

    echo ucfirst($name). "<br>";
}

try {
    tratarNome("Celso");
    tratarNome("");
} catch (Exception $e) {
    echo $e->getMessage();
} finally {
    echo "Executou o try!";
}

?>