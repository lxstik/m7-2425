<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['name'] = $_POST['nombre'];
    $_SESSION['ap'] = $_POST['apellido'];
    $_SESSION['edad'] = $_POST['edad'];

    header('Location:bienvenida.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="index.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        <br><br>

        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" required>
        <br><br>

        <label for="edad">Edad:</label>
        <input type="number" id="edad" name="edad" required>
        <br><br>

        <button type="submit">Enviar</button>
    </form>
</body>

</html>