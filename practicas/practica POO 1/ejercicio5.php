<?php

//Crea una classe Persona amb atributs nom i edat . Afegeix un mètode saludar() que mostri un missatge com "Hola, sóc Anna i tinc 25 anys."

class Persona
{
    public string $nombre;
    public int $edad;

    public function __construct($nombre, $edad)
    {
        $this->nombre = $nombre;
        $this->edad = $edad;
    }

    public function saludar()
    {
        return "Hola soy $this->nombre y tengo $this->edad años";
    }
}

$saludar = new Persona("Anna", 25);
echo $saludar->saludar();
