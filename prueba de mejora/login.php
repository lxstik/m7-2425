<?php
session_start();

$usuarios = [
    ["usuario" => "admin", "password" => "1234", "role" => "admin"],
    ["usuario" => "player", "password" => "5678", "role" => "player"]
];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['usuario'] = $_POST['usuario'];
    $_SESSION['password'] = $_POST['password'];
    if (isset($_POST['usuario'])  && isset($_POST['password'])) {
        foreach ($usuarios as $usuario) {
            if ($usuario['usuario'] == $_POST['usuario'] && $usuario['password'] == $_POST['password']) {
                $_SESSION['usuario'] = $_POST['usuario'];
                $_SESSION['role'] = $usuario['role'];
                header('Location:index.php');
                exit;
            } else {
                $credIncorrecto = 'Usuario o contraseña son incorrectos';
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <div class="container headerlogin">
        <h1>Página de login, inicia tu sesión</h1>
    </div>
    <div class="container">
        <div class="signin">
            <div class="content text-center">
                <form method="post" action="login.php">
                    <div class="inputBox ">
                        <input class="p-2 m-2" placeholder="Usuario" type="text" name="usuario" id="usuario" required>
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
    </div>
</body>

</html>