<?php

//Crea una classe Producte amb atributs nom i preu . Afegeix un mètode mostrarPreu() que retorni el preu amb un text.

class Producto
{
    public string $nombre;
    public int $precio;

    public function __construct($nombre, $precio)
    {
        $this->nombre = $nombre;
        $this->precio = $precio;
    }



    public function mostrarPrecio()
    {

        echo 'El producto es ' . $this->nombre . ' y cuesta ' . $this->precio . ' €';
    }
}

$producto1 = new Producto("Camiseta", 20);

$producto1->mostrarPrecio();
