<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        function convertirTemperatura($temperatura, $escala) {

            if ($escala == "C") {
                return ($temperatura - 32) * 5 / 9;
            } 

            else if ($escala == "F") {
                return ($temperatura * 9 / 5) + 32; 
            } 
        }


        $temperatura = 127;
        $escala = "C";

        $resultado = convertirTemperatura($temperatura, $escala);
        echo "la temperatura convertida es: $resultado";
    ?>

</body>
</html>