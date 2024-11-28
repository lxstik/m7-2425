<?php
session_start();

$users = [
    ["user" => "admin", "password" => "1234"],
    ["user" => "yehor", "password" => "yehor"],
];

// Procesamiento del formulario.

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['user'] = $_POST['user'];
    $_SESSION['password'] = $_POST['password'];

    if (isset($_POST['user'])  && isset($_POST['password'])) {
        foreach ($users as $usuario) {
            if ($usuario['user'] == $_POST['user'] && $usuario['password'] == $_POST['password']) {
                $_SESSION['user'] = $_POST['user'];
                header('Location:home.php');
                exit;
            } else {
                $credIncorrecto = 'Usuario o contraseña son incorrectos';
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <section>

        <?php for ($i = 0; $i < 180; $i++): ?>
            <span></span>
        <?php endfor; ?>

        <div class="signin">
            <div class="content text-center">
                <h2>Inicia sesión</h2>
                <form method="post" action="login.php">
                    <div class="inputBox ">
                        <input class="p-2 m-2" placeholder="User" type="text" name="user" id="user" required>

                    </div>
                    <div class="inputBox ">
                        <input class="p-2 m-2" placeholder="Password" type="password" name="password" id="password" required>

                    </div>
                    <?php if (!empty($error)) : ?>
                        <div class="alert alert-danger"><?= $error ?></div>
                    <?php endif; ?>

                    <div class="inputBox">
                        <input class="bg-warning btn mt-2" type="submit" value="Iniciar">
                    </div>
                </form>
                <?= $credIncorrecto; ?>
            </div>
        </div>
    </section>
</body>

</html>