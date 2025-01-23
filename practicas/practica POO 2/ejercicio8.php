<?php

class Animal1
{
    public string $nombre;
    public string $tipo;

    public function describir(): string
    {
        return 'El animal es ' . $this->nombre . ' y es un ' . $this->tipo;
    }
}

$animal = new Animal1();
$animal->nombre = 'Tigre';
$animal->tipo = 'Felino';

echo $animal->describir();
