<?php
//Modifica la classe Persona per tipar les propietats (string per al nom, int per a l’edat) i el mètode per tipar el retorn.

class Persona
{
    public string $nombre;
    public int $edad;

    public function __construct($nombre, $edad)
    {
        $this->nombre = $nombre;
        $this->edad = $edad;
    }

    public function mensaje()
    {
        echo "Bienvenido, " . $this->nombre . " tienes " . $this->edad;
    }
}


$persona = new Persona('Juan', 23);

$persona->mensaje();
