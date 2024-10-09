<?php

//1.1 ARRAY ESCALAR INDEXADO
$estudiantes = array('Didac', 'David', 'Lucia');
$lista = array('Suleiman', 'Brian', 'Dani');

// var_dump($lista);
print_r($lista);

// DESDE LA VERSION 5.4 PHP
$lista2 = ["Dídac", "Kevin", "David", 87, 32, 78.23, true];

echo $lista2[1];

// añadir elementos a un array
$colores = ['rojo', 'azul', 'verde'];

// $colores[] = 'Naranja';
// print_r($colores);






// 2. array asociativo

// 2. ARRAYS ASOCIATIVOS
$tutor = [
    "nombre" => "Albert",
    "apellidos" => "Arrebola Sans",
    "edad" => 36
];

echo $tutor["apellidos"];
$tutor["edad"] = 18;

// print_r( array_keys($tutor));

$numeros = [1,2,3,4,5];

//recorrer un array con FOR

for($i = 0; $i < count($numeros); $i++){
    echo $numeros[$i] . "<br>";
}

//recorrer un array con FOREACH

$numeros2 = [1,2,3,4,5];

foreach($numeros2 as $num){
    echo $numero . ' ';
}


$ciudades = [
    "París" => "Francia",
    "Barcelona" => "Espanya",
    "Londres" => "Reino Unido"
];



foreach ($ciudades as $ciudad => $pais) {
    if($ciudad == 'Barcelona'){
        echo "La ciudad de $ciudad está en $pais";
    }    
}



?>