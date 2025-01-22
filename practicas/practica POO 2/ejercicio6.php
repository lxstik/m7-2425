<?php
//Crea una classe Calculadora amb un mètode sumar que accepti dos números i retorni la seva suma.

class Calculadora
{
    public int $numero1;
    public int $numero2;

    public function __construct(int $numero1, int $numero2)
    {
        $this->numero1 = $numero1;
        $this->numero2 = $numero2;
    }

    public function sumar()
    {
        echo 'la suma de ', $this->numero1, " y ", $this->numero2, " es ", $this->numero1 + $this->numero2;
    }
}

$suma = new Calculadora(3, 7);

$suma->sumar();
