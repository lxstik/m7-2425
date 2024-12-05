<?php
session_start();

include("data.php");

if (!isset($_SESSION['preguntas'])) {
    $_SESSION['preguntas'] = [];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['questionmas'], $_POST['option1mas'], $_POST['option2mas'], $_POST['option3mas'], $_POST['answermas'])) {
        $nuevaPregunta = [
            'id' => count($_SESSION['preguntas']) + 1,
            'question' => $_POST['questionmas'],
            'options' => [
                $_POST['option1mas'],
                $_POST['option2mas'],
                $_POST['option3mas']
            ],
            'answer' => $_POST['answermas']
        ];

        $_SESSION['preguntas'] . array_push($preguntas, $nuevaPregunta);
    } else {
        echo 'Completa todos los campos!!!!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir pregunta</title>
</head>

<body>
    <h2>Añadir una nueva pregunta</h2>
    <form method="POST" action="">
        <label for="questionmas">Pregunta:</label>
        <input type="text" name="questionmas" id="questionmas" required><br><br>

        <label for="option1mas">Opción 1:</label>
        <input type="text" name="option1mas" id="option1mas" required><br><br>

        <label for="option2mas">Opción 2:</label>
        <input type="text" name="option2mas" id="option2mas" required><br><br>

        <label for="option3mas">Opción 3:</label>
        <input type="text" name="option3mas" id="option3mas" required><br><br>

        <label for="answermas">Respuesta Correcta:</label>
        <input type="text" name="answermas" id="answermas" required><br><br>

        <input type="submit" value="Agregar Pregunta">
    </form>

    <a href="index.php">Regresar al index.php</a>
</body>

</html>