<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['dificultat'] = $_POST['dificultat'];

    header('Location:room3.php');
}

include "../funciones.php";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Habitación 2</title>
</head>

<body class="d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4" style="width: 22rem;">
        <h2 class="card-title text-center">Habitación 2</h2>
        <p class="card-text">Endevinalla: Tengo ciudades, pero no casas. Tengo montañas, pero no árboles. Tengo agua, pero no peces. ¿Qué soy?</p>
        <form method="POST">
            <div class="mb-3">
                <input type="text" name="answer" class="form-control" required placeholder="Respuesta">
            </div>
            <button type="submit" class="btn btn-success w-100">Enviar</button>
        </form>
        <?= $message; ?> <!-- Muestra el mensaje de éxito o error -->
    </div>
</body>

</html>