<?php
include_once "./baraja.class.php";
class Jugador
{
    public $mano = [];
    public int $id;

    public function afegir_carta($carta)
    {
        $this->mano[] = $carta;
    }

    public function mostrar_ma()
    {
        for ($i = 0; $i < count($this->mano); $i++) {
            echo $this->mano[$i]->pinta_carta_link();
            echo "<br>";
        }
    }

    public function cartasRepartidas()
    {
        $cartas_a_repartir = $_SESSION['cartasPorJugador'];
        $partida = unserialize($_SESSION['partida']);
        for ($i = 0; $i < $cartas_a_repartir; $i++) {
            $carta = array_shift($partida->baraja->barajaCartas);
            $this->afegir_carta($carta);
        }
        $_SESSION['partida'] = serialize($partida);
    }
}
