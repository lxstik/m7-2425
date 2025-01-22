<?php
// Modifica la clase Persona para tipar las propiedades (string para el nombre, int para la edad) 
// y el método para tipar el retorno como string.

class Persona
{
    // Propiedades tipadas
    public string $nombre;
    public int $edad;

    public function __construct(string $nombre, int $edad)
    {
        $this->nombre = $nombre;
        $this->edad = $edad;
    }

    public function mensaje()
    {
        return "Bienvenido, " . $this->nombre . ". Tienes " . $this->edad;
    }
}


$persona1 = new Persona('Juan', 23);

$persona2 = new Persona('Ana', 30);

echo $persona1->mensaje() . "<br>";
echo $persona2->mensaje();
