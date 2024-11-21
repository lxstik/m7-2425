<?php
session_start();
include "../funciones.php";

$userAnswer = $_POST['answer'];
$correctAnswer = $adivinanzas[$_SESSION['dificultat']][4]['respuesta'];

if (isset($userAnswer) && !empty($userAnswer)) {
    if (strcasecmp($userAnswer, $correctAnswer) === 0) {
        $message = 'Correcto! Pasaste el juego';
    } else {
        $message = 'Falso';
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Habitación 5</title>
</head>

<body class="d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4" style="width: 22rem;">
        <?php
        echo "
            <h1>Hola, {$_SESSION['username']}</h1>
            <h2>Nivel de dificultad: {$_SESSION['dificultat']}</h2>
        "
        ?>
        <h2 class="card-title text-center">Habitación 5</h2>
        <p class="card-text"><?php echo $adivinanzas[$_SESSION['dificultat']][4]['pregunta']; ?></p>
        <form method="POST">
            <div class="mb-3">
                <input type="text" name="answer" class="form-control" required placeholder="Respuesta">
            </div>
            <button type="submit" class="btn btn-success w-100">Enviar</button>
        </form>
        <?= $message; ?>
    </div>
</body>

</html>