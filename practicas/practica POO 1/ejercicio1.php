<?php

//Crea una classe Llibre amb atributs titol , autor i un mètode descripcio() que retorni una descripció del llibre.

class Llibre
{
    public string $titol;
    public string $autor;
    public function __construct(string $titol = "Títol desconegut", string $autor = "Autor desconegut")
    {
        $this->titol = $titol;
        $this->autor = $autor;
    }
    public function descripcion()
    {
        return "El libro '$this->titol' ha estado escrito por '$this->autor'";
    }
}

$libro = new Llibre("Libro", "Yo");
$libro2 = new Llibre();

echo $libro->descripcion();
echo $libro2->descripcion();
