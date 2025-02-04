<?php
include_once "./carta.class.php";
include_once "./baraja.class.php";
include_once "./partida.class.php";
include_once "./jugador.class.php";
session_start();


$numeroJugadores = $_SESSION['numeroJugadores'];
$cartasPorJugador = $_SESSION['cartasPorJugador'];

$partida = new Partida($numeroJugadores, $cartasPorJugador);
$partida->jugar();
$_SESSION['partida'] = serialize($partida);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container row">
        <div class="row col-10">
            <?php
            for($i=0; $i<$numeroJugadores;$i++){
                echo "<div class='col-2'>";
                $nombreJugador="jugador".$i;
                $nombreJugador= new Jugador();
                $nombreJugador->cartasRepartidas();
                $nombreJugador->mostrar_ma();
                echo "</div>";
            }?>
        </div>
        <div class="col-2">
            <?php
            $partida = unserialize($_SESSION['partida']);
            echo $partida->carta_en_mesa->pinta_carta_link();
            ?>
        </div>
    </div>
</body>
</html>