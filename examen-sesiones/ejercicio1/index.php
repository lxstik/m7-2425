<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['nombre'] = $_POST['nombre'];
    $_SESSION['apellido'] = $_POST['apellido'];

    header('Location: inicio.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="bg-light">

    <?php for ($i = 0; $i < 180; $i++): ?>
        <span></span>
    <?php endfor; ?>

    <section>
        <div class="signin">
            <div class="content text-center">
                <h2>Inicia sesión</h2>
                <form method="post" action="index.php">
                    <div class="mb-3">
                        <input class="form-control p-2 m-2" placeholder="Nombre" type="text" name="nombre" id="nombre" required>
                    </div>
                    <div class="mb-3">
                        <input class="form-control p-2 m-2" placeholder="Apellido" type="text" name="apellido" id="apellido" required>
                    </div>
                    <?php if (!empty($error)) : ?>
                        <div class="alert alert-danger"><?= $error ?></div>
                    <?php endif; ?>

                    <div>
                        <input class="btn btn-warning w-100 mt-3" type="submit" value="Iniciar">
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>

</html>