<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['numeroJugadores'] = $_POST['numeroJugadores'];
    $_SESSION['cartasPorJugador'] = $_POST['cartasPorJugador'];
    header('Location:partida.php');
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Jugadores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
            overflow: hidden;
        }

        .video-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }

        .container {
            position: relative;
            z-index: 1;
        }
    </style>
</head>

<body>
    <video class="video-background" autoplay muted loop>
        <source src="cartas_uno/cartas_uno/video_fondo_uno.mp4" type="video/mp4">
        Tu navegador no soporta el elemento de video.
    </video>

    <div class="container mt-5">
        <h1 class="text-center text-white mb-4">Formulario de Jugadores</h1>
        <form method="POST" action="#">
            <div class="mb-3">
                <label for="numJugadores" class="form-label text-white">Número de Jugadores</label>
                <input type="number" class="form-control" id="numeroJugadores" name="numeroJugadores" placeholder="Introduce el número de jugadores" min="1" required>
            </div>

            <div class="mb-3">
                <label for="numCartas" class="form-label text-white">Número de Cartas por Jugador</label>
                <input type="number" class="form-control" id="cartasPorJugador" name="cartasPorJugador" placeholder="Introduce el número de cartas por jugador" min="1" required>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>