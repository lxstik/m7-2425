<?php
session_start();
include "../funciones.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['dificultat'] = $_POST['dificultat'];
    $_SESSION['respuesta'] = $_POST['answer'];



    header('Location:room2.php');

}


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Habitación 1</title>
</head>

<body class="d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4" style="width: 22rem;">
        <?php
        echo "
            <h1>Hola, {$_SESSION['username']}</h1>
            <h2>Nivel de dificultad: {$_SESSION['dificultat']}</h2>
        "
        ?>
        <h2 class="card-title text-center">Habitación 1</h2>
        <p class="card-text"><?php pregunta_facil_generar($adivinanzas, $respuesta); ?></p>
        <form method="POST">
            <div class="mb-3">
                <input type="text" name="answer" class="form-control" required placeholder="Respuesta">
            </div>
            <button type="submit" class="btn btn-success w-100">Enviar</button>
        </form>
    </div>
</body>

</html>