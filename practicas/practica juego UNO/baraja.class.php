<?php
include_once "./carta.class.php";

class Baraja{
    public $barajaCartas=[];
    public function crearBaraja(){
        $arrayColores=['blue', 'green', 'red', 'yellow']; 
        $idCarta=0;
        foreach ($arrayColores as $color) {
            for ($i=0; $i < 10; $i++) { 
                $this->barajaCartas[]=new Carta($color,$i,$idCarta);
            }
        }
    }

    public function mezclarBaraja(){
        shuffle($this->barajaCartas);
    }

    public function pintarBaraja(){
        foreach($this->barajaCartas as $carta){
            echo $carta->pinta_carta_link();
            echo "<br>";
        }
    }

    public function manoJugador(){
        
    }
}

?>