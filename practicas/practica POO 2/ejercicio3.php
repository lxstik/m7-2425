<?php
//Crea una classe Persona amb un constructor que accepti els paràmetres nom i edat. Afegeix un mètode per mostrar un missatge de benvinguda.

class Persona
{
    public string $nombre;
    public string $edad;

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
