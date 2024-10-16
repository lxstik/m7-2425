<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        function esPar($numero){
            $numero = 23;

            if($numero % 2 == 0){
                return("el numero {$numero} es par");
            }else{
                return("el numero {$numero} es impar");
            };
        };

        echo esPar($numero);
    ?>
</body>
</html>