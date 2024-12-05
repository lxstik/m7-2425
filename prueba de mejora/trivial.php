<?php
session_start();

include("data.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $correctas = 0;
    $incorrectas = 0;

    foreach ($preguntas as $pregunta) {
        $idPregunta = $pregunta['id'];
        $respuestaUsuario = $_POST['pregunta' . $idPregunta];

        if ($respuestaUsuario == $pregunta['answer']) {
            $correctas++;
        } else {
            $incorrectas++;
        }
    }

    $_SESSION['resultado'] = [
        'correctas' => $correctas,
        'incorrectas' => $incorrectas,
    ];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trivial</title>
</head>

<body>
    <div>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo '<h2>Resultados:</h2>
            <p>Respuestas correctas: '.$_SESSION['resultado']['correctas'].'</p>
            <p>Respuestas incorrectas: '.$_SESSION['resultado']['incorrectas'].'</p>
            <form method="post" action="index.php">
                <input class="bg-warning btn mt-2" type="submit" value="Regresar al inicio">
            </form>
            ';
        } else {
            echo '<form method="post" action="">';
            foreach ($preguntas as $pregunta) {
                echo '<h2>Pregunta #'.$pregunta['id'].':'.$pregunta['question'].'</h2>';
                foreach ($pregunta['options'] as $opcion) {
                    echo '<input type="radio" name="pregunta'.$pregunta['id'].'" value="'.$opcion.'">'.$opcion.'<br>';
                }
            }

            echo '
                <div class="inputBox">
                    <input class="bg-warning btn mt-2" type="submit" value="Validar las respuestas">
                </div>
            </form>';
        }
        ?>
    </div>
</body>

</html>