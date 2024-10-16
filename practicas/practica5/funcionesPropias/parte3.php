<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        function generarResumen($texto, $limite){
            $limite = 30;
            $texto = "texto acortado texto acortado texto acortado texto acortado texto acortado texto acortado texto acortado texto acortado ";

            if (strlen($texto) > $limite) {
                return substr($texto, 0, $limite) . "...";

            } else {
                return $texto;
            }
        };
        
        echo generarResumen($texto, $limite);

    ?>
</body>
</html>