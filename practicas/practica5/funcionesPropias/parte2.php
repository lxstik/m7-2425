<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        function calcularTotal($precio, $cantidad, $impuesto){
            $precio = 10;
            $cantidad = 3;
            $impuesto = 0.21;

            $totalSinImpuesto = $precio * $cantidad;
            $totalConImpuesto = $totalSinImpuesto + ($totalSinImpuesto * $impuesto);
            $frase = "El precio total es {$totalConImpuesto} euros";
            return $frase;
        }
        

        echo calcularTotal($precio, $cantidad, $impuesto);
    ?>
</body>
</html>