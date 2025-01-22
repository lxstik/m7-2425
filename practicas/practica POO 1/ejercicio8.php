<?php

// Crear la clase Calculadora con métodos para sumar, restar, multiplicar y dividir
class Calculadora
{
    public int $primerNum;
    public int $segundoNum;

    public function __construct($primerNum, $segundoNum)
    {
        $this->primerNum = $primerNum;
        $this->segundoNum = $segundoNum;
    }

    public function sumar()
    {
        return $this->primerNum + $this->segundoNum;
    }

    public function restar()
    {
        return $this->primerNum - $this->segundoNum;
    }

    public function multiplicar()
    {
        return $this->primerNum * $this->segundoNum;
    }

    public function dividir()
    {
        return $this->primerNum / $this->segundoNum;
    }

    public function calcular()
    {
        echo "Suma: " . $this->sumar() . "<br>";
        echo "Resta: " . $this->restar() . "<br>";
        echo "Multiplicación: " . $this->multiplicar() . "<br>";
        echo "División: " . $this->dividir() . "<br>";
    }
}

$calculadora = new Calculadora(6, 3);
$calculadora->calcular();
