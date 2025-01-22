<?php

class Coche1
{
    public string $marca = 'Lada';
    public string $model = 'Sedan';


    public function descripcion()
    {
        return 'El coche es de marca ' . $this->marca . ' y su modelo es ' . $this->model;
    }
}


$coche = new Coche1();
echo $coche->descripcion();
