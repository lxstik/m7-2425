<?php
session_start();
include_once "./baraja.class.php";



class Partida {
    public $numero_jugadores;
    public $numero_cartas;
    public $turno;
    public $baraja;
    public $carta_en_mesa;
    public array $array_jugadores;
    public $constante_sentido;

    public function __construct($numeroJugadores, $cartasPorJugador) {
        if (isset($_SESSION['partida'])) {
            $partida = unserialize($_SESSION['partida']);
            $this->numero_jugadores = $partida->numero_jugadores;
            $this->numero_cartas = $partida->numero_cartas;
            $this->turno = $partida->turno;
            $this->constante_sentido = $partida->constante_sentido;
            $this->baraja = $partida->baraja;
            $this->array_jugadores = $partida->array_jugadores;
            $this->carta_en_mesa = $partida->carta_en_mesa;
        } else {
            $this->numero_jugadores = $numeroJugadores;
            $this->numero_cartas = $cartasPorJugador;
            $this->turno = 0;
            $this->constante_sentido = 1;
            $this->baraja = new Baraja();
            $this->baraja->crearBaraja();
            $this->baraja->mezclarBaraja();
            $this->array_jugadores = [];
            $this->carta_en_mesa = null;
        }
    }

    public function jugar(){
        $this->baraja = new Baraja();
        $this->baraja->crearBaraja();
        $this->baraja->mezclarBaraja();
        $this->carta_en_mesa = array_shift($this->baraja->barajaCartas);
        echo $_SESSION['numeroJugadores'];
        echo $_SESSION['cartasPorJugador'];
    }
    
    public function compararCarta(){
        
    }
}

?>