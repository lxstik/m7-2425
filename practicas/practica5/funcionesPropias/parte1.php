<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saludo personalizado</title>
</head>
<body>
    
    
    <?php
        function saludo($n) {
            $saludo = "Hola, {$n}";
            return $saludo;
        }
    ?>

    <p>
        <?php
            echo saludo('yehor');
        ?>
    </p>
</body>
</html>