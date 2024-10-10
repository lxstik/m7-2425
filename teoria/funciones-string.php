<?php

    //1. longitud de caracteres --> strlen()

    $cadena = 'Hola mundo';

    echo($cadena);

    echo strlen($cadena);

    //2. strpos

    echo strpos($cadena, 'mundo');

    //3. str_replace

    echo str_replace("mundo", "Barcelona", $cadena);

    //4. strtolower

    echo strtolower($cadena);

    //5. strtoupper

    echo strtoupper($cadena);

    //6. ucfirst

    echo ucfirst($cadena);

    //7. ucwords

    echo ucwords($cadena);

    //8. trim (elimina los espacio en blanco al principio y final)

    $cadena2 = '    leo     messi       ';
    echo '<br>';
    echo trim($cadena2);

    //9. substr()
    //obtiene una parte de una cadena

    echo substr($cadena2, 4, 4);

    //10. implode
    //separa una lista con el limitador que tu pongas

    $array = ["hola", "mundo", "php"];
    echo implode("", $array);

    //11. explode
    //transforma una cadena en un array

    $cadena3 = "hola,mundo,php";
    $array2 = explode(",", $cadena3);
    print_r($array2);
    echo'<br>';

    foreach($array2 as $a){
        echo $a;
    };

    //12. in_array
    //mira si existe o no en un array

    $os = ["Mac", "Linux", "Windows", "Irix"];
    if(in_array("Irix", $os)){
        echo("Existe Irix");
    }

    //13. array_search
    //busca valor en el array y devuelve el correspondiente

    $array3 = ["manzana", "pera", "naranja"];
    echo array_search("naranja", $array3);

    //14. array_map

    $arraymap = [1,2,3,4];
    $resultado = array_map(function($numero){
        return $numero * 2;
    }, $arraymap);
    print_r($resultado); // resultado array : ( [0] => 2 [1] => 4 [2] => 6 [3] => 8)

    //15. array_filter()

    $arrayfilter = [1,2,3,4,5,6,7,8,9];
    $resultado2 = array_filter($arrayfilter, function($n){
        return $n % 2 == 0;
    });

    print_r($resultado2);
?>