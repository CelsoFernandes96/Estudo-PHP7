<?php

interface Veiculo {
    public function acelerar($velocidade);
    public function frenar($velocidade);
    public function trocarMarcha($marcha);
}

abstract class Automovel implements Veiculo {

    public function acelerar($velocidade){
        echo "O Veiculo acelerou até " . $velocidade . " km/h";
    }

    public function frenar($velocidade) {   
        echo "O veiculo frenou até " . $velocidade . " km/h";
    }

    public function trocarMarcha($marcha) {
        echo "O veiculo enatou a marcha " . $marcha;
    }
}

?>