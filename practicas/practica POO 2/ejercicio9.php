<?php

//Crea un mètode saludar a la classe Animal que retorni una cadena com "Hola, sóc un [tipus] i em dic [nom]".

class Animal
{
    public string $nombre;
    public string $tipo;

    public function __construct($nombre, $tipo)
    {
        $this->nombre = $nombre;
        $this->tipo = $tipo;
    }

    public function saludar()
    {
        echo 'Hola soy un ', $this->tipo, ' y me llamo ', $this->nombre;
    }
}

$animal = new Animal('Paloma', 'Pajaro');

$animal->saludar();
