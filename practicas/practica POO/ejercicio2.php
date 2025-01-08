<?php

//Modifica la classe Llibre perquè tingui valors per defecte en els atributs.

class Llibre
{
    public string $titol = "Hola";
    public string $autor = "Yo";

    public function descr(){
        return "El titulo es: '$this->titol' y el autor es '$this->autor'";
    }
}

$libro = new Llibre();

echo $libro->descr();

?>
