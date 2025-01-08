<?php

//Afegeix un constructor a la classe Llibre que permeti inicialitzar titol i autor en el moment de la creació.

class Libro
{
    public string $titulo;
    public string $autor;

    public function __construct($titulo, $autor)
    {
        $this->titulo = $titulo;
        $this->autor = $autor;
    }

    public function info()
    {
        return "El libro hecho por $this->autor y se llama $this->titulo";
    }
}

$informacion = new Libro("Yoquese", "Yo");

echo $informacion->info();
