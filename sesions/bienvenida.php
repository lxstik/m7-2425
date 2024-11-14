<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>datos enviados</h1>
    <?php

    echo "<p>Hola, " . ($_SESSION['name']) . ".</p>";
    echo "<p>Tu apellido es " . ($_SESSION['ap']) . ".</p>";
    echo "<p>Tu edad es " . ($_SESSION['edad']) . ".</p>";

    ?>

</body>

</html>