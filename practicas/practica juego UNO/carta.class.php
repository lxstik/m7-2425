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

    public function pinta_carta_link()
    {
        echo '<form method="GET">';
        echo '<input type="hidden" name="color" value="' . $this->palo . '">';
        echo '<input type="hidden" name="numero" value="' . $this->numero . '">';
        echo '<button type="submit" style="border: none; background: none;">';
        echo '<img src="./cartas_uno/' . $this->numero . '_' . $this->palo . '.png" alt="Carta ' . $this->index . ' ' . $this->palo . '">';
        echo '</button>';
        echo '</form>';
    }
}
?>