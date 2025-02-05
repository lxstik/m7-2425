<?php

class Carta
{
    public string $palo;
    public int $numero;
    public int $index;

    public function __construct(string $palo, int $numero, int $index)
    {
        $this->palo = $palo;
        $this->numero = $numero;
        $this->index = $index;
    }


    public function pinta_carta()
    {
        return "<img src='cartas_uno/{$this->numero}_{$this->palo}.png' alt='{$this->numero} {$this->palo}' />";
    }
    public function pinta_carta_link()
    {
        return "<a href='juego.php?num={$this->numero}&palo={$this->palo} '><img src='cartas_uno/{$this->numero}_{$this->palo}.png' alt='{$this->numero} {$this->palo}' /></a> ";
    }
}
