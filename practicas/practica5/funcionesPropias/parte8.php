<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        function calcularDescuento($precioOriginal, $descuento){
            $descuento = 0.75; //(descuento de 25%) 
            $precioOriginal = 100;
            $resultado = $precioOriginal * $descuento;
            return("el descuento de 25% del precio de {$precioOriginal} es {$resultado}");
        };

        echo calcularDescuento($precioOriginal, $descuento);
    ?>
</body>
</html>