<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Inicio</title>
</head>

<body>
    <div class="container">
        <div class="row bienvenida">
            <h1>
                <h1 class="mb-4">Hola, <?= $_SESSION['usuario']; ?>. Clica aquí para </h1>
                <?php
                if (!isset($_SESSION['usuario'])) {
                    echo '<a href="login.php">empezar el trivial</a>';
                } else {
                    echo '<a href="trivial.php">empezar el trivial</a>';
                }
                ?>
            </h1>
            <?php
            if ($_SESSION['role'] == 'admin') {
                echo '<a href="manage.php">⚙️</a>';
            } else {
                echo '<a href="login.php">⚙️</a>';
            }
            ?>

        </div>
    </div>
</body>

</html>