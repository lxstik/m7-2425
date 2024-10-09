<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-color: black;
            text-align: center;
            margin: 100px;
            padding: 300px;
            color: white;
        }

        .caja{
            background-color: grey;
            border-radius: 20px;
        }
    </style>
</head>
<body>
    <?php
        $i = rand(0, 100); 
        echo"<div class='caja'><h1>Tu numero aleatorio es $i</h1>"; 
            if($i % 2 == 0){
                echo "<h2>Este numero es par</h2>";
            } else {
                echo "<h2>Este numero es impar</h2>"; 
            }
        echo"</div>"; 
    ?>

</body>
</html>