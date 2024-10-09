<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio extra</title>

    <style>
        html{
            height: 100vh;
        }

        body{
            background-color: #F2EADF;
            height: 100%;
        }
        
        .numeros{
            display: flex;
            flex-wrap: wrap;
        }

        .box{
            display: flex;
            flex-direction: column;
            height: 100vh;
            align-items: center;
            justify-content: center;
        }
    </style>

</head>
<body>
    <?php
        function divisores(){
            $nrandom = rand(0, 100);
            $primo = 0;
            echo"<div class='box'>";
            echo"<h1>Los divisores de $nrandom son:</h1>";
            echo"<div class='numeros'>";
                for($i = 1; $i <=100; $i++){
                    if($nrandom % $i == 0){
                        echo"<p class='divisor'>$i</p>";
                        $primo++;
                    }
                }
            echo"</div>";
            if($primo == 2){
                echo"<p class='conclusion'>El numero $nrandom ES un numero primo</p>";
            }else{
                echo"<p class='conclusion'>El numero $nrandom NO ES un numero primo</p>";
            }
            echo"</div>";
        }

        divisores();
    ?>
</body>
</html>