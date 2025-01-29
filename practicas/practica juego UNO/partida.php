<?php
session_start();

$numeroJugadores = $_SESSION['numeroJugadores'];
$cartasPorJugador = $_SESSION['cartasPorJugador'];

class Carta
{
    public string $palo;
    public int $numero;
    public string $index;

    public function __construct($palo, $numero, $index)
    {
        $this->palo = $palo;
        $this->numero = $numero;
        $this->index = $index;
    }

    public function pinta_carta_link()
    {
        foreach (['blue', 'green', 'red', 'yellow'] as $color) {
            echo '<a href="seleccionar_carta.php?index=' . $this->index . '&color=' . $color . '">';
            echo '<img src="./cartas_uno/' . $this->index . '_' . $color . '.png" alt="Carta ' . $this->index . ' ' . $color . '">';
            echo '</a>';
        }
    }
}


$cartas = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

foreach ($cartas as $cartaIndex) {
    $carta = new Carta('Azul', 0, $cartaIndex);
    $carta->pinta_carta_link();
}
