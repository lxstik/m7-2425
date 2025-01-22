<?php

//Tipa les propietats i els mètodes de la classe Llibre . Afegeix un mètode getAutor() que retorni l'autor.

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
