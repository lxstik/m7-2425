<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

        body{
            background-color: black;
            text-align: center;
            color: white;
        }

        .tabla{
            display: flex;
            flex-wrap: wrap;
            border: 1px solid black;
        }

        .tableta{
            background-color: grey;
            margin: 30px;
            padding: 30px;
            border-radius: 20px;
        }

        p{
            font-size: 18px;
        }
    </style>
</head>
<body>
    <h1>Ejercicio2. Tablas de multiplicación</h1>
    <div class="tabla">
    <?php
        function multiplicacion(){
            for($i = 1; $i < 11; $i++){
                echo"<div class='tableta'><h2>La tabla de multiplicación por $i</h2>";
                    echo"<div class='$i' id='multiplica'>";
                        for($y = 1; $y < 11; $y++){
                            echo "<p class='numum'>$i * $y = " . ($i * $y) . "</p>";
                        }
                    echo "</div>";
                echo'</div>';
            }
        }
    multiplicacion();
    ?>
    </div>
</body>
</html>