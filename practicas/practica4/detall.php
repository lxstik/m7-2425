<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 100;
            border: 5px solid black;
        }

        #mainContainer {
            
            border-radius: 8px;
            display: flex;
            margin: 0 auto;
            background-color: #f3f3f3;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        .foto {
            margin: 10px;
            text-align: center;
            display: table;
        }

        .info {
            width: 40%;
            padding: 20px;
            flex-direction: column;
            justify-content: space-between;
        }

        .trailer {
            width: 100%;
            border: none;
            background-color: #007BFF;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            margin-top: 10px;
            transition: background-color 0.3s;
        }

        .trailer:hover {
            background-color: #0056b3;
        }

        .horariosPelicula {
            margin: 10px 0;
            padding: 10px;
            border: 1px solid #ccc;
            width: 100%;
            display: flex;
            justify-content: space-around;
            background-color: #f9f9f9;
            border-radius: 5px;
        }

        .titulo {
            margin: 10px 0;
            padding: 10px;
            font-size: 24px;
        }

        .imagen {
            max-width: 400px;
            height: auto;
            border-radius: 5px;
        }
    </style>
</head>
<body>
<?php
    if(isset($_GET['nombre']) && isset($_GET['imagen']) && isset($_GET['horario']) 
    && isset($_GET['sinopsis']) && isset($_GET['reparto']) && isset($_GET['director'])
    && isset($_GET['genero']) && isset($_GET['calificacion']) && isset($_GET['trailer']) && isset($_GET['duracion'])){
        //pillardatos
        $nombrePeli = $_GET['nombre'];
        $imagenLink = $_GET['imagen'];
        $horarioPeli = $_GET['horario'];
        $sinopsisPeli = $_GET['sinopsis'];
        $repartoPeli = $_GET['reparto'];
        $directorPeli = $_GET['director'];
        $generoPeli = $_GET['genero'];
        $calificacionPeli = $_GET['calificacion'];
        $trailerPeli = $_GET['trailer'];
        $duracionPeli = $_GET['duracion'];

        echo '
            <h1 class="titulo">'. $nombrePeli .'</h1>
            <div id="mainContainer">
                <div class="foto">
                    <img class="imagen" src="'. $imagenLink .'"><br>
                    <a href="'. $trailerPeli .'"><button class="trailer">Trailer</button></a>
                </div>

                <div class="info">
                    <p>'. $sinopsisPeli .'</p>
                    <h2>Duración: '. $duracionPeli .'</h2>
                    <h2>Director: '. $directorPeli .'</h2>
                    <h2>Actores: '. $repartoPeli .'</h2>
                    <h2>Calificación: '. $calificacionPeli .'</h2>
                    <h2>Genero: '. $generoPeli .'</h2>
                    <div class="horario">
                        <h2 class="horariosPelicula">Horarios: '. $horarioPeli .'</h2>
                    </div>
                </div>
            </div>
        ';
    };
    
?>
</body>
</html>