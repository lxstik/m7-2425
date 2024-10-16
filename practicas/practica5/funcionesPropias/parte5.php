<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        function calcularEdad($anioNacimiento){
            $anioNacimiento = 2003;
            $anioActual = 2024;
            $edadResult = $anioActual - $anioNacimiento;
            $frase = "mi edad actual es {$edadResult}";
            return($frase);
        };
        
        echo calcularEdad($anioNacimiento);
    ?>
</body>
</html>