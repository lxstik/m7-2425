

<?php
//Crea una classe Cotxe amb dos atributs (marca i model) i un mètode descripcio() que retorni la marca i el model en un text.
class Coche
{
    public string $marca;
    public string $model;

    public function __construct($marca, $model)
    {
        $this->marca = $marca;
        $this->model = $model;
    }

    public function descripcion()
    {
        return 'El coche es de marca ' . $this->marca . ' y su modelo es ' . $this->model;
    }
}

$coche = new Coche('Lada', 'Sedan');

echo $coche->descripcion();
?>