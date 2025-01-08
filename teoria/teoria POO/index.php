<?php
class Saiyajin
{

    //Debes definitir el tipo de atribute si es publico, privado o protejido
    // si no se define el valor de la variable, se considera (null)


    public string $nombre = "Goku";
    public int $nivel_pelea = 1000;
    //primer metodo o funcion
    //tambien se debe colocar el tipo de valor que devuelves

    public function Saludar(): string
    {
        return "Hola, mi nombre es " . $this->nombre;
    }
    public function NivelDePelea()
    {
        return $this->nombre . "tiene un nivel de pelea de " . $this->nivel_pelea;
    }
}
$objeto1 = new Saiyajin();
var_dump($objeto1);
$objeto2 = new Saiyajin();
var_dump($objeto2);
echo "<br>";
echo $objeto1->Saludar();
echo '<br>';
echo "Mi nivel de pelea es: " . $objeto1->NivelDePelea();
