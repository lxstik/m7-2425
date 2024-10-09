<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <style>
        #num{
            background-color: grey;
            color: white;
            border: 1px soid powderblue;
            padding: 20px;
            margin: 20px;
            width: 25px;
            text-align: center;
        }
        .principal{
            display: flex;
            flex-wrap: wrap;
        }
    </style>
</head>
<body>
    <h1>Ejercicio 1. Numeros pares entre 50 y 500</h1>
    
    <div class="principal">
        <?php
            function par(){
                for($i = 50; $i <= 500; $i = $i + 2){
                    echo "<div class='$i' id='num'>$i</div>";
                }
            }
            par();   
        ?>
    </div>
    
</body>
</html>


